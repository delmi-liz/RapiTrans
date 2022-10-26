$(document).ready(function(){

    $('#btnSend').click(function(){

        var errores = '';

        // Validado Nombre ==============================
        if( $('#descripcion').val() == '' ){
            errores += '<p>El campo descripción está vacío, Ingrese una descripción </p>';
            $('#descripcion').css("border-bottom-color", "#F14B4B")
        } else{
            $('#descripcion').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#existencia').val() == '' ){
            errores += '<p>El campo existencia está vacío, Ingrese una existencia</p>';
            $('#existencia').css("border-bottom-color", "#F14B4B")
        } else{
            $('#existencia').css("border-bottom-color", "#d1d1d1")
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
