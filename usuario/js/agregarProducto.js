function agregarProducto(id) {
    var cantidad = document.getElementById('cantidad' + id).value;
    
    if (cantidad > 0) {
        $.ajax({
            url      : 'funciones/agregar_producto.php',
            type     : 'post',
            dataType : 'text',
            data     : {stock: cantidad, id: id},
            success  : function(res) {
                var mensaje = $('#mensaje' + id);

                if (res.trim() === 'Cantidad actualizada correctamente.' || res.trim() === '1') {
                    mensaje.html('<span class="mensaje-exito">Producto agregado con éxito.</span>');
                } else {
                    mensaje.html('<span class="mensaje-error">Ocurrió un error al agregar el producto.</span>');
                }

                mensaje.show();
                setTimeout(() => mensaje.fadeOut(), 3000);
            },error: function() {
                alert('Error archivo no encontrado.');
            }
        });
    } 
}