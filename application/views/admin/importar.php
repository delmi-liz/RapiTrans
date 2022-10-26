<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Importar Excel</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/img/Logo1.ico">
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
    <!--SCRIPT-->
    <!--=================================================-->
    <!--Page Load Progress Bar [ OPTIONAL ]-->
    <link href="<?php echo base_url(); ?>/assets/plugins/pace/pace.min.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>/assets/plugins/pace/pace.min.js"></script>

    <style type="text/css">
    ::selection {
        background-color: #E13300;
        color: white;
    }

    ::-moz-selection {
        background-color: #E13300;
        color: white;
    }

    a {
        color: #003399;
        background-color: transparent;
        font-weight: normal;
    }

    h1 {
        color: #444;
        background-color: transparent;
        border-bottom: 1px solid #D0D0D0;
        font-size: 19px;
        font-weight: normal;
        margin: 0 0 14px 0;
        padding: 14px 15px 10px 15px;
    }

    code {
        font-family: Consolas, Monaco, Courier New, Courier, monospace;
        font-size: 12px;
        background-color: #f9f9f9;
        border: 1px solid #D0D0D0;
        color: #002166;
        display: block;
        margin: 14px 0 14px 0;
        padding: 12px 10px 12px 10px;
    }

    #body {
        margin: 0 15px 0 15px;
    }

    p.footer {
        text-align: right;
        font-size: 11px;
        border-top: 1px solid #D0D0D0;
        line-height: 32px;
        padding: 0 10px 0 10px;
        margin: 20px 0 0 0;
    }

    #container {
        margin: 10px;
        border: 1px solid #D0D0D0;
        box-shadow: 0 0 8px #D0D0D0;
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

                                <div class="username hidden-xs"> <?php echo $_SESSION["nombre"]; ?></div>
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
                    <h3><i class="fa fa-home"></i> Importación de documentos XLS </h3>

                </div>

                <div id="page-content">
                    <div class="row">
                        <div class="col-md-12">

                            >
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Importar Archivo</h3>
                                </div>
                                <br>
                                <center><img src="<?php echo base_url(); ?>/assets/img/documento.png" width="150">
                                    <br>
                                    <br>
                                    <div id="body">
                                        <?= $this->session->flashdata('Success');?>
                                        <br>
                                        <?= form_open( base_url('index.php/importar/import_excel_data'),array('method'=>'post','enctype'=>'multipart/form-data'));?>
                                        <p><input type="file" name="file" class="btn btn-primary" required /></p>
                                        <br>
                                        <p><input type="submit" name="submit" value="Subir Archivo"
                                                class="btn btn-primary" /></p>
                                        <center> <img src="<?php echo base_url(); ?>/assets/img/subir.png" width="100">
                                            <?= form_close();?>
                                    </div>
                                    <br>
                                    <a href="<?php echo base_url(); ?>index.php/importar/importardos" type="button"
                                        class="btn btn-danger">Importar Segundo</a>

                                    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds.
                                        <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
                                    </p>



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
                            <font size="5" face="georgia">Menú LAB </font>
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

                                            <span class="menu-title">Registros</span>

                                            <i class="arrow"></i>

                                        </a>

                                        <!--Submenu-->

                                        <ul class="collapse">

                                            <li>
                                                <a href="<?php echo base_url(); ?>index.php/solicitudes"><i
                                                        class="fa fa-caret-right"></i>Solicitudes</a>

                                            </li>



                                        </ul>

                                    </li>

                                    <li>

                                        <a href="#">

                                            <i class="fa fa-briefcase"></i>

                                            <span class="menu-title">Registrar</span>

                                            <i class="arrow"></i>

                                        </a>

                                        <!--Submenu-->

                                        <ul class="collapse">

                                            <li>
                                                <a href="<?php echo base_url(); ?>index.php/users"><i
                                                        class="fa fa-caret-right"></i>Transportistas</a>

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

                                            <i class="fa fa-briefcase"></i>

                                            <span class="menu-title">Usuarios</span>

                                            <i class="arrow"></i>

                                        </a>

                                        <!--Submenu-->

                                        <ul class="collapse">

                                            <li>
                                                <a href="<?php echo base_url(); ?>index.php/usersAdmin"><i
                                                        class="fa fa-caret-right"></i>Clientes</a>

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

                                        <ul class="collapse">

                                            <li>
                                                <a href="<?php echo base_url(); ?>index.php/tablas"><i
                                                        class="fa fa-caret-right"></i>Oferta / Demanda</a>

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

                                    <li>

                                        <a href="#">

                                            <i class='fa fa-briefcase'></i>

                                            <span class="menu-title">Calculo de rutas</span>

                                            <i class="arrow"></i>

                                        </a>

                                        <!--Submenu-->

                                        <ul class="collapse">

                                            <li>
                                                <a href="<?php echo base_url(); ?>index.php/estadisticas"><i
                                                        class="fa fa-caret-right"></i>Graficas</a>

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
                <!-- Visible when footer positions are static -->
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <div class="hide-fixed pull-right pad-rgt">Actualmente v1.0</div>
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <!-- Remove the class name "show-fixed" and "hide-fixed" to make the content always appears. -->
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <p class="pad-lft">&#0169; 2021 RapiTrans</p>
            </footer>

            <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>

        </div>

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