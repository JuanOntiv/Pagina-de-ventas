<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/carrito.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/finaliza.js"></script>
    <title>Carrito</title>
</head>

<body>
    <?php
        include ("menu.php");
        if (!isset($_SESSION['idCliente'])) {
            header("Location: login.php");
            exit;
        }
        $con = conecta();

        $sql_carrito = "
            SELECT 
                productos.nombre AS nombre_producto,
                pp.cantidad,
                pp.precio AS costo_unitario,
                (pp.cantidad * pp.precio) AS costo_total,
                pp.id AS id_producto_pedido,
                productos.id AS id_producto
            FROM 
                pedidos p
            JOIN 
                pedi_productos pp 
            ON 
                p.id = pp.id_pedido
            JOIN 
                productos 
            ON 
                pp.id_producto = productos.id
            WHERE 
                p.status = 0 AND p.id_usuario = $id;
        ";
        $res_carrito = $con->query($sql_carrito);
        $total = 0;
    ?>

    <div class="contenedor_carrito">
        <div class="carrito">
            <?php 
            if ($res_carrito->num_rows > 0) {
            ?>

            <div class="categorias_carrito">
                <div class="categoria categorias_producto">
                    <p>Producto</p>
                </div>

                <div class="categoria categorias_cantidad">
                    <p>Cantidad</p>
                </div>

                <div class="categoria categorias_costo1">
                    <p>Costo Unitario</p>
                </div>

                <div class="categoria categorias_subtotal">
                    <p>Subtotal</p>
                </div>

                <div class="categoria categorias_eliminar">
                </div>
            </div>

            <div class="productos_carrito">
                <?php while ($row = $res_carrito->fetch_assoc()): ?>
                    <div class="producto_fila">
                        <div class='productos productos_producto'>
                            <p><?php echo $row['nombre_producto']; ?></p>
                        </div>

                        <div class='productos productos_cantidad'>
                            <p><?php echo $row['cantidad']; ?></p>                          
                        </div>

                        <div class='productos productos_costo1'>
                            <p>$<?php echo $row['costo_unitario']; ?>.00</p>
                        </div>

                        <div class='productos productos_subtotal'>
                            <p>$<?php echo $row['costo_total'] ?>.00</p>
                        </div>

                        <div class='productos productos_eliminar'>
                        </div>

                    </div>
                    <?php $total += $row['costo_total'];?>
                <?php endwhile; ?>
            </div>

            <div class="total">
                <div class="total_titulo">
                    <p>Total</p>
                </div>
                <div class="total_cantidad">
                    <p>$<?php echo number_format($total, 2); ?></p>
                </div>
            </div>
        
            <?php }else{
                echo "<div class='vacio'>
                        <p>No hay productos en el carrito.</p>
                    </div>";
                }
            ?>
             
        </div>

        <div class="continuar">
            <?php if ($res_carrito->num_rows > 0) { ?>
                <input type="button" value="Finalizar" onclick="confirmarFinalizar()">
            <?php } ?>
        </div>

        <div class="regresar">
            <a href="carrito.php">
                <input type="button" value="Regresar">
            </a>
        </div>
    </div>
    
</body>
<footer>
        <?php
            include("footer.php");
        ?>
    </footer>
</html>