<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Registro Empleados</title>

        <link rel="stylesheet" href="css/empleados_alta.css">
        
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/empleados_alta.js"></script>
       
    </head>
    
    <body>   
        <?php
            session_start();

            if(!isset($_SESSION['idUser'])){
                header("Location: index.php");
                exit();
            }else{
                $id     = $_SESSION["idUser"];
                $nombre = $_SESSION["nomUser"];
                $correo = $_SESSION["correoUser"];
            }
        ?>
        <?php  include("menu.php");  ?>

        <!--Formulario para Alta -->     
        <form name="forma01" class="formulario" method="post" enctype="multipart/form-data" >
            <h1>Registro Empleados</h1>

            <!--Campos para Nombres -->
            <p>Nombre(s):</p>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre(s)" /><br>
            <p>Apellidos:</p>
            <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos"/><br>
            
            <!--Campo para correo, y validacion de existentes -->
            <p>Correo:</p>
            <input onblur="validacion_correo();" type="mail" name="correo" id="correo" placeholder="Correo" /><br>
            <div id="correo_val"></div>

            <p>Contraseña:</p>
            <input type="password" name="pass" id="pass" placeholder="Contraseña" value=""/><br>
            
            <p>Rol:</p>
            <select name="rol" id="rol">
                <option value="0">Selecciona</option>
                <option value="1">Gerente</option>
                <option value="2">Ejecutivo</option>
            </select> <br><br>

            <!--Campo para subir foto -->
            <p class="txt_foto">Foto:</p>
            <div class="foto">
                <input type="file" accept="image/*" id="archivo" name="archivo" class="foto-input"><br><br>
            </div>

            <!--Campo para Crear empleado y error en caso de campos vacios -->
            <input onclick="alta_empleado(); return false;" type="submit" value="Enviar">
            <div id="msj_error" class="error"></div>

            <!-- a -->
            <div class="botones">
                <a href="empleados_lista.php">Regresar al Listado</a>
            </div>
        </form>
    </body>
</html>