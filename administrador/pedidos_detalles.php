<?php
    session_start();
    
    if(!isset($_SESSION['idUser'])){
        header("Location: index.php");
        exit();
    }else{
        $id = $_SESSION["idUser"];
        $nombre = $_SESSION["nomUser"];
        $correo = $_SESSION["correoUser"];

        require "funciones/conecta.php";

        $con = conecta();
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $con = conecta();

        $sql_carrito = "
            SELECT 
                productos.nombre AS nombre_producto,
                pp.cantidad,
                pp.precio AS costo_unitario,
                (pp.cantidad * pp.precio) AS costo_total,
                pp.id AS id_producto_pedido,
                productos.id AS id_producto
            FROM 
                pedidos p
            JOIN 
                pedi_productos pp 
            ON 
                p.id = pp.id_pedido
            JOIN 
                productos 
            ON 
                pp.id_producto = productos.id
            WHERE 
                p.status = 1 AND p.id_usuario = $id;
        ";
        $res_carrito = $con->query($sql_carrito);
        $total = 0;
    }
?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Detalles de la Promocion</title>
        <link rel="stylesheet" href="css/pedidos_detalles.css">
        <link rel="stylesheet" href="css/carrito.css">
        <script src="js/jquery-3.3.1.min.js"></script>
    </head>
    
    <body>
        <?php  include("menu.php");  ?>
        <div class="contenedor">
            <h1>Pedido #<?php echo $id ?></h1>
            <div class="carrito">

                <div class="categorias_carrito">
                    <div class="categoria categorias_producto">
                        <p>Producto</p>
                    </div>

                    <div class="categoria categorias_cantidad">
                        <p>Cantidad</p>
                    </div>

                    <div class="categoria categorias_costo1">
                        <p>Costo Unitario</p>
                    </div>

                    <div class="categoria categorias_subtotal">
                        <p>Subtotal</p>
                    </div>
                </div>

                <div class="productos_carrito">
                    <?php while ($row = $res_carrito->fetch_assoc()): ?>
                        <div class="producto_fila">
                            <div class='productosc productos_producto'>
                                <p><?php echo $row['nombre_producto']; ?></p>
                            </div>

                            <div class='productosc productos_cantidad'>
                                <p><?php echo $row['cantidad']; ?></p>                          
                            </div>

                            <div class='productosc productos_costo1'>
                                <p>$<?php echo $row['costo_unitario']; ?>.00</p>
                            </div>

                            <div class='productosc productos_subtotal'>
                                <p>$<?php echo $row['costo_total'] ?>.00</p>
                            </div>
                        </div>
                        <?php $total += $row['costo_total'];?>
                    <?php endwhile; ?>
                </div>

                <div class="total">
                    <div class="total_titulo">
                        <p>Total</p>
                    </div>
                    <div class="total_cantidad">
                        <p>$<?php echo number_format($total, 2); ?></p>
                    </div>
            </div>             
        </div>

            <div class="boton_regresar">
                <a href="pedidos_lista.php">Regresar al Listado</a>
            </div>
        </div>
    </body>
</html>