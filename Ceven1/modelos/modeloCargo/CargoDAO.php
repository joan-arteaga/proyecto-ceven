<?php
include_once '../modelos/ConstantesConexion.php';
include_once PATH . 'modelos/ConBdMySql.php';
include_once PATH . 'modelos/UsuarioBD.php';
// include_once PATH . 'modelos/modeloPersona/PersonaVO.php';
include_once PATH . 'modelos/InterfaceCRUD.php';
class CargoDAO extends ConBdMySql /* implements InterfaceCRUD */ {
    
   private $cantidadTotalRegistros;
    
    function __construct(UsuarioBd $usuarioBd, $base, $servidor) {
        parent::__construct($usuarioBd, $base, $servidor);
    }
    
    public function seleccionarTodos() {
        $planConsulta = "select rl.rolId,rl.rolNombre,rl.rolDescripcion,rl.rolEstado ";
        $planConsulta.= "from rol rl";
        
        $registrosCargo = $this->conexion->prepare($planConsulta); //Se envia la consulta
        $registrosCargo->execute(); //Ejecución de la consulta
        $listadoRegistrosCargo = array();
        
        while($registro = $registrosCargo->fetch(PDO::FETCH_OBJ)) {
            $listadoRegistrosCargo[] = $registro;
        }
        
        $this->cierreBd();
        return $listadoRegistrosCargo;
        echo "$planConsulta";
    }
    public function consultaPaginada(CargoVO $consultarCargo = NULL, $limit = NULL, $pagInicio = NULL) {
        
    	$parametrosPaginacion = $this->solicitudPaginacion();
    	$offset = $parametrosPaginacion[0];
    	$limit = $parametrosPaginacion[1];
    	$condicionBuscar = "";
    	$filtros = 0;
    	if (isset($_POST['buscar']))
        	$_POST['buscar'] = trim($_POST['buscar']);
    	$planConsulta = "select rl.rolId,rl.rolNombre,rl.rolDescripcion,rl.rolEstado ";
        $planConsulta.= "from rol rl";
    	if (!empty($_POST['rolId'])) {
        	$planConsulta.=" where rl.rolId='" . $_POST['rolId'] . "'";
        	$filtros = 0;  // cantidad de filtros/condiciones o criterios de búsqueda al comenzar la consulta   	
     	} else {
        	$where = false; // inicializar $where a falso ( al comenzar la consulta NO HAY condiciones o criterios de búsqueda)
        	$filtros = 0;  // cantidad de filtros/condiciones o criterios de búsqueda al comenzar la consulta
        	if (!empty($_POST['rolNombre'])) {
            	$where = true; // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . "rl.rolNombre like upper('%" . $_POST['rolNombre'] . "%')"; // con tipo de búsqueda aproximada sin importar mayúsculas ni minúsculas
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($datos['rolDescripcion'])) {
            	$where = true;  // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . " rl.rolDescripcion like upper('%" . $_POST['rolDescripcion'] . "%')"; // con tipo de búsqueda aproximada sin importar mayúsculas ni minúsculas
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($_POST['rolEstado'])) {
            	$where = true;  // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . " rl.rolEstado = " . $_POST['rolEstado'];
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
    	}
    	if (!empty($_POST['buscar'])) {
        	$where = TRUE;
        	$condicionBuscar = (($where && !$filtros == 0) ? " or " : " where ");
        	$filtros++;
        	$planConsulta.=$condicionBuscar;
        	$planConsulta.="( rolId like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or rolNombre like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or rolDescripcion like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or rolEstado like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" ) ";
    	};
    	$planConsulta.= "  order by rl.rolId ASC";
    	$planConsulta.=" LIMIT " . $limit . " OFFSET " . $offset . " ; ";
    	$listar = $this->conexion->prepare($planConsulta);
    	$listar->execute();
    	$listadoCargo = array();
    	while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
        	$listadoCargo[] = $registro;
    	}
    	$listar = $this->conexion->prepare("SELECT FOUND_ROWS() as total;");
    	$listar->execute();
    	while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
        	$totalRegistros = $registro->total;
    	}
        $this->cantidadTotalRegistros = $totalRegistros;
        
   	
     	return array($totalRegistros, $listadoCargo);
	}
    public function solicitudPaginacion($limit = 5) {
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
        	$dbs[] = "<a href='controladores/ControladorPrincipal.php?ruta=listarCargo&pag=$i'>$i</a>";
        	$conteoEnlaces++;
        	$siguiente = $i;
    	}
    	$mostrar = "<center><a href='controladores/ControladorPrincipal.php?ruta=listarCargo&pag=0'>..::PAGINAS INICIALES::..</a><br>";
    	$mostrar.="<a href='controladores/ControladorPrincipal.php?ruta=listarCargo&pag=" . (($anterior)) . "'>..::BLOQUE ANTERIOR::..</a>";
    	$mostrar.= implode("-", $dbs);
    	if ($_GET['pag'] < $totalPag) {
        	$mostrar.="<a href='controladores/ControladorPrincipal.php?ruta=listarCargo&pag=" . ($siguiente + 1) . "'>..::BLOQUE SIGUIENTE::..</a><br>";
        	$mostrar.="<a href='controladores/ControladorPrincipal.php?ruta=listarCargo&pag=" . ($totalPag - $totalEnlacesPaginacion) . "'>..::BLOQUE FINAL::..</a><br></center>";
    	}
    	return $mostrar;
	}
    public function seleccionarId($sId) {
        $planConsulta = "select * from rol rl ";
        $planConsulta .= " where rl.rolId= ? ;";
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
            $inserta = $this->conexion->prepare('INSERT INTO rol (rolId, rolNombre, rolDescripcion, rolEstado) VALUES ( :rolId, :rolNombre, :rolDescripcion, :rolEstado );');
            $inserta->bindParam(":rolId", $registro['rolId']);
            $inserta->bindParam(":rolNombre", $registro['rolNombre']);
            $inserta->bindParam(":rolDescripcion", $registro['rolDescripcion']);
            $inserta->bindParam(":rolEstado", $registro['rolEstado']);
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

            $Id_Cargo=$registro[0]['rolId'];
            $Nombre_Cargo=$registro[0]['rolNombre'];
            $Descripcion_Cargo=$registro[0]['rolDescripcion'];
            $Estado_Cargo=$registro[0]['rolEstado'];
            
            if (isset($registro[0]['rolId'])) {
                $actualizar = "UPDATE rol SET rolNombre = ? , rolDescripcion = ? , rolEstado = ? WHERE rolId = ? ;";
                $resultado = $this->conexion->prepare($actualizar);
                $actualizacion = $resultado->execute(array($Nombre_Cargo, $Descripcion_Cargo, $Estado_Cargo, $Id_Cargo));
                return ['actualizacion' => $actualizacion, 'mensaje' => $mensaje];
            }
        } catch (Exception $exc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $exc->getTraceAsString()];
        }
    }
    public function eliminar($eId) {
        $eId;
    }
}