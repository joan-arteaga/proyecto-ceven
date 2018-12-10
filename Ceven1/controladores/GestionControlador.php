<?php
include_once './../modelos/ConstantesConexion.php';
require_once PATH . 'modelos/UsuarioBD.php';
require_once PATH . 'modelos/modeloGestion/GestionDAO.php';
require_once PATH . 'modelos/modeloGestion/GestionVO.php';
class GestionControlador {
    private $datos = array();
    public function __construct($datos) {
        $this->datos = $datos;
    }
    public function gestionControlador() {
        switch ($this->datos["ruta"]) {
            case "listarGestion":
                
                if (isset($this->datos['pag']) && (int) $this->datos['pag'] > 0) {
                    $pagInicio = $this->datos['pag'];
                } else {
                    $pagInicio = 0;
                }
                $limit = 5;
                
                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $consultarGestion = new GestionVO();
                
                $gestarGestion = new GestionDAO($usuarioBd, BASE, SERVIDOR);
                $resultadoConsultaPaginada = $gestarGestion->consultaPaginada($consultarGestion, $limit, $pagInicio);
                $totalRegistros = $resultadoConsultaPaginada[0];
                $listaDeGestion = $resultadoConsultaPaginada[1];
                $paginacionVinculos = $gestarGestion->enlacesPaginacion($totalRegistros, $limit, $pagInicio);
                
                //se almacenan en sesion las variables del filtro
//                $_SESSION['isbnF'] = (isset($this->datos['isbn'])) ? $this->datos['isbn'] : NULL;
                $_SESSION['eveEstadoF'] = (isset($_POST['eveEstado'])) ? $_POST['eveEstado'] : NULL;/********CORRECTO*/
                $_SESSION['eveIdF'] = (isset($_POST['eveId'])) ? $_POST['eveId'] : NULL;/********CORRECTO*/
                $_SESSION['eveFechaInicialF'] = (isset($_POST['eveFechaInicial'])) ? $_POST['eveFechaInicial'] : NULL;/********CORRECTO*/
                $_SESSION['eveCantidadPaxF'] = (isset($_POST['eveCantidadPax'])) ? $_POST['eveCantidadPax'] : NULL;/********CORRECTO*/
                $_SESSION['serNombreF'] = (isset($_POST['serNombre'])) ? $_POST['serNombre'] : NULL;/********CORRECTO*/
                $_SESSION['Eventos_Clientes_cliDocumentoF'] = (isset($_POST['Eventos_Clientes_cliDocumento'])) ? $_POST['Eventos_Clientes_cliDocumento'] : NULL;/********CORRECTO*/
                $_SESSION['cliNombreF'] = (isset($_POST['cliNombre'])) ? $_POST['cliNombre'] : NULL;/********CORRECTO*/
                $_SESSION['cliApellido1F'] = (isset($_POST['cliApellido1'])) ? $_POST['cliApellido1'] : NULL;/********CORRECTO*/
                $_SESSION['cliApellido2F'] = (isset($_POST['cliApellido2'])) ? $_POST['cliApellido2'] : NULL;/********CORRECTO*/
                $_SESSION['persona_perIdF'] = (isset($_POST['persona_perId'])) ? $_POST['persona_perId'] : NULL;/********CORRECTO*/
                $_SESSION['perDocumentF'] = (isset($_POST['perDocumento'])) ? $_POST['perDocumento'] : NULL;/********CORRECTO*/
                $_SESSION['perNombreF'] = (isset($_POST['perNombre'])) ? $_POST['perNombre'] : NULL;/********CORRECTO*/
                $_SESSION['perApellidF'] = (isset($_POST['perApellido'])) ? $_POST['perApellido'] : NULL;/********CORRECTO*/
                $_SESSION['rolNombreF'] = (isset($_POST['rolNombre'])) ? $_POST['rolNombre'] : NULL;/********CORRECTO*/
                $_SESSION['buscarF'] = (isset($this->datos['buscar'])) ? $this->datos['buscar'] : NULL;

                
                session_start();
                $_SESSION['listaDeGestion'] = $listaDeGestion;
                $_SESSION['paginacionVinculos'] = $paginacionVinculos;
                $_SESSION['totalRegistros'] = $totalRegistros;
                
                
                $usuarioBd = null;
                $gestarGestion = null;
                header("location: ../principal.php?contenido=vistas/vistasGestion/listarRegistrosGestion.php");
                break;
            default:
                break;
        }
    }
}