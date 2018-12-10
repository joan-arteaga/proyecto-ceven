<?php
include_once './../modelos/ConstantesConexion.php';
require_once PATH . 'modelos/UsuarioBD.php';
require_once PATH . 'modelos/modeloEveser/EveserDAO.php';
require_once PATH . 'modelos/modeloEveser/EveserVO.php';
class EveserControlador {
    private $datos = array();
    public function __construct($datos) {
        $this->datos = $datos;
    }
    public function eveserControlador() {
        switch ($this->datos["ruta"]) {
            case "listarEveser":
                
                if (isset($this->datos['pag']) && (int) $this->datos['pag'] > 0) {
                    $pagInicio = $this->datos['pag'];
                } else {
                    $pagInicio = 0;
                }
                $limit = 5;
                
                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $consultarEveser = new EveserVO();
                
                $gestarEveser = new EveserDAO($usuarioBd, BASE, SERVIDOR);
                $resultadoConsultaPaginada = $gestarEveser->consultaPaginada($consultarEveser, $limit, $pagInicio);
                $totalRegistros = $resultadoConsultaPaginada[0];
                $listaDeEveser = $resultadoConsultaPaginada[1];
                $paginacionVinculos = $gestarEveser->enlacesPaginacion($totalRegistros, $limit, $pagInicio);
                
                //se almacenan en sesion las variables del filtro
//                $_SESSION['isbnF'] = (isset($this->datos['isbn'])) ? $this->datos['isbn'] : NULL;
                $_SESSION['Eventos_eveIdF'] = (isset($_POST['Eventos_eveId'])) ? $_POST['Eventos_eveId'] : NULL;/********CORRECTO*/
                $_SESSION['Eventos_Clientes_cliDocumentoF'] = (isset($this->datos['Eventos_Clientes_cliDocumento'])) ? $this->datos['Eventos_Clientes_cliDocumento'] : NULL;
                $_SESSION['Servicios_serIdF'] = (isset($this->datos['Servicios_serId'])) ? $this->datos['Servicios_serId'] : NULL;
                $_SESSION['evsEstadoF'] = (isset($this->datos['evsEstado'])) ? $this->datos['evsEstado'] : NULL;
                $_SESSION['buscarF'] = (isset($this->datos['buscar'])) ? $this->datos['buscar'] : NULL;

                
                session_start();
                $_SESSION['listaDeEveser'] = $listaDeEveser;
                $_SESSION['paginacionVinculos'] = $paginacionVinculos;
                $_SESSION['totalRegistros'] = $totalRegistros;
                
                
                $usuarioBd = null;
                $gestarEveser = null;
                header("location: ../principal.php?contenido=vistas/vistasEveser/listarRegistrosEveser.php");
                break;
                
            case "insertarEveser":
                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $gestarEveser = new EveserDAO($usuarioBd, BASE, SERVIDOR);
//                $insertarEveser = new EveserVO();
                 //Se revisa si existe el libro en la base
                //Si no existe el libro en la base se procede a insertar
                    $insertoEveser = $gestarEveser->insertar($this->datos); //inserción de los campos en la tabla libros
                    $exitoInsercionEveser = $insertoEveser['inserto']; //indica si se logró inserción de los campos en la tabla libros
                    $resultadoInsercionEveser = $insertoEveser['resultado']; //Traer el id con que quedó el usuario de lo contrario la excepción o fallo
//                    if (1 == $exitoInsercionUsuario_s) {//si se logró la inserción de los campos en la tabla usuario_s insertar datos en tabla persona
                    session_start(); //se abre sesión para almacenar en ella el mensaje de inserción
                    $_SESSION['mensaje'] = "Registrado con èxito. Agregados Nuevos Detalles al Evento"; //mensaje de inserción
                    if ($this->datos['ruta'] == 'insertarEveser') {//si el formulario de la inserción es el de Agregar Libros y fue exitoso se devuelve a listarRegistrosLibros.php
//                        header("location:../principal.php?contenido=vistas/vistasLibros/listarRegistrosLibros.php");
//                        header("refresh:2;url=../principal.php?contenido=vistas/vistasLibros/listarRegistrosLibros.php");
                        header("location:../principal.php?contenido=vistas/vistasEveser/listarRegistrosEveser.php");
                    }
                 //Si el libro ya existe devolver datos al formulario por medio de la sesión
                    
                break;    
                
            case "actualizarEveser":
                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $gestarEveser = new EveserDAO($usuarioBd, BASE, SERVIDOR);
//                $consultaEveser = new EveserVO();
                $consultaDeEveser = $gestarEveser->seleccionarId(array($this->datos["idAct"])); //Se consulta el libro para traer los datos.

                $actualizarDatosEveser = $consultaDeEveser['registroEncontrado'][0];
                session_start();
                $_SESSION['actualizarDatosEveser'] = $actualizarDatosEveser;
                header("location:../principal.php?contenido=vistas/vistasEveser/vistaActualizarEveser.php");


                break;
            case "confirmaActualizarEveser":
                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $gestarEveser = new EveserDAO($usuarioBd, BASE, SERVIDOR);
//                $consultaEveser = new EveserVO();
                $actualizarEveser = $gestarEveser->actualizar(array($this->datos)); //Se envía datos del libro para actualizar.

                $actualizarEveser = $consultaDeEveser['registroEncontrado'][0];
                session_start();
                $_SESSION['mensaje'] = "Actualización realizada.";
                header("location:ControladorPrincipal.php?ruta=listarEveser");
                break;    
            default:
                break;
        }
    }
}