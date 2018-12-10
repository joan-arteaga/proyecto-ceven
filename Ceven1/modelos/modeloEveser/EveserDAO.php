<?php
include_once '../modelos/ConstantesConexion.php';
include_once PATH . 'modelos/ConBdMySql.php';
include_once PATH . 'modelos/UsuarioBD.php';
// include_once PATH . 'modelos/modeloPersona/PersonaVO.php';
include_once PATH . 'modelos/InterfaceCRUD.php';
class EveserDAO extends ConBdMySql /* implements InterfaceCRUD */ {
    
   private $cantidadTotalRegistros;
    
    function __construct(UsuarioBd $usuarioBd, $base, $servidor) {
        parent::__construct($usuarioBd, $base, $servidor);
    }
    
    public function seleccionarTodos() {
        $planConsulta = "select es.Eventos_eveId,es.Eventos_Clientes_cliDocumento,es.Servicios_serId,s.serNombre,es.evsEstado ";
        $planConsulta.= "from eveser es left join servicios s on es.Servicios_serId=s.serId";
        
        $registrosEveser = $this->conexion->prepare($planConsulta); //Se envia la consulta
        $registrosEveser->execute(); //Ejecución de la consulta
        $listadoRegistrosEveser = array();
        
        while($registro = $registrosEveser->fetch(PDO::FETCH_OBJ)) {
            $listadoRegistrosEveser[] = $registro;
        }
        
        $this->cierreBd();
        return $listadoRegistrosEveser;
        echo "$planConsulta";
    }
    public function consultaPaginada(EveserVO $consultarEveser = NULL, $limit = NULL, $pagInicio = NULL) {
        
    	$parametrosPaginacion = $this->solicitudPaginacion();
    	$offset = $parametrosPaginacion[0];
    	$limit = $parametrosPaginacion[1];
        
    	$condicionBuscar = "";
    	$filtros = 0;
        
        session_start();

        if (isset($_SESSION['Eventos_eveIdF']) && !isset($_POST['Eventos_eveId']))
            $_POST['Eventos_eveId'] = $_SESSION['Eventos_eveIdF'];
        if (isset($_POST['Eventos_eveId']) && !isset($_SESSION['Eventos_eveIdF']))
            $_SESSION['Eventos_eveIdF'] = $_POST['Eventos_eveId'];

        
    	if (isset($_POST['buscar']))
        	$_POST['buscar'] = trim($_POST['buscar']);
    	$planConsulta = "select es.Eventos_eveId,es.Eventos_Clientes_cliDocumento,es.Servicios_serId,s.serNombre,es.evsEstado ";
        $planConsulta.= "from eveser es left join servicios s on es.Servicios_serId=s.serId";
        
        if (!empty($_POST['Eventos_eveId'])) {
        	$planConsulta.=" where es.Eventos_eveId='" . $_POST['Eventos_eveId'] . "'";
        	$filtros = 0;  // cantidad de filtros/condiciones o criterios de búsqueda al comenzar la consulta   	
     	} else {
        	$where = false; // inicializar $where a falso ( al comenzar la consulta NO HAY condiciones o criterios de búsqueda)
        	$filtros = 0;  // cantidad de filtros/condiciones o criterios de búsqueda al comenzar la consulta
        	if (!empty($_POST['Eventos_Clientes_cliDocumento'])) {
            	$where = true; // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . "es.Eventos_Clientes_cliDocumento like upper('%" . $_POST['Eventos_Clientes_cliDocumento'] . "%')"; // con tipo de búsqueda aproximada sin importar mayúsculas ni minúsculas
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($datos['Servicios_serId'])) {
            	$where = true;  // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . " es.Servicios_serId like upper('%" . $_POST['Servicios_serId'] . "%')"; // con tipo de búsqueda aproximada sin importar mayúsculas ni minúsculas
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($_POST['serNombre'])) {
            	$where = true;  // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . " s.serNombre = " . $_POST['serNombre'];
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($_POST['evsEstado'])) {
            	$where = true;  // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . " es.evsEstado like upper('%" . $_POST['evsEstado'] . "%')";
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	
    	}
    	if (!empty($_POST['buscar'])) {
        	$where = TRUE;
        	$condicionBuscar = (($where && !$filtros == 0) ? " or " : " where ");
        	$filtros++;
        	$planConsulta.=$condicionBuscar;
        	$planConsulta.="( Eventos_eveId like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or Eventos_Clientes_cliDocumento like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or Servicios_serId like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or serNombre like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or evsEstado like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" ) ";
    	};
    	$planConsulta.= "  order by es.Eventos_eveId ASC";
    	$planConsulta.=" LIMIT " . $limit . " OFFSET " . $offset . " ; ";
    	$listar = $this->conexion->prepare($planConsulta);
    	$listar->execute();
    	$listadoEveser = array();
    	while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
        	$listadoEveser[] = $registro;
    	}
    	$listar = $this->conexion->prepare("SELECT FOUND_ROWS() as total;");
    	$listar->execute();
    	while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
        	$totalRegistros = $registro->total;
    	}
        $this->cantidadTotalRegistros = $totalRegistros;
        
   	
     	return array($totalRegistros, $listadoEveser);
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
        	$dbs[] = "<a href='controladores/ControladorPrincipal.php?ruta=listarEveser&pag=$i'>$i</a>";
        	$conteoEnlaces++;
        	$siguiente = $i;
    	}
    	$mostrar = "<center><a href='controladores/ControladorPrincipal.php?ruta=listarEveser&pag=0'>..::PAGINAS INICIALES::..</a><br>";
    	$mostrar.="<a href='controladores/ControladorPrincipal.php?ruta=listarEveser&pag=" . (($anterior)) . "'>..::BLOQUE ANTERIOR::..</a>";
    	$mostrar.= implode("-", $dbs);
    	if ($_GET['pag'] < $totalPag) {
        	$mostrar.="<a href='controladores/ControladorPrincipal.php?ruta=listarEveser&pag=" . ($siguiente + 1) . "'>..::BLOQUE SIGUIENTE::..</a><br>";
        	$mostrar.="<a href='controladores/ControladorPrincipal.php?ruta=listarEveser&pag=" . ($totalPag - $totalEnlacesPaginacion) . "'>..::BLOQUE FINAL::..</a><br></center>";
    	}
    	return $mostrar;
	}
    public function seleccionarId($sId) {
        //
//        $resultadoConsulta = FALSE;

        $planConsulta = "select * from eveser es ";
        $planConsulta .= " where es.Eventos_eveId= ? ;";
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
            $inserta = $this->conexion->prepare('INSERT INTO eveser (Eventos_eveId, Eventos_Clientes_cliDocumento, Servicios_serId, evsEstado) VALUES ( :Eventos_eveId, :Eventos_Clientes_cliDocumento, :Servicios_serId, :evsEstado );');
            $inserta->bindParam(":Eventos_eveId", $registro['Eventos_eveId']);
            $inserta->bindParam(":Eventos_Clientes_cliDocumento", $registro['Eventos_Clientes_cliDocumento']);
            $inserta->bindParam(":Servicios_serId", $registro['Servicios_serId']);
            $inserta->bindParam(":evsEstado", $registro['evsEstado']);
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

            $Id_Evento=$registro[0]['Eventos_eveId'];
            $Documento_Cliente=$registro[0]['Eventos_Clientes_cliDocumento'];
            $Id_Servicio=$registro[0]['Servicios_serId'];
            $Estado_Evento=$registro[0]['evsEstado'];
            
            if (isset($registro[0]['Eventos_eveId'])) {
                $actualizar = "UPDATE eveser SET Eventos_Clientes_cliDocumento = ? , Servicios_serId = ? , evsEstado = ? WHERE Eventos_eveId = ? ;";
                $resultado = $this->conexion->prepare($actualizar);
                $actualizacion = $resultado->execute(array($Documento_Cliente, $Id_Servicio, $Estado_Evento, $Id_Evento));
                return ['actualizacion' => $actualizacion, 'mensaje' => $mensaje];
            }
        } catch (Exception $exc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $exc->getTraceAsString()];
        }
    }
    public function eliminar($eId) {
    }
}