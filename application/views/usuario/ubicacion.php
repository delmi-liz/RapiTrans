<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Calcular Ruta google maps</title>

    <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/img/Logo1.ico">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--STYLESHEET-->
    <!--=================================================-->
    <!--Roboto Slab Font [ OPTIONAL ] -->
    <link href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100,700" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Roboto:500,400italic,100,700italic,300,700,500italic,400"
        rel="stylesheet">
    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <!--Jasmine Stylesheet [ REQUIRED ]-->
    <link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet">
    <!--Font Awesome [ OPTIONAL ]-->
    <link href="<?php echo base_url(); ?>/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!--Switchery [ OPTIONAL ]-->
    <link href="<?php echo base_url(); ?>/assets/plugins/switchery/switchery.min.css" rel="stylesheet">
    <!--Bootstrap Select [ OPTIONAL ]-->
    <link href="<?php echo base_url(); ?>/assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
    <!--Bootstrap Table [ OPTIONAL ]-->
    <link href="<?php echo base_url(); ?>/assets/plugins/datatables/media/css/dataTables.bootstrap.css"
        rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css"
        rel="stylesheet">

    <!--Demo [ DEMONSTRATION ]-->
    <link href="<?php echo base_url(); ?>/assets/<?php echo base_url(); ?>/assets/css/demo/jasmine.css"
        rel="stylesheet">

    <link href="<?php echo base_url(); ?>/assets/css/Appdos.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ab2155e76b.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <!--SCRIPT-->
    <!--=================================================-->
    <!--Page Load Progress Bar [ OPTIONAL ]-->
    <link href="<?php echo base_url(); ?>/assets/plugins/pace/pace.min.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>/assets/plugins/pace/pace.min.js"></script>
    
    




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



                                <div class="username hidden-xs"> Bienvenido: <?php echo $_SESSION["nombre"]; ?></div>

                            </a>

                            <div class="dropdown-menu dropdown-menu-right with-arrow">

                                <!-- User dropdown menu -->

                                <ul class="head-list">



                                    <li>

                                        <a href="<?php echo base_url(); ?>index.php/welcome/salir"> <i
                                                class="fa fa-sign-out fa-fw"></i> Salir </a>

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

                    <h3><i class="fa fa-home"></i>Ubicación </h3>

                </div>


                <div id="page-content">

                    <div class="row">

                        <div class="col-md-12">


                            <div class="panel">

                                <div class="panel-heading">

                                    <h3 class="panel-title" align="center">Ubicación Del Sitio</h3>

                                </div>


                                <div class="panel-body">

                                    <div class="jumbotron">
                                        <div class="container-fluid">
                                            <h1>Encuentra la distancia entre dos lugares. </h1>
                                            <p>Esta aplicación le ayudará a calcular sus distancias de viaje. </p>
                                            <br>
                                            <form class="form-horizontal">
                                                <div class="form-group">
                                                    <label for="from" class="col-xs-2 control-label"><i
                                                            class="far fa-dot-circle"></i></label>
                                                    <div class="col-xs-4">
                                                        <input type="text" id="from" placeholder="Origen"
                                                            class="form-control">
                                                    </div>

                                                    <label for="to" class="col-xs-1 control-label"><i
                                                            class="fas fa-map-marker-alt"></i></label>
                                                    <div class="col-xs-4">
                                                        <input type="text" id="to" placeholder="Destino"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </form>
                                            <br>
                                            <div class="col-xs-offset-2 col-xs-10">
                                                <button class="btn btn-primary btn-lg " onclick="calcRoute();"><i
                                                        class="fas fa-map-signs"></i></button>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="container-fluid">
                                            <div id="googleMap">

                                            </div>
                                            <div id="output">

                                            </div>
                                        </div>

                                    </div>



                                </div>




                            </div>

                        </div>

                    </div>

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
            <p class="pad-lft">&#0169; 2021 RapiTrans</p>
        </footer>

    </div>



    <!--===================================================-->



    <!--jQuery [ REQUIRED ]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAF7dUHdwpuUWaXYLSH9A4kKJiNAICljbY&libraries=places">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="Scripts/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/Maindos.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/jquery-2.1.1.min.js"></script>
    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script>
    <!--Fast Click [ OPTIONAL ]-->
    <script src="<?php echo base_url(); ?>/assets/plugins/fast-click/fastclick.min.js"></script>
    <!--Jasmine Admin [ RECOMMENDED ]-->
    <script src="<?php echo base_url(); ?>/assets/js/scripts.js"></script>
    <!--Jquery Nano Scroller js [ REQUIRED ]-->
    <script src="<?php echo base_url(); ?>/assets/plugins/nanoscrollerjs/jquery.nanoscroller.min.js"></script>
    <!--Metismenu js [ REQUIRED ]-->
    <script src="<?php echo base_url(); ?>/assets/plugins/metismenu/metismenu.min.js"></script>
    <!--Switchery [ OPTIONAL ]-->
    <script src="<?php echo base_url(); ?>/assets/plugins/switchery/switchery.min.js"></script>
    <!--Bootstrap Select [ OPTIONAL ]-->
    <script src="<?php echo base_url(); ?>/assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
    <!--DataTables [ OPTIONAL ]-->
    <script src="<?php echo base_url(); ?>/assets/plugins/datatables/media/js/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>/assets/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
    <script
        src="<?php echo base_url(); ?>/assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js">
    </script>
    <!--Fullscreen jQuery [ OPTIONAL ]-->
    <script src="<?php echo base_url(); ?>/assets/plugins/screenfull/screenfull.js"></script>

    <!--DataTables Sample [ SAMPLE ]-->
    <script src="<?php echo base_url(); ?>/assets/js/demo/tables-datatables.js"></script>

</body>

</html>