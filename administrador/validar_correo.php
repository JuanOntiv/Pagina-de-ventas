<?php
    require "funciones/conecta.php";
    $con = conecta();

    $correo = $_POST['correo'];

    $stmt = $con->prepare("SELECT * FROM empleados WHERE correo = ?");
    $stmt->bind_param("s", $correo);
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
