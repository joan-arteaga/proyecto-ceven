<?php
include_once './../modelos/ConstantesConexion.php';
require_once PATH . 'modelos/UsuarioBD.php';
require_once PATH . 'modelos/modeloNivelPrecioServicio/NivelPrecioServicioDAO.php';
require_once PATH . 'modelos/modeloNivelPrecioServicio/NivelPrecioServicioVO.php';
class NivelPrecioServicioControlador {
    private $datos = array();
    public function __construct($datos) {
        $this->datos = $datos;
    }
    public function nivelPrecioServicioControlador() {
        switch ($this->datos["ruta"]) {
            case "listarNivelPrecioServicio":
                if (isset($this->datos['pag']) && (int) $this->datos['pag'] > 0) {
                    $pagInicio = $this->datos['pag'];
                } else {
                    $pagInicio = 0;
                }
                $limit = 5;
                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $consultarNivelPrecioServicio = new NivelPrecioServicioVO();
                $gestarNivelPrecioServicio = new NivelPrecioServicioDAO($usuarioBd, BASE, SERVIDOR);
                $resultadoConsultaPaginada = $gestarNivelPrecioServicio->consultaPaginada($consultarNivelPrecioServicio, $limit, $pagInicio);
                $totalRegistros = $resultadoConsultaPaginada[0];
                $listaDeNivelPrecioServicio = $resultadoConsultaPaginada[1];
                $paginacionVinculos = $gestarNivelPrecioServicio->enlacesPaginacion($totalRegistros, $limit, $pagInicio);
                session_start();
                $_SESSION['listaDeNivelPrecioServicio'] = $listaDeNivelPrecioServicio;
                $_SESSION['paginacionVinculos'] = $paginacionVinculos;
                $_SESSION['totalRegistros'] = $totalRegistros;
                $usuarioBd = null;
                $gestarNivelPrecioServicio = null;
                header("location: ../principal.php?contenido=vistas/vistasNivelPrecioServicio/listarRegistrosNivelPrecioServicio.php");
                break;
            default:
                break;
        }
    }
}