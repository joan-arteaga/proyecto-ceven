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
<!--</li>-->
<!--                        <li><a href="../../../../controladores/ControladorPrincipal.php?ruta=listarCargo">Gestión de Cargos</a></li>
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

                
                <?php
//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";exit();
//session_start();
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
if (isset($_SESSION['listaDeEveser'])) {
    $listaDeEveser = $_SESSION['listaDeEveser'];
}
if (isset($_SESSION['paginacionVinculos'])) {
    $paginacionVinculos = $_SESSION['paginacionVinculos'];
}
if (isset($_SESSION['totalRegistros'])) {
    $totalRegistros = $_SESSION['totalRegistros'];
}
if (isset($_SESSION['registroCategoriasEveser'])) {
    $registroCategoriasEveser = $_SESSION['registroCategoriasEveser'];
    $cantEveEstados=count($registroCategoriasEveser);
}

//http://www.forosdelweb.com/f18/notice-session-had-already-been-started-ignoring-session_start-1021808/
//http://ajpdsoft.com/modules.php?name=News&file=print&sid=486

if (isset($_POST['eveId']))
    $_SESSION['eveIdF'] = $_POST['eveId'];
if (isset($_SESSION['eveIdF']) && !isset($_POST['eveId']))
    $_POST['eveId'] = $_SESSION['eveIdF'];
/* * ********************************************* */
/* * ********Conservar filtro 'titulo' si lo hay************ */
if (isset($_POST['eveFechaInicial']))
    $_SESSION['eveFechaInicialF'] = $_POST['eveFechaInicial'];
if (isset($_SESSION['eveFechaInicialF']) && !isset($_POST['eveFechaInicial']))
    $_POST['eveFechaInicial'] = $_SESSION['eveFechaInicialF'];
/* * ********************************************* */
/* * ********Conservar filtro 'autor' si lo hay************ */
if (isset($_POST['eveCantidadPax']))
    $_SESSION['eveCantidadPaxF'] = $_POST['eveCantidadPax'];
if (isset($_SESSION['eveCantidadPaxF']) && !isset($_POST['eveCantidadPax']))
    $_POST['eveCantidadPax'] = $_SESSION['eveCantidadPaxF'];
/* * ********************************************* */
/* * ********Conservar filtro 'precio' si lo hay************ */
if (isset($_POST['cliDocumento']))
    $_SESSION['cliDocumentoF'] = $_POST['cliDocumento'];
if (isset($_SESSION['cliDocumentoF']) && !isset($_POST['cliDocumento']))
    $_POST['cliDocumento'] = $_SESSION['cliDocumentoF'];
/* * ********************************************* */
/* * ********Conservar filtro 'categoriaLibro_catLibId' si lo hay************ */
if (isset($_POST['cliApellido1']))
    $_SESSION['cliApellido1F'] = $_POST['cliApellido1'];
if (isset($_SESSION['cliApellido1F']) && !isset($_POST['cliApellido1']))
    $_POST['cliApellido1'] = $_SESSION['cliApellido1F'];
/* * ********************************************* */
/* * ********Conservar filtro 'categoriaLibro_catLibId' si lo hay************ */
if (isset($_POST['cliEstado']))
    $_SESSION['cliEstadoF'] = $_POST['cliEstado1'];
if (isset($_SESSION['cliEstadoF']) && !isset($_POST['cliEstado']))
    $_POST['cliEstado'] = $_SESSION['cliEstadoF'];
/* * ********************************************* */
/* * ********Conservar filtro 'categoriaLibro_catLibId' si lo hay************ */
if (isset($_POST['persona_perId']))
    $_SESSION['persona_perIdF'] = $_POST['persona_perId'];
if (isset($_SESSION['persona_perIdF']) && !isset($_POST['persona_perId']))
    $_POST['persona_perId'] = $_SESSION['persona_perIdF'];
/* * ********************************************* */
/* * ********Conservar filtro 'categoriaLibro_catLibId' si lo hay************ */
if (isset($_POST['perDocumento']))
    $_SESSION['perDocumentoF'] = $_POST['perDocumento'];
if (isset($_SESSION['perDocumentoF']) && !isset($_POST['perDocumento']))
    $_POST['perDocumento'] = $_SESSION['perDocumentoF'];
/* * ********************************************* */
/* * ********Conservar filtro 'categoriaLibro_catLibId' si lo hay************ */
if (isset($_POST['perApellido']))
    $_SESSION['perApellidoF'] = $_POST['perApellido'];
if (isset($_SESSION['perApellidoF']) && !isset($_POST['perApellido']))
    $_POST['perApellido'] = $_SESSION['perApellidoF'];
/* * ********************************************* */
/* * ********Conservar filtro 'categoriaLibro_catLibId' si lo hay************ */
if (isset($_POST['usuario_s_usuId']))
    $_SESSION['usuario_s_usuIdF'] = $_POST['usuario_s_usuId'];
if (isset($_SESSION['usuario_s_usuIdF']) && !isset($_POST['usuario_s_usuId']))
    $_POST['usuario_s_usuId'] = $_SESSION['usuario_s_usuIdF'];
/* * ********************************************* */
/* * ********Conservar filtro 'categoriaLibro_catLibId' si lo hay************ */
if (isset($_POST['perEstado']))
    $_SESSION['perEstadoF'] = $_POST['perEstado'];
if (isset($_SESSION['perEstadoF']) && !isset($_POST['perEstado']))
    $_POST['perEstado'] = $_SESSION['perEstadoF'];
/* * ********************************************* */
/* * ********Conservar filtro 'buscar' si lo hay************ */
if (isset($_POST['buscar']))
    $_SESSION['buscarF'] = $_POST['buscar'];
if (isset($_SESSION['buscarF']) && !isset($_POST['buscar']))
    $_POST['buscar'] = $_SESSION['buscarF'];
/* * ********************************************* */


?>
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
<fieldset class="scheduler-border"><legend class="scheduler-border">BUSQUEDA AVANZADA</legend>

        <form name="formFiltroEveser" action="../../../../controladores/ControladorPrincipal.php" method="POST">
            <input type="hidden" name="ruta" value="listarEveser"/>
            <table> 
                <tr><td>Evento:</td><td><input type="number" name="eveId" onclick="" value="<?php
                        if (isset($registroAInsertar['eveId'])) {
                            echo $registroAInsertar['eveId'];
                        }
                        if (isset($_SESSION['eveIdF'])) {
                            echo $_SESSION['eveIdF'];
                        }
                        ?>"/></td>
                    <td>
                        <?php
                        if (isset($marcaCampo['eveId'])) {
                            echo $marcaCampo['eveId'];
                        }
                        ?>
                    </td>                        
                </tr> 
                <tr><td>Fec_Inicio:</td><td> <input type="text" name="eveFechaInicial" onclick="" value="<?php
                        if (isset($registroAInsertar['eveFechaInicial'])) {
                            echo $registroAInsertar['eveFechaInicial'];
                        }
                        if (isset($_SESSION['eveFechaInicialF'])) {
                            echo $_SESSION['eveFechaInicialF'];
                        }
                        ?>" /></td>
                    <td>
                        <?php
                        if (isset($marcaCampo['eveFechaInicial'])) {
                            echo $marcaCampo['eveFechaInicial'];
                        }
                        ?>
                    </td>                          
                </tr> 
                <tr><td>Cantidad_Pax:</td><td> <input type="number" onclick="" name="eveCantidadPax" value="<?php
                        if (isset($registroAInsertar['eveCantidadPax'])) {
                            echo $registroAInsertar['eveCantidadPax'];
                        }
                        if (isset($_SESSION['eveCantidadPaxF'])) {
                            echo $_SESSION['eveCantidadPaxF'];
                        }
                        ?>"/></td>
                    <td>
                        <?php
                        if (isset($marcaCampo['eveCantidadPax'])) {
                            echo $marcaCampo['eveCantidadPax'];
                        }
                        ?>
                    </td>                          
                </tr> 
                <tr><td>Doc_Cliente: </td><td><input type="number" onclick=""  name="cliDocumento" value="<?php
                        if (isset($registroAInsertar['cliDocumento'])) {
                            echo $registroAInsertar['cliDocumento'];
                        }
                        if (isset($_SESSION['cliDocumentoF'])) {
                            echo $_SESSION['cliDocumentoF'];
                        }
                        ?>" /></td>
                    <td>
                        <?php
                        if (isset($marcaCampo['cliDocumento'])) {
                            echo $marcaCampo['cliDocumento'];
                        }
                        ?>
                    </td>                          
                </tr>                   
                <tr><td>Cli_Apellido_1:</td><td><input type="text" name="cliApellido1" onclick="" value="<?php
                        if (isset($registroAInsertar['cliApellido1'])) {
                            echo $registroAInsertar['cliApellido1'];
                        }
                        if (isset($_SESSION['cliApellido1F'])) {
                            echo $_SESSION['cliApellido1F'];
                        }
                        ?>"/></td>
                    <td>
                        <?php
                        if (isset($marcaCampo['cliApellido1'])) {
                            echo $marcaCampo['cliApellido1'];
                        }
                        ?>
                    </td>                        
                </tr> 
                <tr><td>Estado_Cliente:</td><td> <input type="number" name="cliEstado" onclick="" value="<?php
                        if (isset($registroAInsertar['cliEstado'])) {
                            echo $registroAInsertar['cliEstado'];
                        }
                        if (isset($_SESSION['cliEstadoF'])) {
                            echo $_SESSION['cliEstadoF'];
                        }
                        ?>" /></td>
                    <td>
                        <?php
                        if (isset($marcaCampo['cliEstado'])) {
                            echo $marcaCampo['cliEstado'];
                        }
                        ?>
                    </td>                          
                </tr> 
                <tr><td>Id_Encargado:</td><td> <input type="number" onclick="" name="persona_perId" value="<?php
                        if (isset($registroAInsertar['persona_perId'])) {
                            echo $registroAInsertar['persona_perId'];
                        }
                        if (isset($_SESSION['persona_perIdF'])) {
                            echo $_SESSION['persona_perIdF'];
                        }
                        ?>"/></td>
                    <td>
                        <?php
                        if (isset($marcaCampo['persona_perId'])) {
                            echo $marcaCampo['persona_perId'];
                        }
                        ?>
                    </td>                          
                </tr> 
                <tr><td>Doc_Encargado: </td><td><input type="number" onclick=""  name="perDocumento" value="<?php
                        if (isset($registroAInsertar['perDocumento'])) {
                            echo $registroAInsertar['perDocumento'];
                        }
                        if (isset($_SESSION['perDocumentoF'])) {
                            echo $_SESSION['perDocumentoF'];
                        }
                        ?>" /></td>
                    <td>
                        <?php
                        if (isset($marcaCampo['perDocumento'])) {
                            echo $marcaCampo['perDocumento'];
                        }
                        ?>
                    </td>                          
                </tr>
                <tr><td>Apellido_Encargado: </td><td><input type="text" onclick=""  name="perApellido" value="<?php
                        if (isset($registroAInsertar['perApellido'])) {
                            echo $registroAInsertar['perApellido'];
                        }
                        if (isset($_SESSION['perApellidoF'])) {
                            echo $_SESSION['perApellidoF'];
                        }
                        ?>" /></td>
                    <td>
                        <?php
                        if (isset($marcaCampo['perApellido'])) {
                            echo $marcaCampo['perApellido'];
                        }
                        ?>
                    </td>                          
                </tr> 
                <tr><td>Cargo_Encargado: </td><td><input type="number" onclick=""  name="usuario_s_usuId" value="<?php
                        if (isset($registroAInsertar['usuario_s_usuId'])) {
                            echo $registroAInsertar['usuario_s_usuId'];
                        }
                        if (isset($_SESSION['usuario_s_usuIdF'])) {
                            echo $_SESSION['usuario_s_usuIdF'];
                        }
                        ?>" /></td>
                    <td>
                        <?php
                        if (isset($marcaCampo['usuario_s_usuId'])) {
                            echo $marcaCampo['usuario_s_usuId'];
                        }
                        ?>
                    </td>                          
                </tr> 
                <tr><td>Estado_Encargado: </td><td><input type="number" onclick=""  name="perEstado" value="<?php
                        if (isset($registroAInsertar['perEstado'])) {
                            echo $registroAInsertar['perEstado'];
                        }
                        if (isset($_SESSION['perEstadoF'])) {
                            echo $_SESSION['perEstadoF'];
                        }
                        ?>" /></td>
                    <td>
                        <?php
                        if (isset($marcaCampo['perEstado'])) {
                            echo $marcaCampo['perEstado'];
                        }
                        ?>
                    </td>                          
                </tr>                    
<!--                <tr><td>Estado_Evento </td>
                    <td>
                        <select id="categoriaLibro_catLibId" name="eveEstado">                    
                            <?php
//                            for ($j = 0; $j < $cantEveEstados; $j++) {
                                ?>
                                <option value = "<?php // echo $registroCategoriasEveser[$j]->eveEstado; ?>" ><?php // echo $registroCategoriasEveser[$j]->eveEstado . " - " . $registroCategoriasLibros[$j]->catLibNombre; ?></option>             
                                <?php
//                            }
                            ?>
                        </select> 
                    </td>
                    <td></td>                          
                </tr>            -->
                <?php
                if (isset($mensajesError)) {

                    echo "<tr>\n"; //fila para imprimir errores si los hay
                    echo "<td colspan=3>\n";
                    foreach ($mensajesError as $value) {
                        echo $value;
                    }
                    echo "</td>\n";
                    echo "</tr>\n";
                }
                ?>                    
                <tr><td><input type="submit" value="Filtrar" name="enviar" title="Si es necesario limpie 'Buscar'"/></td>
                    <td><input type="reset" value="limpiar" onclick="
                            javascript:document.formFiltroEveser.eveId.value = '';
                            javascript:document.formFiltroEveser.eveFechaInicial.value = '';
                            javascript:document.formFiltroEveser.eveCantidadPax.value = '';
                            javascript:document.formFiltroEveser.cliDocumento.value = '';
                            javascript:document.formFiltroEveser.cliApellido1.value = '';
                            javascript:document.formFiltroEveser.cliEstado.value = '';
                            javascript:document.formFiltroEveser.persona_perId.value = '';
                            javascript:document.formFiltroEveser.perDocumento.value = '';
                            javascript:document.formFiltroEveser.perApellido.value = '';
                            javascript:document.formFiltroEveser.usuario_s_usuId.value = '';
                            javascript:document.formFiltroEveser.perEstado.value = '';
                            javascript:document.formFiltroEveser.submit();
                               "/></td><td></td></tr> 
            </table>
        </form>
    </fieldset>
</div>
<fieldset class="scheduler-border"><legend class="scheduler-border">BUSCAR</legend>

    <div style="width: 800">
        <span class="izquierdo">
            <!--NUEVO BOTÓN PARA BUSCAR*************************-->
            <form name="formFiltroEveser" action="../../../../controladores/ControladorPrincipal.php" method="POST">
                <input type="hidden" name="ruta" value="listarEveser"/>
                <input type="text" name="buscar" placeholder="Término a Buscar" value="<?php
                if (isset($_SESSION['buscarF'])) {
                    echo $_SESSION['buscarF'];
                }
                ?>">
                <input type="submit"  value="Buscar" title="Si es necesario limpie 'Filtrar'">&nbsp;&nbsp;||&nbsp;&nbsp;
                <input type="button"  value="Limpiar Búsqueda" onclick="javascript:document.formFiltroEveser.buscar.value = '';
                        javascript:document.formFiltroEveser.submit();">
            </form>
        </span>
    </div>        
</fieldset>
<br>
<div style="width: 800">
    <span class="izquierdo">
        <!--NUEVO BOTÓN PARA DARLE FUNCIONALIDAD*************************-->

        <input type="button" onclick="javascript:location.href = '../../../../principal.php?contenido=vistas/vistasLibros/vistaInsertarEveser.php'" value="Nuevo Libro">

    </span>
</div>
<br>
<a name="listaDeEveser" id="a"></a>
<div style="width: 800">
    <p>Total de Registros: <?php echo $totalRegistros; ?></p>
    <table border=1>
        <thead>
            <tr>
                <td style="width: 100">Evento</td>
                <td style="width: 100">Fec_Inicio</td>
                <td style="width: 100">Cantidad_Pax</td>
                <td style="width: 100">Estado_Evento</td>
                <td style="width: 100">Doc_Cliente</td>
                <td style="width: 100">Cli_Apellido_1</td>
                <td style="width: 100">Estado_Cliente</td>
                <td style="width: 100">Id_Encargado</td>
                <td style="width: 100">Doc_Encargado</td>
                <td style="width: 100">Apellido_Encargado</td>
                <td style="width: 100">Cargo_Encargado</td>
                <td style="width: 100">Estado_Encargado</td>
                <td style="width: 100"  colspan="2"> ACCIONES </td>
            </tr>
        </thead> 
        <?php
        $i = 0;
//       echo "<pre>";
//       print_r($listaDeLibros);
//       echo "</pre>";exit();
        foreach ($listaDeEveser as $key => $value) {
            ?>
            <tr>
                <td style="width: 100"><?php echo $listaDeEveser[$i]->eveId; ?></td>
                <td style="width: 100"><?php echo $listaDeEveser[$i]->eveFechaInicial; ?></td>
                <td style="width: 100"><?php echo $listaDeEveser[$i]->eveCantidadPax; ?></td>
                <td style="width: 100"><?php echo $listaDeEveser[$i]->eveEstado; ?></td>
                <td style="width: 100"><?php echo $listaDeEveser[$i]->cliDocumento; ?></td>
                <td style="width: 100"><?php echo $listaDeEveser[$i]->cliApellido1; ?></td>
                <td style="width: 100"><?php echo $listaDeEveser[$i]->cliEstado; ?></td>
                <td style="width: 100"><?php echo $listaDeEveser[$i]->persona_perId; ?></td>
                <td style="width: 100"><?php echo $listaDeEveser[$i]->perDocumento; ?></td>
                <td style="width: 100"><?php echo $listaDeEveser[$i]->perApellido; ?></td>
                <td style="width: 100"><?php echo $listaDeEveser[$i]->usuario_s_usuId; ?></td>
                <td style="width: 100"><?php echo $listaDeEveser[$i]->perEstado; ?></td>
                <td style="width: 100"><a href="../../../../controladores/ControladorPrincipal.php?ruta=actualizarEveser&idAct=<?php echo $listaDeEveser[$i]->eveId; ?>" >Actualizar</a></td>
                <td style="width: 100">  <a href="../../../../controladores/ControladorPrincipal.php?ruta=eliminarEveser&idAct=<?php echo $listaDeEveser[$i]->eveId; ?>">Eliminar</a>   </td>
                <?php
                $i++;
                ?><tr><?php
                }
                ?>
        <tfoot> 
            <tr>
                <td colspan="8">
                    <?php
                    echo $paginacionVinculos;
                    ?>
                </td>
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
