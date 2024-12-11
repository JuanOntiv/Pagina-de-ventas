<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Lista de productos</title>
        
        <link rel="stylesheet" href="css/productos_lista.css">

        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/productos_eliminar.js"></script>
    </head>
</html>

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
    require "funciones/conecta.php";

    $con = conecta();
    $sql = "SELECT * FROM productos WHERE eliminado = 0";
    $res = $con->query($sql);
    $num = $res->num_rows;
    
    
    // Contenedor principal de la tabla
    echo "<div class='tabla'>";

    //Falta actualizar el numero automaticamente
    //Título
    echo "<div class='titulo'>
            <h1>Listado de productos ($num)</h1>
        </div>";
        
    echo "<div class='botones'>
            <a href='productos_alta.php'>Agregar nuevo producto</a>
        </div>";

    //Encabezado de la tabla (Categorias)
    echo "<div class='fila fila_categoria'>
            <div class='celda celda_fila caja_id'>ID</div>
            <div class='celda celda_fila caja_nombre'>Nombre</div>
            <div class='celda celda_fila caja_codigo'>Codigo</div>
            <div class='celda celda_fila caja_descripcion'>Descripcion</div>
            <div class='celda celda_fila caja_costo'>Costo</div>
            <div class='celda celda_fila caja_stock'>Stock</div>
            
            <div class='celda celda_fila caja_boton'>Detalles</div>
            <div class='celda celda_fila caja_boton'>Editar</div>
            <div class='celda celda_fila caja_boton' id='boton_eliminar'>Eliminar</div>
        </div>";

    //Filas de datos (Lista de productos)
    while ($row = $res->fetch_array()) {
        $id          = $row["id"];
        $nombre      = $row["nombre"];
        $codigo      = $row["codigo"];
        $descripcion = $row["descripcion"];
        $costo       = $row["costo"];
        $stock       = $row["stock"];

        echo "<div class='fila' id='fila_$id'>
                <div class='celda caja_id'>$id</div>
                <div class='celda caja_nombre'>$nombre</div>
                <div class='celda caja_codigo'>$codigo</div>
                <div class='celda caja_descripcion'>$descripcion</div>
                <div class='celda caja_costo'>$$costo</div>
                <div class='celda caja_stock'>$stock</div>
                
                <div class='celda caja_boton'>
                    <a href='productos_detalles.php?id=$id'>Ver</a>
                </div>
                
                <div class='celda caja_boton'>
                    <a href='productos_editar.php?id=$id'>Editar</a>
                </div>

                <div class='celda caja_boton' id='boton_eliminar'>
                    <a href='javascript:void(0);' onClick='eliminar_Ajax($id);'>Eliminar</a>
                </div>
        </div>";
    }
    echo "</div>";
?>