$(document).ready(function(){

    $('#btnSend').click(function(){

        var errores = '';

        // Validado Nombre ==============================
        if( $('#latitud').val() == '' ){
            errores += '<p>Ingrese un latitud</p>';
            $('#latitud').css("border-bottom-color", "#F14B4B")
        } else{
            $('#latitud').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#longitud').val() == '' ){
            errores += '<p>Ingrese una longitud</p>';
            $('#longitud').css("border-bottom-color", "#F14B4B")
        } else{
            $('#longitud').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#telefono').val() == '' ){
            errores += '<p>Ingrese un teléfono</p>';
            $('#telefono').css("border-bottom-color", "#F14B4B")
        } else{
            $('#telefono').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#mensaje').val() == '' ){
            errores += '<p>Ingrese una descripción para su solicitud</p>';
            $('#mensaje').css("border-bottom-color", "#F14B4B")
        } else{
            $('#mensaje').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#producto').val() == '' ){
            errores += '<p>Seleccione un producto</p>';
            $('#producto').css("border-bottom-color", "#F14B4B")
        } else{
            $('#producto').css("border-bottom-color", "#d1d1d1")
        }


        if( $('#correo').val() == '' ){
            errores += '<p>Ingrese un correo valido por favor</p>';
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
