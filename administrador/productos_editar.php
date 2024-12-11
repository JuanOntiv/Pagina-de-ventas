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
        $sql = "SELECT * FROM productos WHERE id = $id AND eliminado = 0";
        $res = $con->query($sql);

        if ($res->num_rows > 0) {
            $producto = $res->fetch_assoc();
        } else {
            echo "Producto no encontrado.";
            exit;
        }

        $id          = $producto["id"];
        $nombre      = $producto["nombre"];
        $codigo      = $producto["codigo"];
        $descripcion = $producto["descripcion"];
        $costo       = $producto["costo"];
        $stock       = $producto["stock"];
        $foto        = $producto["archivo"];
        $foto_n      = $producto["archivo_n"];
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Editar Productos</title>
        <link rel="stylesheet" href="css/productos_editar.css">
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/productos_editar.js"></script>
    </head>
    
    <body>   
        <?php  
            include("menu.php");       
        ?>
        
        <!--Formulario para Editar -->     
        <form name="forma01" class="formulario" method="post" enctype="multipart/form-data">
            <h1>Editar Producto #<?php echo $id ?></h1>

            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <!--Campos para Nombres -->
            <p>Nombre:</p>
            <input type="text" name="nombre"    id="nombre"    placeholder="Nombre(s)" value="<?php echo $nombre ?>" /><br>
           
            <!--Campo para codigo, y validacion de existentes -->
            <p>Codigo:</p>
            <input onblur="validacion_codigo();" type="number" name="codigo" id="codigo" placeholder="Codigo" value="<?php echo $codigo ?>"/><br>
            <input type="hidden" name="codigo_actual" id="codigo_actual" value="<?php echo $codigo ?>">
            <div id="codigo_val"></div>

            <p>Descripcion:</p>
            <input type="text" name="descripcion" id="descripcion" placeholder="descripcion" value="<?php echo $descripcion ?>" /><br>
            <p>Costo:</p>
            <input type="text" name="costo"       id="costo"       placeholder="Costo"       value="<?php echo $costo ?>" /><br>
            <p>Cantidad en inventario:</p>
            <input type="text" name="stock"       id="stock"       placeholder="Stock"       value="<?php echo $stock ?>" /><br>

            <p class="txt_foto">Foto:</p>
            <div class="foto">
                <input type="file" accept="image/*" id="archivo" name="archivo" class="foto-input">
                <div class="datos">
                    <?php if ($producto['archivo_n']) : ?>
                        <img class="foto_producto" src="archivos/productos/<?php echo $producto['archivo_n']; ?>" alt="Foto de <?php echo $producto['nombre']; ?>">
                    <?php else: ?>
                        <span>No hay foto</span>
                    <?php endif; ?>
                </div>
            </div>

            <!--Campo para Crear Productos y error en caso de campos vacios -->
            <input onclick="editar_producto(); return false;" type="submit" value="Enviar">
            <div id="msj_error" class="error"></div>
        
            <!-- a -->
            <div class="botones">
                <a href="productos_lista.php">Regresar al Listado</a>
            </div>
        </form>
    </body>
</html>