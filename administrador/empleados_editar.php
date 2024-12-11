<?php
    session_start();

    if(!isset($_SESSION['idUser'])){
        header("Location: index.php");
        exit();
    }else{
        $id_s     = $_SESSION["idUser"];
        $nombre_s = $_SESSION["nomUser"];
        $correo_s = $_SESSION["correoUser"];
    
        require "funciones/conecta.php";
        $con = conecta();

        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $sql = "SELECT * FROM empleados WHERE id = $id AND eliminado = 0";
        $res = $con->query($sql);

        if ($res->num_rows > 0) {
            $empleado = $res->fetch_assoc();
        } else {
            echo "Empleado no encontrado.";
            exit;
        }

        $id        = $empleado["id"];
        $nombre    = $empleado["nombre"];
        $apellidos = $empleado["apellidos"];
        $correo    = $empleado["correo"];
        $rol       = $empleado["rol"];
        $rol_text  = ($rol == '1') ? 'Gerente' : 'Ejecutivo';
        $foto      = $empleado["archivo"];
        $foto_n    = $empleado["archivo_n"];
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Editar Empleados</title>
        <link rel="stylesheet" href="css/empleados_editar.css">
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/empleados_editar.js"></script>
    </head>
    
    <body>   
        <?php  include("menu.php");  ?>
        <!--Formulario para Editar -->     
        <form name="forma01" class="formulario" method="post" enctype="multipart/form-data">
            <h1>Editar Empleado #<?php echo $id ?></h1>

            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <!--Campos para Nombres -->
            <p>Nombre(s):</p>
            <input type="text" name="nombre"    id="nombre"    placeholder="Nombre(s)" value="<?php echo $nombre ?>" /><br>
            <p>Apellidos:</p>
            <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" value="<?php echo $apellidos ?>"/><br>
            
            <!--Campo para correo, y validacion de existentes -->
            <p>Correo:</p>
            <input onblur="validacion_correo();" type="mail" name="correo" id="correo" placeholder="Correo" value="<?php echo $correo ?>" /><br>
            <input type="hidden" name="correo_actual" id="correo_actual" value="<?php echo $correo ?>">
            <div id="correo_val"></div>

            <p>Contraseña:</p>
            <input type="password" name="pass" id="pass" placeholder="Contraseña" value=""/><br>
            
            <p>Rol:</p>
            <select name="rol" id="rol" value="<?php echo $rol ?>">
                <option value="0">Selecciona</option>
                <option value="1" <?php echo ($rol == '1') ? 'selected' : ''; ?> >Gerente</option>
                <option value="2" <?php echo ($rol == '2') ? 'selected' : ''; ?> >Ejecutivo</option>
            </select> <br>

            <p class="txt_foto">Foto:</p>
            <div class="foto">
                <input type="file" accept="image/*" id="archivo" name="archivo" class="foto-input">
                <div class="datos">
                    <?php if ($foto_n) : ?>
                        <img class="foto_empleado" src="archivos/empleados/<?php echo $foto_n; ?>" alt="Foto de <?php echo $nombre; ?>">
                    <?php else: ?>
                        <span>No hay foto</span>
                    <?php endif; ?>
                </div>
            </div>

            <!--Campo para Crear empleado y error en caso de campos vacios -->
            <input onclick="editar_empleado(); return false;" type="submit" value="Enviar">
            <div id="msj_error" class="error"></div>
        
            <!-- a -->
            <div class="botones">
                <a href="empleados_lista.php">Regresar al Listado</a>
            </div>
        </form>
    </body>
</html>