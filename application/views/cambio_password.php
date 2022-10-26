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
                    <div class="card-title">

                    </div>
                    <div class="card-body">
                      <div class="alert alert-primary" role="alert">
                      Tu contraseña ha sido cambiada exitosamente!.<br>
                      </div>
                      <a href="<?php echo base_url(); ?>index.php/welcome/login" class="btn btn-outline-success"> Iniciar Sesion</a>
                    </div>
                  </div>
          </div>
          <div class="col-md-3">

          </div>
      </div>





  </body>
</html>
