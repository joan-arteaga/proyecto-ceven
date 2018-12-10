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
        		<script>document.documentElement.className = 'js';</script>

    </head>
    <body  class="fixed-nav sticky-footer bg-light" id="page-top"  >
        
        <div>
            
            
            
            
            
            
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            
            <a class="navbar-brand" href="principal.php"><img src="./Imagenes-proyecto_interfaz/logo3-pequeño.png" width="17.5%" height="17.5%" alt="" title="CEVEN®_Dashboard" /> <!-- width="17.5%" height="17.5%" --> 
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
                        <a class="nav-link" data-toggle="modal" data-target="#exampleModal" <a href="../../../../controladores/ControladorPrincipal.php?ruta=cerrarSesion">
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
                    
           
            <main class="fixed-nav sticky-footer bg-dark">
                <link href="https://fonts.googleapis.com/css?family=Gochi+Hand" rel="stylesheet">
                <link rel="stylesheet" type="text/css" href="3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/css1/normalize.css" />
                <link rel="stylesheet" type="text/css" href="3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/css1/demo.css" />
                <link rel="stylesheet" type="text/css" href="3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/css1/slideshow.css" />
                <link rel="stylesheet" type="text/css" href="3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/css1/slideshow_layouts.css" />
		
                
                
              <svg class="hidden">
			<defs>
				<symbol id="icon-arrow" viewBox="0 0 24 24">
					<title>arrow</title>
					<polygon points="6.3,12.8 20.9,12.8 20.9,11.2 6.3,11.2 10.2,7.2 9,6 3.1,12 9,18 10.2,16.8 "/>
				</symbol>
				<symbol id="icon-drop" viewBox="0 0 24 24">
					<title>drop</title>
					<path d="M12,21c-3.6,0-6.6-3-6.6-6.6C5.4,11,10.8,4,11.4,3.2C11.6,3.1,11.8,3,12,3s0.4,0.1,0.6,0.3c0.6,0.8,6.1,7.8,6.1,11.2C18.6,18.1,15.6,21,12,21zM12,4.8c-1.8,2.4-5.2,7.4-5.2,9.6c0,2.9,2.3,5.2,5.2,5.2s5.2-2.3,5.2-5.2C17.2,12.2,13.8,7.3,12,4.8z"/><path d="M12,18.2c-0.4,0-0.7-0.3-0.7-0.7s0.3-0.7,0.7-0.7c1.3,0,2.4-1.1,2.4-2.4c0-0.4,0.3-0.7,0.7-0.7c0.4,0,0.7,0.3,0.7,0.7C15.8,16.5,14.1,18.2,12,18.2z"/>
				</symbol>
				<symbol id="icon-prev" viewBox="0 0 100 50">
					<title>prev</title>
					<polygon points="5.4,25 18.7,38.2 22.6,34.2 16.2,27.8 94.6,27.8 94.6,22.2 16.2,22.2 22.6,15.8 18.7,11.8"/>
				</symbol>
				<symbol id="icon-next" viewBox="0 0 100 50">
					<title>next</title>
					<polygon points="81.3,11.8 77.4,15.8 83.8,22.2 5.4,22.2 5.4,27.8 83.8,27.8 77.4,34.2 81.3,38.2 94.6,25 "/>
				</symbol>
				<symbol id="icon-octicon" viewBox="0 0 24 24">
					<title>octicon</title>
					<path d="M12,2.2C6.4,2.2,1.9,6.7,1.9,12.2c0,4.4,2.9,8.2,6.9,9.6c0.5,0.1,0.7-0.2,0.7-0.5c0-0.2,0-0.9,0-1.7c-2.8,0.6-3.4-1.4-3.4-1.4C5.6,17.1,5,16.8,5,16.8C4.1,16.2,5,16.2,5,16.2c1,0.1,1.5,1,1.5,1c0.9,1.5,2.4,1.1,2.9,0.8c0.1-0.7,0.4-1.1,0.6-1.3c-2.2-0.3-4.6-1.1-4.6-5c0-1.1,0.4-2,1-2.7C6.5,8.8,6.2,7.7,6.7,6.4c0,0,0.8-0.3,2.8,1C10.3,7.2,11.1,7.1,12,7c0.9,0,1.7,0.1,2.5,0.3c1.9-1.3,2.8-1,2.8-1c0.5,1.4,0.2,2.4,0.1,2.7c0.6,0.7,1,1.6,1,2.7c0,3.9-2.4,4.7-4.6,5c0.4,0.3,0.7,0.9,0.7,1.9c0,1.3,0,2.4,0,2.8c0,0.3,0.2,0.6,0.7,0.5c4-1.3,6.9-5.1,6.9-9.6C22.1,6.7,17.6,2.2,12,2.2z" />
				</symbol>
				<!-- From Karen Menezes: https://www.smashingmagazine.com/2015/05/creating-responsive-shapes-with-clip-path/ -->
				<clipPath id="polygon-clip-rhomboid" clipPathUnits="objectBoundingBox">
					<polygon points="0 1, 0.3 0, 1 0, 0.7 1" />
				</clipPath>
			</defs>
		</svg>
		<main>
			<div class="slideshow" tabindex="0">
				<div class="slide slide--layout-1" data-layout="layout1">
					<div class="slide-imgwrap">
						<div class="slide__img"><div class="slide__img-inner" style="background-image: url(3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/Fotos/Bebidas/2.jpg);"></div></div>
						<div class="slide__img"><div class="slide__img-inner" style="background-image: url(3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/Fotos/Menaje/1.jpg);"></div></div>
						<div class="slide__img"><div class="slide__img-inner" style="background-image: url(3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/Fotos/Ponque/3.jpg);"></div></div>
					</div>
					<div class="slide__title">
						<h3 class="slide__title-main">CEVEN </h3><h1>catering</h1>
						<p class="slide__title-sub">CEVEN es una herramienta que piensa en las necesidades y problemas que hay en el sector de la organización de eventos. <!--aqui ir al home--><a href="#">leer mas</a></p>
					</div>
				</div><!-- /slide -->
				<div class="slide slide--layout-2" data-layout="layout2">
					<div class="slide-imgwrap">
						<div class="slide__img"><div class="slide__img-inner" style="background-image: url(3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/img/6.jpg);"></div></div>
						<div class="slide__img"><div class="slide__img-inner" style="background-image: url(3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/img/5.jpg);"></div></div>
						<div class="slide__img"><div class="slide__img-inner" style="background-image: url(3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/img/6.jpg);"></div></div>
						<div class="slide__img"><div class="slide__img-inner" style="background-image: url(3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/img/7.jpg);"></div></div>
						<div class="slide__img"><div class="slide__img-inner" style="background-image: url(3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/img/9.jpg);"><h4 class="slide__img-caption"><strong>Ceven </strong>cualquier evento aqui...</h4></div></div>
					</div>
					<div class="slide__title">
						<h3 class="slide__title-main">Busqueda de eventos</h3>
						<p class="slide__title-sub">Estamos agrupando la mayor base de datos sobre eventos en nuestra plataforma web para que puedas disfrutar de ellos</p>
					</div>
				</div><!-- /slide -->
				<div class="slide slide--layout-3" data-layout="layout3">
					<div class="slide-imgwrap">
						<div class="slide__img"><div class="slide__img-inner" style="background-image: url(3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/img/9.jpg);"></div></div>
						<div class="slide__img"><div class="slide__img-inner" style="background-image: url(3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/img/10.jpg);"></div></div>
						<div class="slide__img"><div class="slide__img-inner" style="background-image: url(3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/img/11.jpg);"></div></div>
						<div class="slide__img"><div class="slide__img-inner" style="background-image: url(3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/img/15.jpg);"></div></div>
						<div class="slide__img"><div class="slide__img-inner" style="background-image: url(3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/img/13.jpg);"></div></div>
						<div class="slide__img"><div class="slide__img-inner" style="background-image: url(3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/img/14.jpg);"></div></div>
						<div class="slide__img"><div class="slide__img-inner" style="background-image: url(3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/Fotos/Sonidoa/1.jpg);"></div>
					</div>
					</div>
					<div class="slide__title">
						<h3 class="slide__title-main">El mejor ambiente</h3>
						<p class="slide__title-sub">Recolectamos informacion de los lugares donde puedes realizar tus eventos y los mejores costos...</p>
					</div>
				</div><!-- /slide -->
				<div class="slide slide--layout-4" data-layout="layout4">
					<div class="slide-imgwrap">
						<div class="slide__img"><div class="slide__img-inner" style="background-image: url(3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/Fotos/Buffet/1.jpg);"></div></div>
						<div class="slide__img"><div class="slide__img-inner" style="background-image: url(3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/Fotos/Buffet/2.jpg);"></div></div>
						<div class="slide__img"><div class="slide__img-inner" style="background-image: url(3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/Fotos/Buffet/3.jpg);"></div></div>
						<div class="slide__img"><div class="slide__img-inner" style="background-image: url(3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/Fotos/Principal/20.jpg);"></div></div>
					</div>
					<div class="slide__title">
						<h3 class="slide__title-main">La comida</h3>
						<p class="slide__title-sub">Contacta a los mejores chef para realizar el mejor buffet en tu evento soñado</p>
					</div>
				</div><!-- /slide -->
<!-- /slide -->
				<div class="slide slide--layout-6" data-layout="layout6">
					<div class="slide-imgwrap">
						<div class="slide__img"><div class="slide__img-inner" style="background-image: url(3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/Fotos/Personal/2.jpg);"></div></div>
						<div class="slide__img"><div class="slide__img-inner" style="background-image: url(3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/Fotos/Principal/6.jpg);"></div></div>
						<div class="slide__img"><div class="slide__img-inner" style="background-image: url(3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/Fotos/Personal/1.jpg);"></div></div>
					</div>
					<div class="slide__title">
						<h3 class="slide__title-main">El servicio</h3>
						<p class="slide__title-sub">Contamos con el mejor servicio y atencion a nuestros clientes, ofrecido por la casa de eventos.</p>
					</div>
				</div><!-- /slide -->

				</div><!-- /slide -->
				<nav class="slideshow__nav slideshow__nav--arrows">
					
					<button id="next-slide" class="btn btn--arrow" aria-label="Next slide"><svg class="icon icon--next"><use xlink:href="#icon-next"></use></svg></button>
				</nav>
			</div><!-- /slideshow -->

			<!-- Related demos -->
			<section class="content content--related">
				
      <p class="mt-5 mb-3 text-muted text-center"><strong>CEVEN </strong>© 2018</p>
				
			</section>
		</main>
                                    <script src="3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/js1/imagesloaded.pkgd.min.js"></script>
		<script src="3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/js1/anime.min.js"></script>
		<script src="3_dashboards/administrador/startbootstrap-sb-admin-gh-pages/js1/main.js"></script>
		<script>
		(function() {
			var slideshow = new MLSlideshow(document.querySelector('.slideshow'));

			document.querySelector('#next-slide').addEventListener('click', function() {
				slideshow.next();
			});

			document.querySelector('#prev-slide').addEventListener('click', function() {
				slideshow.prev();
			});
		})();
		</script>
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

                                <a class="btn btn-primary" href="login.php"><strong><u>Salir</u></strong></a>
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

