<?php session_start();  ?>
<?php
include_once '../../../../controladores/ManejoSesiones/BloqueDeSeguridad.php';
$seguridad = new BloqueDeSeguridad();
$seguridad->seguridad("login.php");
?>
<!DOCTYPE html>
<html>
<head>
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
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link rel="icon" href="../../../Imagenes-proyecto_interfaz/logo1-grande.png">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <a class="navbar-brand" href="index.php"><img src="../../../Imagenes-proyecto_interfaz/logo3-pequeño.png" width="17.5%" height="17.5%" alt="" title="CEVEN®_Dashboard" /> <!-- width="17.5%" height="17.5%" --> 
      <img src="../../../Imagenes-proyecto_interfaz/A-logo-ceven-pequeño.png" alt="" title="" /></img></a>
      
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="lista">
      <ul class="navbar-nav navbar-sidenav" id="left">
          <br>

          <a class="nav-link" data-toggle="tooltip" data-placement="right" href="index.php" title="Administrador">
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


<!--
<li class="nav-item" id="menu" data-toggle="tooltip" data-placement="right" title="Gestión de Tabla">
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
          </ul>
        </li>-->


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
            
              <li><a href="../../../../controladores/ControladorPrincipal.php?ruta=listarDeEveser">- Eventos</a></li>
              <li><a href="../../../../controladores/ControladorPrincipal.php?ruta=listarSerAso">- Servicios Asociados</a></li>
              
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
<!--            <li>
              <a href="#">- Agregar Eventos</a>
            </li>-->
<!--</li>
                        <li><a href="../../../../controladores/ControladorPrincipal.php?ruta=listarCargo">Gestión de Cargos</a></li>
                        <li><a href="../../../../controladores/ControladorPrincipal.php?ruta=listarEmpleados">Gestión de Empleados</a></li>
                        <li><a href="../../../../controladores/ControladorPrincipal.php?ruta=listarClientes">Gestión de Clientes</a></li>
                        <li><a href="../../../../controladores/ControladorPrincipal.php?ruta=listarServicios">Gestión de Servicios</a></li>
                        <li><a href="../../../../controladores/ControladorPrincipal.php?ruta=listarNivelPrecioServicio">Gestión de Precios Por Nivel</a></li>
                   -->
            <!--<li>-->
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
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal" <a href="../../../../controladores/ControladorPrincipal.php?ruta=cerrarSesion">
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
        <li class="breadcrumb-item active">Mi Dashboard</li>
      </ol>
      
      
    <!-- /.container-fluid-->
   
            <main style="background-color: #dadada;">

                <style type="text/css">
    .derecha   { float: right; }
    .izquierda { float: left;  }
    fieldset.scheduler-border {
        border: 1px groove #ddd !important;
        padding: 0 1.4em 1.4em 1.4em !important;
        margin: 0 0 1.5em 0 !important;
        -webkit-box-shadow:  0px 0px 0px 0px #000;
        box-shadow:  0px 0px 0px 0px #000;
    }

    legend.scheduler-border {
        font-size: 1.2em !important;
        font-weight: bold !important;
        text-align: left !important;

    }  
    table th {
        text-align: center;
    }
    table tr {
        text-align: center;
    }
    thead th{
        color: #79008E;
        font-weight: normal;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Gestión de Eventos way!</h1>
        </div>                        
        <!-- /.col-lg-12 -->    
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
<div>
<fieldset class="scheduler-border"><legend class="scheduler-border">FILTRO</legend>

        <form name="formFiltroEveser" action="controladores/ControladorPrincipal.php" method="POST">
            <input type="hidden" name="ruta" value="listarDeEveser">
            <table> 
                <tbody><tr><td>Id Evento:</td><td><input type="number" name="eveId" onclick="" value=""></td>
                    <td>
                                            </td>                        
                </tr> 
                <tr><td>Fecha Inicial:</td><td> <input type="date" name="eveFechaInicial" onclick="" value=""></td>
                    <td>
                                            </td>                          
                </tr> 
                <tr><td>Cantidad de personas:</td><td> <input type="number" onclick="" name="eveCantidadPax" value=""></td>
                    <td>
                                            </td>                          
                </tr> 
                <tr><td>Estado Del Evento: </td><td><input type="number" onclick="" name="eveEstado" value=""></td>
                    <td>
                                            </td>                          
                </tr>                   
                <tr><td>Documento Del Cliente: </td><td><input type="number" onclick="" name="cliDocumento" value=""></td>
                    <td>
                                            </td>                          
                </tr>                   
                <tr><td>CATEGORIA </td>
                    <td>
                        <select id="categoriaLibro_catLibId" name="categoriaLibro_catLibId">                    
                            
Notice:  Undefined variable: cantCategorias in C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php on line 190
                        </select> 
                    </td>
                    <td></td>                          
                </tr>            
                                    
                <tr><td><input type="submit" value="Filtrar" name="enviar" title="Si es necesario limpie 'Buscar'"></td>
                    <td><input type="reset" value="limpiar" onclick="
                            javascript:document.formFiltroLibros.eveId.value = '';
                            javascript:document.formFiltroLibros.eveFechaInicial.value = '';
                            javascript:document.formFiltroLibros.eveCantidadPax.value = '';
                            javascript:document.formFiltroLibros.eveEstado.value = '';
                            javascript:document.formFiltroLibros.Eventos_eveId.value = '';
                            javascript:document.formFiltroLibros.cliDocumento.value = '';
                            javascript:document.formFiltroLibros.cliApellido1.value = '';
                            javascript:document.formFiltroLibros.cliApellido2.value = '';
                            javascript:document.formFiltroLibros.cliEstado.value = '';
                            javascript:document.formFiltroLibros.submit();
                               "></td><td></td></tr> 
            </tbody></table>
        </form>
    </fieldset>
</div>
<fieldset class="scheduler-border"><legend class="scheduler-border">BUSCAR</legend>

    <div style="width: 800">
        <span class="izquierdo">
            <!--NUEVO BOTÓN PARA BUSCAR*************************-->
            <form name="formBuscarEventos" action="controladores/ControladorPrincipal.php" method="POST">
                <input type="hidden" name="ruta" value="listarDeEveser">
                <input type="text" name="buscar" placeholder="Término a Buscar" value="">
                <input type="submit" value="Buscar" title="Si es necesario limpie 'Filtrar'">&nbsp;&nbsp;||&nbsp;&nbsp;
                <input type="button" value="Limpiar Búsqueda" onclick="javascript:document.formBuscarLibros.buscar.value = '';
                        javascript:document.formBuscarLibros.submit();">
            </form>
        </span>
    </div>        
</fieldset>
<br>
<div style="width: 800">
    <span class="izquierdo">
        <!--NUEVO BOTÓN PARA DARLE FUNCIONALIDAD*************************-->

        <input type="button" onclick="javascript:location.href = 'principal.php?contenido=vistas/vistasLibros/vistaInsertarEveser.php'" value="Nuevo Libro">

    </span>
</div>
<br>
<a name="listaDeEveser" id="a"></a>
<div style="width: 800">
    <p>Total de Registros: 15</p>
    <table border="1">
        <thead>
            <tr>
                <td style="width: 100">Id Evento</td>
                <td style="width: 100">Fecha Inicial</td>
                <td style="width: 100">Cantidad de Personas</td>
                <td style="width: 100">Estado Evento</td>
<!--                <td style="width: 100">Eventos Id</td>-->
                <td style="width: 100">Documento Del Cliente</td>
                <td style="width: 100">1er Apellido Del Cliente</td>
                <td style="width: 100">2er Apellido Del Cliente</td>
                <td style="width: 100">Estado Del Cliente </td>
                <td style="width: 100" colspan="2">Acciones</td>
            </tr>
        </thead> 
                    <tbody><tr>
                <td style="width: 100">1</td>
                <td style="width: 100">2017-02-11 00:00:00</td>
                <td style="width: 100">61</td>
                <td style="width: 100">1</td>
<!--                <td style="width: 100">1</td>;-->
                <td style="width: 100">1943245013</td>
                <td style="width: 100">Castro</td>
                <td style="width: 100">Florido</td>
<!--                <td style="width: 100">1</td>;
                <td style="width: 100">Buffet con 2 carnes servido a la mesa</td>;
                <td style="width: 100">Menú 2 carnes (130 gr. c/u) , arroz, ensalada, acompañamiento, postre, bebida</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100"><br />
<b>Notice</b>:  Undefined property: stdClass::$nivelesServicio_nidId in <b>C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php</b> on line <b>296</b><br />
</td>;
                <td style="width: 100">66300</td>;
                <td style="width: 100">1989000</td>;
                <td style="width: 100">333</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100">29</td>;
                <td style="width: 100">6</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100">1412965874</td>;
                <td style="width: 100">Felipe</td>;
                <td style="width: 100">Fernandez</td>;-->
                <td style="width: 100"><a href="controladores/ControladorPrincipal.php?ruta=actualizarLibro&amp;idAct=&lt;br /&gt;&#10;&lt;b&gt;Notice&lt;/b&gt;:  Undefined property: stdClass::$isbn in &lt;b&gt;C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php&lt;/b&gt; on line &lt;b&gt;309&lt;/b&gt;&lt;br /&gt;&#10;">Actualizar</a></td>
                <td style="width: 100">  <a href="controladores/ControladorPrincipal.php?ruta=eliminarLibro&amp;idAct=&lt;br /&gt;&#10;&lt;b&gt;Notice&lt;/b&gt;:  Undefined property: stdClass::$isbn in &lt;b&gt;C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php&lt;/b&gt; on line &lt;b&gt;310&lt;/b&gt;&lt;br /&gt;&#10;">Eliminar</a></td>
                </tr><tr>            </tr><tr>
                <td style="width: 100">1</td>
                <td style="width: 100">2017-02-11 00:00:00</td>
                <td style="width: 100">61</td>
                <td style="width: 100">1</td>
<!--                <td style="width: 100">1</td>;-->
                <td style="width: 100">1943245013</td>
                <td style="width: 100">Castro</td>
                <td style="width: 100">Florido</td>
<!--                <td style="width: 100">1</td>;
                <td style="width: 100">Buffet con 2 carnes servido a la mesa</td>;
                <td style="width: 100">Menú 2 carnes (130 gr. c/u) , arroz, ensalada, acompañamiento, postre, bebida</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100"><br />
<b>Notice</b>:  Undefined property: stdClass::$nivelesServicio_nidId in <b>C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php</b> on line <b>296</b><br />
</td>;
                <td style="width: 100">42493</td>;
                <td style="width: 100">6374000</td>;
                <td style="width: 100">66</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100">13</td>;
                <td style="width: 100">140</td>;
                <td style="width: 100">149</td>;
                <td style="width: 100">6</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100">1412965874</td>;
                <td style="width: 100">Felipe</td>;
                <td style="width: 100">Fernandez</td>;-->
                <td style="width: 100"><a href="controladores/ControladorPrincipal.php?ruta=actualizarLibro&amp;idAct=&lt;br /&gt;&#10;&lt;b&gt;Notice&lt;/b&gt;:  Undefined property: stdClass::$isbn in &lt;b&gt;C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php&lt;/b&gt; on line &lt;b&gt;309&lt;/b&gt;&lt;br /&gt;&#10;">Actualizar</a></td>
                <td style="width: 100">  <a href="controladores/ControladorPrincipal.php?ruta=eliminarLibro&amp;idAct=&lt;br /&gt;&#10;&lt;b&gt;Notice&lt;/b&gt;:  Undefined property: stdClass::$isbn in &lt;b&gt;C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php&lt;/b&gt; on line &lt;b&gt;310&lt;/b&gt;&lt;br /&gt;&#10;">Eliminar</a></td>
                </tr><tr>            </tr><tr>
                <td style="width: 100">1</td>
                <td style="width: 100">2017-02-11 00:00:00</td>
                <td style="width: 100">61</td>
                <td style="width: 100">1</td>
<!--                <td style="width: 100">1</td>;-->
                <td style="width: 100">1943245013</td>
                <td style="width: 100">Castro</td>
                <td style="width: 100">Florido</td>
<!--                <td style="width: 100">1</td>;
                <td style="width: 100">Decoración</td>;
                <td style="width: 100">Centros de mesa, decoración mesa de ponqué, , antorchas, petalos y cofre</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100"><br />
<b>Notice</b>:  Undefined property: stdClass::$nivelesServicio_nidId in <b>C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php</b> on line <b>296</b><br />
</td>;
                <td style="width: 100">47875</td>;
                <td style="width: 100">3830000</td>;
                <td style="width: 100">125</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100">6</td>;
                <td style="width: 100">70</td>;
                <td style="width: 100">79</td>;
                <td style="width: 100">6</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100">1412965874</td>;
                <td style="width: 100">Felipe</td>;
                <td style="width: 100">Fernandez</td>;-->
                <td style="width: 100"><a href="controladores/ControladorPrincipal.php?ruta=actualizarLibro&amp;idAct=&lt;br /&gt;&#10;&lt;b&gt;Notice&lt;/b&gt;:  Undefined property: stdClass::$isbn in &lt;b&gt;C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php&lt;/b&gt; on line &lt;b&gt;309&lt;/b&gt;&lt;br /&gt;&#10;">Actualizar</a></td>
                <td style="width: 100">  <a href="controladores/ControladorPrincipal.php?ruta=eliminarLibro&amp;idAct=&lt;br /&gt;&#10;&lt;b&gt;Notice&lt;/b&gt;:  Undefined property: stdClass::$isbn in &lt;b&gt;C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php&lt;/b&gt; on line &lt;b&gt;310&lt;/b&gt;&lt;br /&gt;&#10;">Eliminar</a></td>
                </tr><tr>            </tr><tr>
                <td style="width: 100">1</td>
                <td style="width: 100">2017-02-11 00:00:00</td>
                <td style="width: 100">61</td>
                <td style="width: 100">1</td>
<!--                <td style="width: 100">1</td>;-->
                <td style="width: 100">1943245013</td>
                <td style="width: 100">Castro</td>
                <td style="width: 100">Florido</td>
<!--                <td style="width: 100">1</td>;
                <td style="width: 100">Decoración</td>;
                <td style="width: 100">Centros de mesa, decoración mesa de ponqué, , antorchas, petalos y cofre</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100"><br />
<b>Notice</b>:  Undefined property: stdClass::$nivelesServicio_nidId in <b>C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php</b> on line <b>296</b><br />
</td>;
                <td style="width: 100">41361</td>;
                <td style="width: 100">7445000</td>;
                <td style="width: 100">55</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100">16</td>;
                <td style="width: 100">170</td>;
                <td style="width: 100">179</td>;
                <td style="width: 100">6</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100">1412965874</td>;
                <td style="width: 100">Felipe</td>;
                <td style="width: 100">Fernandez</td>;-->
                <td style="width: 100"><a href="controladores/ControladorPrincipal.php?ruta=actualizarLibro&amp;idAct=&lt;br /&gt;&#10;&lt;b&gt;Notice&lt;/b&gt;:  Undefined property: stdClass::$isbn in &lt;b&gt;C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php&lt;/b&gt; on line &lt;b&gt;309&lt;/b&gt;&lt;br /&gt;&#10;">Actualizar</a></td>
                <td style="width: 100">  <a href="controladores/ControladorPrincipal.php?ruta=eliminarLibro&amp;idAct=&lt;br /&gt;&#10;&lt;b&gt;Notice&lt;/b&gt;:  Undefined property: stdClass::$isbn in &lt;b&gt;C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php&lt;/b&gt; on line &lt;b&gt;310&lt;/b&gt;&lt;br /&gt;&#10;">Eliminar</a></td>
                </tr><tr>            </tr><tr>
                <td style="width: 100">1</td>
                <td style="width: 100">2017-02-11 00:00:00</td>
                <td style="width: 100">61</td>
                <td style="width: 100">1</td>
<!--                <td style="width: 100">1</td>;-->
                <td style="width: 100">1943245013</td>
                <td style="width: 100">Castro</td>
                <td style="width: 100">Florido</td>
<!--                <td style="width: 100">1</td>;
                <td style="width: 100">Sonido y ambientación</td>;
                <td style="width: 100">Amplificación de sonido, luces (opcional), dj</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100"><br />
<b>Notice</b>:  Undefined property: stdClass::$nivelesServicio_nidId in <b>C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php</b> on line <b>296</b><br />
</td>;
                <td style="width: 100">46133</td>;
                <td style="width: 100">4152000</td>;
                <td style="width: 100">111</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100">7</td>;
                <td style="width: 100">80</td>;
                <td style="width: 100">89</td>;
                <td style="width: 100">6</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100">1412965874</td>;
                <td style="width: 100">Felipe</td>;
                <td style="width: 100">Fernandez</td>;-->
                <td style="width: 100"><a href="controladores/ControladorPrincipal.php?ruta=actualizarLibro&amp;idAct=&lt;br /&gt;&#10;&lt;b&gt;Notice&lt;/b&gt;:  Undefined property: stdClass::$isbn in &lt;b&gt;C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php&lt;/b&gt; on line &lt;b&gt;309&lt;/b&gt;&lt;br /&gt;&#10;">Actualizar</a></td>
                <td style="width: 100">  <a href="controladores/ControladorPrincipal.php?ruta=eliminarLibro&amp;idAct=&lt;br /&gt;&#10;&lt;b&gt;Notice&lt;/b&gt;:  Undefined property: stdClass::$isbn in &lt;b&gt;C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php&lt;/b&gt; on line &lt;b&gt;310&lt;/b&gt;&lt;br /&gt;&#10;">Eliminar</a></td>
                </tr><tr>            </tr><tr>
                <td style="width: 100">1</td>
                <td style="width: 100">2017-02-11 00:00:00</td>
                <td style="width: 100">61</td>
                <td style="width: 100">1</td>
<!--                <td style="width: 100">1</td>;-->
                <td style="width: 100">1943245013</td>
                <td style="width: 100">Castro</td>
                <td style="width: 100">Florido</td>
<!--                <td style="width: 100">1</td>;
                <td style="width: 100">Sonido y ambientación</td>;
                <td style="width: 100">Amplificación de sonido, luces (opcional), dj</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100"><br />
<b>Notice</b>:  Undefined property: stdClass::$nivelesServicio_nidId in <b>C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php</b> on line <b>296</b><br />
</td>;
                <td style="width: 100">41741</td>;
                <td style="width: 100">7096000</td>;
                <td style="width: 100">58</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100">15</td>;
                <td style="width: 100">160</td>;
                <td style="width: 100">169</td>;
                <td style="width: 100">6</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100">1412965874</td>;
                <td style="width: 100">Felipe</td>;
                <td style="width: 100">Fernandez</td>;-->
                <td style="width: 100"><a href="controladores/ControladorPrincipal.php?ruta=actualizarLibro&amp;idAct=&lt;br /&gt;&#10;&lt;b&gt;Notice&lt;/b&gt;:  Undefined property: stdClass::$isbn in &lt;b&gt;C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php&lt;/b&gt; on line &lt;b&gt;309&lt;/b&gt;&lt;br /&gt;&#10;">Actualizar</a></td>
                <td style="width: 100">  <a href="controladores/ControladorPrincipal.php?ruta=eliminarLibro&amp;idAct=&lt;br /&gt;&#10;&lt;b&gt;Notice&lt;/b&gt;:  Undefined property: stdClass::$isbn in &lt;b&gt;C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php&lt;/b&gt; on line &lt;b&gt;310&lt;/b&gt;&lt;br /&gt;&#10;">Eliminar</a></td>
                </tr><tr>            </tr><tr>
                <td style="width: 100">2</td>
                <td style="width: 100">2017-02-11 00:00:00</td>
                <td style="width: 100">72</td>
                <td style="width: 100">0</td>
<!--                <td style="width: 100">2</td>;-->
                <td style="width: 100">1392811654</td>
                <td style="width: 100">Cortés</td>
                <td style="width: 100">Castro</td>
<!--                <td style="width: 100">1</td>;
                <td style="width: 100">Menaje</td>;
                <td style="width: 100">Vajilla, cubiertos, cristalería y utensilios de servicio</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100"><br />
<b>Notice</b>:  Undefined property: stdClass::$nivelesServicio_nidId in <b>C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php</b> on line <b>296</b><br />
</td>;
                <td style="width: 100">48714</td>;
                <td style="width: 100">3410000</td>;
                <td style="width: 100">142</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100">5</td>;
                <td style="width: 100">60</td>;
                <td style="width: 100">69</td>;
                <td style="width: 100">7</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100">70365124</td>;
                <td style="width: 100">Santiago</td>;
                <td style="width: 100">Garzon</td>;-->
                <td style="width: 100"><a href="controladores/ControladorPrincipal.php?ruta=actualizarLibro&amp;idAct=&lt;br /&gt;&#10;&lt;b&gt;Notice&lt;/b&gt;:  Undefined property: stdClass::$isbn in &lt;b&gt;C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php&lt;/b&gt; on line &lt;b&gt;309&lt;/b&gt;&lt;br /&gt;&#10;">Actualizar</a></td>
                <td style="width: 100">  <a href="controladores/ControladorPrincipal.php?ruta=eliminarLibro&amp;idAct=&lt;br /&gt;&#10;&lt;b&gt;Notice&lt;/b&gt;:  Undefined property: stdClass::$isbn in &lt;b&gt;C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php&lt;/b&gt; on line &lt;b&gt;310&lt;/b&gt;&lt;br /&gt;&#10;">Eliminar</a></td>
                </tr><tr>            </tr><tr>
                <td style="width: 100">3</td>
                <td style="width: 100">2017-02-12 00:00:00</td>
                <td style="width: 100">178</td>
                <td style="width: 100">1</td>
<!--                <td style="width: 100">3</td>;-->
                <td style="width: 100">1390793489</td>
                <td style="width: 100">Castro</td>
                <td style="width: 100">Jimenez</td>
<!--                <td style="width: 100">1</td>;
                <td style="width: 100">Mantelería y mobiliario</td>;
                <td style="width: 100">Manteles, tapas, forros de sillas, fajones, servilletas, mesas y sillas necesarias</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100"><br />
<b>Notice</b>:  Undefined property: stdClass::$nivelesServicio_nidId in <b>C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php</b> on line <b>296</b><br />
</td>;
                <td style="width: 100">43253</td>;
                <td style="width: 100">5623000</td>;
                <td style="width: 100">76</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100">11</td>;
                <td style="width: 100">120</td>;
                <td style="width: 100">129</td>;
                <td style="width: 100">4</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100">53123789</td>;
                <td style="width: 100">Nelson</td>;
                <td style="width: 100">Caceres</td>;-->
                <td style="width: 100"><a href="controladores/ControladorPrincipal.php?ruta=actualizarLibro&amp;idAct=&lt;br /&gt;&#10;&lt;b&gt;Notice&lt;/b&gt;:  Undefined property: stdClass::$isbn in &lt;b&gt;C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php&lt;/b&gt; on line &lt;b&gt;309&lt;/b&gt;&lt;br /&gt;&#10;">Actualizar</a></td>
                <td style="width: 100">  <a href="controladores/ControladorPrincipal.php?ruta=eliminarLibro&amp;idAct=&lt;br /&gt;&#10;&lt;b&gt;Notice&lt;/b&gt;:  Undefined property: stdClass::$isbn in &lt;b&gt;C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php&lt;/b&gt; on line &lt;b&gt;310&lt;/b&gt;&lt;br /&gt;&#10;">Eliminar</a></td>
                </tr><tr>            </tr><tr>
                <td style="width: 100">3</td>
                <td style="width: 100">2017-02-12 00:00:00</td>
                <td style="width: 100">178</td>
                <td style="width: 100">1</td>
<!--                <td style="width: 100">3</td>;-->
                <td style="width: 100">1390793489</td>
                <td style="width: 100">Castro</td>
                <td style="width: 100">Jimenez</td>
<!--                <td style="width: 100">1</td>;
                <td style="width: 100">Mantelería y mobiliario</td>;
                <td style="width: 100">Manteles, tapas, forros de sillas, fajones, servilletas, mesas y sillas necesarias</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100"><br />
<b>Notice</b>:  Undefined property: stdClass::$nivelesServicio_nidId in <b>C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php</b> on line <b>296</b><br />
</td>;
                <td style="width: 100">42118</td>;
                <td style="width: 100">6739000</td>;
                <td style="width: 100">62</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100">14</td>;
                <td style="width: 100">150</td>;
                <td style="width: 100">159</td>;
                <td style="width: 100">4</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100">53123789</td>;
                <td style="width: 100">Nelson</td>;
                <td style="width: 100">Caceres</td>;-->
                <td style="width: 100"><a href="controladores/ControladorPrincipal.php?ruta=actualizarLibro&amp;idAct=&lt;br /&gt;&#10;&lt;b&gt;Notice&lt;/b&gt;:  Undefined property: stdClass::$isbn in &lt;b&gt;C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php&lt;/b&gt; on line &lt;b&gt;309&lt;/b&gt;&lt;br /&gt;&#10;">Actualizar</a></td>
                <td style="width: 100">  <a href="controladores/ControladorPrincipal.php?ruta=eliminarLibro&amp;idAct=&lt;br /&gt;&#10;&lt;b&gt;Notice&lt;/b&gt;:  Undefined property: stdClass::$isbn in &lt;b&gt;C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php&lt;/b&gt; on line &lt;b&gt;310&lt;/b&gt;&lt;br /&gt;&#10;">Eliminar</a></td>
                </tr><tr>            </tr><tr>
                <td style="width: 100">4</td>
                <td style="width: 100">2017-02-13 00:00:00</td>
                <td style="width: 100">89</td>
                <td style="width: 100">1</td>
<!--                <td style="width: 100">4</td>;-->
                <td style="width: 100">1829371758</td>
                <td style="width: 100">Hernandez</td>
                <td style="width: 100">Cortés</td>
<!--                <td style="width: 100">1</td>;
                <td style="width: 100">Decoración</td>;
                <td style="width: 100">Centros de mesa, decoración mesa de ponqué, , antorchas, petalos y cofre</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100"><br />
<b>Notice</b>:  Undefined property: stdClass::$nivelesServicio_nidId in <b>C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php</b> on line <b>296</b><br />
</td>;
                <td style="width: 100">47875</td>;
                <td style="width: 100">3830000</td>;
                <td style="width: 100">125</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100">6</td>;
                <td style="width: 100">70</td>;
                <td style="width: 100">79</td>;
                <td style="width: 100">5</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100">96854230</td>;
                <td style="width: 100">Carolina</td>;
                <td style="width: 100">Diaz</td>;-->
                <td style="width: 100"><a href="controladores/ControladorPrincipal.php?ruta=actualizarLibro&amp;idAct=&lt;br /&gt;&#10;&lt;b&gt;Notice&lt;/b&gt;:  Undefined property: stdClass::$isbn in &lt;b&gt;C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php&lt;/b&gt; on line &lt;b&gt;309&lt;/b&gt;&lt;br /&gt;&#10;">Actualizar</a></td>
                <td style="width: 100">  <a href="controladores/ControladorPrincipal.php?ruta=eliminarLibro&amp;idAct=&lt;br /&gt;&#10;&lt;b&gt;Notice&lt;/b&gt;:  Undefined property: stdClass::$isbn in &lt;b&gt;C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php&lt;/b&gt; on line &lt;b&gt;310&lt;/b&gt;&lt;br /&gt;&#10;">Eliminar</a></td>
                </tr><tr>            </tr><tr>
                <td style="width: 100">4</td>
                <td style="width: 100">2017-02-13 00:00:00</td>
                <td style="width: 100">89</td>
                <td style="width: 100">1</td>
<!--                <td style="width: 100">4</td>;-->
                <td style="width: 100">1829371758</td>
                <td style="width: 100">Hernandez</td>
                <td style="width: 100">Cortés</td>
<!--                <td style="width: 100">1</td>;
                <td style="width: 100">Decoración</td>;
                <td style="width: 100">Centros de mesa, decoración mesa de ponqué, , antorchas, petalos y cofre</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100"><br />
<b>Notice</b>:  Undefined property: stdClass::$nivelesServicio_nidId in <b>C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php</b> on line <b>296</b><br />
</td>;
                <td style="width: 100">47875</td>;
                <td style="width: 100">3830000</td>;
                <td style="width: 100">125</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100">6</td>;
                <td style="width: 100">70</td>;
                <td style="width: 100">79</td>;
                <td style="width: 100">5</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100">1000</td>;
                <td style="width: 100">joan</td>;
                <td style="width: 100">elles</td>;-->
                <td style="width: 100"><a href="controladores/ControladorPrincipal.php?ruta=actualizarLibro&amp;idAct=&lt;br /&gt;&#10;&lt;b&gt;Notice&lt;/b&gt;:  Undefined property: stdClass::$isbn in &lt;b&gt;C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php&lt;/b&gt; on line &lt;b&gt;309&lt;/b&gt;&lt;br /&gt;&#10;">Actualizar</a></td>
                <td style="width: 100">  <a href="controladores/ControladorPrincipal.php?ruta=eliminarLibro&amp;idAct=&lt;br /&gt;&#10;&lt;b&gt;Notice&lt;/b&gt;:  Undefined property: stdClass::$isbn in &lt;b&gt;C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php&lt;/b&gt; on line &lt;b&gt;310&lt;/b&gt;&lt;br /&gt;&#10;">Eliminar</a></td>
                </tr><tr>            </tr><tr>
                <td style="width: 100">4</td>
                <td style="width: 100">2017-02-13 00:00:00</td>
                <td style="width: 100">89</td>
                <td style="width: 100">1</td>
<!--                <td style="width: 100">4</td>;-->
                <td style="width: 100">1829371758</td>
                <td style="width: 100">Hernandez</td>
                <td style="width: 100">Cortés</td>
<!--                <td style="width: 100">1</td>;
                <td style="width: 100">Decoración</td>;
                <td style="width: 100">Centros de mesa, decoración mesa de ponqué, , antorchas, petalos y cofre</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100"><br />
<b>Notice</b>:  Undefined property: stdClass::$nivelesServicio_nidId in <b>C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php</b> on line <b>296</b><br />
</td>;
                <td style="width: 100">41361</td>;
                <td style="width: 100">7445000</td>;
                <td style="width: 100">55</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100">16</td>;
                <td style="width: 100">170</td>;
                <td style="width: 100">179</td>;
                <td style="width: 100">5</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100">96854230</td>;
                <td style="width: 100">Carolina</td>;
                <td style="width: 100">Diaz</td>;-->
                <td style="width: 100"><a href="controladores/ControladorPrincipal.php?ruta=actualizarLibro&amp;idAct=&lt;br /&gt;&#10;&lt;b&gt;Notice&lt;/b&gt;:  Undefined property: stdClass::$isbn in &lt;b&gt;C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php&lt;/b&gt; on line &lt;b&gt;309&lt;/b&gt;&lt;br /&gt;&#10;">Actualizar</a></td>
                <td style="width: 100">  <a href="controladores/ControladorPrincipal.php?ruta=eliminarLibro&amp;idAct=&lt;br /&gt;&#10;&lt;b&gt;Notice&lt;/b&gt;:  Undefined property: stdClass::$isbn in &lt;b&gt;C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php&lt;/b&gt; on line &lt;b&gt;310&lt;/b&gt;&lt;br /&gt;&#10;">Eliminar</a></td>
                </tr><tr>            </tr><tr>
                <td style="width: 100">4</td>
                <td style="width: 100">2017-02-13 00:00:00</td>
                <td style="width: 100">89</td>
                <td style="width: 100">1</td>
<!--                <td style="width: 100">4</td>;-->
                <td style="width: 100">1829371758</td>
                <td style="width: 100">Hernandez</td>
                <td style="width: 100">Cortés</td>
<!--                <td style="width: 100">1</td>;
                <td style="width: 100">Decoración</td>;
                <td style="width: 100">Centros de mesa, decoración mesa de ponqué, , antorchas, petalos y cofre</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100"><br />
<b>Notice</b>:  Undefined property: stdClass::$nivelesServicio_nidId in <b>C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php</b> on line <b>296</b><br />
</td>;
                <td style="width: 100">41361</td>;
                <td style="width: 100">7445000</td>;
                <td style="width: 100">55</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100">16</td>;
                <td style="width: 100">170</td>;
                <td style="width: 100">179</td>;
                <td style="width: 100">5</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100">1000</td>;
                <td style="width: 100">joan</td>;
                <td style="width: 100">elles</td>;-->
                <td style="width: 100"><a href="controladores/ControladorPrincipal.php?ruta=actualizarLibro&amp;idAct=&lt;br /&gt;&#10;&lt;b&gt;Notice&lt;/b&gt;:  Undefined property: stdClass::$isbn in &lt;b&gt;C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php&lt;/b&gt; on line &lt;b&gt;309&lt;/b&gt;&lt;br /&gt;&#10;">Actualizar</a></td>
                <td style="width: 100">  <a href="controladores/ControladorPrincipal.php?ruta=eliminarLibro&amp;idAct=&lt;br /&gt;&#10;&lt;b&gt;Notice&lt;/b&gt;:  Undefined property: stdClass::$isbn in &lt;b&gt;C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php&lt;/b&gt; on line &lt;b&gt;310&lt;/b&gt;&lt;br /&gt;&#10;">Eliminar</a></td>
                </tr><tr>            </tr><tr>
                <td style="width: 100">5</td>
                <td style="width: 100">2017-02-14 00:00:00</td>
                <td style="width: 100">153</td>
                <td style="width: 100">1</td>
<!--                <td style="width: 100">5</td>;-->
                <td style="width: 100">1344967371</td>
                <td style="width: 100">Castro</td>
                <td style="width: 100">Jam</td>
<!--                <td style="width: 100">1</td>;
                <td style="width: 100">Sonido y ambientación</td>;
                <td style="width: 100">Amplificación de sonido, luces (opcional), dj</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100"><br />
<b>Notice</b>:  Undefined property: stdClass::$nivelesServicio_nidId in <b>C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php</b> on line <b>296</b><br />
</td>;
                <td style="width: 100">46133</td>;
                <td style="width: 100">4152000</td>;
                <td style="width: 100">111</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100">7</td>;
                <td style="width: 100">80</td>;
                <td style="width: 100">89</td>;
                <td style="width: 100">3</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100">1015236785</td>;
                <td style="width: 100">Patricia</td>;
                <td style="width: 100">Buenaventura</td>;-->
                <td style="width: 100"><a href="controladores/ControladorPrincipal.php?ruta=actualizarLibro&amp;idAct=&lt;br /&gt;&#10;&lt;b&gt;Notice&lt;/b&gt;:  Undefined property: stdClass::$isbn in &lt;b&gt;C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php&lt;/b&gt; on line &lt;b&gt;309&lt;/b&gt;&lt;br /&gt;&#10;">Actualizar</a></td>
                <td style="width: 100">  <a href="controladores/ControladorPrincipal.php?ruta=eliminarLibro&amp;idAct=&lt;br /&gt;&#10;&lt;b&gt;Notice&lt;/b&gt;:  Undefined property: stdClass::$isbn in &lt;b&gt;C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php&lt;/b&gt; on line &lt;b&gt;310&lt;/b&gt;&lt;br /&gt;&#10;">Eliminar</a></td>
                </tr><tr>            </tr><tr>
                <td style="width: 100">5</td>
                <td style="width: 100">2017-02-14 00:00:00</td>
                <td style="width: 100">153</td>
                <td style="width: 100">1</td>
<!--                <td style="width: 100">5</td>;-->
                <td style="width: 100">1344967371</td>
                <td style="width: 100">Castro</td>
                <td style="width: 100">Jam</td>
<!--                <td style="width: 100">1</td>;
                <td style="width: 100">Sonido y ambientación</td>;
                <td style="width: 100">Amplificación de sonido, luces (opcional), dj</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100"><br />
<b>Notice</b>:  Undefined property: stdClass::$nivelesServicio_nidId in <b>C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php</b> on line <b>296</b><br />
</td>;
                <td style="width: 100">41741</td>;
                <td style="width: 100">7096000</td>;
                <td style="width: 100">58</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100">15</td>;
                <td style="width: 100">160</td>;
                <td style="width: 100">169</td>;
                <td style="width: 100">3</td>;
                <td style="width: 100">1</td>;
                <td style="width: 100">1015236785</td>;
                <td style="width: 100">Patricia</td>;
                <td style="width: 100">Buenaventura</td>;-->
                <td style="width: 100"><a href="controladores/ControladorPrincipal.php?ruta=actualizarLibro&amp;idAct=&lt;br /&gt;&#10;&lt;b&gt;Notice&lt;/b&gt;:  Undefined property: stdClass::$isbn in &lt;b&gt;C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php&lt;/b&gt; on line &lt;b&gt;309&lt;/b&gt;&lt;br /&gt;&#10;">Actualizar</a></td>
                <td style="width: 100">  <a href="controladores/ControladorPrincipal.php?ruta=eliminarLibro&amp;idAct=&lt;br /&gt;&#10;&lt;b&gt;Notice&lt;/b&gt;:  Undefined property: stdClass::$isbn in &lt;b&gt;C:\xampp\htdocs\Ceven2\vistas\vistasEveser\listarRegistrosEveser.php&lt;/b&gt; on line &lt;b&gt;310&lt;/b&gt;&lt;br /&gt;&#10;">Eliminar</a></td>
                </tr><tr>        </tr></tbody><tfoot> 
            <tr>
                <td colspan="8">
                    <center><a href="controladores/ControladorPrincipal.php?ruta=listarDeEveser&amp;pag=0">..::PAGINAS INICIALES::..</a><br><a href="controladores/ControladorPrincipal.php?ruta=listarDeEveser&amp;pag=-3">..::BLOQUE ANTERIOR::..</a><a href="controladores/ControladorPrincipal.php?ruta=listarDeEveser&amp;pag=1">1</a>-<a href="controladores/ControladorPrincipal.php?ruta=listarDeEveser&amp;pag=2">2</a><a href="controladores/ControladorPrincipal.php?ruta=listarDeEveser&amp;pag=3">..::BLOQUE SIGUIENTE::..</a><br><a href="controladores/ControladorPrincipal.php?ruta=listarDeEveser&amp;pag=-1">..::BLOQUE FINAL::..</a><br></center>                </td>
            </tr>
        </tfoot>
    </table>
</div>
   
            </main>
                

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
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
