function empty_login(){
    var msj_error = document.getElementById('msj_error');
    var mail = $('#correo').val();
    var passwd = $('#pass').val();

    if(!mail || !passwd ){
        msj_error.innerHTML     = 'Faltan campos por llenar.';
        msj_error.style.display = 'block';

        setTimeout(function(){
            msj_error.style.display = 'none';
        }, 5000);
    }else{
        $.ajax({
            url: 'login2.php',
            type: 'post',
            data: {correo: mail, pass: passwd},
        
            success: function(resp) {        
                if(resp === "1") {
                    window.location.href = 'index.php';
                }
                else if(resp === "no_existe"){
                    msj_error.innerHTML = 'El usuario no existe.';
                } 
                else if(resp === "eliminado") {
                    msj_error.innerHTML = 'El usuario ha sido eliminado.';
                } 
                else if(resp === "incorrecto") {
                    msj_error.innerHTML = 'Contraseña incorrecta.';
                }
                msj_error.style.display = 'block';
                setTimeout(function() {
                    msj_error.style.display = 'none';
                }, 5000);
            },
            error: function() {
                msj_error.innerHTML = 'Error en la comunicación con el servidor. Inténtalo más tarde.';
                msj_error.style.display = 'block';
                setTimeout(function() {
                    msj_error.style.display = 'none';
                }, 5000);
            }
        });
        
        
    }
}
