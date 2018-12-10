<?php
include_once '../modelos/ConstantesConexion.php';
include_once PATH . 'modelos/ConBdMySql.php';
include_once PATH . 'modelos/UsuarioBD.php';
// include_once PATH . 'modelos/modeloPersona/PersonaVO.php';
include_once PATH . 'modelos/InterfaceCRUD.php';
class AsigRolDAO extends ConBdMySql /* implements InterfaceCRUD */ {
    
   private $cantidadTotalRegistros;
    
    function __construct(UsuarioBd $usuarioBd, $base, $servidor) {
        parent::__construct($usuarioBd, $base, $servidor);
    }
    
    public function seleccionarTodos() {
        $planConsulta = "select ur.id_usuario_s,ur.id_rol,ur.estado ";
        $planConsulta.= "from usuario_s_roles ur ";
        
        $registrosAsigRol = $this->conexion->prepare($planConsulta); //Se envia la consulta
        $registrosAsigRol->execute(); //Ejecución de la consulta
        $listadoRegistrosClientes = array();
        
        while($registro = $registrosAsigRol->fetch(PDO::FETCH_OBJ)) {
            $listadoRegistrosAsigRol[] = $registro;
        }
        
        $this->cierreBd();
        return $listadoRegistrosAsigRol;
        echo "$planConsulta";
    }
    public function consultaPaginada(AsigRolVO $consultarAsigRol = NULL, $limit = NULL, $pagInicio = NULL) {
        
    	$parametrosPaginacion = $this->solicitudPaginacion();
    	$offset = $parametrosPaginacion[0];
    	$limit = $parametrosPaginacion[1];
        
    	$condicionBuscar = "";
    	$filtros = 0;
        
        session_start();

        if (isset($_SESSION['id_usuario_sF']) && !isset($_POST['id_usuario_s']))
            $_POST['id_usuario_s'] = $_SESSION['id_usuario_sF'];
        if (isset($_POST['id_usuario_s']) && !isset($_SESSION['id_usuario_sF']))
            $_SESSION['id_usuario_sF'] = $_POST['id_usuario_s'];

        if (isset($_POST['buscar']))
            $_POST['buscar'] = trim($_POST['buscar']);

        
    	if (isset($_POST['buscar']))
        	$_POST['buscar'] = trim($_POST['buscar']);
        
    	$planConsulta = "select ur.id_usuario_s,ur.id_rol,ur.estado ";
        $planConsulta.= "from usuario_s_roles ur ";
        
    	if (!empty($_POST['id_usuario_s'])) {
        	$planConsulta.=" where ur.id_usuario_s='" . $_POST['cliDocumento'] . "'";
        	$filtros = 0;  // cantidad de filtros/condiciones o criterios de búsqueda al comenzar la consulta   	
     	} else {
        	$where = false; // inicializar $where a falso ( al comenzar la consulta NO HAY condiciones o criterios de búsqueda)
        	$filtros = 0;  // cantidad de filtros/condiciones o criterios de búsqueda al comenzar la consulta
        	if (!empty($_POST['id_rol'])) {
            	$where = true; // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . "ur.id_rol like upper('%" . $_POST['id_rol'] . "%')"; // con tipo de búsqueda aproximada sin importar mayúsculas ni minúsculas
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($datos['estado'])) {
            	$where = true;  // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . " ur.estado like upper('%" . $_POST['estado'] . "%')"; // con tipo de búsqueda aproximada sin importar mayúsculas ni minúsculas
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	
    	}
    	if (!empty($_POST['buscar'])) {
        	$where = TRUE;
        	$condicionBuscar = (($where && !$filtros == 0) ? " or " : " where ");
        	$filtros++;
        	$planConsulta.=$condicionBuscar;
        	$planConsulta.="( id_usuario_s like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or id_rol like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or estado like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" ) ";
    	};
    	$planConsulta.= "  order by ur.id_usuario_s ASC";
    	$planConsulta.=" LIMIT " . $limit . " OFFSET " . $offset . " ; ";
    	$listar = $this->conexion->prepare($planConsulta);
    	$listar->execute();
    	$listadoAsigRol = array();
    	while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
        	$listadoAsigRol[] = $registro;
    	}
    	$listar = $this->conexion->prepare("SELECT FOUND_ROWS() as total;");
    	$listar->execute();
    	while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
        	$totalRegistros = $registro->total;
    	}
        $this->cantidadTotalRegistros = $totalRegistros;
        
   	
     	return array($totalRegistros, $listadoAsigRol);
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
        	$dbs[] = "<a href='controladores/ControladorPrincipal.php?ruta=listarAsigRol&pag=$i'>$i</a>";
        	$conteoEnlaces++;
        	$siguiente = $i;
    	}
    	$mostrar = "<center><a href='controladores/ControladorPrincipal.php?ruta=listarAsigRol&pag=0'>..::PAGINAS INICIALES::..</a><br>";
    	$mostrar.="<a href='controladores/ControladorPrincipal.php?ruta=listarAsigRol&pag=" . (($anterior)) . "'>..::BLOQUE ANTERIOR::..</a>";
    	$mostrar.= implode("-", $dbs);
    	if ($_GET['pag'] < $totalPag) {
        	$mostrar.="<a href='controladores/ControladorPrincipal.php?ruta=listarAsigRol&pag=" . ($siguiente + 1) . "'>..::BLOQUE SIGUIENTE::..</a><br>";
        	$mostrar.="<a href='controladores/ControladorPrincipal.php?ruta=listarAsigRol&pag=" . ($totalPag - $totalEnlacesPaginacion) . "'>..::BLOQUE FINAL::..</a><br></center>";
    	}
    	return $mostrar;
	}
    public function seleccionarId($sId) {
        //
//        $resultadoConsulta = FALSE;

        $planConsulta = "select * from usuario_s_roles ur ";
        $planConsulta .= " where ur.id_usuario_s= ? ;";
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
            $inserta = $this->conexion->prepare('INSERT INTO usuario_s_roles (id_usuario_s, id_rol, estado) VALUES ( :id_usuario_s, :id_rol, :estado );');
            $inserta->bindParam(":id_usuario_s", $registro['id_usuario_s']);
            $inserta->bindParam(":id_rol", $registro['id_rol']);
            $inserta->bindParam(":estado", $registro['estado']);
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

            $Id_Usuario=$registro[0]['id_usuario_s'];
            $Id_Rol=$registro[0]['id_rol'];
            $Estado=$registro[0]['estado'];

            if (isset($registro[0]['id_usuario_s'])) {
                $actualizar = "UPDATE usuario_s_roles SET id_rol = ? , estado = ? WHERE id_usuario_s = ? ;";
                $resultado = $this->conexion->prepare($actualizar);
                $actualizacion = $resultado->execute(array($Id_Rol, $Estado, $Id_Usuario));
                return ['actualizacion' => $actualizacion, 'mensaje' => $mensaje];
            }
        } catch (Exception $exc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $exc->getTraceAsString()];
        }
    }
    public function eliminar($eId) {
        try {
        $id_usuario_s = $eId[0]['id_usuario_s'];

        if (isset($eId[0]['id_usuario_s'])) {
            $eliminar = "DELETE FROM usuario_s_roles WHERE id_usuario_s= ? ;";
            $resultado = $this->conexion->prepare($eliminar);
            $eliminacion = $resultado->execute(array($id_usuario_s));
            return ['eliminacion' => $eliminacion, 'mensaje' => $mensaje];
        }
    } catch (Exception $exc) {
        return ['eliminacion' => $eliminacion, 'mensaje' => $exc->getTraceAsString()];
    }
//    var_dump ($actualizacion);
    exit();
    }
}