<?php
    require "funciones/conecta.php";
    $con = conecta();

    $nombre     = $_REQUEST['nombre'];
    $file_name  = $_FILES["archivo"]["name"];//archivos
    $file_tmp   = $_FILES["archivo"]["tmp_name"];

    $arreglo    = explode(".", $file_name);//archivos(extension)
    $len        = count($arreglo);
    $pos        = $len - 1;
    $ext        = $arreglo[$pos];

    $dir = "archivos/promociones/";

    $archivo_encriptado = md5($file_tmp) . "." . $ext;

    $sql = "INSERT INTO promociones
                (nombre, archivo)
            VALUES(
                '$nombre', '$archivo_encriptado'
                )";
    $res = $con->query($sql);

    copy($file_tmp, $dir.$archivo_encriptado);
    header("Location: promociones_lista.php");
?>