<?php
    require "funciones/conecta.php";
    $con = conecta();

    if (isset($_POST['id'])){
        $id          = intval($_POST['id']);
        $nombre      = $_POST['nombre'];
        $codigo      = $_POST['codigo'];
        $descripcion = $_POST['descripcion'];
        $costo       = $_POST['costo'];
        $stock       = $_POST['stock'];
        $file_name   = $_FILES["archivo"]["name"];//archivos
        $file_tmp    = $_FILES["archivo"]["tmp_name"];

        $sql = "UPDATE productos 
                SET nombre = '$nombre', 
                    codigo = '$codigo', 
                    descripcion = '$descripcion', 
                    costo = '$costo',
                    stock = '$stock'";


        if(($file_name != "")){//Si el archivo no esta vacio se agrega al UPDATE
            $arreglo    = explode(".", $file_name);//archivos(extension)
            $len        = count($arreglo);
            $pos        = $len - 1;
            $ext        = $arreglo[$pos];

            $dir        = "archivos/productos/";
            $archivo_n  = md5_file($file_tmp) . "." . $ext;
            $archivo    = "$file_name";

            $sql .= ", archivo_n = '$archivo_n', archivo = '$archivo'";

            copy($file_tmp, $dir.$archivo_n);
        }
        $sql .= " WHERE id = $id";

        if($con->query($sql)){
            echo 1;
        }else{
            echo 0;
        }
        header("Location: productos_lista.php");
    }
?>