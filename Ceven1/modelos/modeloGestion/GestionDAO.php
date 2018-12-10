<?php
include_once '../modelos/ConstantesConexion.php';
include_once PATH . 'modelos/ConBdMySql.php';
include_once PATH . 'modelos/UsuarioBD.php';
// include_once PATH . 'modelos/modeloPersona/PersonaVO.php';
include_once PATH . 'modelos/InterfaceCRUD.php';
class GestionDAO extends ConBdMySql /* implements InterfaceCRUD */ {
    
   private $cantidadTotalRegistros;
    
    function __construct(UsuarioBd $usuarioBd, $base, $servidor) {
        parent::__construct($usuarioBd, $base, $servidor);
    }
    
    public function seleccionarTodos() {
        $planConsulta = "select e.eveEstado,e.eveId,e.eveFechaInicial,e.eveCantidadPax,s.serNombre,es.Eventos_Clientes_cliDocumento,c.cliNombre,c.cliApellido1,c.cliApellido2,r.persona_perId,p.perDocumento,p.perNombre,p.perApellido,ro.rolNombre ";
        $planConsulta.= "from ((((((((eventos e) left join eveser es on es.Eventos_eveId=e.eveId) ";
        $planConsulta.= "left join clientes c on c.cliDocumento=es.Eventos_Clientes_cliDocumento) ";
        $planConsulta.= "left join servicios s on s.serId=es.Servicios_serId) ";
        $planConsulta.= "left join responsable r on r.eventos_eveId=e.eveId) ";
        $planConsulta.= "left join persona p on p.perId=r.persona_perId) ";
        $planConsulta.= "left join usuario_s_roles usr on usr.id_usuario_s=p.perId) ";
        $planConsulta.= "left join rol ro on ro.rolId=usr.id_rol)";
        
        $registrosGestion = $this->conexion->prepare($planConsulta); //Se envia la consulta
        $registrosGestion->execute(); //Ejecución de la consulta
        $listadoRegistrosGestion = array();
        
        while($registro = $registrosGestion->fetch(PDO::FETCH_OBJ)) {
            $listadoRegistrosGestion[] = $registro;
        }
        
        $this->cierreBd();
        return $listadoRegistrosGestion;
        echo "$planConsulta";
    }
    public function consultaPaginada(GestionVO $consultarGestion = NULL, $limit = NULL, $pagInicio = NULL) {
        
    	$parametrosPaginacion = $this->solicitudPaginacion();
    	$offset = $parametrosPaginacion[0];
    	$limit = $parametrosPaginacion[1];
    	$condicionBuscar = "";
    	$filtros = 0;
        
        session_start();

        if (isset($_SESSION['eveEstadoF']) && !isset($_POST['eveEstado']))
            $_POST['eveEstado'] = $_SESSION['eveEstadoF'];
        if (isset($_POST['eveEstado']) && !isset($_SESSION['eveEstadoF']))
            $_SESSION['eveEstadoF'] = $_POST['eveEstado'];
        
    	if (isset($_POST['buscar']))
        	$_POST['buscar'] = trim($_POST['buscar']);
        
    	$planConsulta = "select e.eveEstado,e.eveId,e.eveFechaInicial,e.eveCantidadPax,es.Servicios_serId,s.serNombre,es.Eventos_Clientes_cliDocumento,c.cliNombre,c.cliApellido1,c.cliApellido2,r.persona_perId,p.perDocumento,p.perNombre,p.perApellido,ro.rolNombre ";
        $planConsulta.= "from ((((((((eventos e) left join eveser es on es.Eventos_eveId=e.eveId) ";
        $planConsulta.= "left join clientes c on c.cliDocumento=es.Eventos_Clientes_cliDocumento) ";
        $planConsulta.= "left join servicios s on s.serId=es.Servicios_serId) ";
        $planConsulta.= "left join responsable r on r.eventos_eveId=e.eveId) ";
        $planConsulta.= "left join persona p on p.perId=r.persona_perId) ";
        $planConsulta.= "left join usuario_s_roles usr on usr.id_usuario_s=p.perId) ";
        $planConsulta.= "left join rol ro on ro.rolId=usr.id_rol)";
       
    	if (!empty($_POST['eveId'])) {
        	$planConsulta.=" where e.eveId='" . $_POST['eveId'] . "'";
        	$filtros = 0;  // cantidad de filtros/condiciones o criterios de búsqueda al comenzar la consulta   	
     	} else {
        	$where = false; // inicializar $where a falso ( al comenzar la consulta NO HAY condiciones o criterios de búsqueda)
        	$filtros = 0;  // cantidad de filtros/condiciones o criterios de búsqueda al comenzar la consulta
        	if (!empty($_POST['eveEstado'])) {
            	$where = true; // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . "e.eveEstado like upper('%" . $_POST['eveEstado'] . "%')"; // con tipo de búsqueda aproximada sin importar mayúsculas ni minúsculas
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($_POST['eveFechaInicial'])) {
            	$where = true; // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . "e.eveFechaInicial like upper('%" . $_POST['eveFechaInicial'] . "%')"; // con tipo de búsqueda aproximada sin importar mayúsculas ni minúsculas
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($_POST['eveCantidadPax'])) {
            	$where = true; // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . "e.eveCantidadPax like upper('%" . $_POST['eveCantidadPax'] . "%')"; // con tipo de búsqueda aproximada sin importar mayúsculas ni minúsculas
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($_POST['Servicios_serId'])) {
            	$where = true; // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . "es.Servicios_serId like upper('%" . $_POST['Servicios_serId'] . "%')"; // con tipo de búsqueda aproximada sin importar mayúsculas ni minúsculas
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($_POST['serNombre'])) {
            	$where = true; // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . "s.serNombre like upper('%" . $_POST['serNombre'] . "%')"; // con tipo de búsqueda aproximada sin importar mayúsculas ni minúsculas
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($_POST['Eventos_Clientes_cliDocumento'])) {
            	$where = true; // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . "es.Eventos_Clientes_cliDocumento like upper('%" . $_POST['Eventos_Clientes_cliDocumento'] . "%')"; // con tipo de búsqueda aproximada sin importar mayúsculas ni minúsculas
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($_POST['cliNombre'])) {
            	$where = true; // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . "c.cliNombre like upper('%" . $_POST['cliNombre'] . "%')"; // con tipo de búsqueda aproximada sin importar mayúsculas ni minúsculas
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($_POST['cliApellido1'])) {
            	$where = true; // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . "c.cliApellido1 like upper('%" . $_POST['cliApellido1'] . "%')"; // con tipo de búsqueda aproximada sin importar mayúsculas ni minúsculas
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($_POST['cliApellido2'])) {
            	$where = true; // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . "c.cliApellido2 like upper('%" . $_POST['cliApellido2'] . "%')"; // con tipo de búsqueda aproximada sin importar mayúsculas ni minúsculas
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($_POST['persona_perId'])) {
            	$where = true; // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . "p.perDocumento like upper('%" . $_POST['perDocumento'] . "%')"; // con tipo de búsqueda aproximada sin importar mayúsculas ni minúsculas
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($_POST['perDocumento'])) {
            	$where = true; // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . "c.cliNombre like upper('%" . $_POST['cliNombre'] . "%')"; // con tipo de búsqueda aproximada sin importar mayúsculas ni minúsculas
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($_POST['perNombre'])) {
            	$where = true; // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . "p.perNombre like upper('%" . $_POST['perNombre'] . "%')"; // con tipo de búsqueda aproximada sin importar mayúsculas ni minúsculas
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($_POST['perApellido'])) {
            	$where = true; // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . "p.perApellido like upper('%" . $_POST['perApellido'] . "%')"; // con tipo de búsqueda aproximada sin importar mayúsculas ni minúsculas
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($_POST['rolNombre'])) {
            	$where = true; // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . "ro.rolNombre like upper('%" . $_POST['rolNombre'] . "%')"; // con tipo de búsqueda aproximada sin importar mayúsculas ni minúsculas
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	
    	}
    	if (!empty($_POST['buscar'])) {
        	$where = TRUE;
        	$condicionBuscar = (($where && !$filtros == 0) ? " or " : " where ");
        	$filtros++;
        	$planConsulta.=$condicionBuscar;
        	$planConsulta.="( eveId like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or eveEstado like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or eveFechaInicial like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or eveCantidadPax like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or Servicios_serId like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or serNombre like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or Eventos_Clientes_cliDocumento like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or cliNombre like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or cliApellido1 like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or cliApellido2 like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or persona_perId like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or perDocumento like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or perNombre like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or perApellido like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or rolNombre like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" ) ";
    	};
    	$planConsulta.= "  order by e.eveId ASC";
    	$planConsulta.=" LIMIT " . $limit . " OFFSET " . $offset . " ; ";
    	$listar = $this->conexion->prepare($planConsulta);
    	$listar->execute();
    	$listadoGestion = array();
    	while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
        	$listadoGestion[] = $registro;
    	}
    	$listar = $this->conexion->prepare("SELECT FOUND_ROWS() as total;");
    	$listar->execute();
    	while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
        	$totalRegistros = $registro->total;
    	}
        $this->cantidadTotalRegistros = $totalRegistros;
        
   	
     	return array($totalRegistros, $listadoGestion);
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
        	$dbs[] = "<a href='controladores/ControladorPrincipal.php?ruta=listarGestion&pag=$i'>$i</a>";
        	$conteoEnlaces++;
        	$siguiente = $i;
    	}
    	$mostrar = "<center><a href='controladores/ControladorPrincipal.php?ruta=listarGestion&pag=0'>..::PAGINAS INICIALES::..</a><br>";
    	$mostrar.="<a href='controladores/ControladorPrincipal.php?ruta=listarGestion&pag=" . (($anterior)) . "'>..::BLOQUE ANTERIOR::..</a>";
    	$mostrar.= implode("-", $dbs);
    	if ($_GET['pag'] < $totalPag) {
        	$mostrar.="<a href='controladores/ControladorPrincipal.php?ruta=listarGestion&pag=" . ($siguiente + 1) . "'>..::BLOQUE SIGUIENTE::..</a><br>";
        	$mostrar.="<a href='controladores/ControladorPrincipal.php?ruta=listarGestion&pag=" . ($totalPag - $totalEnlacesPaginacion) . "'>..::BLOQUE FINAL::..</a><br></center>";
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
        }
    public function actualizar($registro) {
        }
    public function eliminar($eId) {
    }
}