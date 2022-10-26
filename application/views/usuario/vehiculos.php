<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Vehículos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Vehículos.</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/img/Logo1.ico">

    <link href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100,700" rel="stylesheet">

    <link href="http://fonts.googleapis.com/css?family=Roboto:500,400italic,100,700italic,300,700,500italic,400"
        rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/plugins/animate-css/animate.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-validator/bootstrapValidator.min.css"
        rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/plugins/switchery/switchery.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css"
        rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/demo/jquery-steps.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/demo/jasmine.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/plugins/pace/pace.min.css" rel="stylesheet">

    <script src="<?php echo base_url(); ?>assets/plugins/pace/pace.min.js"></script>
    <!-- scropt para Dar color a la tabla en la parte de los encabezados -->
    <style type="text/css">
    table {
        background-color: #EAEDED;
        border: 5px solid black;
        width: 100%;

    }
    </style>
</head>

<body>
    <div id="container" class="effect mainnav-sm navbar-fixed mainnav-fixed">

        <header id="navbar">
            <div id="navbar-container" class="boxed">

                <div class="navbar-content clearfix">
                    <ul class="nav navbar-top-links pull-left">

                        <li class="tgl-menu-btn">
                            <a class="mainnav-toggle" href="#"> <i class="fa fa-navicon fa-lg"></i> </a>
                        </li>

                    </ul>
                    <ul class="nav navbar-top-links pull-right">

                        <li class="hidden-xs" id="toggleFullscreen">
                            <a class="fa fa-expand" data-toggle="fullscreen" href="#" role="button">
                                <span class="sr-only">Toggle fullscreen</span>
                            </a>
                        </li>

                        <li id="dropdown-user" class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                <!--Abrimos llaves de php para poder llamar el tipo de variable session PARA llamar
                               el campo nombre que es el que se muestra en la vista, "parte superior derecha donde indica
                               el nombre del usuario que se ha logeado"-->
                                <div class="username hidden-xs"><?php echo $_SESSION["nombre"]; ?></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right with-arrow">

                                <ul class="head-list">
                                    <li>
                                        <!-- Boton que sirve para poder redireccionar a la vista del login, cuando el usuario quiera salir, en este caso la funcion esta en el controlador
                                    welcome y la funcion se llama salir -->

                                        <a href="<?php echo base_url(); ?>index.php/welcome/salir"> <i
                                                class="fa fa-user fa-fw fa-lg"></i> Salir</a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                    </ul>
                </div>

            </div>
        </header>

        <div class="boxed">

            <div id="content-container">
                <div class="pageheader hidden-xs">
                    <h3><i class="fa fa-home"></i>Vehículos</h3>
                </div>

                <div id="page-content">
                    <div class="row">
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-10">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Listado de Vehículos d</h3>
                                </div>
                                <br>
                                <!-- Se abren llaves php para poder realizar un if con codigo php, es este caso declaramos una variable
                         llamada "response" en la cual le estamos indicando que si es == 1, nos mostrara un mensaje, en este caso
                       si los datos se actualizan y hacen bien su proceso en el controlador Pda y en el respectivo modelo. -->
                                <?php if ($response =="1") {
                             echo "<div class=\"alert alert-success fade in\" role=\"alert\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">
                                   Datos Actualizados.
                                 </div>";
                           } ?>

                                <div class="panel-body">

                                    <div class="btn-group">
                                        <a href="<?php echo base_url(); ?>index.php/vehiculos/nuevo"
                                            class="btn btn-default"><i class="fa fa-plus"> Nuevo</i></a>


                                    </div>
                                    <br>
                                    <br>
                                    <table class="table table-striped table-bordered">
                                        <!--El nombre de los campos que se van a mostrar en la vista-->
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Placa</th>
                                                <th>Tipo de vehículo</th>
                                                <th>Modelo</th>
                                                <th>Color</th>
                                                <th>Usuario ingresó</th>
                                                <th>Fecha ingresó</th>
                                                <th>Fecha ingresó</th>

                                            </tr>
                                        </thead>
                                        <!--abrimos llaves php para poder llamar los datos que queremos mostrar en nuestra vista
                               de los usuarios existentes, comenzamos un foreach y en este caso declaramos una variable
                             llamada usuarios que es la que llamaremos en nuestro controlador pda en la funcion index, luego del as
                           tenemos otra variable usuario que es la que vamos a usar para poder mandar a llamar los campos que queremos mostrar de la base de datos por
                         parte de nuestro modelo igualmente en la funcion index -->
                                        <tbody>
                                            <?php foreach ($usuarios as $usuario) {
                                     // code...
                                     ?>
                                            <tr>
                                                <!-- Llamado de campos de los datos que queremos mostrar  -->
                                                <td><?= $usuario->Dpi ?></td>
                                                <td><?= $usuario->Nombre ?></td>
                                                <td><?= $usuario->Usuario  ?></td>
                                                <td><?=  $usuario->Tipo ?></td>

                                                <td>
                                                    <div class="btn-group">
                                                        <!-- Boton editar, llamamos nuestro controlador pda con la funcion update y le mandamos el id del usuario que queremos modificar para que nos muestre
                                           los datos del usuario que queremos editar-->
                                                        <a href="<?php echo base_url(); ?>index.php/users/update?id=<?= $usuario->Dpi  ?>"
                                                            class="btn btn-default"><i class="fa fa-edit"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php          } ?>


                                        </tbody>
                                    </table>

                                </div>
                            </div>

                        </div>

                        <div class="col-md-1">

                        </div>

                    </div>

                </div>

                <nav id="mainnav-container">

                    <div class="navbar-header">

                        <a href="<?php echo base_url(); ?>" class="navbar-brand">

                            <!--Llamada  de imagen para el menú de nuestras vistas-->

                            <i><img src="<?php echo base_url(); ?>/assets/img/logo1.png" width="60">
                                <font size="5" face="georgia">Menú Rapi</font>
                            </i>



                        </a>

                    </div>

                    <div id="mainnav">


                        <div id="mainnav-menu-wrap">

                            <div class="nano">

                                <div class="nano-content">

                                    <ul id="mainnav-menu" class="list-group">


                                        <li class="list-header">Opciones De Navegación</li>

                                        <li>

                                            <a href="#">

                                                <i class="fa fa-home"></i>

                                                <span class="menu-title">Inicio</span>

                                                <i class="arrow"></i>

                                            </a>

                                            <!--Submenu-->

                                            <ul class="collapse">

                                                <li><a href="<?php echo base_url(); ?>index.php/welcome"><i
                                                            class="fa fa-caret-right"></i>Pantalla Principal</a></li>

                                            </ul>

                                        </li>

                                        <li>

                                            <a href="#">

                                                <i class="fa fa-briefcase"></i>

                                                <span class="menu-title">Registro</span>

                                                <i class="arrow"></i>

                                            </a>

                                            <!--Submenu-->

                                            <ul class="collapse">

                                                <li>
                                                    <a href="<?php echo base_url(); ?>index.php/clientes"><i
                                                            class="fa fa-caret-right"></i>Clientes</a>

                                                </li>

                                                <li>
                                                    <a href="<?php echo base_url(); ?>index.php/productos"><i
                                                            class="fa fa-caret-right"></i>Productos</a>

                                                </li>

                                                <li>
                                                    <a href="<?php echo base_url(); ?>index.php/vehiculos"><i
                                                            class="fa fa-caret-right"></i>Vehiculos</a>

                                                </li>

                                            </ul>

                                        </li>


                                        <li>

                                            <a href="#">

                                                <i class="fa fa-file-excel-o"></i>

                                                <span class="menu-title">Importar Excel</span>

                                                <i class="arrow"></i>

                                            </a>

                                            <!--Submenu-->

                                            <ul class="collapse">

                                                <li>
                                                    <a href="<?php echo base_url(); ?>index.php/importar"><i
                                                            class="fa fa-caret-right"></i>Importar</a>

                                                </li>

                                            </ul>

                                        </li>

                                        <li>

                                            <a href="#">

                                                <i class='fa fa-map-marker' style='font-size:24px'></i>

                                                <span class="menu-title">Calculo de rutas</span>

                                                <i class="arrow"></i>

                                            </a>

                                            <!--Submenu-->

                                            <ul class="collapse">

                                                <li>
                                                    <a href="<?php echo base_url(); ?>index.php/ubicacion"><i
                                                            class="fa fa-caret-right"></i>google maps</a>

                                                </li>

                                            </ul>

                                        </li>


                                    </ul>


                                </div>

                            </div>

                        </div>



                    </div>
                </nav>

            </div>

            <footer id="footer">

                <div class="show-fixed pull-right">
                    <ul class="footer-list list-inline">
                        <li>
                            <p class="text-sm">SEO Proggres</p>
                            <div class="progress progress-sm progress-light-base">
                                <div style="width: 80%" class="progress-bar progress-bar-danger"></div>
                            </div>
                        </li>
                        <li>
                            <p class="text-sm">Online Tutorial</p>
                            <div class="progress progress-sm progress-light-base">
                                <div style="width: 80%" class="progress-bar progress-bar-primary"></div>
                            </div>
                        </li>
                        <li>
                            <button class="btn btn-sm btn-dark btn-active-success">Checkout</button>
                        </li>
                    </ul>
                </div>

                <div class="hide-fixed pull-right pad-rgt">Actualmente v1.0</div>

                <p class="pad-lft">&#0169; 2020 Sistema Quejas "Banco mi pistio S.A"</p>
            </footer>

            <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>

        </div>

        <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/plugins/fast-click/fastclick.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/plugins/nanoscrollerjs/jquery.nanoscroller.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/plugins/metismenu/metismenu.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>

        <script src="<?php echo base_url(); ?>assets/plugins/switchery/switchery.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/plugins/parsley/parsley.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/plugins/jquery-steps/jquery-steps.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/plugins/masked-input/bootstrap-inputmask.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-validator/bootstrapValidator.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/plugins/bootbox/bootbox.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/plugins/screenfull/screenfull.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/demo/ui-modals.js"></script>
</body>

</html>