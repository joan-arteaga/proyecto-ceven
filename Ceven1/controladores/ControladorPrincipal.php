<?php

/* * ********************************************** */
/* * ***COMIENZO DE PROGRAMACIÓN EN BACKEND******** */
/* * ********************************************** */
include_once './../modelos/ConstantesConexion.php';
include_once PATH . 'controladores/LibrosControlador.php';
include_once PATH . 'controladores/Validador.php';
/* * ********************************************** */
include_once PATH . 'controladores/Usuario_sControlador.php';
/* * ********************************************** */
/* * ********************************************** */
include_once PATH . 'controladores/CategoriaLibroControlador.php';
include_once PATH . 'modelos/modeloLibro/ValidadorLibros.php';
/* * ********************************************** */

include_once PATH . 'controladores/ClientesControlador.php';
include_once PATH . 'modelos/modeloClientes/ValidadorClientes.php';

include_once PATH . 'controladores/EventosControlador.php';
include_once PATH . 'modelos/modeloEventos/ValidadorEventos.php';

include_once PATH . 'controladores/EveserControlador.php';
include_once PATH . 'modelos/modeloEveser/ValidadorEveser.php';

include_once PATH . 'controladores/Persona_1Controlador.php';
include_once PATH . 'modelos/modeloPersona/ValidadorPersona_1.php';

include_once PATH . 'controladores/ResponsableControlador.php';
include_once PATH . 'modelos/modeloResponsable/ValidadorResponsable.php';

include_once PATH . 'controladores/ServiciosControlador.php';
include_once PATH . 'modelos/modeloServicios/ValidadorServicios.php';

include_once PATH . 'controladores/CargoControlador.php';
include_once PATH . 'modelos/modeloCargo/ValidadorCargo.php';

include_once PATH . 'controladores/GestionControlador.php';
   
include_once PATH . 'controladores/NivelPrecioServicioControlador.php';

include_once PATH . 'controladores/AsigRolControlador.php';
include_once PATH . 'modelos/modeloAsigRol/ValidadorAsigRol.php';


$datos = array();

if (!empty($_POST) && isset($_POST["ruta"])) {
    $datos = $_POST;
}
if (!empty($_GET) && isset($_GET["ruta"])) {
    $datos = $_GET;
}

//echo "<pre>";
//print_r($datos);
//echo "</pre>";
//exit();

switch ($datos['ruta']) {

    
    case "cerrarSesion":
    case "gestionDeAcceso":
        $usuario_sControlador = new Usuario_sControlador($datos);
        $usuario_sControlador->usuario_sControlador();
        break;
    case "gestionDeRegistro":
    case "insertarUsuario_s":
        if ($datos['ruta'] == "gestionDeRegistro") {

            $validarRegistro = new Validador();
            $erroresValidacion = $validarRegistro->validarFormularioRegistrarse($datos);
        }
        if ($datos['ruta'] == "insertarUsuario_s") {

            $validarRegistro = new ValidadorUsuarios_s();
            $erroresValidacion = $validarRegistro->validarFormularioRegistrarse($datos);
        }
       if ($erroresValidacion) {

            $erroresValidacion = json_encode($erroresValidacion);
            if ($datos['ruta'] == "gestionDeRegistro") {
                header("location:../registro.php?erroresValidacion=" . $erroresValidacion);
            }
        }
        $usuario_sControlador = new Usuario_sControlador($datos);
        $usuario_sControlador->usuario_sControlador();
        break;
        
        
    case"listarNivelPrecioServicio":
        $nivelPrecioServicioControlador = new NivelPrecioServicioControlador($datos);
        $nivelPrecioServicioControlador->nivelPrecioServicioControlador();
        break;

        
//////LIBROS LIBROS LIBROS LIBROS LIBROS//////    
    case "listarLibros":
        $librosControlador = new LibrosControlador($datos);
        $librosControlador->librosControlador();
        break;
/********************************************************************************************************************************/        
    case "insertarLibro":
        if ($datos['ruta'] == "insertarLibro") {
            $validarRegistro = new ValidadorLibros();
            $erroresValidacion = $validarRegistro->validarFormularioInsertarLibro($datos);
        }
        if (isset($erroresValidacion)) {
            $erroresValidacion = json_encode($erroresValidacion);
            if ($datos['ruta'] == "insertarLibro") {
                header("location:../principal.php?contenido=vistas/vistasLibros/vistaInsertarLibro.php&erroresValidacion=" . $erroresValidacion);
            }
        }
        $librosControlador = new LibrosControlador($datos);
        $librosControlador->librosControlador();
        break;
/********************************************************************************************************************************/    
    case "actualizarLibro":
        $librosControlador = new LibrosControlador($datos);
        $librosControlador->librosControlador();
        break;
/********************************************************************************************************************************/    
    case "confirmaActualizarLibro":
        if ($datos['ruta'] == "confirmaActualizarLibro") {

            $validarRegistro = new ValidadorLibros();
            $erroresValidacion = $validarRegistro->validarFormularioInsertarLibro($datos);
        }
       if (isset($erroresValidacion) && $erroresValidacion != FALSE) {
            $erroresValidacion = json_encode($erroresValidacion);
            if ($datos['ruta'] == "confirmaActualizarLibro") {
                header("location:../principal.php?contenido=vistas/vistasLibros/vistaActualizarLibro.php&erroresValidacion=" . $erroresValidacion);
            }
        }
        $librosControlador = new LibrosControlador($datos);
        $librosControlador->librosControlador();
        break;
/********************************************************************************************************************************/    

//////CLIENTES CLIENTES CLIENTES CLIENTES CLIENTES//////    
    case"listarClientes":
        $clientesControlador = new ClientesControlador($datos);
        $clientesControlador->clientesControlador();
        break;
/********************************************************************************************************************************/    
   case "insertarClientes":
        if ($datos['ruta'] == "insertarClientes") {
            $validarRegistro = new ValidadorClientes();
            $erroresValidacion = $validarRegistro->validarFormularioInsertarClientes($datos);
        }
        if (isset($erroresValidacion)) {
            $erroresValidacion = json_encode($erroresValidacion);
            if ($datos['ruta'] == "insertarClientes") {
                header("location:../principal.php?contenido=vistas/vistasClientes/vistaInsertarClientes.php&erroresValidacion=" . $erroresValidacion);
            }
        }
        $clientesControlador = new ClientesControlador($datos);
        $clientesControlador->clientesControlador();
        break;
/********************************************************************************************************************************/    
    case "actualizarClientes":
        $clientesControlador = new ClientesControlador($datos);
        $clientesControlador->clientesControlador();
        break;
    case "confirmaActualizarClientes":
        if ($datos['ruta'] == "confirmaActualizarClientes") {

            $validarRegistro = new ValidadorClientes();
            $erroresValidacion = $validarRegistro->validarFormularioInsertarClientes($datos);
        }
        if (isset($erroresValidacion) && $erroresValidacion != FALSE) {
            $erroresValidacion = json_encode($erroresValidacion);
            if ($datos['ruta'] == "confirmaActualizarClientes") {
                header("location:../principal.php?contenido=vistas/vistasClientes/vistaActualizarClientes.php&erroresValidacion=" . $erroresValidacion);
            }
        }
        $clientesControlador = new ClientesControlador($datos);
        $clientesControlador->clientesControlador();
        break;
/********************************************************************************************************************************/    
/////EVENTOS EVENTOS EVENTOS EVENTOS EVENTOS/////    
    case"listarEventos":
        $eventosControlador = new EventosControlador($datos);
        $eventosControlador->eventosControlador();
        break;
/********************************************************************************************************************************/    
    case "insertarEventos":
        if ($datos['ruta'] == "insertarEventos") {
            $validarRegistro = new ValidadorEventos();
            $erroresValidacion = $validarRegistro->validarFormularioInsertarEventos($datos);
        }
        if (isset($erroresValidacion)) {
            $erroresValidacion = json_encode($erroresValidacion);
            if ($datos['ruta'] == "insertarClientes") {
                header("location:../principal.php?contenido=vistas/vistasEventos/vistaInsertarEventos.php&erroresValidacion=" . $erroresValidacion);
            }
        }
        $eventosControlador = new EventosControlador($datos);
        $eventosControlador->eventosControlador();
        break;
/********************************************************************************************************************************/    
        case "actualizarEventos":
        $eventosControlador = new EventosControlador($datos);
        $eventosControlador->eventosControlador();
        break;
    case "confirmaActualizarEventos":
        if ($datos['ruta'] == "confirmaActualizarClientesEventos") {

            $validarRegistro = new ValidadorEventos();
            $erroresValidacion = $validarRegistro->validarFormularioInsertarEventos($datos);
        }
        if (isset($erroresValidacion) && $erroresValidacion != FALSE) {
            $erroresValidacion = json_encode($erroresValidacion);
            if ($datos['ruta'] == "confirmaActualizarEventos") {
                header("location:../principal.php?contenido=vistas/vistasEventos/vistaActualizarEventos.php&erroresValidacion=" . $erroresValidacion);
            }
        }
        $eventosControlador = new EventosControlador($datos);
        $eventosControlador->eventosControlador();
        break;
/********************************************************************************************************************************/    
//////EVESER EVESER EVESER EVESER EVESER//////    
    case "listarEveser":
        $eveserControlador = new EveserControlador($datos);
        $eveserControlador->eveserControlador();
        break;
/********************************************************************************************************************************/        
    case "insertarEveser":
        if ($datos['ruta'] == "insertarEveser") {
            $validarRegistro = new ValidadorEveser();
            $erroresValidacion = $validarRegistro->validarFormularioInsertarEveser($datos);
        }
        if (isset($erroresValidacion)) {
            $erroresValidacion = json_encode($erroresValidacion);
            if ($datos['ruta'] == "insertarEveser") {
                header("location:../principal.php?contenido=vistas/vistasEveser/vistaInsertarEveser.php&erroresValidacion=" . $erroresValidacion);
            }
        }
        $eveserControlador = new EveserControlador($datos);
        $eveserControlador->eveserControlador();
        break;
/********************************************************************************************************************************/    
    case "actualizarEveser":
        $eveserControlador = new EveserControlador($datos);
        $eveserControlador->eveserControlador();
        break;
    case "confirmaActualizarEveser":
        if ($datos['ruta'] == "confirmaActualizarEveser") {

            $validarRegistro = new ValidadorEveser();
            $erroresValidacion = $validarRegistro->validarFormularioInsertarEveser($datos);
        }
        if (isset($erroresValidacion) && $erroresValidacion != FALSE) {
            $erroresValidacion = json_encode($erroresValidacion);
            if ($datos['ruta'] == "confirmaActualizarEveser") {
                header("location:../principal.php?contenido=vistas/vistasEveser/vistaActualizarEveser.php&erroresValidacion=" . $erroresValidacion);
            }
        }
        $eveserControlador = new EveserControlador($datos);
        $eveserControlador->eveserControlador();
        break;
/********************************************************************************************************************************/    
//////Persona_1 Persona_1 Persona_1 Persona_1 Persona_1//////    
    case "listarPersona_1":
        $persona_1Controlador = new Persona_1Controlador($datos);
        $persona_1Controlador->persona_1Controlador();
        break;
/********************************************************************************************************************************/        
    case "actualizarPersona_1":
        $persona_1Controlador = new Persona_1Controlador($datos);
        $persona_1Controlador->persona_1Controlador();
        break;
    case "confirmaActualizarPersona_1":
        if ($datos['ruta'] == "confirmaActualizarPersona_1") {

            $validarRegistro = new ValidadorPersona_1();
            $erroresValidacion = $validarRegistro->validarFormularioInsertarPersona_1($datos);
        }
        if (isset($erroresValidacion) && $erroresValidacion != FALSE) {
            $erroresValidacion = json_encode($erroresValidacion);
            if ($datos['ruta'] == "confirmaActualizarPersona_1") {
                header("location:../principal.php?contenido=vistas/vistasPersona_1/vistaActualizarPersona_1.php&erroresValidacion=" . $erroresValidacion);
            }
        }
        $persona_1Controlador = new Persona_1Controlador($datos);
        $persona_1Controlador->persona_1Controlador();
        break;
/********************************************************************************************************************************/    
//////RESPONSABLE RESPONSABLE RESPONSABLE RESPONSABLE RESPONSABLE//////    
    case"listarResponsable":
        $responsableControlador = new ResponsableControlador($datos);
        $responsableControlador->responsableControlador();
        break;
/********************************************************************************************************************************/    
   case "insertarResponsable":
        if ($datos['ruta'] == "insertarResponsable") {
            $validarRegistro = new ValidadorResponsable();
            $erroresValidacion = $validarRegistro->validarFormularioInsertarResponsable($datos);
        }
        if (isset($erroresValidacion)) {
            $erroresValidacion = json_encode($erroresValidacion);
            if ($datos['ruta'] == "insertarResponsable") {
                header("location:../principal.php?contenido=vistas/vistasResponsable/vistaInsertarResponsable.php&erroresValidacion=" . $erroresValidacion);
            }
        }
        $responsableControlador = new ResponsableControlador($datos);
        $responsableControlador->responsableControlador();
        break;
/********************************************************************************************************************************/    
    case "actualizarResponsable":
        $responsableControlador = new ResponsableControlador($datos);
        $responsableControlador->responsableControlador();
        break;
    case "confirmaActualizarResponsable":
        if ($datos['ruta'] == "confirmaActualizarResponsable") {

            $validarRegistro = new ValidadorResponsable();
            $erroresValidacion = $validarRegistro->validarFormularioInsertarResponsable($datos);
        }
        if (isset($erroresValidacion) && $erroresValidacion != FALSE) {
            $erroresValidacion = json_encode($erroresValidacion);
            if ($datos['ruta'] == "confirmaActualizarResponsable") {
                header("location:../principal.php?contenido=vistas/vistasResponsable/vistaActualizarResponsable.php&erroresValidacion=" . $erroresValidacion);
            }
        }
        $responsableControlador = new ResponsableControlador($datos);
        $responsableControlador->responsableControlador();
        break;
/********************************************************************************************************************************/    
//////SERVICIOS SERVICIOS SERVICIOS SERVICIOS SERVICIOS//////    
    case"listarServicios":
        $serviciosControlador = new ServiciosControlador($datos);
        $serviciosControlador->serviciosControlador();
        break;
/********************************************************************************************************************************/    
   case "insertarServicios":
        if ($datos['ruta'] == "insertarServicios") {
            $validarRegistro = new ValidadorServicios();
            $erroresValidacion = $validarRegistro->validarFormularioInsertarServicios($datos);
        }
        if (isset($erroresValidacion)) {
            $erroresValidacion = json_encode($erroresValidacion);
            if ($datos['ruta'] == "insertarServicios") {
                header("location:../principal.php?contenido=vistas/vistasServicios/vistaInsertarServicios.php&erroresValidacion=" . $erroresValidacion);
            }
        }
        $serviciosControlador = new ServiciosControlador($datos);
        $serviciosControlador->serviciosControlador();
        break;
/********************************************************************************************************************************/    
    case "actualizarServicios":
        $serviciosControlador = new ServiciosControlador($datos);
        $serviciosControlador->serviciosControlador();
        break;
    case "confirmaActualizarServicios":
        if ($datos['ruta'] == "confirmaActualizarServicios") {

            $validarRegistro = new ValidadorServicios();
            $erroresValidacion = $validarRegistro->validarFormularioInsertarServicios($datos);
        }
        if (isset($erroresValidacion) && $erroresValidacion != FALSE) {
            $erroresValidacion = json_encode($erroresValidacion);
            if ($datos['ruta'] == "confirmaActualizarServicios") {
                header("location:../principal.php?contenido=vistas/vistasServicios/vistaActualizarServicios.php&erroresValidacion=" . $erroresValidacion);
            }
        }
        $serviciosControlador = new ServiciosControlador($datos);
        $serviciosControlador->serviciosControlador();
        break;
/********************************************************************************************************************************/    
//////CARGO CARGO CARGO CARGO CARGO//////    
    case"listarCargo":
        $cargoControlador = new CargoControlador($datos);
        $cargoControlador->cargoControlador();
        break;
/********************************************************************************************************************************/    
   case "insertarCargo":
        if ($datos['ruta'] == "insertarCargo") {
            $validarRegistro = new ValidadorCargo();
            $erroresValidacion = $validarRegistro->validarFormularioInsertarCargo($datos);
        }
        if (isset($erroresValidacion)) {
            $erroresValidacion = json_encode($erroresValidacion);
            if ($datos['ruta'] == "insertarCargo") {
                header("location:../principal.php?contenido=vistas/vistasCargo/vistaInsertarCargo.php&erroresValidacion=" . $erroresValidacion);
            }
        }
        $cargoControlador = new CargoControlador($datos);
        $cargoControlador->cargoControlador();
        break;
/********************************************************************************************************************************/    
    case "actualizarCargo":
        $cargoControlador = new CargoControlador($datos);
        $cargoControlador->cargoControlador();
        break;
    case "confirmaActualizarCargo":
        if ($datos['ruta'] == "confirmaActualizarCargo") {

            $validarRegistro = new ValidadorCargo();
            $erroresValidacion = $validarRegistro->validarFormularioInsertarCargo($datos);
        }
        if (isset($erroresValidacion) && $erroresValidacion != FALSE) {
            $erroresValidacion = json_encode($erroresValidacion);
            if ($datos['ruta'] == "confirmaActualizarCargo") {
                header("location:../principal.php?contenido=vistas/vistasCargo/vistaActualizarCargo.php&erroresValidacion=" . $erroresValidacion);
            }
        }
        $cargoControlador = new CargoControlador($datos);
        $cargoControlador->cargoControlador();
        break;
/********************************************************************************************************************************/    
//////GESTION GESTION GESTION GESTION GESTION//////    
    case"listarGestion":
        $gestionControlador = new GestionControlador($datos);
        $gestionControlador->gestionControlador();
        break;
/********************************************************************************************************************************/    
//////ASIGROL ASIGROL ASIGROL ASIGROL ASIGROL//////    
    case"listarAsigRol":
        $asigRolControlador = new AsigRolControlador($datos);
        $asigRolControlador->asigRolControlador();
        break;
/********************************************************************************************************************************/    
   case "insertarAsigRol":
        if ($datos['ruta'] == "insertarAsigRol") {
            $validarRegistro = new ValidadorAsigRol();
            $erroresValidacion = $validarRegistro->validarFormularioInsertarAsigRol($datos);
        }
        if (isset($erroresValidacion)) {
            $erroresValidacion = json_encode($erroresValidacion);
            if ($datos['ruta'] == "insertarAsigRol") {
                header("location:../principal.php?contenido=vistas/vistasAsigRol/vistaInsertarAsigRol.php&erroresValidacion=" . $erroresValidacion);
            }
        }
        $asigRolControlador = new AsigRolControlador($datos);
        $asigRolControlador->asigRolControlador();
        break;
/********************************************************************************************************************************/    
    case "actualizarAsigRol":
        $asigRolControlador = new AsigRolControlador($datos);
        $asigRolControlador->asigRolControlador();
        break;
    case "confirmaActualizarAsigRol":
        if ($datos['ruta'] == "confirmaActualizarAsigRol") {

            $validarRegistro = new ValidadorAsigRol();
            $erroresValidacion = $validarRegistro->validarFormularioInsertarAsigRol($datos);
        }
        if (isset($erroresValidacion) && $erroresValidacion != FALSE) {
            $erroresValidacion = json_encode($erroresValidacion);
            if ($datos['ruta'] == "confirmaActualizarAsigRol") {
                header("location:../principal.php?contenido=vistas/vistasAsigRol/vistaActualizarAsigRol.php&erroresValidacion=" . $erroresValidacion);
            }
        }
        $asigRolControlador = new AsigRolControlador($datos);
        $asigRolControlador->asigRolControlador();
        break;
/********************************************************************************************************************************/    
/********************************************************************************************************************************/    
    case "eliminarAsigRol":
         $asigRolControlador = new AsigRolControlador($datos);
         $asigRolControlador->asigRolControlador();
         break;
    case "confirmaEliminarAsigRol":
            if ($datos['ruta'] == "confirmaEliminarAsigRol") {
    
                $validarRegistro = new ValidadorAsigRol();
               $erroresValidacion = $validarRegistro->validarFormularioInsertarAsigRol($datos);
           }
   ////////////////////////////////////////////////////////////////
            if (isset($erroresValidacion) && $erroresValidacion != FALSE) {
                $erroresValidacion = json_encode($erroresValidacion);
                if ($datos['ruta'] == "confirmaEliminarAsigRol") {
                    header("location:../principal.php?contenido=vistas/vistasAsigRol/vistaEliminarAsigRol.php&erroresValidacion=" . $erroresValidacion);
                }
            }
            $asigRolControlador = new AsigRolControlador($datos);
            $asigRolControlador->asigRolControlador();
         break;
/********************************************************************************************************************************/    
/********************************************************************************************************************************/    
    case "eliminarEventos":
         $eventosControlador = new EventosControlador($datos);
         $eventosControlador->eventosControlador();
         break;
    case "confirmaEliminarEventos":
            if ($datos['ruta'] == "confirmaEliminarEventos") {
    
                $validarRegistro = new ValidadorEventos();
               $erroresValidacion = $validarRegistro->validarFormularioInsertarEventos($datos);
           }
   ////////////////////////////////////////////////////////////////
            if (isset($erroresValidacion) && $erroresValidacion != FALSE) {
                $erroresValidacion = json_encode($erroresValidacion);
                if ($datos['ruta'] == "confirmaEliminarEventos") {
                    header("location:../principal.php?contenido=vistas/vistasEventos/vistaEliminarEventos.php&erroresValidacion=" . $erroresValidacion);
                }
            }
            $eventosControlador = new EventosControlador($datos);
            $eventosControlador->eventosControlador();
         break;
/********************************************************************************************************************************/    
          
         
    }
?>
