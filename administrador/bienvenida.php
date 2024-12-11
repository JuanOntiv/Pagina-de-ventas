<?php 
    session_start();
    if(!isset($_SESSION['idUser'])){
        header("Location: index.php");
        exit();
    }else{
        $id     = $_SESSION["idUser"];
        $nombre = $_SESSION["nomUser"];
        $correo = $_SESSION["correoUser"];
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Bienvenida</title>
        <link rel="stylesheet" href="css/bienvenida.css">
    </head>

    <body>
        <?php include("menu.php"); ?>
        <h1>Bienvenido(a) <?php echo $nombre; ?> al Sistema</h1>
    </body>
</html>