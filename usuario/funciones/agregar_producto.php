<?php
    session_start();
    if(isset($_SESSION['idCliente'])){
        $id_sesion = $_SESSION["idCliente"];
    }
    if (!isset($_SESSION['idCliente'])) {
        header("Location: ../login.php");
        exit;
    }

    require "conecta.php";
    $con = conecta();

    $id_producto = $_POST['id'];
    $cantidad    = $_POST['stock'];

    $sql_pedido_existe = "SELECT * FROM pedidos WHERE id_usuario = $id_sesion AND status = 0";
    $res_pedido = $con->query($sql_pedido_existe);
    $row_pedido = $res_pedido->fetch_array();


    if(empty($row_pedido)){
        $fecha_pedido = date("Y-m-d H:i:s");
        $sql_nuevo_pedido = "INSERT INTO pedidos (fecha, id_usuario) VALUES ('$fecha_pedido', '$id_sesion')";
        $res_insert_pedido = $con->query($sql_nuevo_pedido);

        if($res_insert_pedido){
            $id_pedido = $con->insert_id;
        }else{
            echo "No se agrego el pedido correctamente: " . $con->error;
            exit;
        }
    }else{
        $id_pedido = $row_pedido["id"];
    }


    $sql_productos = "SELECT * FROM productos WHERE id = '$id_producto' AND eliminado = 0";
    $res_productos = $con->query($sql_productos);


    if($res_productos){
        $row_producto = $res_productos->fetch_array();
        $costo = $row_producto["costo"];

        // Verificar si el producto ya está en el pedido
        $sql_producto_en_pedido = "SELECT * FROM pedi_productos WHERE id_producto = '$id_producto' AND id_pedido = $id_pedido";
        $res_producto_en_pedido = $con->query($sql_producto_en_pedido);
    
        if($res_producto_en_pedido->num_rows > 0){
            //Si el producto ya está en el pedido, actualizar la cantidad
            $row_producto_pedido = $res_producto_en_pedido->fetch_array();
            //$nueva_cantidad = $row_producto_pedido["cantidad"] + $cantidad;
            $sql_actualizar_cantidad = "UPDATE pedi_productos SET cantidad = '$cantidad' WHERE id_producto = '$id_producto' AND id_pedido = $id_pedido";
            $res_actualizar_cantidad = $con->query($sql_actualizar_cantidad);
            
            if($res_actualizar_cantidad){
                echo "Cantidad actualizada correctamente.";
            }else{
                echo "No se pudo actualizar la cantidad: " . $con->error;
            }

        }else{
            //Si el producto no está en el pedido, insertar un nuevo registro
            $sql_insert_pedidos = "INSERT INTO pedi_productos (id_producto, cantidad, precio, id_pedido) VALUES ('$id_producto', '$cantidad', '$costo', $id_pedido)";
            $res_insert_pedidos = $con->query($sql_insert_pedidos);

        // $sql_insert_pedidos = "INSERT INTO pedi_productos (id_producto, cantidad, precio, id_pedido) VALUES ('$id_producto', '$cantidad', '$costo', $id_pedido)";
        // $res_insert_pedidos = $con->query($sql_insert_pedidos);
         if($res_insert_pedidos){
                echo "Cantidad actualizada correctamente.";
                $ban = 1;
            }else{
                echo "No se agrego el pedido: " . $con->error;
                $ban = 0;
            }
        }
       
        echo $ban;
    }else{
        echo "Producto no encontrado o no disponible.";
    }

    $con->close();
?>
