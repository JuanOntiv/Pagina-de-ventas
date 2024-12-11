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
        $sql = "SELECT nombre, archivo FROM promociones WHERE id = $id AND eliminado = 0";
        $res = $con->query($sql);

        if ($res->num_rows > 0) {
            $promocion = $res->fetch_assoc();
        } else {
            echo "Promocion no encontrada.";
            exit;
        }

        $con->close();
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Detalles de la Promocion</title>
        <link rel="stylesheet" href="css/promociones_detalles.css">
        <script src="js/jquery-3.3.1.min.js"></script>
    </head>

    <body>
        <?php  include("menu.php");  ?>
        <div class="contenedor">
            <h1>Promocion #<?php echo $id ?></h1>

            <div class="detalles">
                <div class="categoria nombre">
                    Nombre:
                    <div class="datos"><?php echo $promocion['nombre']; ?></div>
                </div>

                <div class="categoria foto">
                    Foto:
                    <div class="datos">
                        <?php if ($promocion['archivo']) : ?>
                            <img class="foto_promocion" src="archivos/promociones/<?php echo $promocion['archivo']; ?>" alt="Foto de <?php echo $promocion['nombre']; ?>">
                        <?php else: ?>
                            <span>No hay foto</span>
                        <?php endif; ?>
                    </div>
                    <div class="datos"><?php ?></div>
                </div>
            </div>

            <div class="boton_regresar">
                <a href="promociones_lista.php">Regresar al Listado</a>
            </div>
        </div>
    </body>
</html>