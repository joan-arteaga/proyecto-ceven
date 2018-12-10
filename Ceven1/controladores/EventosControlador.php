<?php
include_once './../modelos/ConstantesConexion.php';
require_once PATH . 'modelos/UsuarioBD.php';
require_once PATH . 'modelos/modeloEventos/EventosDAO.php';
require_once PATH . 'modelos/modeloEventos/EventosVO.php';
class EventosControlador {
    private $datos = array();
    public function __construct($datos) {
        $this->datos = $datos;
    }
    public function eventosControlador() {
        switch ($this->datos["ruta"]) {
            case "listarEventos":
                
                if (isset($this->datos['pag']) && (int) $this->datos['pag'] > 0) {
                    $pagInicio = $this->datos['pag'];
                } else {
                    $pagInicio = 0;
                }
                $limit = 5;
                
                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $consultarEventos = new EventosVO();
                
                $gestarEventos = new EventosDAO($usuarioBd, BASE, SERVIDOR);
                $resultadoConsultaPaginada = $gestarEventos->consultaPaginada($consultarEventos, $limit, $pagInicio);
                $totalRegistros = $resultadoConsultaPaginada[0];
                $listaDeEventos = $resultadoConsultaPaginada[1];
                $paginacionVinculos = $gestarEventos->enlacesPaginacion($totalRegistros, $limit, $pagInicio);
                
                //se almacenan en sesion las variables del filtro
//                $_SESSION['isbnF'] = (isset($this->datos['isbn'])) ? $this->datos['isbn'] : NULL;
                $_SESSION['eveIdF'] = (isset($_POST['eveId'])) ? $_POST['eveId'] : NULL;/********CORRECTO*/
                $_SESSION['eveFechaInicialF'] = (isset($this->datos['eveFechaInicial'])) ? $this->datos['eveFechaInicial'] : NULL;
                $_SESSION['eveCantidadPaxF'] = (isset($this->datos['eveCantidadPax'])) ? $this->datos['eveCantidadPax'] : NULL;
                $_SESSION['Clientes_cliDocumentoF'] = (isset($this->datos['Clientes_cliDocumento'])) ? $this->datos['Clientes_cliDocumento'] : NULL;
                $_SESSION['eveEstadoF'] = (isset($this->datos['eveEstado'])) ? $this->datos['eveEstado'] : NULL;
                
                
                session_start();
                $_SESSION['listaDeEventos'] = $listaDeEventos;
                $_SESSION['paginacionVinculos'] = $paginacionVinculos;
                $_SESSION['totalRegistros'] = $totalRegistros;
                
                
                $usuarioBd = null;
                $gestarEventos = null;
                header("location: ../principal.php?contenido=vistas/vistasEventos/listarRegistrosEventos.php");
                break;
                
            case "insertarEventos":
                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $gestarEventos = new EventosDAO($usuarioBd, BASE, SERVIDOR);
//                $insertarEventos = new EventosVO();
                $existeEventos = $gestarEventos->seleccionarId(array($this->datos["eveId"])); //Se revisa si existe el libro en la base
                if (empty($existeEventos['registroEncontrado'])) {//Si no existe el libro en la base se procede a insertar
                    $insertoEventos = $gestarEventos->insertar($this->datos); //inserción de los campos en la tabla libros
                    $exitoInsercionEventos = $insertoEventos['inserto']; //indica si se logró inserción de los campos en la tabla libros
                    $resultadoInsercionEventos = $insertoEventos['resultado']; //Traer el id con que quedó el usuario de lo contrario la excepción o fallo
//                    if (1 == $exitoInsercionUsuario_s) {//si se logró la inserción de los campos en la tabla usuario_s insertar datos en tabla persona
                    session_start(); //se abre sesión para almacenar en ella el mensaje de inserción
                    $_SESSION['mensaje'] = "Registrado con èxito. Agregado Nuevo Evento"; //mensaje de inserción
                    if ($this->datos['ruta'] == 'insertarEventos') {//si el formulario de la inserción es el de Agregar Libros y fue exitoso se devuelve a listarRegistrosLibros.php
//                        header("location:../principal.php?contenido=vistas/vistasLibros/listarRegistrosLibros.php");
//                        header("refresh:2;url=../principal.php?contenido=vistas/vistasLibros/listarRegistrosLibros.php");
                        header("location:../principal.php?contenido=vistas/vistasEventos/listarRegistrosEventos.php");
                    }
                } else {//Si el libro ya existe devolver datos al formulario por medio de la sesión
                    session_start();
                    $_SESSION['eveId'] = $this->datos['eveId'];
                    $_SESSION['eveFechaInicial'] = $this->datos['eveFechaInicial'];
                    $_SESSION['eveCantidadPax'] = $this->datos['eveCantidadPax'];
                    $_SESSION['Clientes_cliDocumento'] = $this->datos['Clientes_cliDocumento'];
                    $_SESSION['eveEstado'] = $this->datos['eveEstado'];
                    $_SESSION['mensaje'] = "El Cliente ya existe en el sistema.";
                    if ($this->datos['ruta'] == 'insertarEventos') {//si al insertar un usuario en el formulario de Agregar nuevo usuario y éste ya existe a listarRegistrosUsuario_s.php
                        header("location:../principal.php?contenido=vistas/vistasEventos/vistaInsertarEventos.php");
                    }
                }
                break;    
                
            case "actualizarEventos":
                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $gestarEventos = new EventosDAO($usuarioBd, BASE, SERVIDOR);
//                $consultaEventos = new EventosVO();
                $consultaDeEventos = $gestarEventos->seleccionarId(array($this->datos["idAct"])); //Se consulta el libro para traer los datos.

                $actualizarDatosEventos = $consultaDeEventos['registroEncontrado'][0];
                session_start();
                $_SESSION['actualizarDatosEventos'] = $actualizarDatosEventos;
                header("location:../principal.php?contenido=vistas/vistasEventos/vistaActualizarEventos.php");


                break;
            case "confirmaActualizarEventos":
                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $gestarEventos = new EventosDAO($usuarioBd, BASE, SERVIDOR);
//                $consultaClientes = new ClientesVO();
                $actualizarEventos = $gestarEventos->actualizar(array($this->datos)); //Se envía datos del libro para actualizar.

                $actualizarEventos = $consultaDeEventos['registroEncontrado'][0];
                session_start();
                $_SESSION['mensaje'] = "Actualización realizada.";
                header("location:ControladorPrincipal.php?ruta=listarEventos");
                break; 
            
            case "eliminarEventos":
            $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
            $gestarEventos = new EventosDAO($usuarioBd, BASE, SERVIDOR);
//                $consultaEventos = new EventosVO();
            $consultaDeEventos = $gestarEventos->seleccionarId(array($this->datos["idAct"])); //Se consulta el Insumos para traer los datos.

            
            $eliminarDatosEventos = $consultaDeEventos['registroEncontrado'][0];
            session_start();
            $_SESSION['eliminarDatosEventos'] = $eliminarDatosEventos;
            header("location:../principal.php?contenido=vistas/vistasEventos/vistaEliminarEventos.php");

            session_start();            
            break;
            
                case "confirmaEliminarEventos":
                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $gestarEventos = new EventosDAO($usuarioBd, BASE, SERVIDOR);
//                $consultaEventos = new EventosVO();
                $eliminarEventos = $gestarEventos->eliminar(array($this->datos)); //Se envía datos del Insumos para eliminar.

                $eliminarEventos = $consultaDeEventos['registroEncontrado'][0];
                session_start();
                $_SESSION['mensaje'] = "Se ha eliminado el Evento.";
                header("location:ControladorPrincipal.php?ruta=listarEventos");
                break;

            
            default:
                break;
        }
    }
}