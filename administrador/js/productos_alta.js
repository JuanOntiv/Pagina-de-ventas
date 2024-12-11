var codigo_existe = false;

function alta_producto(){
    var name      = document.forma01.nombre.value;
    var code      = document.forma01.codigo.value;
    var descript  = document.forma01.descripcion.value;
    var price     = document.forma01.costo.value;
    var cant      = document.forma01.stock.value;
    var image     = document.forma01.archivo.value;

    var msj_error   = document.getElementById('msj_error');

    if(!name || !code || !descript || !price || !cant || image === "" || codigo_existe == true){
        msj_error.innerHTML     = 'Faltan campos por llenar.';
        msj_error.style.display = 'block';

        setTimeout(function(){
            msj_error.style.display = 'none';
        }, 5000);
    }else{
        document.forma01.method = 'POST';
        document.forma01.action = 'productos_salva.php';
        document.forma01.submit();
    }
}

function validacion_codigo(){
    var code = document.forma01.codigo.value;
    var msj  = document.getElementById('codigo_val');

    $.ajax({
        url:    'validar_codigo.php',
        type:   'post',
        data:   {codigo: code},

        success: function(resp){          
            if(resp == 1){
                msj.innerHTML     = 'El codigo ' + code + ' ya existe.';
                msj.style.display = 'block';
                codigo_existe = true;

                setTimeout(function(){
                    msj.style.display = 'none';
                }, 5000);
            }else{
                msj.style.display = 'none';
                codigo_existe = false;
            }
        },
        error: function(){
            msj.innerHTML     = 'Error en la comunicación con el servidor. Inténtalo más tarde.';
            msj.style.display = 'block';
            setTimeout(() => msj.style.display = 'none', 5000);
        }
    });
}