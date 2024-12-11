<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Lista de pedidos</title>
        <link rel="stylesheet" href="css/pedidos_lista.css">
        <script src="js/jquery-3.3.1.min.js"></script>
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
    $sql = "SELECT * FROM pedidos WHERE status = 1";
    $res = $con->query($sql);
    $num = $res->num_rows;
    
    
    // Contenedor principal de la tabla
    echo "<div class='tabla'>";

    //Título
    echo "<div class='titulo'>
            <h1>Listado de pedidos cerrados ($num)</h1>
        </div><br>";  

    //Encabezado de la tabla (Categorias)
    echo "<div class='fila fila_categoria'>
            <div class='celda celda_fila caja_id'>ID</div>
            <div class='celda celda_fila caja_boton'>Detalles</div>
        </div>";

    //Filas de datos (Lista de promociones)
    while ($row = $res->fetch_array()) {
        $id        = $row["id"];

        echo "<div class='fila' id='fila_$id'>
                <div class='celda caja_id'>$id</div>
                
                <div class='celda caja_boton'>
                    <a href='pedidos_detalles.php?id=$id'>Ver</a>
                </div>
        </div>";
    }
    echo "</div>";
?>