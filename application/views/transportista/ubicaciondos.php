<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ubicación</title>

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

    <!--SCRIPT-->
    <!--=================================================-->
    <!--Page Load Progress Bar [ OPTIONAL ]-->
    <link href="<?php echo base_url(); ?>/assets/plugins/pace/pace.min.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>/assets/plugins/pace/pace.min.js"></script>
    <style media="screen">
    #map {
        height: 745px;
        width: 100%;
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

        <!--NAVBAR-->

        <!--===================================================-->

        <header id="navbar">

            <div id="navbar-container" class="boxed">

                <!--Navbar Dropdown-->

                <!--================================-->

                <div class="navbar-content clearfix">

                    <ul class="nav navbar-top-links pull-left">

                        <!--Navigation toogle button-->

                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

                        <li class="tgl-menu-btn">

                            <a class="mainnav-toggle" href="#"> <i class="fa fa-navicon fa-lg"></i> </a>

                        </li>

                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

                        <!--End Navigation toogle button-->

                        <!--Messages Dropdown-->

                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->



                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

                        <!--End message dropdown-->

                        <!--Notification dropdown-->

                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->



                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

                        <!--End notifications dropdown-->

                    </ul>

                    <ul class="nav navbar-top-links pull-right">

                        <!--Profile toogle button-->

                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

                        <li class="hidden-xs" id="toggleFullscreen">

                            <a class="fa fa-expand" data-toggle="fullscreen" href="#" role="button">

                                <span class="sr-only">Toggle fullscreen</span>

                            </a>

                        </li>

                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

                        <!--End Profile toogle button-->

                        <!--User dropdown-->

                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

                        <li id="dropdown-user" class="dropdown">

                            <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">



                                <div class="username hidden-xs"> Bienvenido: <?php echo $_SESSION["username"]; ?></div>

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

                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

                        <!--End user dropdown-->

                    </ul>

                </div>

                <!--================================-->

                <!--End Navbar Dropdown-->

            </div>

        </header>

        <!--===================================================-->

        <!--END NAVBAR-->

        <div class="boxed">

            <!--CONTENT CONTAINER-->

            <!--===================================================-->

            <div id="content-container">

                <div class="pageheader hidden-xs">

                    <h3><i class="fa fa-home"></i>Ubicación </h3>





                </div>

                <!--Page content-->

                <!--===================================================-->

                <div id="page-content">

                    <div class="row">

                        <div class="col-md-12">



                            <!-- Basic Data Tables -->

                            <!--===================================================-->

                            <div class="panel">

                                <div class="panel-heading">

                                    <h3 class="panel-title" align="center">Ubicación Del Sitio</h3>

                                </div>


                                <div class="panel-body">
                                   
                                    <!-- Empieza el formulario  -->
                                    <form id="registrationForm" name="registrationForm" class="form-horizontal"
                                        action="enproceso" method="POST">
                                        <!-- Comenzamos un foreach ya que como es un vista de editar, tenemos que mostar los datos que
                                                tiene ese usuario segun el id, comenzamos con un foreach y en este caso declaramos una variable
                                              llamada datos que es la que llamaremos en nuestro controlador pda en la funcion index de users, luego del as
                                            tenemos otra variable dato que es la que vamos a usar para poder mandar a llamar los campos que queremos mostrar de la base de datos por
                                          parte de nuestro modelo igualmente en la funcion index del controlador users -->
                                        <?php
                                                  foreach ($datosoli as $dato) {
                                                      // code...
                                                        }
                                                        ?>


                                        <div class="form-group">
                                            <label class="col-md-1 col-xs-12 control-label">ID Pedido</label>
                                            <div class="col-md-3 col-xs-12">
                                                <!-- las llaves de php es donde llamamos y mostramos los datos segun el id que mandamos a editar del usuario-->
                                                <input type="text" class="form-control" name="id" id="id"
                                                    value="<?= $dato->idRpPedidos ?>" placeholder="" readonly />
                                            </div>
                                        </div>



                                        <div class="panel-footer">
                                            <div class="form-group">
                                                <div class="col-md-5 col-xs-12">
                                                    <!--  Boton guardar, y guardar los datos y mandar los datos a modificar ingresados al controlador -->
                                                    <input type="submit" class="btn btn-primary" name="btnSend"
                                                        value="Iniciar" id="btnSend">
                                                 
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <div id="map"></div>

                                    
                                        <script type="text/javascript">
                                        function iniciarMap() {
                                            var coord = {
                                                lat: <?php echo $latitud ?>,
                                                lng: <?php echo $longitud ?>
                                            };
                                            var map = new google.maps.Map(document.getElementById('map'), {
                                                zoom: 18,
                                                center: coord
                                            });
                                            var marker = new google.maps.Marker({
                                                position: coord,
                                                map: map
                                            });
                                        }
                                        </script>



                                </div>




                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!--===================================================-->

            <!--End page content-->

        </div>

        <!--===================================================-->

        <!--END CONTENT CONTAINER-->

        <!--MAIN NAVIGATION-->

        <!--===================================================-->

        <nav id="mainnav-container">

            <!--Brand logo & name-->

            <!--================================-->

            <div class="navbar-header">

                <a href="<?php echo base_url(); ?>" class="navbar-brand">



                    <i><img src="<?php echo base_url(); ?>/assets/img/RAPITRANS2.png" width="60">
                        <font size="5" face="georgia">Obra Civil </font>
                    </i>

                </a>

            </div>

            <!--================================-->

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

                        


                        

                            </ul>


                        </div>

                    </div>

                </div>



            </div>

        </nav>

        <!--===================================================-->

        <!--END MAIN NAVIGATION-->

    </div>

    <!-- FOOTER -->

    <!--===================================================-->


    <!--===================================================-->

    <!-- END FOOTER -->

    <!-- SCROLL TOP BUTTON -->

    <!--===================================================-->

    <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>

    <!--===================================================-->

    </div>

    <!--jQuery [ REQUIRED ]-->
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2ZxXlRLeHRzPC0KZbjd8isdbI0BEY-nA&callback=iniciarMap">
    </script>
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