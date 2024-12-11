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
        $sql = "SELECT nombre, apellidos, correo, rol, archivo_n FROM empleados WHERE id = $id AND eliminado = 0";
        $res = $con->query($sql);

        if ($res->num_rows > 0) {
            $empleado = $res->fetch_assoc();
        } else {
            echo "Empleado no encontrado.";
            exit;
        }

        $con->close();
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Detalles del Empleado</title>
        <link rel="stylesheet" href="css/empleados_detalles.css">
        <script src="js/jquery-3.3.1.min.js"></script>
    </head>

    <body>
        <?php  include("menu.php");  ?>
        <div class="contenedor">
            <h1>Empleado #<?php echo $id ?></h1>

            <div class="detalles">
                <div class="categoria nombre">
                    Nombre:
                    <div class="datos"><?php echo $empleado['nombre'] . ' ' . $empleado['apellidos']; ?></div>
                </div>

                <div class="categoria apellidos">
                    Correo:
                    <div class="datos"><?php echo $empleado['correo']; ?></div>
                </div>

                <div class="categoria correo">
                    Rol:
                    <div class="datos"><?php echo ($empleado['rol'] == '1') ? 'Gerente' : 'Ejecutivo'; ?></div>
                </div>

                <div class="categoria foto">
                    Foto:
                    <div class="datos">
                        <?php if ($empleado['archivo_n']) : ?>
                            <img class="foto_empleado" src="archivos/empleados/<?php echo $empleado['archivo_n']; ?>" alt="Foto de <?php echo $empleado['nombre']; ?>">
                        <?php else: ?>
                            <span>No hay foto</span>
                        <?php endif; ?>
                    </div>
                    <div class="datos"><?php ?></div>
                </div>
            </div>

            <div class="boton_regresar">
                <a href="empleados_lista.php">Regresar al Listado</a>
            </div>
        </div>
    </body>
</html>