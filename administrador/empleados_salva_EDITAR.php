<?php
    require "funciones/conecta.php";
    $con = conecta();

    if (isset($_POST['id'])){
        $id  = intval($_POST['id']);
        $nombre     = $_POST['nombre'];
        $apellidos  = $_POST['apellidos'];
        $correo     = $_POST['correo'];
        $pass       = $_POST['pass'];
        $rol        = $_POST['rol'];
        $file_name  = $_FILES["archivo"]["name"];//archivos
        $file_tmp   = $_FILES["archivo"]["tmp_name"];
 
        if ($pass != ""){
            $passEnc = md5($pass);
        }

        $sql = "UPDATE empleados SET 
                    nombre = '$nombre', 
                    apellidos = '$apellidos', 
                    correo = '$correo', 
                    rol = '$rol'";

        if($pass != ""){//Si la contrasena no esta vacia se agrega al UPDATE
            $sql .= ", pass = '$passEnc'";
        }

        if(($file_name != "")){//Si el archivo no esta vacio se agrega al UPDATE
            $arreglo    = explode(".", $file_name);//archivos(extension)
            $len        = count($arreglo);
            $pos        = $len - 1;
            $ext        = $arreglo[$pos];

            $dir        = "archivos/empleados/";
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
        header("Location: empleados_lista.php");
    }
?>