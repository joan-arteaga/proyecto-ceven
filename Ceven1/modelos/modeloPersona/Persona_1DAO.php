<?php
include_once '../modelos/ConstantesConexion.php';
include_once PATH . 'modelos/ConBdMySql.php';
include_once PATH . 'modelos/UsuarioBD.php';
// include_once PATH . 'modelos/modeloPersona/PersonaVO.php';
include_once PATH . 'modelos/InterfaceCRUD.php';
class Persona_1DAO extends ConBdMySql /* implements InterfaceCRUD */ {
    
   private $cantidadTotalRegistros;
    
    function __construct(UsuarioBd $usuarioBd, $base, $servidor) {
        parent::__construct($usuarioBd, $base, $servidor);
    }
    
    public function seleccionarTodos() {
        $planConsulta = "select p.perId,p.perDocumento,p.perNombre,p.perApellido,u.usuLogin,p.perEstado ";
        $planConsulta.= "from persona p left join usuario_s u on u.usuId=p.perId";
        
        $registrosPersona_1 = $this->conexion->prepare($planConsulta); //Se envia la consulta
        $registrosPersona_1->execute(); //Ejecución de la consulta
        $listadoRegistrosPersona = array();
        
        while($registro = $registrosPersona_1->fetch(PDO::FETCH_OBJ)) {
            $listadoRegistrosPersona_1[] = $registro;
        }
        
        $this->cierreBd();
        return $listadoRegistrosPersona_1;
        echo "$planConsulta";
    }
    public function consultaPaginada(Persona_1VO $consultarPersona_1 = NULL, $limit = NULL, $pagInicio = NULL) {
        
    	$parametrosPaginacion = $this->solicitudPaginacion();
    	$offset = $parametrosPaginacion[0];
    	$limit = $parametrosPaginacion[1];
    	$condicionBuscar = "";
    	$filtros = 0;
    	if (isset($_POST['buscar']))
        	$_POST['buscar'] = trim($_POST['buscar']);
    	$planConsulta = "select p.perId,p.perDocumento,p.perNombre,p.perApellido,u.usuLogin,p.perEstado ";
        $planConsulta.= "from persona p left join usuario_s u on u.usuId=p.perId";
    	if (!empty($_POST['perId'])) {
        	$planConsulta.=" where p.perId='" . $_POST['perId'] . "'";
        	$filtros = 0;  // cantidad de filtros/condiciones o criterios de búsqueda al comenzar la consulta   	
     	} else {
        	$where = false; // inicializar $where a falso ( al comenzar la consulta NO HAY condiciones o criterios de búsqueda)
        	$filtros = 0;  // cantidad de filtros/condiciones o criterios de búsqueda al comenzar la consulta
        	if (!empty($_POST['perDocumento'])) {
            	$where = true; // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . "p.perDocumento like upper('%" . $_POST['perDocumento'] . "%')"; // con tipo de búsqueda aproximada sin importar mayúsculas ni minúsculas
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($datos['perNombre'])) {
            	$where = true;  // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . " p.perNombre like upper('%" . $_POST['perNombre'] . "%')"; // con tipo de búsqueda aproximada sin importar mayúsculas ni minúsculas
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($_POST['perApellido'])) {
            	$where = true;  // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . " p.perApellido = " . $_POST['perApellido'];
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($_POST['usuLogin'])) {
            	$where = true;  // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . " u.usuLogin = " . $_POST['usuLogin'];
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($_POST['perEstado'])) {
            	$where = true;  // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . " p.perEstado like upper('%" . $_POST['perEstado'] . "%')";
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
    	}
    	if (!empty($_POST['buscar'])) {
        	$where = TRUE;
        	$condicionBuscar = (($where && !$filtros == 0) ? " or " : " where ");
        	$filtros++;
        	$planConsulta.=$condicionBuscar;
        	$planConsulta.="( perId like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or perDocumento like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or perNombre like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or perApellido like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or usuLogin like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or perEstado like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" ) ";
    	};
    	$planConsulta.= "  order by p.perId ASC";
    	$planConsulta.=" LIMIT " . $limit . " OFFSET " . $offset . " ; ";
    	$listar = $this->conexion->prepare($planConsulta);
    	$listar->execute();
    	$listadoPersona_1 = array();
    	while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
        	$listadoPersona_1[] = $registro;
    	}
    	$listar = $this->conexion->prepare("SELECT FOUND_ROWS() as total;");
    	$listar->execute();
    	while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
        	$totalRegistros = $registro->total;
    	}
        $this->cantidadTotalRegistros = $totalRegistros;
        
   	
     	return array($totalRegistros, $listadoPersona_1);
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
        	$dbs[] = "<a href='controladores/ControladorPrincipal.php?ruta=listarPersona_1&pag=$i'>$i</a>";
        	$conteoEnlaces++;
        	$siguiente = $i;
    	}
    	$mostrar = "<center><a href='controladores/ControladorPrincipal.php?ruta=listarPersona_1&pag=0'>..::PAGINAS INICIALES::..</a><br>";
    	$mostrar.="<a href='controladores/ControladorPrincipal.php?ruta=listarPersona_1&pag=" . (($anterior)) . "'>..::BLOQUE ANTERIOR::..</a>";
    	$mostrar.= implode("-", $dbs);
    	if ($_GET['pag'] < $totalPag) {
        	$mostrar.="<a href='controladores/ControladorPrincipal.php?ruta=listarPersona_1&pag=" . ($siguiente + 1) . "'>..::BLOQUE SIGUIENTE::..</a><br>";
        	$mostrar.="<a href='controladores/ControladorPrincipal.php?ruta=listarPersona_1&pag=" . ($totalPag - $totalEnlacesPaginacion) . "'>..::BLOQUE FINAL::..</a><br></center>";
    	}
    	return $mostrar;
	}
    public function seleccionarId($sId) {
        $planConsulta = "select * from persona p ";
        $planConsulta .= " where p.perId= ? ;";
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
        try {

            $Id_Usuario=$registro[0]['perId'];
            $Documento_Usuario=$registro[0]['perDocumento'];
            $Nomber=$registro[0]['perNombre'];
            $Apellido=$registro[0]['perApellido'];
            $Estado_Usuario=$registro[0]['perEstado'];
            
            if (isset($registro[0]['perId'])) {
                $actualizar = "UPDATE persona SET perDocumento = ? , perNombre = ? , perApellido = ? , perEstado = ? WHERE perId = ? ;";
                $resultado = $this->conexion->prepare($actualizar);
                $actualizacion = $resultado->execute(array($Documento_Usuario, $Nomber, $Apellido, $Estado_Usuario, $Id_Usuario));
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