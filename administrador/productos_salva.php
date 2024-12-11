<?php
    require "funciones/conecta.php";
    $con = conecta();

    $nombre      = $_REQUEST['nombre'];
    $codigo      = $_REQUEST['codigo'];
    $descripcion = $_REQUEST['descripcion'];
    $costo       = $_REQUEST['costo'];
    $stock       = $_REQUEST['stock'];
    $file_name   = $_FILES["archivo"]["name"];//archivos
    $file_tmp    = $_FILES["archivo"]["tmp_name"];

    $arreglo    = explode(".", $file_name);//archivos(extension)
    $len        = count($arreglo);
    $pos        = $len - 1;
    $ext        = $arreglo[$pos];

    $dir = "archivos/productos/";
    $archivo_n  = md5_file($file_tmp) . "." . $ext;
    $archivo    = "$file_name";


    $sql_codigo = "SELECT id FROM productos WHERE codigo = ? LIMIT 1";
    $stmt = $con->prepare($sql_codigo);
    $stmt->bind_param('s', $sql_codigo);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Si el correo ya existe, redireccionar o mostrar un error
        header("Location: productos_alta.php?error=codigo_duplicado");
        exit();
    }

    $sql = "INSERT INTO productos
                (nombre, codigo, descripcion, costo, stock, archivo_n, archivo)
            VALUES(
                '$nombre', '$codigo', '$descripcion', '$costo', '$stock', '$archivo_n', '$archivo'
                )";
    $res = $con->query($sql);

    copy($file_tmp, $dir.$archivo_n);
    header("Location: productos_lista.php");
?>