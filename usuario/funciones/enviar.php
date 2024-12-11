<?php
    $nombre     = $_POST['nombre']; 
    $correo     = $_POST['correo'];
    $comentario = $_POST['comentario'];

    $correo = filter_var(trim($correo), FILTER_SANITIZE_EMAIL);

    if(!empty($nombre) && !empty($correo) && !empty($comentario)){
        $destinatario = "udemyuno10@gmail.com";
        $asunto = "Nuevo mensaje de contacto";

        $cuerpo = "<html lang='es'>
                        <head>
                            <title>Correo</title>
                        </head>
                        <body>
                            <H1>Email de: $nombre</H1>
                            <p>$comentario</p>
                        </body>
                    </html>";

        $headers  = "MIME-version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf8\r\n";

        $headers .= "From: $nombre <$correo>\r\n";
        $headers .= "Return-path: $destinatario\r\n";

        mail($destinatario, $asunto, $cuerpo, $headers);

        echo "Correo enviado exitosamente";
        header("Location: ../index.php");
    }else{
        echo "Error al enviar correo";
        header("Location: ../contacto.php");
    }