<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Administrador_Graficas</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link rel="icon" href="../../../Imagenes-proyecto_interfaz/logo1-grande.png">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

  <!-- Navigation-->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
     <a class="navbar-brand" href="index.php"><img src="../../../Imagenes-proyecto_interfaz/logo3-pequeño.png" alt="" title="CEVEN®_Dashboard" width="17.5%" height="17.5%" /><img src="../../../Imagenes-proyecto_interfaz/A-logo-ceven-pequeño.png" alt="" title="" /></img></a>

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
          <br>

          <a class="nav-link" data-toggle="tooltip" data-placement="right" href="navbar.php" title="Administrador">
          <img src="../../../Imagenes-proyecto_interfaz/usuarios/administrador-pequeño.png"  alt="" title="">
            <span class="nav-link-text">Administrador</span>
          </a></p>


          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
           <img src="../../../Imagenes-proyecto_interfaz/dashboards/Inicio.png">
            <span class="nav-link-text">Inicio</span>
          </a>
        </li>
      </li>



<!--<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Gestión de Tabla">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseTabla" data-parent="#exampleAccordion">
           <img src="../../../Imagenes-proyecto_interfaz/dashboards/gestion.png">
            <span class="nav-link-text">Gestion de Tabla</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseTabla">
            <li>
              <a href="#">- Tabla X1</a>
            </li>
            <li><li>
              <a href="#">- Tabla X2</a>
            </li>
            <li><li>
              <a href="#">- Tabla X3</a>
            </li>
            <li><li>
              <a href="#">- Tabla X4</a>
            </li>
            <li>
              <li>
              <a href="#">- Tabla X5</a>
            </li>
            <li>
          </ul>-->
        <!--</li>-->


<!--<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Gestión de Libros">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
           <img src="../../../Imagenes-proyecto_interfaz/dashboards/gestionlibros.png">
            <span class="nav-link-text">Gestion de Libros</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a href="#">- Lista de libros</a>
            </li>
            <li>
              <a href="#">- Agregar Libros</a>
            </li>
            <li>
          </ul>
        </li>-->



<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Gestión de Eveser">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseEve" data-parent="#exampleAccordion">
           <img src="../../../Imagenes-proyecto_interfaz/dashboards/Gestion-Eveser.png">
            <span class="nav-link-text">Gestion de Eventos</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseEve">
            
              <li><a href="listarRegistrosEveser1.php">- Eventos</a></li>
              <li><a href="listarRegistrosEveser2.php">- Servicios Asociados</a></li>
              
            <li>
          </ul>
        </li>



<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Gestión de Eveser">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseEves" data-parent="#exampleAccordion">
           <img src="../../../Imagenes-proyecto_interfaz/dashboards/Gestion-Eveser.png">
            <span class="nav-link-text">Gestionamiento</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseEves">
            <li>
              <a href="#">- Lista de Eventos</a>
            </li>
          </ul>
</li>



        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Graficas">
          <a class="nav-link" href="charts.php">
            <img src="../../../Imagenes-proyecto_interfaz/dashboards/graficas.png">
            <span class="nav-link-text">Graficas</span>
          </a>
        </li>


        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tablas">
            <a class="nav-link" href="tables.php">
          <img src="../../../Imagenes-proyecto_interfaz/dashboards/tablas.png">           
            <span class="nav-link-text">Tablas</span>
          </a>
        </li>

          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Configuraciones">
              <a class="nav-link" href="navbar.php">
          <img src="../../../Imagenes-proyecto_interfaz/dashboards/configuraciones.png">          
            <span class="nav-link-text">Configuraciones</span>
          </a>
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
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Buscar...">
              <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            Cerrar Sesion<i class="fa fa-fw fa-sign-out"></i></a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">     
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Graficas</li>
      </ol>
      <!-- Area Chart Example-->
      <div class="card mb-3">
        <div class="card-header">
          <img src="../../../Imagenes-proyecto_interfaz/dashboards/puntos.png"> Area de crecimiento de los Eventos</div>
        <div class="card-body">
          <canvas id="myAreaChart" width="100%" height="40"></canvas>
        </div>
        <div class="card-footer small text-muted">Actualizado hace: 37 segundos</div>
      </div>
      <div class="row">
        <div class="col-lg-8">
          <!-- Example Bar Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <img src="../../../Imagenes-proyecto_interfaz/dashboards/barras.png"> Crecimiento empresarial usando Ceven como herramienta</div>
            <div class="card-body">
              <canvas id="myBarChart" width="100" height="50"></canvas>
            </div>
            <div class="card-footer small text-muted">Actualizado hace: 39 segundos</div>
          </div>
        </div>
        <div class="col-lg-4">
          <!-- Example Pie Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <img src="../../../Imagenes-proyecto_interfaz/dashboards/torta.png"> Expectativas al usar Ceven</div>
            <div class="card-body">
              <canvas id="myPieChart" width="100%" height="100"></canvas>
            </div>
            <div class="card-footer small text-muted">Actualizado hace: 42 segundos</div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
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

            <a class="btn btn-primary" href="../../../1_log-in/FloatinglabelsexampleforBootstrap.php"><strong><u>Salir</u></strong></a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
