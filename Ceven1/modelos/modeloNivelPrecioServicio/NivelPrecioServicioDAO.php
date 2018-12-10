<?php
include_once '../modelos/ConstantesConexion.php';
include_once PATH . 'modelos/ConBdMySql.php';
include_once PATH . 'modelos/UsuarioBD.php';
// include_once PATH . 'modelos/modeloPersona/PersonaVO.php';
include_once PATH . 'modelos/InterfaceCRUD.php';
class NivelPrecioServicioDAO extends ConBdMySql /* implements InterfaceCRUD */ {
    
   private $cantidadTotalRegistros;
    
    function __construct(UsuarioBd $usuarioBd, $base, $servidor) {
        parent::__construct($usuarioBd, $base, $servidor);
    }
    
    public function seleccionarTodos() {
        $planConsulta = "select sv.nivId,sv.nivPaxMinimo,sv.nivPaxMaximo,ns.nivSerPrecioBase,ns.nivSerPrecioServicio,ns.nivSerPorcentajeAumento,sv.nivEstado ";
        $planConsulta.= "from nivelesservicio sv left join nivser ns on ns.nivelesServicio_nivId=sv.nivId ";
        
        $registrosNivelPrecioServicio = $this->conexion->prepare($planConsulta); //Se envia la consulta
        $registrosNivelPrecioServicio->execute(); //Ejecución de la consulta
        $listadoRegistrosNivelPrecioServicio = array();
        
        while($registro = $registrosNivelPrecioServicio->fetch(PDO::FETCH_OBJ)) {
            $listadoRegistrosNivelPrecioServicio[] = $registro;
        }
        
        $this->cierreBd();
        return $listadoRegistrosNivelPrecioServicio;
        echo "$planConsulta";
    }
    public function consultaPaginada(NivelPrecioServicioVO $consultarNivelPrecioServicio = NULL, $limit = NULL, $pagInicio = NULL) {
        
    	$parametrosPaginacion = $this->solicitudPaginacion();
    	$offset = $parametrosPaginacion[0];
    	$limit = $parametrosPaginacion[1];
    	$condicionBuscar = "";
    	$filtros = 0;
    	if (isset($_POST['buscar']))
        	$_POST['buscar'] = trim($_POST['buscar']);
    	$planConsulta = "select sv.nivId,sv.nivPaxMinimo,sv.nivPaxMaximo,ns.nivSerPrecioBase,ns.nivSerPrecioServicio,ns.nivSerPorcentajeAumento,sv.nivEstado ";
        $planConsulta.= "from nivelesservicio sv left join nivser ns on ns.nivelesServicio_nivId=sv.nivId ";
    	if (!empty($_POST['nivId'])) {
        	$planConsulta.=" where sv.nivId='" . $_POST['nivId'] . "'";
        	$filtros = 0;  // cantidad de filtros/condiciones o criterios de búsqueda al comenzar la consulta   	
     	} else {
        	$where = false; // inicializar $where a falso ( al comenzar la consulta NO HAY condiciones o criterios de búsqueda)
        	$filtros = 0;  // cantidad de filtros/condiciones o criterios de búsqueda al comenzar la consulta
        	if (!empty($_POST['nivPaxMinimo'])) {
            	$where = true; // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . "sv.nivPaxMinimo like upper('%" . $_POST['nivPaxMinimo'] . "%')"; // con tipo de búsqueda aproximada sin importar mayúsculas ni minúsculas
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($_POST['nivPaxMaximo'])) {
            	$where = true; // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . "sv.nivPaxMaximo like upper('%" . $_POST['nivPaxMaximo'] . "%')"; // con tipo de búsqueda aproximada sin importar mayúsculas ni minúsculas
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($datos['nivSerPrecioBase'])) {
            	$where = true;  // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . " ns.nivSerPrecioBase like upper('%" . $_POST['nivSerPrecioBase'] . "%')"; // con tipo de búsqueda aproximada sin importar mayúsculas ni minúsculas
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($_POST['nivSerPrecioServicio'])) {
            	$where = true;  // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . " ns.nivSerPrecioServicio = " . $_POST['nivSerPrecioServicio'];
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($_POST['nivSerPorcentajeAumento'])) {
            	$where = true;  // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . " ns.nivSerPorcentajeAumento like upper('%" . $_POST['nivSerPorcentajeAumento'] . "%')";
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($_POST['nivEstado'])) {
            	$where = true;  // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . " sv.nivEstado like upper('%" . $_POST['nivEstado'] . "%')";
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
    	}
    	if (!empty($_POST['buscar'])) {
        	$where = TRUE;
        	$condicionBuscar = (($where && !$filtros == 0) ? " or " : " where ");
        	$filtros++;
        	$planConsulta.=$condicionBuscar;
        	$planConsulta.="( nivId like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or nivPaxMinimo like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or nivPaxMaximo like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or nivSerPrecioBase like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or nivSerPrecioServicio like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or nivSerPorcentajeAumento like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or nivEstado like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" ) ";
    	};
    	$planConsulta.= "  order by sv.nivId ASC";
    	$planConsulta.=" LIMIT " . $limit . " OFFSET " . $offset . " ; ";
    	$listar = $this->conexion->prepare($planConsulta);
    	$listar->execute();
    	$listadoNivelPrecioServicio = array();
    	while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
        	$listadoNivelPrecioServicio[] = $registro;
    	}
    	$listar = $this->conexion->prepare("SELECT FOUND_ROWS() as total;");
    	$listar->execute();
    	while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
        	$totalRegistros = $registro->total;
    	}
        $this->cantidadTotalRegistros = $totalRegistros;
        
   	
     	return array($totalRegistros, $listadoNivelPrecioServicio);
	}
    public function solicitudPaginacion($limit = 18) {
    	if (!isset($_GET['pag']) || $_GET['pag'] < 1) {
        	$_GET['pag'] = 1;
    	}
    	$pag = (int) $_GET['pag'];
    	if ($pag < 1) {
        	$pag = 1;
    	};
    	$offset = ($pag - 1) * $limit;
    	return array($offset, $limit);
	}
    public function enlacesPaginacion($totalRegistros = NULL, $limit = 5, $offset = 0, $totalEnlacesPaginacion = 4) {
    	$totalPag = ceil($totalRegistros / $limit);
    	$anterior = $_GET['pag'] - $totalEnlacesPaginacion;
    	$siguiente = $_GET['pag'] + $limit;
    	$dbs = array();
    	$conteoEnlaces = 0;
    	for ($i = $_GET['pag']; $i < ($_GET['pag'] + $limit) && $i < $totalPag && $conteoEnlaces < $totalEnlacesPaginacion; $i++) {
        	$dbs[] = "<a href='controladores/ControladorPrincipal.php?ruta=listarNivelPrecioServicio&pag=$i'>$i</a>";
        	$conteoEnlaces++;
        	$siguiente = $i;
    	}
    	$mostrar = "<center><a href='controladores/ControladorPrincipal.php?ruta=listarNivelPrecioServicio&pag=0'>..::PAGINAS INICIALES::..</a><br>";
    	$mostrar.="<a href='controladores/ControladorPrincipal.php?ruta=listarNivelPrecioServicio&pag=" . (($anterior)) . "'>..::BLOQUE ANTERIOR::..</a>";
    	$mostrar.= implode("-", $dbs);
    	if ($_GET['pag'] < $totalPag) {
        	$mostrar.="<a href='controladores/ControladorPrincipal.php?ruta=listarNivelPrecioServicio&pag=" . ($siguiente + 1) . "'>..::BLOQUE SIGUIENTE::..</a><br>";
        	$mostrar.="<a href='controladores/ControladorPrincipal.php?ruta=listarNivelPrecioServicio&pag=" . ($totalPag - $totalEnlacesPaginacion) . "'>..::BLOQUE FINAL::..</a><br></center>";
    	}
    	return $mostrar;
	}
    public function seleccionarId($sId) {
    }
    public function insertar($registro) {
    }
    public function actualizar($registro) {
        $registro;
    }
    public function eliminar($eId) {
        $eId;
    }
}