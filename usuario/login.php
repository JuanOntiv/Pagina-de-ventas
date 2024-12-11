<?php
    if(isset($_SESSION['idCliente'])){
        header("Location: index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Log In</title>
        <link rel="stylesheet" href="css/login.css">
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/login.js"></script>  
    </head>
    
    <body>   
        <?php include("menu.php"); ?>

        <form name="forma01" class="formulario" method="post" enctype="multipart/form-data">
            <h1>Iniciar Sesion</h1>
            
            <!--Campo para correo, y validacion de existentes -->
            <p>Correo:</p>
            <input onblur="validacion_correo();" type="email" name="correo" id="correo" placeholder="Correo" /><br>
            <div id="correo_val"></div>

            <p>Contraseña:</p>
            <input type="password" name="pass" id="pass" placeholder="Contraseña" value=""/><br>
            
            <!--Campo para verificar empleado y error en caso de campos vacios *    ooo incorrectos* -->
            <input onclick="empty_login(); return false;" type="submit" value="Enviar">
            <div id="msj_error" class="error"></div>

        </form>
    </body>
</html>