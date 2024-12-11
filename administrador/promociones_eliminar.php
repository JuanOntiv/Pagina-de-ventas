<?php
    require "funciones/conecta.php";
    $con = conecta();

    if (isset($_POST['id'])){
        $id  = intval($_POST['id']);
        $sql = "UPDATE promociones SET eliminado = 1 WHERE id = $id";

        if($con->query($sql)){
            echo 1; //eliminado
        }else{
            echo 0; //error
        }

    }else{
        echo "Error. ID no proporcionado o no encontrado.";
    }

    $con->close();
?>
