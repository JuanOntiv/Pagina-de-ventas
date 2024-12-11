<?php
    session_start();
    if(isset($_SESSION['idCliente'])){
        $id     = $_SESSION["idCliente"];
        $nombre = $_SESSION["nomCliente"];
        $correo = $_SESSION["correoCliente"];
    

        require "funciones/conecta.php";
        $con = conecta();

        $query_totales = "
            SELECT 
                SUM(pp.cantidad) AS total_productos,
                SUM(pp.cantidad * pp.precio) AS costo_total
            FROM 
                pedidos p
            JOIN 
                pedi_productos pp 
            ON 
                p.id = pp.id_pedido
            WHERE 
                p.status = 0 AND p.id_usuario = $id
        ";

        $res_total = $con->query($query_totales);
        $row_total = $res_total->fetch_assoc();

    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/menu.css">
        <title>Menu</title>
    </head>
    <body>

    <div class="pre_menu">
        <div class="cont_logo">
            <a href='index.php'>
                <img class="img_logo" src="img/image.png" alt="logo">
            </a>
        </div>

        <div class="container_menu">
            <div class="categoria_menu inicio">
                <a href="index.php">Home</a>
            </div>
            <div class="categoria_menu productos">
                <a href="productos.php">Productos</a>
            </div>
            <div class="categoria_menu contacto">
                <a href="contacto.php">Contacto</a>
            </div>

            <?php
                if(!isset($_SESSION['idCliente'])){
                    echo "<div class='categoria_menu login'>
                            <a href='login.php'>Login</a>
                        </div>";
                }
                if(isset($_SESSION['idCliente'])){
                    echo "<div class='categoria_menu carrito'>
                            <a href='carrito.php'>Ver Carrito ("; if (!$row_total['total_productos']){echo '0';} else{ echo $row_total['total_productos'];} echo ")</a>
                        </div>
                        
                        <div class='categoria_menu salir'>
                            <a href='salir.php'>Salir</a>
                        </div>
                        <div class='categoria_menu bienvenido'>
                            <a href='index.php'>Bienvenido $nombre </a>
                        </div>";
                }
            ?> 
        </div>
    </div> 
    </body>
</html>