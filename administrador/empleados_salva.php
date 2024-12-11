<?php
    require "funciones/conecta.php";
    $con = conecta();

    $nombre     = $_REQUEST['nombre'];
    $apellidos  = $_REQUEST['apellidos'];
    $correo     = $_REQUEST['correo'];
    $pass       = $_REQUEST['pass'];
    $rol        = $_REQUEST['rol'];
    $file_name  = $_FILES["archivo"]["name"];//archivos
    $file_tmp   = $_FILES["archivo"]["tmp_name"];

    $passEnc    = md5($pass);

    $arreglo    = explode(".", $file_name);//archivos(extension)
    $len        = count($arreglo);
    $pos        = $len - 1;
    $ext        = $arreglo[$pos];

    $dir = "archivos/empleados/";
    $archivo_n  = md5_file($file_tmp) . "." . $ext;
    $archivo    = "$file_name";


    $sql_correo = "SELECT id FROM empleados WHERE correo = ? LIMIT 1";
    $stmt = $con->prepare($sql_correo);
    $stmt->bind_param('s', $correo);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Si el correo ya existe, redireccionar o mostrar un error
        header("Location: empleados_alta.php?error=correo_duplicado");
        exit();
    }

    $sql = "INSERT INTO empleados
                (nombre, apellidos, correo, pass, rol, archivo_n, archivo)
            VALUES(
                '$nombre', '$apellidos', '$correo', '$passEnc', '$rol', '$archivo_n', '$archivo'
                )";
    $res = $con->query($sql);

    copy($file_tmp, $dir.$archivo_n);
    header("Location: empleados_lista.php");
?>