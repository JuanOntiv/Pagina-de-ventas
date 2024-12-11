<?php
    //Cachar variables
    $file_name  = $_FILES["archivo"]["name"];
    $file_tmp   = $_FILES["archivo"]["tmp_name"];

    //Obtener extension
    $arreglo    = explode(".", $file_name);
    $len        = count($arreglo);
    $pos        = $len - 1;
    $ext        = $arreglo[$pos];

    //Carpeta para guardar archivos
    $dir = "../archivos/";

    //Obtener nombre
    $file_enc = md5_file($file_tmp);
    $fileName = "$file_enc.$ext";

    echo "file_name:    $file_name <br>";
    echo "file_tmp:     $file_tmp <br>";
    echo "etx:          $ext <br>";
    echo "file_enc:     $file_enc <br>";
    echo "fileName:     $fileName <br >";

    copy($file_tmp, $dir.$fileName);
?>