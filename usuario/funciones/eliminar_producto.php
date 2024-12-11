<?php
    session_start();
    require "conecta.php";
    $con = conecta();

    $id_producto_pedido = $_POST['id_producto_pedido'];

    $sql_delete = "DELETE FROM pedi_productos WHERE id = $id_producto_pedido";
    if($con->query($sql_delete)){
        echo "1";
    }else{
        echo "Error: " . $con->error;
    }
    $con->close();
?>