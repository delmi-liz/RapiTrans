<!DOCTYPE html>



<html lang="en">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Indicadores</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/img/Logo1.ico">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100,700" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Roboto:500,400italic,100,700italic,300,700,500italic,400"
        rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/chartist-js-master/dist/chartist.min.css">
    <link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/plugins/switchery/switchery.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/plugins/datatables/media/css/dataTables.bootstrap.css"
        rel="stylesheet">

    <link href="<?php echo base_url(); ?>/assets/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css"
        rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/<?php echo base_url(); ?>/assets/css/demo/jasmine.css"
        rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/plugins/pace/pace.min.css" rel="stylesheet">

    <script src="<?php echo base_url(); ?>/assets/plugins/pace/pace.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="<?php echo base_url(); ?>/assets/chartist-js-master/dist/chartist.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/Chart.js-master/samples/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/Chart.js-master/samples/utils.js"></script>

    <style>
    canvas {

        -moz-user-select: none;

        -webkit-user-select: none;

        -ms-user-select: none;

    }
    </style>

    <script type="text/javascript">
    // Solo permite ingresar numeros.



    function soloNumeros(e) {



        var key = window.Event ? e.which : e.keyCode



        return (key >= 48 && key <= 57)

    }
    </script>



    <style type="text/css">
    .isDisabled {

        cursor: not-allowed;

        opacity: 0.5;

    }

    a[aria-disabled="true"] {

        color: currentColor;

        display: inline-block;
        /* For IE11/ MS Edge bug */

        pointer-events: none;

        text-decoration: none;

    }
    </style>



    <style type="text/css">
    table {



        background-color: #EAEDED;

        border: 5px solid black;

        width: 100%;

    }
    </style>



    <script type="text/javascript">
    function disableLink(link) {

        // 1. Add isDisabled class to parent span

        link.parentElement.classList.add('isDisabled');

        // 2. Store href so we can add it later

        link.setAttribute('data-href', link.href);

        // 3. Remove href

        link.href = '';

        // 4. Set aria-disabled to 'true'

        link.setAttribute('aria-disabled', 'true');

    }

    function enableLink(link) {

        // 1. Remove 'isDisabled' class from parent span

        link.parentElement.classList.remove('isDisabled');

        // 2. Set href

        link.href = link.getAttribute('data-href');

        // 3. Remove 'aria-disabled', better than setting to false

        link.removeAttribute('aria-disabled');

    }





    document.body.addEventListener('click', function(event) {

        // filter out clicks on any other elements

        if (event.target.nodeName == 'A' && event.target.getAttribute('aria-disabled') == 'true') {

            event.preventDefault();

        }

    });
    </script>

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



                    <h3><i class="fa fa-home"></i>Indicadores </h3>

                </div>


                <div id="page-content">

                    <div class="row">

                        <div class="col-md-12">


                            <div class="panel">

                                <div class="panel-heading">

                                    <h3 class="panel-title" align="center"></h3>

                                </div>

                                <div class="panel-body">

                                    <div class="row">



                                        <div class="col-md-1">

                                            <script type="text/javascript"
                                                src="https://www.gstatic.com/charts/loader.js"></script>

                                            <script type="text/javascript">
                                            google.charts.load('current', {
                                                'packages': ['corechart']
                                            });
                                            google.charts.setOnLoadCallback(drawVisualization);

                                            function drawVisualization() {
                                                // Some raw data (not necessarily accurate)
                                                var data = google.visualization.arrayToDataTable([
                                                    ['Guatemala', 'Sacatepequez', 'Alta Verapaz', 'Quetzaltenango',
                                                        'Antigua Guatemala', 'San Marcos', ''
                                                    ],
                                                    ['2021', 0, 1, 0, 0, 0, 0],
                                                    ['2022', 0, 0, 0, 0, 0, 0],
                                                    ['2023', 0, 0, 0, 0, 0, 0],
                                                    ['2024', 0, 0, 0, 0, 0, 0],
                                                    ['2025', 0, 0, 0, 0, 0, 0]
                                                ]);

                                                var options = {
                                                    title: 'Lugares más transitados de nuestros pedidos',
                                                    vAxis: {
                                                        title: 'Clientes'
                                                    },
                                                    hAxis: {
                                                        title: 'Años'
                                                    },
                                                    seriesType: 'bars',
                                                    series: {
                                                        5: {
                                                            type: 'line'
                                                        }
                                                    }
                                                };

                                                var chart = new google.visualization.ComboChart(document.getElementById(
                                                    'chart_div'));
                                                chart.draw(data, options);
                                            }
                                            </script>



                                            <div id="chart_div" style="width: 1200px; height: 500px;"></div>

                                        </div>



                                    </div>

                                    <div class="row">



                                        <div class="col-md-1">

                                            <script type="text/javascript"
                                                src="https://www.gstatic.com/charts/loader.js"></script>

                                            <script type="text/javascript">
                                            google.charts.load("current", {
                                                packages: ["corechart"]
                                            });
                                            google.charts.setOnLoadCallback(drawChart);

                                            function drawChart() {
                                                var data = google.visualization.arrayToDataTable([
                                                    ['Task', 'Hours per Day'],
                                                    ['Sacatepequez', 33],
                                                    ['Alta Verapaz', 22],
                                                    ['Quetzaltenango', 8],
                                                    ['Antigua Guatemala', 7],
                                                    ['', 0]
                                                ]);

                                                var options = {
                                                    title: 'Promedio en procentaje de cuanto se logró ahorrar por cada viaje',
                                                    is3D: true,
                                                };

                                                var chart = new google.visualization.PieChart(document.getElementById(
                                                    'piechart_3d'));
                                                chart.draw(data, options);
                                            }
                                            </script>





                                            <div id="piechart_3d" style="width: 1200px; height: 500px;"></div>

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







                        <i><img src="<?php echo base_url(); ?>/assets/img/RAPITRANS2.png" width="60">
                            <font size="5" face="georgia">Menú Rapi </font>
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





            <div class="hide-fixed pull-right pad-rgt">Currently v2.2</div>



            <p class="pad-lft">&#0169; 2015 Your Company</p>



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