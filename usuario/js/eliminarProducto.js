function eliminarProducto(idProductoPedido){
    if (confirm('¿Deseas eliminar el producto?')){
        $.ajax({
            url     : 'funciones/eliminar_producto.php',
            type    : 'POST',
            data    : {id_producto_pedido: idProductoPedido},
            success : function(res){
                console.log(res);
                if(res === '1'){
                    location.reload(); 
                }else{
                    console.error('Error al eliminar el producto: ', res);
                }
            },
            error: function(){
                console.error('Error en la solicitud.');
            }
        });
    }
}