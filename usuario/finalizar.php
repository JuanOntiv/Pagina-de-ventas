<?php
    session_start();
    include("funciones/conecta.php");

    if (!isset($_SESSION['idCliente'])) {
        header("Location: login.php");
        exit;
    }

    $con = conecta();

    // Obtén el ID del usuario
    $id_usuario = $_SESSION['idCliente'];

    // Actualiza el estado del pedido
    $sql_update = "UPDATE pedidos SET status = 1 WHERE id_usuario = $id_usuario AND status = 0";

    if ($con->query($sql_update)) {
        echo "<script>
            alert('El pedido ha sido finalizado con éxito.');
            window.location.href = 'carrito.php';
        </script>";
    } else {
        echo "<script>
            alert('Hubo un error al finalizar el pedido. Inténtalo nuevamente.');
            window.location.href = 'carrito.php';
        </script>";
    }
?>