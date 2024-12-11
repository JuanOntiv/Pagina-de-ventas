<?php
    require "funciones/conecta.php";
    $con = conecta();

    if (isset($_POST['id'])){
        $id  = intval($_POST['id']);
        $nombre     = $_POST['nombre'];
        $file_name  = $_FILES["archivo"]["name"];//archivos
        $file_tmp   = $_FILES["archivo"]["tmp_name"];

        $sql = "UPDATE promociones SET 
                    nombre = '$nombre'";

        if($file_name != ""){//Si el archivo no esta vacio se agrega al UPDATE
            $arreglo    = explode(".", $file_name);//archivos(extension)
            $len        = count($arreglo);
            $pos        = $len - 1;
            $ext        = $arreglo[$pos];

            $dir        = "archivos/promociones/";
            $archivo  = md5_file($file_tmp) . "." . $ext;

            $sql .= ", archivo = '$archivo'";

            copy($file_tmp, $dir.$archivo);
        }
        $sql .= " WHERE id = $id";

        if($con->query($sql)){
            echo 1;
        }else{
            echo 0;
        }
        header("Location: promociones_lista.php");
    }
?>