<?php
include_once '../modelos/ConstantesConexion.php';
include_once PATH . 'modelos/ConBdMySql.php';
include_once PATH . 'modelos/UsuarioBD.php';
// include_once PATH . 'modelos/modeloPersona/PersonaVO.php';
include_once PATH . 'modelos/InterfaceCRUD.php';
class EventosDAO extends ConBdMySql /* implements InterfaceCRUD */ {
    
   private $cantidadTotalRegistros;
    
    function __construct(UsuarioBd $usuarioBd, $base, $servidor) {
        parent::__construct($usuarioBd, $base, $servidor);
    }
    
    public function seleccionarTodos() {
        $planConsulta = "select e.eveId,e.eveFechaInicial,e.eveCantidadPax,e.Clientes_cliDocumento,e.eveEstado ";
        $planConsulta.= "from eventos e";
        
        $registrosEventos = $this->conexion->prepare($planConsulta); //Se envia la consulta
        $registrosEventos->execute(); //Ejecución de la consulta
        $listadoRegistrosEventos = array();
        
        while($registro = $registrosEventos->fetch(PDO::FETCH_OBJ)) {
            $listadoRegistrosEventos[] = $registro;
        }
        
        $this->cierreBd();
        return $listadoRegistrosEventos;
        echo "$planConsulta";
    }
    public function consultaPaginada(EventosVO $consultarEventos = NULL, $limit = NULL, $pagInicio = NULL) {
        
    	$parametrosPaginacion = $this->solicitudPaginacion();
    	$offset = $parametrosPaginacion[0];
    	$limit = $parametrosPaginacion[1];
    	$condicionBuscar = "";
    	$filtros = 0;
    	if (isset($_POST['buscar']))
        	$_POST['buscar'] = trim($_POST['buscar']);
    	$planConsulta = "select e.eveId,e.eveFechaInicial,e.eveCantidadPax,e.Clientes_cliDocumento,e.eveEstado ";
        $planConsulta.= "from eventos e";
        
    	if (!empty($_POST['eveId'])) {
        	$planConsulta.=" where e.eveId='" . $_POST['eveId'] . "'";
        	$filtros = 0;  // cantidad de filtros/condiciones o criterios de búsqueda al comenzar la consulta   	
     	} else {
        	$where = false; // inicializar $where a falso ( al comenzar la consulta NO HAY condiciones o criterios de búsqueda)
        	$filtros = 0;  // cantidad de filtros/condiciones o criterios de búsqueda al comenzar la consulta
        	if (!empty($_POST['eveFechaInicial'])) {
            	$where = true; // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . "e.eveFechaInicial like upper('%" . $_POST['eveFechaInicial'] . "%')"; // con tipo de búsqueda aproximada sin importar mayúsculas ni minúsculas
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($datos['eveCantidadPax'])) {
            	$where = true;  // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . " e.eveCantidadPax like upper('%" . $_POST['eveCantidadPax'] . "%')"; // con tipo de búsqueda aproximada sin importar mayúsculas ni minúsculas
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($_POST['Clientes_cliDocumento'])) {
            	$where = true;  // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . " e.Clientes_cliDocumento = " . $_POST['Clientes_cliDocumento'];
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($_POST['eveEstado'])) {
            	$where = true;  // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . " e.eveEstado like upper('%" . $_POST['eveEstado'] . "%')";
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	
    	}
    	if (!empty($_POST['buscar'])) {
        	$where = TRUE;
        	$condicionBuscar = (($where && !$filtros == 0) ? " or " : " where ");
        	$filtros++;
        	$planConsulta.=$condicionBuscar;
        	$planConsulta.="( eveId like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or eveFechaInicial like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or eveCantidadPax like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or Clientes_cliDocumento like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or eveEstado like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" ) ";
    	};
    	$planConsulta.= "  order by e.eveId ASC";
    	$planConsulta.=" LIMIT " . $limit . " OFFSET " . $offset . " ; ";
    	$listar = $this->conexion->prepare($planConsulta);
    	$listar->execute();
    	$listadoEventos = array();
    	while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
        	$listadoEventos[] = $registro;
    	}
    	$listar = $this->conexion->prepare("SELECT FOUND_ROWS() as total;");
    	$listar->execute();
    	while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
        	$totalRegistros = $registro->total;
    	}
        $this->cantidadTotalRegistros = $totalRegistros;
        
   	
     	return array($totalRegistros, $listadoEventos);
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
        	$dbs[] = "<a href='controladores/ControladorPrincipal.php?ruta=listarEventos&pag=$i'>$i</a>";
        	$conteoEnlaces++;
        	$siguiente = $i;
    	}
    	$mostrar = "<center><a href='controladores/ControladorPrincipal.php?ruta=listarEventos&pag=0'>..::PAGINAS INICIALES::..</a><br>";
    	$mostrar.="<a href='controladores/ControladorPrincipal.php?ruta=listarEventos&pag=" . (($anterior)) . "'>..::BLOQUE ANTERIOR::..</a>";
    	$mostrar.= implode("-", $dbs);
    	if ($_GET['pag'] < $totalPag) {
        	$mostrar.="<a href='controladores/ControladorPrincipal.php?ruta=listarEventos&pag=" . ($siguiente + 1) . "'>..::BLOQUE SIGUIENTE::..</a><br>";
        	$mostrar.="<a href='controladores/ControladorPrincipal.php?ruta=listarEventos&pag=" . ($totalPag - $totalEnlacesPaginacion) . "'>..::BLOQUE FINAL::..</a><br></center>";
    	}
    	return $mostrar;
	}
    public function seleccionarId($sId) {
        //
//        $resultadoConsulta = FALSE;

        $planConsulta = "select * from eventos e ";
        $planConsulta .= " where e.eveId= ? ;";
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
            $inserta = $this->conexion->prepare('INSERT INTO eventos (eveId, eveFechaInicial, eveCantidadPax, Clientes_cliDocumento, eveEstado) VALUES ( :eveId, :eveFechaInicial, :eveCantidadPax, :Clientes_cliDocumento, :eveEstado );');
            $inserta->bindParam(":eveId", $registro['eveId']);
            $inserta->bindParam(":eveFechaInicial", $registro['eveFechaInicial']);
            $inserta->bindParam(":eveCantidadPax", $registro['eveCantidadPax']);
            $inserta->bindParam(":Clientes_cliDocumento", $registro['Clientes_cliDocumento']);
            $inserta->bindParam(":eveEstado", $registro['eveEstado']);
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

            $Id_Evento=$registro[0]['eveId'];
            $Fecha_de_Inicio=$registro[0]['eveFechaInicial'];
            $Cantidad_de_Personas=$registro[0]['eveCantidadPax'];
            $Documento_Cliente=$registro[0]['Clientes_cliDocumento'];
            $Estado_del_Evento=$registro[0]['eveEstado'];
            
            if (isset($registro[0]['eveId'])) {
                $actualizar = "UPDATE eventos SET eveFechaInicial = ? , eveCantidadPax = ? , Clientes_cliDocumento = ? , eveEstado = ? WHERE eveId = ? ;";
                $resultado = $this->conexion->prepare($actualizar);
                $actualizacion = $resultado->execute(array($Fecha_de_Inicio, $Cantidad_de_Personas, $Documento_Cliente, $Estado_del_Evento, $Id_Evento));
                return ['actualizacion' => $actualizacion, 'mensaje' => $mensaje];
            }
        } catch (Exception $exc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $exc->getTraceAsString()];
        }
    }
    public function eliminar($eId) {
        try {
        $eveId = $eId[0]['eveId'];

        if (isset($eId[0]['eveId'])) {
            $eliminar = "DELETE FROM eventos WHERE eveId= ? ;";
            $resultado = $this->conexion->prepare($eliminar);
            $eliminacion = $resultado->execute(array($eveId));
            return ['eliminacion' => $eliminacion, 'mensaje' => $mensaje];
        }
    } catch (Exception $exc) {
        return ['eliminacion' => $eliminacion, 'mensaje' => $exc->getTraceAsString()];
    }
//    var_dump ($actualizacion);
    exit();
    }
}