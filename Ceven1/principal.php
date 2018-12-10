<?php session_start(); ?>
<?php
include_once './controladores/ManejoSesiones/BloqueDeSeguridad.php';
$seguridad = new BloqueDeSeguridad();
$seguridad->seguridad("login.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <?php
        if (isset($_SESSION['mensaje'])) {
            $mensaje = $_SESSION['mensaje'];
            echo "<script type=\"text/javascript\">alert('" . $mensaje . "')</script>";
            unset($_SESSION['mensaje']);
        }
        ?>        
   
        
         <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Dash_Board Administrador</title>     

        <!-- Bootstrap core CSS-->
        <link href="3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Page level plugin CSS-->
        <link href="3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/css/sb-admin.css" rel="stylesheet">
        <link rel="icon" href="Imagenes-proyecto_interfaz/logo1-grande.png">

        
        
        
        
        <!--<link rel="stylesheet" type="text/css" href="xxxx.css">-->
<!--        <style type="text/css">
            
            main{
                margin-left: 217px;
                margin-top: 61px;
            }
            #lista li {
                display:inline;
            }              
            #menu1{
                text-align:right;
            } 
        </style> -->
    </head>
    <body  class="fixed-nav sticky-footer bg-light" id="page-top"  >
        
        <div>
            
            
            
            
            
            
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            
                            <a class="navbar-brand" href="3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/index.php"><img src="./Imagenes-proyecto_interfaz/logo3-pequeño.png" width="17.5%" height="17.5%" alt="" title="CEVEN®_Dashboard" /> <!-- width="17.5%" height="17.5%" --> 
                                <img src="Imagenes-proyecto_interfaz/A-logo-ceven-pequeño.png" alt="" title="" /></img></a>

                            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="lista">
                                <ul class="navbar-nav navbar-sidenav" id="left">
                                    <br>
                                    
<!-- ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo -->
                                    <a class="nav-link" data-toggle="tooltip" data-placement="right" href="#" title="Administrador">
                                        <img src="Imagenes-proyecto_interfaz/usuarios/administrador-pequeño.png"  alt="" title="">
                                        <span class="nav-link-text">Administrador</span>
                                    </a></p>


                                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                                        <a class="nav-link" href="principal_1.php">
                                            <img src="Imagenes-proyecto_interfaz/dashboards/Inicio.png">
                                            <span class="nav-link-text">Inicio</span>
                                        </a>
                                    </li>
                                    </li>

<!--                                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Gestión de Eveser">
                                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseEve" data-parent="#exampleAccordion">
                                            <img src="Imagenes-proyecto_interfaz/dashboards/Gestion-Eveser.png">
                                            <span class="nav-link-text">Gestion de Eventos</span>
                                        </a>
                                        <ul class="sidenav-second-level collapse" id="collapseEve">-->


                              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="tablero de funciones">
                                  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsetab" data-parent="#exampleAccordion">
                                      <img src="Imagenes-proyecto_interfaz/dashboards/Gestion-Eveser.png">
                                      <span class="nav-link-text">Tablero de funciones</span>
                                        </a>
                                <nav>
                                    <ul class="sidenav-second-level collapse" id="collapsetab">
                                        <!--<li><a href="controladores/ControladorPrincipal.php?ruta=listarLibros">Gestión de Libros</a></li><br/>-->
                                        <li><a href="controladores/ControladorPrincipal.php?ruta=listarClientes">Gestión de Clientes</a></li><br/>
                                        <li><a href="controladores/ControladorPrincipal.php?ruta=listarEventos">Gestión de Eventos</a></li><br/>
                                        <li><a href="controladores/ControladorPrincipal.php?ruta=listarEveser">Servicios Asociados</a></li><br/>
                                        <li><a href="controladores/ControladorPrincipal.php?ruta=listarGestion">Gestión de los Eventos</a></li><br/>
                                    </ul>
                                        <?php if (isset($_SESSION['rolesEnSesion']) && in_array(1, $_SESSION['rolesEnSesion'])) { ?>
                <!--                            <li><a href="controladores/ControladorPrincipal.php?ruta=listarCargo">Gestión de Cargos</a></li>-->

                                         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Adminidtrador">
                                             <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseadm" data-parent="#exampleAccordion">
                                             <img src="Imagenes-proyecto_interfaz/dashboards/Gestion-Eveser.png">
                                             <span class="nav-link-text">Administrador</span>
                                             </a>
                                             <ul class="sidenav-second-level collapse" id="collapseadm">
                                            <li><a href="controladores/ControladorPrincipal.php?ruta=listarAsigRol">Asignar Cargo</a></li><br/>
                                            <li><a href="controladores/ControladorPrincipal.php?ruta=listarPersona_1">Gestión de Usuarios</a></li><br/>
                                            <li><a href="controladores/ControladorPrincipal.php?ruta=listarResponsable">Asignar Responsable</a></li><br/>
                                            <li><a href="controladores/ControladorPrincipal.php?ruta=listarServicios">Gestión de Servicios</a></li><br/>
                                            <li><a href="controladores/ControladorPrincipal.php?ruta=listarNivelPrecioServicio">Gestión de Precios Por Nivel</a></li>
                                        <?php } ?>
                                    </ul>
                                </nav>
                            </aside>
                                             <li>
                                        </ul>
                                    </li>
                               
                                </ul>
                                <ul class="navbar-nav sidenav-toggler">
                                    <li class="nav-item">
                                        <a class="nav-link text-center" id="sidenavToggler">
                                            <i class="fa fa-fw fa-angle-left"></i>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" data-toggle="tooltip" title="Nuevos Eventos" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-fw fa-envelope"></i>
                                            <span class="d-lg-none">Mensajes
                                                <span class="badge badge-pill badge-primary">Nuevos</span>
                                            </span>
                                            <span class="indicator text-primary d-none d-lg-block">
                                                <i class="fa fa-fw fa-circle"></i>
                                            </span>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="messagesDropdown">
                                            <h6 class="dropdown-header">Nuevos Eventos:</h6>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">

                                                <strong>David Barbosa</strong>
                                                <span class="small float-right text-muted">11:21 AM</span>
                                                <div class="dropdown-message small">CME <pre>                                    </pre></div>
                                            </a>
                                            <div class="dropdown-divider"></div>

                                            <a class="dropdown-item" href="#">
                                                <strong>Roberto Florido</strong>
                                                <span class="small float-right text-muted">01:21 PM</span>
                                                <div class="dropdown-message small">CME</div>
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">
                                                <strong>Hassler Cortez</strong>
                                                <span class="small float-right text-muted">01:21 PM</span>
                                                <div class="dropdown-message small">CME</div>
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item small" href="#">Ver Todos los mensajes...</a>
                                        </div>
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" 
                                           data-toggle="tooltip" title="Nuevas Alertas" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-fw fa-bell"></i>
                                            <span class="d-lg-none">Alertas
                                                <span class="badge badge-pill badge-warning">Nuevas</span>
                                            </span>
                                            <span class="indicator text-warning d-none d-lg-block">
                                                <i class="fa fa-fw fa-circle"></i>
                                            </span>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="alertsDropdown">
                                            <h6 class="dropdown-header">Alertas Nuevas:</h6>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">
                                                <span class="text-success">
                                                    <strong>

                                                        <i class="fa fa-long-arrow-up fa-fw"></i>Estado: Activo...</strong>
                                                </span>
                                                <span class="small float-right text-muted">11:21 AM</span>
                                                <div class="dropdown-message small">David Barbosa</div>
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">
                                                <span class="text-danger">
                                                    <strong>
                                                        <i class="fa fa-long-arrow-down fa-fw"></i>Estado: In-activo...</strong>
                                                </span>
                                                <span class="small float-right text-muted">01:21 PM</span>
                                                <div class="dropdown-message small">Roberto Florido</div>
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">
                                                <span class="text-success">
                                                    <strong>
                                                        <i class="fa fa-long-arrow-up fa-fw"></i>Estado: Activo...</strong>
                                                </span>
                                                <span class="small float-right text-muted">01:21 PM</span>
                                                <div class="dropdown-message small">Hassler Cortez</div>
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item small" href="#">Ver todas las Alertas...</a>

                                        </div>
                                    </li>
                <!--                    <li class="nav-item">
                                        <form class="form-inline my-2 my-lg-0 mr-lg-2">
                                            <div class="input-group">
                                                <input class="form-control" type="text" placeholder="Buscar...">
                                                <span class="input-group-append">
                                                    <button class="btn btn-primary" type="button">
                                                        <i class="fa fa-search"></i>-->
                                </ul>
                            </div>
        </nav>
                                
                                                   </button>
                                </span>
                            </div>
                        </form>
                    </li>


                    <li class="nav-item">
                        <a  class="nav-link" data-toggle="modal" data-target="#exampleModal" <a href="../../../../controladores/ControladorPrincipal.php?ruta=cerrarSesion">
                                Cerrar Sesion<i class="fa fa-fw fa-sign-out"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumbs-->
               
                <!-- /.container-fluid-->

                <!--<main class="fixed-nav sticky-footer bg-dark">-->
                    
           
            <main style="background-color: #dadada;">
                <?php
                if (isset($_GET['contenido'])) {
                    include($_GET['contenido']);
                }
                ?>
            </main>
            <!--            <footer>Ficha 1577350 R1</footer>-->
            
              <!-- /.content-wrapper-->

                <footer class="sticky-footer">
                    <div class="container">
                        <div class="text-center">
                            <small>Copyright© <strong>CEVEN®</strong> 2018</small>
                        </div>
                    </div>
                </footer>
                <!-- Scroll to Top Button-->
                <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fa fa-angle-up"></i>
                </a>
                <!-- Logout Modal-->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Quieres finalizar???</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Selecciona <u>Salir</u> para finalizar de lo contrario oprime <u>Cancelar</u>...</div>
                            <div class="modal-footer">

                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>

                                <a class="btn btn-primary" href="1_log-in/FloatinglabelsexampleforBootstrap.php"><strong><u>Salir</u></strong></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Bootstrap core JavaScript-->
                <script src="3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/vendor/jquery/jquery.min.js"></script>
                <script src="3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                <!-- Core plugin JavaScript-->
                <script src="3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/vendor/jquery-easing/jquery.easing.min.js"></script>
                <!-- Page level plugin JavaScript-->
                <script src="3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/vendor/chart.js/Chart.min.js"></script>
                <script src="3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/vendor/datatables/jquery.dataTables.js"></script>
                <script src="3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/vendor/datatables/dataTables.bootstrap4.js"></script>
                <!-- Custom scripts for all pages-->
                <script src="3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/js/sb-admin.min.js"></script>
                <!-- Custom scripts for this page-->
                <script src="3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/js/sb-admin-datatables.min.js"></script>
                <script src="3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/js/sb-admin-charts.min.js"></script>
 
        </div>
    </body>
</html>

