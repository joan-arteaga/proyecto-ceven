<?php
include_once './../modelos/ConstantesConexion.php';
require_once PATH . 'modelos/UsuarioBD.php';
require_once PATH . 'modelos/modeloServicios/ServiciosDAO.php';
require_once PATH . 'modelos/modeloServicios/ServiciosVO.php';
class ServiciosControlador {
    private $datos = array();
    public function __construct($datos) {
        $this->datos = $datos;
    }
    public function serviciosControlador() {
        switch ($this->datos["ruta"]) {
            case "listarServicios":
                if (isset($this->datos['pag']) && (int) $this->datos['pag'] > 0) {
                    $pagInicio = $this->datos['pag'];
                } else {
                    $pagInicio = 0;
                }
                $limit = 5;
                
                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $consultarServicios = new ServiciosVO();
                
                $gestarServicios = new ServiciosDAO($usuarioBd, BASE, SERVIDOR);
                $resultadoConsultaPaginada = $gestarServicios->consultaPaginada($consultarServicios, $limit, $pagInicio);
                $totalRegistros = $resultadoConsultaPaginada[0];
                $listaDeServicios = $resultadoConsultaPaginada[1];
                $paginacionVinculos = $gestarServicios->enlacesPaginacion($totalRegistros, $limit, $pagInicio);
                
                $_SESSION['serIdF'] = (isset($_POST['serId'])) ? $_POST['serId'] : NULL;/********CORRECTO*/
                $_SESSION['serNombreF'] = (isset($this->datos['serNombre'])) ? $this->datos['serNombre'] : NULL;
                $_SESSION['serDescripcionF'] = (isset($this->datos['serDescripcion'])) ? $this->datos['serDescripcion'] : NULL;
                $_SESSION['serEstadoF'] = (isset($this->datos['serEstado'])) ? $this->datos['serEstado'] : NULL;
                $_SESSION['buscarF'] = (isset($this->datos['buscar'])) ? $this->datos['buscar'] : NULL;

                
                session_start();
                $_SESSION['listaDeServicios'] = $listaDeServicios;
                $_SESSION['paginacionVinculos'] = $paginacionVinculos;
                $_SESSION['totalRegistros'] = $totalRegistros;
                
                $usuarioBd = null;
                $gestarServicios = null;
                header("location: ../principal.php?contenido=vistas/vistasServicios/listarRegistrosServicios.php");
                break;
                
            case "insertarServicios":
                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $gestarServicios = new ServiciosDAO($usuarioBd, BASE, SERVIDOR);
//                $insertarLibro = new LibroVO();
                $existeServicios = $gestarServicios->seleccionarId(array($this->datos["serId"])); //Se revisa si existe el libro en la base
                if (empty($existeServicios['registroEncontrado'])) {//Si no existe el libro en la base se procede a insertar
                    $insertoServicios = $gestarServicios->insertar($this->datos); //inserción de los campos en la tabla libros
                    $exitoInsercionServicios = $insertoServicios['inserto']; //indica si se logró inserción de los campos en la tabla libros
                    $resultadoInsercionServicios = $insertoServicios['resultado']; //Traer el id con que quedó el usuario de lo contrario la excepción o fallo
//                    if (1 == $exitoInsercionUsuario_s) {//si se logró la inserción de los campos en la tabla usuario_s insertar datos en tabla persona
                    session_start(); //se abre sesión para almacenar en ella el mensaje de inserción
                    $_SESSION['mensaje'] = "Registrado con èxito. Agregado Nuevo Servicio"; //mensaje de inserción
                    if ($this->datos['ruta'] == 'insertarServicios') {//si el formulario de la inserción es el de Agregar Libros y fue exitoso se devuelve a listarRegistrosLibros.php
//                        header("location:../principal.php?contenido=vistas/vistasLibros/listarRegistrosLibros.php");
//                        header("refresh:2;url=../principal.php?contenido=vistas/vistasLibros/listarRegistrosLibros.php");
                        header("location:../principal.php?contenido=vistas/vistasServicios/listarRegistrosServicios.php");
                    }
                } else {//Si el libro ya existe devolver datos al formulario por medio de la sesión
                    session_start();
                    $_SESSION['serId'] = $this->datos['serId'];
                    $_SESSION['serNombre'] = $this->datos['serNombre'];
                    $_SESSION['serDescripcion'] = $this->datos['serDescripcion'];
                    $_SESSION['serEstado'] = $this->datos['serEstado'];
                    $_SESSION['mensaje'] = "El Servicio ya existe en el sistema.";
                    if ($this->datos['ruta'] == 'insertarServicios') {//si al insertar un usuario en el formulario de Agregar nuevo usuario y éste ya existe a listarRegistrosUsuario_s.php
                        header("location:../principal.php?contenido=vistas/vistasServicios/vistaInsertarServicios.php");
                    }
                }
                break;
                
            case "actualizarServicios":
                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $gestarServicios = new ServiciosDAO($usuarioBd, BASE, SERVIDOR);
//                $consultaClientes = new ClientesVO();
                $consultaDeServicios = $gestarServicios->seleccionarId(array($this->datos["idAct"])); //Se consulta el libro para traer los datos.

                $actualizarDatosServicios = $consultaDeServicios['registroEncontrado'][0];
                session_start();
                $_SESSION['actualizarDatosServicios'] = $actualizarDatosServicios;
                header("location:../principal.php?contenido=vistas/vistasServicios/vistaActualizarServicios.php");


                break;
            case "confirmaActualizarServicios":
                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $gestarServicios = new ServiciosDAO($usuarioBd, BASE, SERVIDOR);
//                $consultaServicios = new ServiciosVO();
                $actualizarServicios = $gestarServicios->actualizar(array($this->datos)); //Se envía datos del libro para actualizar.

                $actualizarServicios = $consultaDeServicios['registroEncontrado'][0];
                session_start();
                $_SESSION['mensaje'] = "Actualización realizada.";
                header("location:ControladorPrincipal.php?ruta=listarServicios");
                break;
            default:
                break;
        }
    }
}