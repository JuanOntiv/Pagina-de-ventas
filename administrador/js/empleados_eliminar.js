
function eliminar_Ajax(id){ 
    const msjConfirmacion = confirm("¿Eliminar empleado #" + id + "?");
    console.log(id);

    if (msjConfirmacion){
        $.ajax({
            url:        'empleados_eliminar.php',
            type:       'post',
            dataType:   'text',
            data:       {id: id},

            success: function(resp){
                if(resp == 1){
                    $('#fila_' + id).remove();
                    alert("Empleado eliminado con éxito.");
                }else{
                    alert("Error al eliminar el empleado. Inténtalo de nuevo.");
                }
            },
            error: function() {
                alert("Error en la comunicación con el servidor. Inténtalo más tarde.");
            }
        });
    }
}

