var correo_existe = false;


function editar_promocion(){
    var name        = document.forma01.nombre.value;
    var msj_error   = document.getElementById('msj_error');

    if(!name){
        msj_error.innerHTML     = 'Faltan campos por llenar.';
        msj_error.style.display = 'block';

        setTimeout(function(){
            msj_error.style.display = 'none';
        }, 5000);
    }else{
        document.forma01.method = 'POST';
        document.forma01.action = 'promociones_salva_EDITAR.php';
        document.forma01.submit();
    }
}


function validacion_correo(){
    var correo_actual = document.forma01.correo_actual.value;
    var mail = document.forma01.correo.value;    
    var msj  = document.getElementById('correo_val');

    if(correo_actual != mail){
        $.ajax({
            url:    'validar_correo.php',
            type:   'post',
            data:   {correo: mail},

            success: function(resp){          
                if(resp == 1){
                    msj.innerHTML     = 'El correo ' + mail + ' ya existe.';
                    msj.style.display = 'block';
                    correo_existe = true;

                    setTimeout(function(){
                        msj.style.display = 'none';
                    }, 5000);
                }else{
                    msj.style.display = 'none';
                    correo_existe = false;
                }
            },

            error: function(){
                msj.innerHTML     = 'Error en la comunicación con el servidor. Inténtalo más tarde.';
                msj.style.display = 'block';
                setTimeout(() => msj.style.display = 'none', 5000);
            }
        });
    }else{
        correo_existe = false;
    }
}