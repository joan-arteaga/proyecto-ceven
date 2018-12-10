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
        $planConsulta = "select e.eveEstado,e.eveId,e.eveFechaInicial,e.eveCantidadPax,s.serNombre,es.Eventos_Clientes_cliDocumento,c.cliNombre,c.cliApellido1,c.cliApellido2,r.persona_perId,p.perDocumento,p.perNombre,p.perApellido ";
        $planConsulta.= "from ((((((eventos e) left join eveser es on es.Eventos_eveId=e.eveId) ";
        $planConsulta.= "left join clientes c on c.cliDocumento=es.Eventos_Clientes_cliDocumento) ";
        $planConsulta.= "left join servicios s on s.serId=es.Servicios_serId) ";
        $planConsulta.= "left join responsable r on r.eventos_eveId=e.eveId) ";
        $planConsulta.= "left join persona p on p.perId=r.persona_perId)";
        
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
    	if (isset($_POST['buscar']))
        	$_POST['buscar'] = trim($_POST['buscar']);
        
    	$planConsulta = "select e.eveEstado,e.eveId,e.eveFechaInicial,e.eveCantidadPax,s.serNombre,es.Eventos_Clientes_cliDocumento,c.cliNombre,c.cliApellido1,c.cliApellido2,r.persona_perId,p.perDocumento,p.perNombre,p.perApellido ";
        $planConsulta.= "from ((((((eventos e) left join eveser es on es.Eventos_eveId=e.eveId) ";
        $planConsulta.= "left join clientes c on c.cliDocumento=es.Eventos_Clientes_cliDocumento) ";
        $planConsulta.= "left join servicios s on s.serId=es.Servicios_serId) ";
        $planConsulta.= "left join responsable r on r.eventos_eveId=e.eveId) ";
        $planConsulta.= "left join persona p on p.perId=r.persona_perId)";
       
    	if (!empty($_POST['cliDocumento'])) {
        	$planConsulta.=" where c.cliDocumento='" . $_POST['cliDocumento'] . "'";
        	$filtros = 0;  // cantidad de filtros/condiciones o criterios de búsqueda al comenzar la consulta   	
     	} else {
        	$where = false; // inicializar $where a falso ( al comenzar la consulta NO HAY condiciones o criterios de búsqueda)
        	$filtros = 0;  // cantidad de filtros/condiciones o criterios de búsqueda al comenzar la consulta
        	if (!empty($_POST['cliNombre'])) {
            	$where = true; // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . "c.cliNombre like upper('%" . $_POST['cliNombre'] . "%')"; // con tipo de búsqueda aproximada sin importar mayúsculas ni minúsculas
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($datos['cliApellido1'])) {
            	$where = true;  // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . " c.cliApellido1 like upper('%" . $_POST['cliApellido1'] . "%')"; // con tipo de búsqueda aproximada sin importar mayúsculas ni minúsculas
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($_POST['cliApellido2'])) {
            	$where = true;  // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . " c.cliApellido2 = " . $_POST['cliApellido2'];
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($_POST['cliFechaNacimiento'])) {
            	$where = true;  // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . " c.cliFechaNacimiento like upper('%" . $_POST['cliFechaNacimiento'] . "%')";
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($_POST['cliGenero'])) {
            	$where = true;  // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . " c.cliGenero like upper('%" . $_POST['cliGenero'] . "%')";
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($_POST['cliEstado'])) {
            	$where = true;  // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . " c.cliEstado like upper('%" . $_POST['cliEstado'] . "%')";
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
    	}
    	if (!empty($_POST['buscar'])) {
        	$where = TRUE;
        	$condicionBuscar = (($where && !$filtros == 0) ? " or " : " where ");
        	$filtros++;
        	$planConsulta.=$condicionBuscar;
        	$planConsulta.="( cliDocumento like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or cliNombre like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or cliApellido1 like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or cliApellido2 like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or cliFechaNacimiento like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or cliGenero like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or cliEstado like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" ) ";
    	};
    	$planConsulta.= "  order by c.cliDocumento ASC";
    	$planConsulta.=" LIMIT " . $limit . " OFFSET " . $offset . " ; ";
    	$listar = $this->conexion->prepare($planConsulta);
    	$listar->execute();
    	$listadoClientes = array();
    	while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
        	$listadoClientes[] = $registro;
    	}
    	$listar = $this->conexion->prepare("SELECT FOUND_ROWS() as total;");
    	$listar->execute();
    	while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
        	$totalRegistros = $registro->total;
    	}
        $this->cantidadTotalRegistros = $totalRegistros;
        
   	
     	return array($totalRegistros, $listadoClientes);
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
        	$dbs[] = "<a href='controladores/ControladorPrincipal.php?ruta=listarClientes&pag=$i'>$i</a>";
        	$conteoEnlaces++;
        	$siguiente = $i;
    	}
    	$mostrar = "<center><a href='controladores/ControladorPrincipal.php?ruta=listarClientes&pag=0'>..::PAGINAS INICIALES::..</a><br>";
    	$mostrar.="<a href='controladores/ControladorPrincipal.php?ruta=listarClientes&pag=" . (($anterior)) . "'>..::BLOQUE ANTERIOR::..</a>";
    	$mostrar.= implode("-", $dbs);
    	if ($_GET['pag'] < $totalPag) {
        	$mostrar.="<a href='controladores/ControladorPrincipal.php?ruta=listarClientes&pag=" . ($siguiente + 1) . "'>..::BLOQUE SIGUIENTE::..</a><br>";
        	$mostrar.="<a href='controladores/ControladorPrincipal.php?ruta=listarClientes&pag=" . ($totalPag - $totalEnlacesPaginacion) . "'>..::BLOQUE FINAL::..</a><br></center>";
    	}
    	return $mostrar;
	}
    public function seleccionarId($sId) {
        //
//        $resultadoConsulta = FALSE;

        $planConsulta = "select * from clientes c ";
        $planConsulta .= " where c.cliDocumento= ? ;";
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
            $inserta = $this->conexion->prepare('INSERT INTO clientes (cliDocumento, cliNombre, cliApellido1, cliApellido2, cliFechaNacimiento, cliGenero, cliEstado) VALUES ( :cliDocumento, :cliNombre, :cliApellido1, :cliApellido2, :cliFechaNacimiento, :cliGenero, :cliEstado );');
            $inserta->bindParam(":cliDocumento", $registro['cliDocumento']);
            $inserta->bindParam(":cliNombre", $registro['cliNombre']);
            $inserta->bindParam(":cliApellido1", $registro['cliApellido1']);
            $inserta->bindParam(":cliApellido2", $registro['cliApellido2']);
            $inserta->bindParam(":cliFechaNacimiento", $registro['cliFechaNacimiento']);
            $inserta->bindParam(":cliGenero", $registro['cliGenero']);
            $inserta->bindParam(":cliEstado", $registro['cliEstado']);
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

            $Documento_Cliente=$registro[0]['cliDocumento'];
            $Nombre=$registro[0]['cliNombre'];
            $P_Apellido=$registro[0]['cliApellido1'];
            $S_Apellido=$registro[0]['cliApellido2'];
            $Fecha_Nacimiento=$registro[0]['cliFechaNacimiento'];
            $Genero=$registro[0]['cliGenero'];
            $Estado_Cliente=$registro[0]['cliEstado'];

            if (isset($registro[0]['cliDocumento'])) {
                $actualizar = "UPDATE clientes SET cliNombre = ? , cliApellido1 = ? , cliApellido2 = ? , cliFechaNacimiento = ? , cliGenero = ? , cliEstado = ? WHERE cliDocumento = ? ;";
                $resultado = $this->conexion->prepare($actualizar);
                $actualizacion = $resultado->execute(array($Nombre, $P_Apellido, $S_Apellido, $Fecha_Nacimiento, $Genero, $Estado_Cliente, $Documento_Cliente));
                return ['actualizacion' => $actualizacion, 'mensaje' => $mensaje];
            }
        } catch (Exception $exc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $exc->getTraceAsString()];
        }
    }
    public function eliminar($eId) {
    }
}