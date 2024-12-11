<?php
    session_start();

    if(!isset($_SESSION['idUser'])){
        header("Location: index.php");
        exit();
    }else{
        $id = $_SESSION["idUser"];
        $nombre = $_SESSION["nomUser"];
        $correo = $_SESSION["correoUser"];
    
        require "funciones/conecta.php";
        $con = conecta();

        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $sql = "SELECT * FROM promociones WHERE id = $id AND eliminado = 0";
        $res = $con->query($sql);

        if ($res->num_rows > 0) {
            $promocion = $res->fetch_assoc();
        } else {
            echo "Promocion no encontrada.";
            exit;
        }

        $id        = $promocion["id"];
        $nombre    = $promocion["nombre"];
        $foto      = $promocion["archivo"];
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Editar Promociones</title>
        <link rel="stylesheet" href="css/promociones_editar.css">
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/promociones_editar.js"></script>
    </head>
    
    <body>   
        <?php  include("menu.php");  ?>
        <!--Formulario para Editar -->     
        <form name="forma01" class="formulario" method="post" enctype="multipart/form-data">
            <h1>Editar Promocion #<?php echo $id ?></h1>

            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <!--Campos para Nombres -->
            <p>Nombre:</p>
            <input type="text" name="nombre"    id="nombre"    placeholder="Nombre(s)" value="<?php echo $nombre ?>" /><br>

            <p class="txt_foto">Foto:</p>
            <div class="foto">
                <input type="file" accept="image/*" id="archivo" name="archivo" class="foto-input">
                <div class="datos">
                    <?php if ($promocion['archivo']) : ?>
                        <img class="foto_promocion" src="archivos/promociones/<?php echo $promocion['archivo']; ?>" alt="Foto de <?php echo $promocion['nombre']; ?>">
                    <?php else: ?>
                        <span>No hay foto</span>
                    <?php endif; ?>
                </div>
            </div>

            <!--Campo para Crear promocion y error en caso de campos vacios -->
            <input onclick="editar_promocion(); return false;" type="submit" value="Enviar">
            <div id="msj_error" class="error"></div>
        
            <!-- a -->
            <div class="botones">
                <a href="promociones_lista.php">Regresar al Listado</a>
            </div>
        </form>
    </body>
</html>