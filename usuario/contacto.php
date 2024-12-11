<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/contacto.css">
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/contacto.js"></script>  
        <title>Contacto</title>
        
    </head>

    <body>
        <?php
            include("menu.php");
        ?>

        <div class="contenedor">
            <div>            
                <h1>Contactanos</h1>
                <form class="formulario" name="formulario" method="post" action="funciones/enviar.php">
                    <div class="caja_c caja_nombre">
                        <p> Nombre(s):</p>
                        <input type="text" name="nombre" id="nombre" value="<?php if(isset($_SESSION['idCliente'])){echo $nombre;} ?>" placeholder="Nombre(s)" required>
                    </div>

                    <div class="caja_c caja_correo">
                        <p>Correo:</p>
                        <input type="mail" name="correo" id="correo" value="<?php if(isset($_SESSION['idCliente'])){ echo $correo;} ?>" placeholder="Correo" required>
                    </div>

                    <div class="caja_c caja_comentario">
                        <p>Comentarios:</p>
                        <textarea name="comentario" id="comentario" value="" placeholder="Comentarios" autocapitalize="on" required></textarea>
                    </div>

                    <div>
                        <button type="submit" id="enviar" name="enviar">Enviar</button>
                    </div>

                    <div class="mensaje" id="mensaje"></div>
                </form> 
            </div>
        </div>
        
    </body>

    <footer>
        <?php
            include("footer.php");
        ?>
    </footer>
</html>