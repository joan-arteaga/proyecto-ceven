<?php
include_once '../modelos/ConstantesConexion.php';
include_once PATH . 'modelos/ConBdMySql.php';
include_once PATH . 'modelos/UsuarioBD.php';
// include_once PATH . 'modelos/modeloPersona/PersonaVO.php';
include_once PATH . 'modelos/InterfaceCRUD.php';
class ResponsableDAO extends ConBdMySql /* implements InterfaceCRUD */ {
    
   private $cantidadTotalRegistros;
    
    function __construct(UsuarioBd $usuarioBd, $base, $servidor) {
        parent::__construct($usuarioBd, $base, $servidor);
    }
    
    public function seleccionarTodos() {
        $planConsulta = "select r.eventos_eveId,r.persona_perId,r.resEstado ";
        $planConsulta.= "from responsable r ";
        $planConsulta.= "order by r.eventos_eveId ASC";
        
        $registrosResponsable = $this->conexion->prepare($planConsulta); //Se envia la consulta
        $registrosResponsable->execute(); //Ejecución de la consulta
        $listadoRegistrosResponsable = array();
        
        while($registro = $registrosResponsable->fetch(PDO::FETCH_OBJ)) {
            $listadoRegistrosResponsable[] = $registro;
        }
        
        $this->cierreBd();
        return $listadoRegistrosResponsable;
        echo "$planConsulta";
    }
    public function consultaPaginada(ResponsableVO $consultarResponsable = NULL, $limit = NULL, $pagInicio = NULL) {
        
    	$parametrosPaginacion = $this->solicitudPaginacion();
    	$offset = $parametrosPaginacion[0];
    	$limit = $parametrosPaginacion[1];
    	$condicionBuscar = "";
    	$filtros = 0;
    	if (isset($_POST['buscar']))
        	$_POST['buscar'] = trim($_POST['buscar']);
    	$planConsulta = "select r.eventos_eveId,r.persona_perId,r.resEstado ";
        $planConsulta.= "from responsable r";
        
    	if (!empty($_POST['eventos_eveId'])) {
        	$planConsulta.=" where r.eventos_eveId='" . $_POST['eventos_eveId'] . "'";
        	$filtros = 0;  // cantidad de filtros/condiciones o criterios de búsqueda al comenzar la consulta   	
     	} else {
        	$where = false; // inicializar $where a falso ( al comenzar la consulta NO HAY condiciones o criterios de búsqueda)
        	$filtros = 0;  // cantidad de filtros/condiciones o criterios de búsqueda al comenzar la consulta
        	if (!empty($_POST['persona_perId'])) {
            	$where = true; // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . "r.persona_perId like upper('%" . $_POST['persona_perId'] . "%')"; // con tipo de búsqueda aproximada sin importar mayúsculas ni minúsculas
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($datos['resEstado'])) {
            	$where = true;  // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . " r.resEstado like upper('%" . $_POST['resEstado'] . "%')"; // con tipo de búsqueda aproximada sin importar mayúsculas ni minúsculas
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	
    	}
    	if (!empty($_POST['buscar'])) {
        	$where = TRUE;
        	$condicionBuscar = (($where && !$filtros == 0) ? " or " : " where ");
        	$filtros++;
        	$planConsulta.=$condicionBuscar;
        	$planConsulta.="( eventos_eveId like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or persona_perId like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or resEstado like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" ) ";
    	};
    	$planConsulta.= "  order by r.eventos_eveId ASC";
    	$planConsulta.=" LIMIT " . $limit . " OFFSET " . $offset . " ; ";
    	$listar = $this->conexion->prepare($planConsulta);
    	$listar->execute();
    	$listadoResponsable = array();
    	while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
        	$listadoResponsable[] = $registro;
    	}
    	$listar = $this->conexion->prepare("SELECT FOUND_ROWS() as total;");
    	$listar->execute();
    	while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
        	$totalRegistros = $registro->total;
    	}
        $this->cantidadTotalRegistros = $totalRegistros;
        
   	
     	return array($totalRegistros, $listadoResponsable);
	}
    public function solicitudPaginacion($limit = 15) {
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
        	$dbs[] = "<a href='controladores/ControladorPrincipal.php?ruta=listarResponsable&pag=$i'>$i</a>";
        	$conteoEnlaces++;
        	$siguiente = $i;
    	}
    	$mostrar = "<center><a href='controladores/ControladorPrincipal.php?ruta=listarResponsable&pag=0'>..::PAGINAS INICIALES::..</a><br>";
    	$mostrar.="<a href='controladores/ControladorPrincipal.php?ruta=listarResponsable&pag=" . (($anterior)) . "'>..::BLOQUE ANTERIOR::..</a>";
    	$mostrar.= implode("-", $dbs);
    	if ($_GET['pag'] < $totalPag) {
        	$mostrar.="<a href='controladores/ControladorPrincipal.php?ruta=listarResponsable&pag=" . ($siguiente + 1) . "'>..::BLOQUE SIGUIENTE::..</a><br>";
        	$mostrar.="<a href='controladores/ControladorPrincipal.php?ruta=listarResponsable&pag=" . ($totalPag - $totalEnlacesPaginacion) . "'>..::BLOQUE FINAL::..</a><br></center>";
    	}
    	return $mostrar;
	}
    public function seleccionarId($sId) {
        //
//        $resultadoConsulta = FALSE;

        $planConsulta = "select * from responsable r ";
        $planConsulta .= " where r.eventos_eveId= ? ;";
        $listar = $this->conexion->prepare($planConsulta);
        $listar->execute(array($sId[0]));

        $registroEncontrado = array();
        while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
            $registroEncontrado[] = $registro;
        }
        if ($registro != FALSE) {
            return ['exitoSeleccionId' => TRUE, 'registroEncontrado' => $registroEncontrado];
        } else {
            return ['exitoSeleccionId' => FALSE, 'registroEncontrado' => $registroEncontrado];
        } 
    }
    public function insertar($registro) {
        try {
            $inserta = $this->conexion->prepare('INSERT INTO responsable (eventos_eveId, persona_perId, resEstado) VALUES ( :eventos_eveId, :persona_perId, :resEstado );');
            $inserta->bindParam(":eventos_eveId", $registro['eventos_eveId']);
            $inserta->bindParam(":persona_perId", $registro['persona_perId']);
            $inserta->bindParam(":resEstado", $registro['resEstado']);
            $insercion = $inserta->execute();
            $clavePrimariaConQueInserto = $this->conexion->lastInsertId();
            return ['inserto' => 1, 'resultado' => $clavePrimariaConQueInserto];
        } /* catch (Exception $exc) {
          return ['inserto' => FALSE, 'resultado' => $exc->getTraceAsString()];
          } */ catch (PDOException $pdoExc) {
            return ['inserto' => 0, 'resultado' => $pdoExc];
        } 
    }
    public function actualizar($registro) {
        try {

            $Id_Evento=$registro[0]['eventos_eveId'];
            $Id_Responsable=$registro[0]['persona_perId'];
            $Estado_Responsable=$registro[0]['resEstado'];
            
            if (isset($registro[0]['eventos_eveId'])) {
                $actualizar = "UPDATE responsable SET persona_perId = ? , resEstado = ? WHERE eventos_eveId = ? ;";
                $resultado = $this->conexion->prepare($actualizar);
                $actualizacion = $resultado->execute(array($Id_Responsable, $Estado_Responsable, $Id_Evento));
                return ['actualizacion' => $actualizacion, 'mensaje' => $mensaje];
            }
        } catch (Exception $exc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $exc->getTraceAsString()];
        }
    }
    public function eliminar($eId) {
    }
}