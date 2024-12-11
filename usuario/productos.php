<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Productos</title>
        <link rel="stylesheet" href="css/productos.css">
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/agregarProducto.js"></script> 
    </head>

    <body>
        <?php
            include("menu.php");

            if(!isset($_SESSION['idCliente'])){
                require("funciones/conecta.php");
            }

            $con = conecta();
            $sql = "SELECT * FROM productos WHERE eliminado = 0";
            $res = $con->query($sql);
            $num = $res->num_rows;

            // Contenedor principal de la tabla
            echo "<div class='tabla'>";

            // Filas de datos (Lista de productos)
            while ($row = $res->fetch_array()) {
                $id         = $row["id"];
                $nombre     = $row["nombre"];
                $codigo     = $row["codigo"];
                $costo      = $row["costo"];
                $inventario = $row["stock"];
                $archivo    = $row["archivo_n"];
                

                echo "<div class='caja' id='caja_$id'>
                    <div class='celda caja_img'>";
                        if($archivo) :
                            echo "<a href='producto_detalle.php?id=$id'>
                                <img class='foto_producto' src='../administrador/archivos/productos/$archivo' alt='Foto de <?php echo $nombre; ?>'>
                            </a>";                            
                        else:
                            echo "<span>No hay foto</span>";
                        endif;
                    echo "</div>
                    
                    <div class='celda caja_nombre'>
                        <a href='producto_detalle.php?id=$id'>$nombre</a>
                    </div>
                    <div class='celda caja_codigo'>Codigo: $codigo</div>
                    <div class='celda caja_costo'>$$costo.00</div>

                    <div class='celda boton_agregar'>";
                        if (!isset($_SESSION['idCliente'])): 
                            echo "<input type='submit' value='Agregar' onclick=\"window.location.href='login.php';\">
                                <input type='number' class='agregar_n' name='cantidad$id' id='cantidad$id' min='1' max='$inventario' value='1'>";
                        else:
                            echo "
                                <input onclick='agregarProducto($id); return false;' type='submit' value='Agregar'>
                                <input type='number' class='agregar_n' name='cantidad$id' id='cantidad$id' min='1' max='$inventario' value='1'>";
                        endif;

                    echo"
                    </div>
                    

                </div>";
            }
            echo "</div>";
        ?>
    </body>
    <footer>
        <?php
            include("footer.php");
        ?>
    </footer>
</html>