<?php
include_once './../modelos/ConstantesConexion.php';
require_once PATH . 'modelos/UsuarioBD.php';
require_once PATH . 'modelos/modeloCargo/CargoDAO.php';
require_once PATH . 'modelos/modeloCargo/CargoVO.php';
class CargoControlador {
    private $datos = array();
    public function __construct($datos) {
        $this->datos = $datos;
    }
    public function cargoControlador() {
        switch ($this->datos["ruta"]) {
            case "listarCargo":
                if (isset($this->datos['pag']) && (int) $this->datos['pag'] > 0) {
                    $pagInicio = $this->datos['pag'];
                } else {
                    $pagInicio = 0;
                }
                $limit = 5;
                
                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $consultarCargo = new CargoVO();
                
                $gestarCargo = new CargoDAO($usuarioBd, BASE, SERVIDOR);
                $resultadoConsultaPaginada = $gestarCargo->consultaPaginada($consultarCargo, $limit, $pagInicio);
                $totalRegistros = $resultadoConsultaPaginada[0];
                $listaDeCargo = $resultadoConsultaPaginada[1];
                $paginacionVinculos = $gestarCargo->enlacesPaginacion($totalRegistros, $limit, $pagInicio);
                
                $_SESSION['rolIdF'] = (isset($_POST['rolId'])) ? $_POST['rolId'] : NULL;/********CORRECTO*/
                $_SESSION['rolNombreF'] = (isset($this->datos['rolNombre'])) ? $this->datos['rolNombre'] : NULL;
                $_SESSION['rolDescripcionF'] = (isset($this->datos['rolDescripcion'])) ? $this->datos['rolDescripcion'] : NULL;
                $_SESSION['rolEstadoF'] = (isset($this->datos['rolEstado'])) ? $this->datos['rolEstado'] : NULL;
                $_SESSION['buscarF'] = (isset($this->datos['buscar'])) ? $this->datos['buscar'] : NULL;

                
                session_start();
                $_SESSION['listaDeCargo'] = $listaDeCargo;
                $_SESSION['paginacionVinculos'] = $paginacionVinculos;
                $_SESSION['totalRegistros'] = $totalRegistros;
                
                $usuarioBd = null;
                $gestarCargo = null;
                header("location: ../principal.php?contenido=vistas/vistasCargo/listarRegistrosCargo.php");
                break;
                
            case "insertarCargo":
                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $gestarCargo = new CargoDAO($usuarioBd, BASE, SERVIDOR);
//                $insertarCargo = new CargoVO();
                $existeCargo = $gestarCargo->seleccionarId(array($this->datos["rolId"])); //Se revisa si existe el libro en la base
                if (empty($existeCargo['registroEncontrado'])) {//Si no existe el libro en la base se procede a insertar
                    $insertoCargo = $gestarCargo->insertar($this->datos); //inserción de los campos en la tabla libros
                    $exitoInsercionCargo = $insertoCargo['inserto']; //indica si se logró inserción de los campos en la tabla libros
                    $resultadoInsercionCargo = $insertoCargo['resultado']; //Traer el id con que quedó el usuario de lo contrario la excepción o fallo
//                    if (1 == $exitoInsercionUsuario_s) {//si se logró la inserción de los campos en la tabla usuario_s insertar datos en tabla persona
                    session_start(); //se abre sesión para almacenar en ella el mensaje de inserción
                    $_SESSION['mensaje'] = "Registrado con èxito. Agregado Nuevo Cargo"; //mensaje de inserción
                    if ($this->datos['ruta'] == 'insertarCargo') {//si el formulario de la inserción es el de Agregar Libros y fue exitoso se devuelve a listarRegistrosLibros.php
//                        header("location:../principal.php?contenido=vistas/vistasLibros/listarRegistrosLibros.php");
//                        header("refresh:2;url=../principal.php?contenido=vistas/vistasLibros/listarRegistrosLibros.php");
                        header("location:../principal.php?contenido=vistas/vistasCargo/listarRegistrosCargo.php");
                    }
                } else {//Si el libro ya existe devolver datos al formulario por medio de la sesión
                    session_start();
                    $_SESSION['rolId'] = $this->datos['rolId'];
                    $_SESSION['rolNombre'] = $this->datos['rolNombre'];
                    $_SESSION['rolDescripcion'] = $this->datos['rolDescripcion'];
                    $_SESSION['rolEstado'] = $this->datos['rolEstado'];
                    $_SESSION['mensaje'] = "El Cargo ya existe en el sistema.";
                    if ($this->datos['ruta'] == 'insertarCargo') {//si al insertar un usuario en el formulario de Agregar nuevo usuario y éste ya existe a listarRegistrosUsuario_s.php
                        header("location:../principal.php?contenido=vistas/vistasCargo/vistaInsertarCargo.php");
                    }
                }
                break;
                
            case "actualizarCargo":
                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $gestarCargo = new CargoDAO($usuarioBd, BASE, SERVIDOR);
//                $consultaClientes = new ClientesVO();
                $consultaDeCargo = $gestarCargo->seleccionarId(array($this->datos["idAct"])); //Se consulta el libro para traer los datos.

                $actualizarDatosCargo = $consultaDeCargo['registroEncontrado'][0];
                session_start();
                $_SESSION['actualizarDatosCargo'] = $actualizarDatosCargo;
                header("location:../principal.php?contenido=vistas/vistasCargo/vistaActualizarCargo.php");


                break;
            case "confirmaActualizarCargo":
                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $gestarCargo = new CargoDAO($usuarioBd, BASE, SERVIDOR);
//                $consultaCargo = new CargoVO();
                $actualizarCargo = $gestarCargo->actualizar(array($this->datos)); //Se envía datos del libro para actualizar.

                $actualizarCargo = $consultaDeCargo['registroEncontrado'][0];
                session_start();
                $_SESSION['mensaje'] = "Actualización realizada.";
                header("location:ControladorPrincipal.php?ruta=listarCargo");
                break;
            default:
                break;
        }
    }
}