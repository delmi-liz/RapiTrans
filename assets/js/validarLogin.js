$(document).ready(function(){

    $('#Entrar').click(function(){

        var errores = '';

        // Validado Nombre ==============================
        if( $('#Usuario').val() == '' ){
            errores += '<p>El campo Usuario está vacío, Ingrese un usuario para su logueo</p>';
            $('#Usuario').css("border-bottom-color", "#F14B4B")
        } else{
            $('#Usuario').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#Password').val() == '' ){
            errores += '<p>El campo Password está vacío, Ingrese una Password para su logueo</p>';
            $('#Password').css("border-bottom-color", "#F14B4B")
        } else{
            $('#Password').css("border-bottom-color", "#d1d1d1")
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
