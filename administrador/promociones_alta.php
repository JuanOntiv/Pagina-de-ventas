<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Registro Promociones</title>
        <link rel="stylesheet" href="css/promociones_alta.css">
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/promociones_alta.js"></script>
    </head>
    
    <body>   
        <?php
            session_start();
            if(!isset($_SESSION['idUser'])){
                header("Location: index.php");
                exit();
            }else{
                $id = $_SESSION["idUser"];
                $nombre = $_SESSION["nomUser"];
                $correo = $_SESSION["correoUser"];
            }
            
            include("menu.php");  
        ?>

        <!--Formulario para Alta -->     
        <form name="forma01" class="formulario" method="post" enctype="multipart/form-data" >
            <h1>Registro Promociones</h1>

            <!--Campos para Nombres -->
            <p>Nombre:</p>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre(s)" /><br>

            <!--Campo para subir foto -->
            <p class="txt_foto">Foto:</p>
            <div class="foto">
                <input type="file" accept="image/*" id="archivo" name="archivo" class="foto-input"><br><br>
            </div>

            <!--Campo para Crear promocion y error en caso de campos vacios -->
            <input onclick="alta_promocion(); return false;" type="submit" value="Enviar">
            <div id="msj_error" class="error"></div>

            <!-- a -->
            <div class="botones">
                <a href="promociones_lista.php">Regresar al Listado</a>
            </div>
        </form>
    </body>
</html>