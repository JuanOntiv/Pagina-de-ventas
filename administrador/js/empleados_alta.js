var correo_existe = false;

function alta_empleado(){
    var name        = document.forma01.nombre.value;
    var last_name   = document.forma01.apellidos.value;
    var mail        = document.forma01.correo.value;
    var passwd      = document.forma01.pass.value;
    var pos         = document.forma01.rol.value;
    var image       = document.forma01.archivo.value;

    var msj_error   = document.getElementById('msj_error');

    if(!name || !last_name || !mail || !passwd || pos == '0' || image === "" || correo_existe == true){
        msj_error.innerHTML     = 'Faltan campos por llenar.';
        msj_error.style.display = 'block';

        setTimeout(function(){
            msj_error.style.display = 'none';
        }, 5000);
    }else{
        document.forma01.method = 'POST';
        document.forma01.action = 'empleados_salva.php';
        document.forma01.submit();
    }
}

function validacion_correo(){
    var mail = document.forma01.correo.value;
    var msj  = document.getElementById('correo_val');

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
}