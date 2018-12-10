<?php
include_once './../modelos/ConstantesConexion.php';
require_once PATH . 'modelos/UsuarioBD.php';
require_once PATH . 'modelos/modeloClientes/ClientesDAO.php';
require_once PATH . 'modelos/modeloClientes/ClientesVO.php';
class ClientesControlador {
    private $datos = array();
    public function __construct($datos) {
        $this->datos = $datos;
    }
    public function clientesControlador() {
        switch ($this->datos["ruta"]) {
            case "listarClientes":
                
                if (isset($this->datos['pag']) && (int) $this->datos['pag'] > 0) {
                    $pagInicio = $this->datos['pag'];
                } else {
                    $pagInicio = 0;
                }
                $limit = 5;
                
                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $consultarClientes = new ClientesVO();
                
                $gestarClientes = new ClientesDAO($usuarioBd, BASE, SERVIDOR);
                $resultadoConsultaPaginada = $gestarClientes->consultaPaginada($consultarClientes, $limit, $pagInicio);
                $totalRegistros = $resultadoConsultaPaginada[0];
                $listaDeClientes = $resultadoConsultaPaginada[1];
                $paginacionVinculos = $gestarClientes->enlacesPaginacion($totalRegistros, $limit, $pagInicio);
                
                //se almacenan en sesion las variables del filtro
//                $_SESSION['isbnF'] = (isset($this->datos['isbn'])) ? $this->datos['isbn'] : NULL;
                $_SESSION['cliDocumentoF'] = (isset($_POST['cliDocumento'])) ? $_POST['cliDocumento'] : NULL;/********CORRECTO*/
                $_SESSION['cliNombreF'] = (isset($this->datos['cliNombre'])) ? $this->datos['cliNombre'] : NULL;
                $_SESSION['cliApellido1F'] = (isset($this->datos['cliApellido1'])) ? $this->datos['cliApellido1'] : NULL;
                $_SESSION['cliApellido2F'] = (isset($this->datos['cliApellido2'])) ? $this->datos['cliApellido2'] : NULL;
                $_SESSION['cliFechaNacimientoF'] = (isset($this->datos['cliFechaNacimiento'])) ? $this->datos['cliFechaNacimiento'] : NULL;
                $_SESSION['cliGeneroF'] = (isset($this->datos['cliGenero'])) ? $this->datos['cliGenero'] : NULL;
                $_SESSION['cliEstadoF'] = (isset($this->datos['cliEstado'])) ? $this->datos['cliEstado'] : NULL;
                $_SESSION['buscarF'] = (isset($this->datos['buscar'])) ? $this->datos['buscar'] : NULL;

                
                session_start();
                $_SESSION['listaDeClientes'] = $listaDeClientes;
                $_SESSION['paginacionVinculos'] = $paginacionVinculos;
                $_SESSION['totalRegistros'] = $totalRegistros;
                
                
                $usuarioBd = null;
                $gestarClientes = null;
                header("location: ../principal.php?contenido=vistas/vistasClientes/listarRegistrosClientes.php");
                break;
                
            case "insertarClientes":
                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $gestarClientes = new ClientesDAO($usuarioBd, BASE, SERVIDOR);
//                $insertarLibro = new LibroVO();
                $existeClientes = $gestarClientes->seleccionarId(array($this->datos["cliDocumento"])); //Se revisa si existe el libro en la base
                if (empty($existeClientes['registroEncontrado'])) {//Si no existe el libro en la base se procede a insertar
                    $insertoClientes = $gestarClientes->insertar($this->datos); //inserción de los campos en la tabla libros
                    $exitoInsercionClientes = $insertoClientes['inserto']; //indica si se logró inserción de los campos en la tabla libros
                    $resultadoInsercionClientes = $insertoClientes['resultado']; //Traer el id con que quedó el usuario de lo contrario la excepción o fallo
//                    if (1 == $exitoInsercionUsuario_s) {//si se logró la inserción de los campos en la tabla usuario_s insertar datos en tabla persona
                    session_start(); //se abre sesión para almacenar en ella el mensaje de inserción
                    $_SESSION['mensaje'] = "Registrado con èxito. Agregado Nuevo Cliente"; //mensaje de inserción
                    if ($this->datos['ruta'] == 'insertarClientes') {//si el formulario de la inserción es el de Agregar Libros y fue exitoso se devuelve a listarRegistrosLibros.php
//                        header("location:../principal.php?contenido=vistas/vistasLibros/listarRegistrosLibros.php");
//                        header("refresh:2;url=../principal.php?contenido=vistas/vistasLibros/listarRegistrosLibros.php");
                        header("location:../principal.php?contenido=vistas/vistasClientes/listarRegistrosClientes.php");
                    }
                } else {//Si el libro ya existe devolver datos al formulario por medio de la sesión
                    session_start();
                    $_SESSION['cliDocumento'] = $this->datos['cliDocumento'];
                    $_SESSION['cliNombre'] = $this->datos['cliNombre'];
                    $_SESSION['cliApellido1'] = $this->datos['cliApellido1'];
                    $_SESSION['cliApellido2'] = $this->datos['cliApellido2'];
                    $_SESSION['cliFechaNacimiento'] = $this->datos['cliFechaNacimiento'];
                    $_SESSION['cliGenero'] = $this->datos['cliGenero'];
                    $_SESSION['cliEstado'] = $this->datos['cliEstado'];
                    $_SESSION['mensaje'] = "El Cliente ya existe en el sistema.";
                    if ($this->datos['ruta'] == 'insertarClientes') {//si al insertar un usuario en el formulario de Agregar nuevo usuario y éste ya existe a listarRegistrosUsuario_s.php
                        header("location:../principal.php?contenido=vistas/vistasClientes/vistaInsertarClientes.php");
                    }
                }
                break;    
                
            case "actualizarClientes":
                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $gestarClientes = new ClientesDAO($usuarioBd, BASE, SERVIDOR);
//                $consultaClientes = new ClientesVO();
                $consultaDeClientes = $gestarClientes->seleccionarId(array($this->datos["idAct"])); //Se consulta el libro para traer los datos.

                $actualizarDatosClientes = $consultaDeClientes['registroEncontrado'][0];
                session_start();
                $_SESSION['actualizarDatosClientes'] = $actualizarDatosClientes;
                header("location:../principal.php?contenido=vistas/vistasClientes/vistaActualizarClientes.php");


                break;
            case "confirmaActualizarClientes":
                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $gestarClientes = new ClientesDAO($usuarioBd, BASE, SERVIDOR);
//                $consultaClientes = new ClientesVO();
                $actualizarClientes = $gestarClientes->actualizar(array($this->datos)); //Se envía datos del libro para actualizar.

                $actualizarClientes = $consultaDeClientes['registroEncontrado'][0];
                session_start();
                $_SESSION['mensaje'] = "Actualización realizada.";
                header("location:ControladorPrincipal.php?ruta=listarClientes");
                break;
            default:
                break;
        }
    }
}