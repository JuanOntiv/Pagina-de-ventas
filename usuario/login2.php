<?php 
    session_start();
    require "funciones/conecta.php";
    $con = conecta();

    $correo = $_REQUEST['correo'];
    $password = $_REQUEST['pass'];

    // Primera consulta: Verificar si el correo existe en la base de datos
    $sql_exist = "SELECT * FROM cliente WHERE correo = '$correo'";
    $res_exist = $con->query($sql_exist);
    $num_exist = $res_exist->num_rows;

    if($num_exist == 0){    //El correo no existe en la base de datos
        echo "no_existe";
    }else{
        $row_exist = $res_exist->fetch_array();
        
        if($row_exist['eliminado'] == 1){   //Usuario está marcado como eliminado
            echo "eliminado";
        }else{  // Segunda consulta: Verificar que la contraseña sea correcta
            $sql = "SELECT * FROM cliente WHERE eliminado = 0 AND correo = '$correo' AND pass = '$password'";
            $res = $con->query($sql);
            $num = $res->num_rows;

            if($num == 1){
                // Caso: usuario existe, no está eliminado, y la contraseña es correcta
                $row = $res->fetch_array();
                $id        = $row["id"];
                $nombre    = $row["nombre"];//. " ".$row["apellidos"];
                $correo    = $row["correo"];

                $_SESSION["idCliente"] = $id;
                $_SESSION["nomCliente"] = $nombre;
                $_SESSION["correoCliente"] = $correo;

                echo "1"; // Login exitoso
            }else{      // Caso: contraseña incorrecta
                echo "incorrecto";
            }
        }
    }
    $con->close();
?>
