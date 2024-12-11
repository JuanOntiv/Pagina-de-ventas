
function eliminar_Ajax(id){ 
    const msjConfirmacion = confirm("¿Eliminar promocion #" + id + "?");
    console.log(id);

    if (msjConfirmacion){
        $.ajax({
            url:        'promociones_eliminar.php',
            type:       'post',
            dataType:   'text',
            data:       {id: id},

            success: function(resp){
                if(resp == 1){
                    $('#fila_' + id).remove();
                    alert("promocion eliminadA con éxito.");
                }else{
                    alert("Error al eliminar el promocion. Inténtalo de nuevo.");
                }
            },
            error: function() {
                alert("Error en la comunicación con el servidor. Inténtalo más tarde.");
            }
        });
    }
}

