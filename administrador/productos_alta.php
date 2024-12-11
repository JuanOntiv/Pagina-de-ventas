<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Registro de Productos</title>

        <link rel="stylesheet" href="css/productos_alta.css">
        
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/productos_alta.js"></script>
       
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
        ?>
        <?php   include("menu.php"); ?>

        <!--Formulario para Alta -->     
        <form name="forma01" class="formulario" method="post" enctype="multipart/form-data">
            <h1>Registro Productos</h1>

            <!--Campos para Nombres -->
            <p>Nombre:</p>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre" /><br>

            <!--Campo para codigo, y validacion de existentes -->
            <p>Codigo:</p>
            <input onblur="validacion_codigo();" type="number" name="codigo" id="codigo" placeholder="Codigo" /><br>
            <div id="codigo_val"></div>

            <p>Descripcion:</p>
            <input type="text" name="descripcion" id="descripcion" placeholder="Descripcion"/><br>
            <p>Costo:</p>
            <input type="number" name="costo" id="costo" placeholder="Costo"/><br>
            <p>Cantidad en inventario:</p>
            <input type="number" name="stock" id="stock" placeholder="Stock"/><br>

            <!--Campo para subir foto -->
            <p class="txt_foto">Foto:</p>
            <div class="foto">
                <input type="file" accept="image/*" id="archivo" name="archivo" class="foto-input"><br><br>
            </div>

            <!--Campo para Crear prductos y error en caso de campos vacios -->
            <input onclick="alta_producto(); return false;" type="submit" value="Enviar">
            <div id="msj_error" class="error"></div>

            <!-- a -->
            <div class="botones">
                <a href="productos_lista.php">Regresar al Listado</a>
            </div>
        </form>
    </body>
</html>