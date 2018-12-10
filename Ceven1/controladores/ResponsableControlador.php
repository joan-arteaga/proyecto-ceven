<?php
include_once './../modelos/ConstantesConexion.php';
require_once PATH . 'modelos/UsuarioBD.php';
require_once PATH . 'modelos/modeloResponsable/ResponsableDAO.php';
require_once PATH . 'modelos/modeloResponsable/ResponsableVO.php';
class ResponsableControlador {
    private $datos = array();
    public function __construct($datos) {
        $this->datos = $datos;
    }
    public function responsableControlador() {
        switch ($this->datos["ruta"]) {
            case "listarResponsable":
                
                if (isset($this->datos['pag']) && (int) $this->datos['pag'] > 0) {
                    $pagInicio = $this->datos['pag'];
                } else {
                    $pagInicio = 0;
                }
                $limit = 5;
                
                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $consultarResponsable = new ResponsableVO();
                
                $gestarResponsable = new ResponsableDAO($usuarioBd, BASE, SERVIDOR);
                $resultadoConsultaPaginada = $gestarResponsable->consultaPaginada($consultarResponsable, $limit, $pagInicio);
                $totalRegistros = $resultadoConsultaPaginada[0];
                $listaDeResponsable = $resultadoConsultaPaginada[1];
                $paginacionVinculos = $gestarResponsable->enlacesPaginacion($totalRegistros, $limit, $pagInicio);
                
                //se almacenan en sesion las variables del filtro
//                $_SESSION['isbnF'] = (isset($this->datos['isbn'])) ? $this->datos['isbn'] : NULL;
                $_SESSION['eventos_eveIdF'] = (isset($_POST['eventos_eveId'])) ? $_POST['eventos_eveId'] : NULL;/********CORRECTO*/
                $_SESSION['persona_perIdF'] = (isset($this->datos['persona_perId'])) ? $this->datos['persona_perId'] : NULL;
                $_SESSION['resEstadoF'] = (isset($this->datos['resEstado'])) ? $this->datos['resEstado'] : NULL;
                $_SESSION['buscarF'] = (isset($this->datos['buscar'])) ? $this->datos['buscar'] : NULL;

                
                session_start();
                $_SESSION['listaDeResponsable'] = $listaDeResponsable;
                $_SESSION['paginacionVinculos'] = $paginacionVinculos;
                $_SESSION['totalRegistros'] = $totalRegistros;
                
                
                $usuarioBd = null;
                $gestarResponsable = null;
                header("location: ../principal.php?contenido=vistas/vistasResponsable/listarRegistrosResponsable.php");
                break;
                
            case "insertarResponsable":
                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $gestarResponsable = new ResponsableDAO($usuarioBd, BASE, SERVIDOR);
//                $insertarLibro = new LibroVO();
                $existeResponsable = $gestarResponsable->seleccionarId(array($this->datos["eventos_eveId"])); //Se revisa si existe el libro en la base
                if (empty($existeResponsable['registroEncontrado'])) {//Si no existe el libro en la base se procede a insertar
                    $insertoResponsable = $gestarResponsable->insertar($this->datos); //inserción de los campos en la tabla libros
                    $exitoInsercionResponsable = $insertoResponsable['inserto']; //indica si se logró inserción de los campos en la tabla libros
                    $resultadoInsercionResponsable = $insertoResponsable['resultado']; //Traer el id con que quedó el usuario de lo contrario la excepción o fallo
//                    if (1 == $exitoInsercionUsuario_s) {//si se logró la inserción de los campos en la tabla usuario_s insertar datos en tabla persona
                    session_start(); //se abre sesión para almacenar en ella el mensaje de inserción
                    $_SESSION['mensaje'] = "Registrado con èxito. Agregado Nuevo Responsable"; //mensaje de inserción
                    if ($this->datos['ruta'] == 'insertarResponsable') {//si el formulario de la inserción es el de Agregar Libros y fue exitoso se devuelve a listarRegistrosLibros.php
//                        header("location:../principal.php?contenido=vistas/vistasLibros/listarRegistrosLibros.php");
//                        header("refresh:2;url=../principal.php?contenido=vistas/vistasLibros/listarRegistrosLibros.php");
                        header("location:../principal.php?contenido=vistas/vistasResponsable/listarRegistrosResponsable.php");
                    }
                } else {//Si el libro ya existe devolver datos al formulario por medio de la sesión
                    session_start();
                    $_SESSION['eventos_eveId'] = $this->datos['eventos_eveId'];
                    $_SESSION['persona_perId'] = $this->datos['persona_perId'];
                    $_SESSION['resEstado'] = $this->datos['resEstado'];
                    $_SESSION['mensaje'] = "El Cliente ya existe en el sistema.";
                    if ($this->datos['ruta'] == 'insertarResponsable') {//si al insertar un usuario en el formulario de Agregar nuevo usuario y éste ya existe a listarRegistrosUsuario_s.php
                        header("location:../principal.php?contenido=vistas/vistasResponsable/vistaInsertarResponsable.php");
                    }
                }
                break;    
                
            case "actualizarResponsable":
                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $gestarResponsable = new ResponsableDAO($usuarioBd, BASE, SERVIDOR);
//                $consultaResponsable = new ResponsableVO();
                $consultaDeResponsable = $gestarResponsable->seleccionarId(array($this->datos["idAct"])); //Se consulta el libro para traer los datos.

                $actualizarDatosResponsable = $consultaDeResponsable['registroEncontrado'][0];
                session_start();
                $_SESSION['actualizarDatosResponsable'] = $actualizarDatosResponsable;
                header("location:../principal.php?contenido=vistas/vistasResponsable/vistaActualizarResponsable.php");


                break;
            case "confirmaActualizarResponsable":
                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $gestarResponsable = new ResponsableDAO($usuarioBd, BASE, SERVIDOR);
//                $consultaResponsable = new ResponsableVO();
                $actualizarResponsable = $gestarResponsable->actualizar(array($this->datos)); //Se envía datos del libro para actualizar.

                $actualizarResponsable = $consultaDeResponsable['registroEncontrado'][0];
                session_start();
                $_SESSION['mensaje'] = "Actualización realizada.";
                header("location:ControladorPrincipal.php?ruta=listarResponsable");
                break;    
            default:
                break;
        }
    }
}