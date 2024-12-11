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
        $sql = "SELECT nombre, codigo, descripcion, costo, stock, archivo_n FROM productos WHERE id = $id AND eliminado = 0";
        $res = $con->query($sql);

        if ($res->num_rows > 0) {
            $producto = $res->fetch_assoc();
        } else {
            echo "Producto no encontrado.";
            exit;
        }

        $con->close();
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Detalles del Producto</title>
        <link rel="stylesheet" href="css/productos_detalles.css">
        <script src="js/jquery-3.3.1.min.js"></script>
    </head>

    <body>
        <?php  include("menu.php"); ?>
        <div class="contenedor">
            <h1>Producto #<?php echo $id ?></h1>

            <div class="detalles">
                <div class="categoria nombre">
                    Nombre:
                    <div class="datos"><?php echo $producto['nombre']; ?></div>
                </div>

                <div class="categoria codigo">
                    Codigo:
                    <div class="datos"><?php echo $producto['codigo']; ?></div>
                </div>

                <div class="categoria descripcion">
                    Descripcion:
                    <div class="datos"><?php echo $producto['descripcion']; ?></div>
                </div>

                <div class="categoria costo">
                    Costo:
                    <div class="datos">$<?php echo $producto['costo']; ?></div>
                </div>

                <div class="categoria stock">
                    Stock:
                    <div class="datos"><?php echo $producto['stock']; ?></div>
                </div>

                <div class="categoria foto">
                    Foto:
                    <div class="datos">
                        <?php if ($producto['archivo_n']) : ?>
                            <img class="foto_producto" src="archivos/productos/<?php echo $producto['archivo_n']; ?>" alt="Foto de <?php echo $producto['nombre']; ?>">
                        <?php else: ?>
                            <span>No hay foto</span>
                        <?php endif; ?>
                    </div>
                    <div class="datos"><?php ?></div>
                </div>
            </div>

            <div class="boton_regresar">
                <a href="productos_lista.php">Regresar al Listado</a>
            </div>
        </div>
    </body>
</html>