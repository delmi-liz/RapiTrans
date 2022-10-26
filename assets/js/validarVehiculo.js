$(document).ready(function(){

    $('#btnSend').click(function(){

        var errores = '';

        // Validado Nombre ==============================
        if( $('#placa').val() == '' ){
            errores += '<p>El campo placa está vacío, ingrese un número de placa</p>';
            $('#placa').css("border-bottom-color", "#F14B4B")
        } else{
            $('#placa').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#marca').val() == '' ){
            errores += '<p>El campo marca está vacío, ingrese una marca</p>';
            $('#marca').css("border-bottom-color", "#F14B4B")
        } else{
            $('#marca').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#tipo').val() == '' ){
            errores += '<p>El campo tipo está vacío, ingrese un tipo de vehículo </p>';
            $('#tipo').css("border-bottom-color", "#F14B4B")
        } else{
            $('#tipo').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#modelo').val() == '' ){
            errores += '<p>El campo modelo está vacío, ingrese un modelo para su vehículo</p>';
            $('#modelo').css("border-bottom-color", "#F14B4B")
        } else{
            $('#modelo').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#color').val() == '' ){
            errores += '<p>El campo color está vacío, ingrese un color para su vehículo</p>';
            $('#color').css("border-bottom-color", "#F14B4B")
        } else{
            $('#color').css("border-bottom-color", "#d1d1d1")
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
