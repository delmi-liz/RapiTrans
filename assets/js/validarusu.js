$(document).ready(function(){

    $('#btnSend').click(function(){

        var errores = '';

        // Validado Nombre ==============================
        if( $('#dpi').val() == '' ){
            errores += '<p>Ingrese un número de DPI</p>';
            $('#dpi').css("border-bottom-color", "#F14B4B")
        } else{
            $('#dpi').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#nombre').val() == '' ){
            errores += '<p>Ingrese un nombre para la creación del usuario</p>';
            $('#nombre').css("border-bottom-color", "#F14B4B")
        } else{
            $('#nombre').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#usuario').val() == '' ){
            errores += '<p>Ingrese un nombre de usuario</p>';
            $('#usuario').css("border-bottom-color", "#F14B4B")
        } else{
            $('#usuario').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#password').val() == '' ){
            errores += '<p>Ingrese una contraseña valida</p>';
            $('#password').css("border-bottom-color", "#F14B4B")
        } else{
            $('#password').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#correo').val() == '' ){
            errores += '<p>Ingrese un correo valido</p>';
            $('#correo').css("border-bottom-color", "#F14B4B")
        } else{
            $('#correo').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#cofirmarusername').val() == '' ){
            errores += '<p>Confirma el nombre de usuario</p>';
            $('#cofirmarusername').css("border-bottom-color", "#F14B4B")
        } else{
            $('#cofirmarusername').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#confirmarpassword').val() == '' ){
            errores += '<p>Confirma la contraseña</p>';
            $('#confirmarpassword').css("border-bottom-color", "#F14B4B")
        } else{
            $('#confirmarpassword').css("border-bottom-color", "#d1d1d1")
        }


        // ENVIANDO MENSAJE ============================
        if( errores == '' == false){
            var mensajeModal = '<div class="modal_wrap">'+
                                    '<div class="mensaje_modal">'+
                                        '<h3>Errores Encontrados</h3>'+
                                        errores+
                                        '<span id="btnClose">Cerrar</span>'+
                                    '</div>'+
                                '</div>'

            $('body').append(mensajeModal);
        }

        // CERRANDO MODAL ==============================
        $('#btnClose').click(function(){
            $('.modal_wrap').remove();
        });
    });

});
