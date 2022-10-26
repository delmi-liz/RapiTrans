<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
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
                            <h5 class="card-title"> Restablecimiento de contraseña</h5>
                      </div>
                      <div class="card-body">
                          <p>Ingrese el codigo de restablecimiento de contraseña que se ha enviado a su correo electronico </p>
                          <form class="" action="verificar" method="POST">
                              <label>Codigo:</label>
                              <input type="text" name="validarcorreo" class="form-control"><br>
                              <input type="submit" value="Validar" class="btn btn-primary btn-block btn-sm">
                          </form>
                      </div>
                  </div>
          </div>
          <div class="col-md-3">

          </div>
      </div>





  </body>
</html>
