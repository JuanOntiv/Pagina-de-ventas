<?php
    include("menu.php");

    if(!isset($_SESSION['idCliente'])){
        require("funciones/conecta.php");
    }

    $con = conecta();
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $sql = "SELECT id, nombre, codigo, descripcion, costo, stock, archivo_n FROM productos WHERE id = $id AND eliminado = 0";
    $res = $con->query($sql);


    
    $sql2  = "SELECT * FROM productos WHERE eliminado = 0 ORDER BY RAND() LIMIT 3";
    $res2  = $con->query($sql2);
    $num2  = $res2->num_rows;

    if ($res->num_rows > 0) {
        $producto = $res->fetch_assoc();
    } else {
        echo "Producto no encontrado.";
        exit;
    }
    $con->close();
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Detalles del Producto</title>
        <link rel="stylesheet" href="css/productos_detalles.css">
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/agregarProducto.js"></script>
    </head>

    <body>
        <div class="contenedor">
            <div class="detalles">
                <div class="categoria foto">
                    <?php if ($producto['archivo_n']) : ?>
                        <img class="foto_producto" src="../administrador/archivos/productos/<?php echo $producto['archivo_n']; ?>" alt="Foto de <?php echo $producto['nombre']; ?>">
                    <?php else: ?>
                        <span>No hay foto</span>
                    <?php endif; ?>
                </div>         
                <div class="datos_producto">
                    <div class="categoria nombre">
                        <div class="datos"><?php echo $producto['nombre']; ?></div>
                    </div>

                    <div class="categoria codigo">
                        <div class="datos">Codigo: <?php echo $producto['codigo']; ?></div>
                    </div>

                    <div class="categoria descripcion">
                        <div class="datos"><?php echo $producto['descripcion']; ?></div>
                    </div>

                    <div class="categoria costo">
                        <div class="datos">$<?php echo $producto['costo']; ?>.00</div>
                    </div>

                    <div class="categoria stock">
                        <div class="datos">Disponibles: <?php echo $producto['stock']; ?></div>
                    </div>

                    <div class='categoria caja_boton'>
                            <?php if (!isset($_SESSION['idCliente'])): ?>
                                <input type='submit' value='Agregar' onclick="window.location.href='login.php';">
                                <input type='number' class='agregar_n' name='cantidad$id' id='cantidad$id' min='1' max='<?php echo $producto["stock"]; ?>' value='1'>
                            <?php else: ?>
                                <input type='submit' value='Agregar' onclick='agregarProducto(<?php echo $producto["id"]; ?>); return false;' >
                                <input type='number' class='agregar_n' name='cantidad<?php echo $producto["id"]; ?>' id='cantidad<?php echo $producto["id"]; ?>' min='1' max='<?php echo $producto["stock"]; ?>' value='1'>
                            <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="similares">
                <div class="relacionados">
                    Productos relacionados:
                </div>

                <?php
                echo "<div class='tabla'>";

                // Filas de datos (Lista de productos)
                while($row2 = $res2->fetch_array()){
                    $idp         = $row2["id"];
                    $nombrep     = $row2["nombre"];
                    $codigop     = $row2["codigo"];
                    $costop      = $row2["costo"];
                    $inventariop = $row2["stock"];
                    $archivop    = $row2["archivo_n"];

                    echo "<div class='caja' id='caja_$idp'>
                        <div class='celda caja_img'>";
                            if($archivop):
                                echo "<a href='producto_detalle.php?id=$idp'>
                                    <img class='foto_producto_rel' src='../administrador/archivos/productos/$archivop' alt='Foto de <?php echo $nombrep; ?>'>
                                </a>";
                            else:
                                echo "<span>No hay foto</span>";
                            endif;
                        echo "</div>
                        
                        <div class='celda caja_nombre'>
                            <a href='producto_detalle.php?id=$idp'>$nombrep</a>
                        </div>
                        <div class='celda caja_codigo'>Codigo: $codigop</div>
                        <div class='celda caja_costo'>$$costop.00</div>

                        <div class='celda boton_agregar'>";
                            if (!isset($_SESSION['idCliente'])): 
                                echo "<input type='submit' value='Agregar' onclick=\"window.location.href='login.php';\">
                                <input type='number' class='agregar_n' name='cantidad$idp' id='cantidad$idp' min='1' max='$inventariop' value='1'>";
                            else:
                                echo "
                                <input onclick='agregarProducto($idp); return false;' type='submit' value='Agregar'>
                                <input type='number' class='agregar_n' name='cantidad$idp' id='cantidad$idp' min='1' max='$inventariop' value='1'>";
                            endif;

                        echo"
                        </div>

                    </div>";
                }
                echo "</div>";
                ?>
            </div>

            <div class="boton_regresar">
                <a href="productos.php">Regresar</a>
            </div>
        </div>
    </body>
    <footer>
        <?php
            include("footer.php");
        ?>
    </footer>
</html>