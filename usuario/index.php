<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/index.css">
        <script src="js/jquery-3.3.1.min.js"></script> 
        <script src="js/agregarProducto.js"></script> 
        <title>Home</title>
    </head>

    <body>
        <?php
            include("menu.php");

            if(!isset($_SESSION['idCliente'])){
                require("funciones/conecta.php");
            }

            $con  = conecta();
            $sql2  = "SELECT * FROM promociones WHERE eliminado = 0 ORDER BY RAND() LIMIT 1";
            $res2 = $con->query($sql2);
            $row2 = $res2->fetch_array();

            $sql  = "SELECT * FROM productos WHERE eliminado = 0 ORDER BY RAND() LIMIT 6";
            $res  = $con->query($sql);
            $num  = $res->num_rows;

            $nombre2  = $row2["nombre"];
            $archivo2 = $row2["archivo"];
        ?>

        <div class="contenedor">
            <div class="banner">
                <?php
                    if($archivo2):
                        echo "<img class='foto_promo' src='../administrador/archivos/promociones/$archivo2' alt='Foto de $nombre2'>";
                    else:
                        echo "<span>No hay foto</span>";
                    endif;
                ?>
            </div>

            <?php
                echo "<div class='tabla'>";

                // Filas de datos (Lista de productos)
                while($row = $res->fetch_array()){
                    $id         = $row["id"];
                    $nombre     = $row["nombre"];
                    $codigo     = $row["codigo"];
                    $costo      = $row["costo"];
                    $inventario = $row["stock"];
                    $archivo    = $row["archivo_n"];
                    

                    echo "<div class='caja' id='caja_$id'>
                        <div class='celda caja_img'>";
                            if($archivo):
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


                        <div id='mensaje<?php echo $id; ?>'></div>
                    </div>";
                }
                echo "</div>";
                ?>
            </div>
        </div>
        
    </body>
</html>
    <footer>
        <?php
            include("footer.php");
        ?>
    </footer>
</html>