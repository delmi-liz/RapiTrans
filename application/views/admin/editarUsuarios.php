<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Creacion de nuevo sitio</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/img/Logo1.ico">

    <link href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100,700" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Roboto:500,400italic,100,700italic,300,700,500italic,400"
        rel="stylesheet">

    <link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>/assets/plugins/switchery/switchery.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>/assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>/assets/plugins/datatables/media/css/dataTables.bootstrap.css"
        rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/plugins/pace/pace.min.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>/assets/plugins/pace/pace.min.js"></script>



    <!--Script para poder cancelar el ingreso de los datos y dejarlos a como estaba-->
    <script>
    function limpiarFormulario() {
        document.getElementById("registrationForm").reset();
    }
    </script>

    <!--Función script para poder hacer una validacion sobre si coincide el nombre de usuario
       y el password-->

    <script type="text/javascript">
    function comprobar() {
        var usuario = document.registrationForm.usuario.value;
        var cofirmarusername = document.registrationForm.cofirmarusername.value;

        if (usuario != cofirmarusername) {
            document.getElementById("mensaje").innerHTML = "El usuario no coincide";
        } else {
            document.getElementById("mensaje").innerHTML = "El usuario coincide";
        }
    }
    </script>

    <!--Función script para poder hacer una validacion sobre si coincide el nombre de usuario
               y el password-->

    <script type="text/javascript">
    function comprobacion() {
        var password = document.registrationForm.password.value;
        var confirmarpassword = document.registrationForm.confirmarpassword.value;

        if (password != confirmarpassword) {
            document.getElementById("mensaje2").innerHTML = "La contraseña no coincide";
        } else {
            document.getElementById("mensaje2").innerHTML = "La contraseña coincide";
        }
    }
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
                                <!--Abrimos llaves de php para poder llamar el tipo de variable session PARA llamar
                                   el campo nombre que es el que se muestra en la vista, "parte superior derecha donde indica
                                   el nombre del usuario que se ha logeado"-->
                                <div class="username hidden-xs"><?php echo $_SESSION["nombre"]; ?></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right with-arrow">

                                <ul class="head-list">

                                    <!-- Boton que sirve para poder redireccionar a la vista del login, cuando el usuario quiera salir, en este caso la funcion esta en el controlador
                                         welcome y la funcion se llama salir -->
                                    <li>
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
                    <h3><i class="fa fa-home"></i> Editar datos del usuario </h3>

                </div>

                <div id="page-content">
                    <div class="row">
                        <div class="col-md-12">


                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Datos del usuario a editar</h3>
                                </div>

                                <div class="panel">

                                    <div class="panel-body">

                                        <div class="panel-body">


                                            <!-- Empieza el formulario  -->
                                            <form id="registrationForm" name="registrationForm" class="form-horizontal"
                                                action="updatedata" method="GET">
                                                <!-- Comenzamos un foreach ya que como es un vista de editar, tenemos que mostar los datos que
                                                tiene ese usuario segun el id, comenzamos con un foreach y en este caso declaramos una variable
                                              llamada datos que es la que llamaremos en nuestro controlador pda en la funcion index de users, luego del as
                                            tenemos otra variable dato que es la que vamos a usar para poder mandar a llamar los campos que queremos mostrar de la base de datos por
                                          parte de nuestro modelo igualmente en la funcion index del controlador users -->
                                                <?php
                                                  foreach ($datos as $dato) {
                                                      // code...
                                                        }
                                                        ?>

                                                <br>
                                                <br>
                                                <div class="form-group">
                                                    <label class="col-md-1 col-xs-12 control-label">Dpi</label>
                                                    <div class="col-md-3 col-xs-12">
                                                        <!-- las llaves de php es donde llamamos y mostramos los datos segun el id que mandamos a editar del usuario-->
                                                        <input type="text" class="form-control" name="dpi" id="dpi"
                                                            value="<?= $dato->Dpi ?>" placeholder="Ingrese Dpi"
                                                            readonly />
                                                    </div>
                                                    <label class="col-md-1 col-xs-12 control-label">Nombre</label>
                                                    <div class="col-md-3 col-xs-12">
                                                        <input type="text" class="form-control" name="nombre"
                                                            id="nombre" value="<?= $dato->Nombre ?>"
                                                            placeholder="Ingrese Nombre" required />
                                                    </div>

                                                    <label class="col-md-1 col-xs-12 control-label">Correo</label>
                                                    <div class="col-md-3 col-xs-12">
                                                        <input type="text" class="form-control" name="correo"
                                                            id="correo" value="<?= $dato->correo ?>"
                                                            placeholder="Ingrese Correo" required />
                                                    </div>
                                                </div>



                                                <br>
                                                <br>
                                                <br>


                                                <div class="panel-footer">
                                                    <div class="form-group">
                                                        <div class="col-md-5 col-xs-12">
                                                            <!--  Boton guardar, y guardar los datos y mandar los datos a modificar ingresados al controlador -->
                                                            <input type="submit" class="btn btn-primary" name="btnSend"
                                                                value="Guardar" id="btnSend">
                                                            <!--  Boton Cancelar los datos y direccionar a la vista donde se muestran el listado de usuarios creados-->
                                                            <!--llamamos el Script que esta arriba con un onclick para que puedar realizar la validacion del mismo-->
                                                            <a href="<?php echo base_url(); ?>index.php/users"
                                                                type="button" class="btn btn-danger"
                                                                onclick="limpiarFormulario()">Cancelar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                                <br>

                            </div>
                        </div>

                    </div>

                </div>

                <nav id="mainnav-container">

                    <div class="navbar-header">

                        <a href="<?php echo base_url(); ?>" class="navbar-brand">



                            <i><img src="<?php echo base_url(); ?>/assets/img/RAPITRANS2.png" width="60">
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

        <script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script>

        <script src="<?php echo base_url(); ?>/assets/plugins/fast-click/fastclick.min.js"></script>

        <script src="<?php echo base_url(); ?>/assets/js/scripts.js"></script>

        <script src="<?php echo base_url(); ?>/assets/plugins/nanoscrollerjs/jquery.nanoscroller.min.js"></script>

        <script src="<?php echo base_url(); ?>/assets/plugins/metismenu/metismenu.min.js"></script>

        <script src="<?php echo base_url(); ?>/assets/plugins/switchery/switchery.min.js"></script>

        <script src="<?php echo base_url(); ?>/assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>

        <script src="<?php echo base_url(); ?>/assets/plugins/datatables/media/js/jquery.dataTables.js"></script>

        <script src="<?php echo base_url(); ?>/assets/plugins/datatables/media/js/dataTables.bootstrap.js"></script>

        <script
            src="<?php echo base_url(); ?>/assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js">
        </script>

        <script src="<?php echo base_url(); ?>/assets/plugins/screenfull/screenfull.js"></script>

        <script src="<?php echo base_url(); ?>/assets/js/demo/tables-datatables.js"></script>

</body>

</html>