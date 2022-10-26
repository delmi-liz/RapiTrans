<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Principal</title>
      <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/img/preview-Claro.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php
      require 'css.php';
     ?>
     <style media="screen">
     </style>

     <script type="text/javascript" >
                     function comprobacion() {
                             var password = document.registrationForm.password.value;
                             var confirmarpassword = document.registrationForm.confirmarpassword.value;

                             if (password != confirmarpassword) {
                                     document.getElementById("mensaje2").innerHTML = "La contraseña no coincide";
                             } else {
                                     document.getElementById("mensaje2").innerHTML = "";
                             }
                     }
             </script>


  </head>
  <body>
    <nav class="navbar navbar-light" style="background-color: #0055C3;">
      <!-- Navbar content -->
      <a class="navbar-brand" href="#" style="color: white">RapiTrans GT</a>
    </nav>
    <br>
    <br>
      <div class="row">
          <div class="col-md-3">
          </div>
          <div class="col-md-6 col-xs-12">
                  <div class="card">
                      <div class="card-header">
                            <h5 class="card-title" aling="center"> Restablecimiento de contraseña</h5>
                      </div>
                      <div class="card-body">
                          <p>Ingrese la nueva contraseña  y confirme sus datos</p>
                          <form class="" id="registrationForm" name="registrationForm" action="newpassword" method="POST">
                            <label for="">Nombre</label>
                            <input type="text" name="nombre" value="<?= $_SESSION['usuario']; ?>" class="form-control" readonly />
                            <label for="">Correo</label>
                            <input type="text" name="correo" value="<?= $_SESSION['email']; ?>" class="form-control" readonly />
                            <label>Escribe la nueva contraseña</label>
                            <input type="password" name="password"  class="form-control"  autofocus="autofocus" min="6" max="10" placeholder="Escriba la contraseña" /> <br>
                            <label>Vuelve a escribir la nueva contraseña</label>
                            <input type="password" name="confirmarpassword" class="form-control" min="6" max="10" placeholder="Vuelva a escribir la contraseña" onkeyup="comprobacion();"/><div id="mensaje2"></div>
                            <br>
                            <input type="submit" value="Cambiar" class="btn btn-success btn-block btn-sm">
                          </form>
                      </div>
                  </div>
          </div>
          <div class="col-md-3">

          </div>
      </div>

<script type="text/javascript">
$(document).ready(function() {
//variables
var pass1 = $('[name=pass1]');
var pass2 = $('[name=pass2]');
var confirmacion = "Las contraseñas si coinciden";
var longitud = "La contraseña debe estar formada entre 6-10 carácteres (ambos inclusive)";
var negacion = "No coinciden las contraseñas";
var vacio = "La contraseña no puede estar vacía";
//oculto por defecto el elemento span
var span = $('<span class="alert alert-info"></span>').insertAfter(pass2);
span.hide();
//función que comprueba las dos contraseñas
function coincidePassword(){
var valor1 = pass1.val();
var valor2 = pass2.val();
//muestro el span
span.show().removeClass();
//condiciones dentro de la función
if(valor1 != valor2){
span.text(negacion).addClass('negacion');
}
if(valor1.length==0 || valor1==""){
span.text(vacio).addClass('negacion');
}
if(valor1.length<6 || valor1.length>10){
span.text(longitud).addClass('negacion');
}
if(valor1.length!=0 && valor1==valor2){
span.text(confirmacion).removeClass("negacion").addClass('confirmacion');
}
}
//ejecuto la función al soltar la tecla
pass2.keyup(function(){
coincidePassword();
});
});
</script>




  </body>
</html>
