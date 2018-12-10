<?php
include_once './../modelos/ConstantesConexion.php';
require_once PATH . 'modelos/UsuarioBD.php';
require_once PATH . 'modelos/modeloPersona/Persona_1DAO.php';
require_once PATH . 'modelos/modeloPersona/Persona_1VO.php';
class Persona_1Controlador {
    private $datos = array();
    public function __construct($datos) {
        $this->datos = $datos;
    }
    public function persona_1Controlador() {
        switch ($this->datos["ruta"]) {
            case "listarPersona_1":
                
                if (isset($this->datos['pag']) && (int) $this->datos['pag'] > 0) {
                    $pagInicio = $this->datos['pag'];
                } else {
                    $pagInicio = 0;
                }
                $limit = 5;
                
                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $consultarPersona_1 = new Persona_1VO();
                
                $gestarPersona_1 = new Persona_1DAO($usuarioBd, BASE, SERVIDOR);
                $resultadoConsultaPaginada = $gestarPersona_1->consultaPaginada($consultarPersona_1s, $limit, $pagInicio);
                $totalRegistros = $resultadoConsultaPaginada[0];
                $listaDePersona_1 = $resultadoConsultaPaginada[1];
                $paginacionVinculos = $gestarPersona_1->enlacesPaginacion($totalRegistros, $limit, $pagInicio);
                
                //se almacenan en sesion las variables del filtro
//                $_SESSION['isbnF'] = (isset($this->datos['isbn'])) ? $this->datos['isbn'] : NULL;
                $_SESSION['perIdF'] = (isset($_POST['perId'])) ? $_POST['perId'] : NULL;/********CORRECTO*/
                $_SESSION['perDocumentoF'] = (isset($this->datos['perDocumento'])) ? $this->datos['perDocumento'] : NULL;
                $_SESSION['perNombreF'] = (isset($this->datos['perNombre'])) ? $this->datos['perNombre'] : NULL;
                $_SESSION['perApellidoF'] = (isset($this->datos['perApellido'])) ? $this->datos['perApellido'] : NULL;
                $_SESSION['usuLoginF'] = (isset($this->datos['usuLogin'])) ? $this->datos['usuLogin'] : NULL;
                $_SESSION['perEstadoF'] = (isset($this->datos['perEstado'])) ? $this->datos['perEstado'] : NULL;
                $_SESSION['buscarF'] = (isset($this->datos['buscar'])) ? $this->datos['buscar'] : NULL;

                
                session_start();
                $_SESSION['listaDePersona_1'] = $listaDePersona_1;
                $_SESSION['paginacionVinculos'] = $paginacionVinculos;
                $_SESSION['totalRegistros'] = $totalRegistros;
                
                
                $usuarioBd = null;
                $gestarPersona_1 = null;
                header("location: ../principal.php?contenido=vistas/vistasPersona_1/listarRegistrosPersona_1.php");
                break;
                
            case "actualizarPersona_1":
                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $gestarPersona_1 = new Persona_1DAO($usuarioBd, BASE, SERVIDOR);
//                $consultaPersona_1 = new Persona_1VO();
                $consultaDePersona_1 = $gestarPersona_1->seleccionarId(array($this->datos["idAct"])); //Se consulta el libro para traer los datos.

                $actualizarDatosPersona_1 = $consultaDePersona_1['registroEncontrado'][0];
                session_start();
                $_SESSION['actualizarDatosPersona_1'] = $actualizarDatosPersona_1;
                header("location:../principal.php?contenido=vistas/vistasPersona_1/vistaActualizarPersona_1.php");


                break;
            case "confirmaActualizarPersona_1":
                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $gestarPersona_1 = new Persona_1DAO($usuarioBd, BASE, SERVIDOR);
//                $consultaPersona_1 = new Persona_1VO();
                $actualizarPersona_1 = $gestarPersona_1->actualizar(array($this->datos)); //Se envía datos del libro para actualizar.

                $actualizarPersona_1 = $consultaDePersona_1['registroEncontrado'][0];
                session_start();
                $_SESSION['mensaje'] = "Actualización realizada.";
                header("location:ControladorPrincipal.php?ruta=listarPersona_1");
                break;    
            default:
                break;
        }
    }
}