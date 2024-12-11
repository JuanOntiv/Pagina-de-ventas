<?php
    require "funciones/conecta.php";
    $con = conecta();

    $codigo = $_POST['codigo'];

    $stmt = $con->prepare("SELECT * FROM productos WHERE codigo = ?");
    $stmt->bind_param("s", $codigo);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {
        echo 1; 
    } else {
        echo 0; 
    }

    $stmt->close();
    $con->close();
?>
