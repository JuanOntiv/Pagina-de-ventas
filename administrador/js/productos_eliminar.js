
function eliminar_Ajax(id){ 
    const msjConfirmacion = confirm("¿Eliminar producto #" + id + "?");
    console.log(id);

    if (msjConfirmacion){
        $.ajax({
            url:        'productos_eliminar.php',
            type:       'post',
            dataType:   'text',
            data:       {id: id},

            success: function(resp){
                if(resp == 1){
                    $('#fila_' + id).remove();
                    alert("Producto eliminado con éxito.");
                }else{
                    alert("Error al eliminar el producto. Inténtalo de nuevo.");
                }
            },
            error: function() {
                alert("Error en la comunicación con el servidor. Inténtalo más tarde.");
            }
        });
    }
}

