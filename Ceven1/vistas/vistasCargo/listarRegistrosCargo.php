<?php
//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";exit();
//session_start();
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
if (isset($_SESSION['listaDeCargo'])) {
    $listaDeCargo = $_SESSION['listaDeCargo'];
}
if (isset($_SESSION['paginacionVinculos'])) {
    $paginacionVinculos = $_SESSION['paginacionVinculos'];
}
if (isset($_SESSION['totalRegistros'])) {
    $totalRegistros = $_SESSION['totalRegistros'];
}
if (isset($_SESSION['registroCategoriasCargo'])) {
    $registroCategoriasCargo= $_SESSION['registroCategoriasCargo'];
    $cantCategorias=count($registroCategoriasCargo);
}

//http://www.forosdelweb.com/f18/notice-session-had-already-been-started-ignoring-session_start-1021808/
//http://ajpdsoft.com/modules.php?name=News&file=print&sid=486

/* * ********Conservar filtro 'isbn' si lo hay************ */

/* * ********************************************* */



?>
<style type="text/css">
    .derecha   { float: right; }
    .izquierda { float: left;  }
    fieldset.scheduler-border {
        border: 1px groove #ddd !important;
        padding: 0 1.4em 1.4em 1.4em !important;
        margin: 0 0 1.5em 0 !important;
        -webkit-box-shadow:  0px 0px 0px 0px #000;
        box-shadow:  0px 0px 0px 0px #000;
    }

    legend.scheduler-border {
        font-size: 1.2em !important;
        font-weight: bold !important;
        text-align: left !important;

    }  
    table th {
        text-align: center;
    }
    table tr {
        text-align: center;
    }
    thead th{
        color: #79008E;
        font-weight: normal;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Gestión de Cargos.</h1>
        </div>                        
        <!-- /.col-lg-12 -->    
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
<div>
    
</div>

<br>
<div style="width: 800">
    <span class="izquierdo">
        <!--NUEVO BOTÓN PARA DARLE FUNCIONALIDAD*************************-->

        <input type="button" onclick="javascript:location.href = 'principal.php?contenido=vistas/vistasCargo/vistaInsertarCargo.php'" value="Nuevo Cargo">

    </span>
</div>
<br>
<a name="listaDeCargo" id="a"></a>
<div style="width: 800">
    <p>Total de Registros: <?php echo $totalRegistros; ?></p>
    <table border=1>
        <thead>
            <tr>
                <td style="width: 100">Id_Cargo</td>
                <td style="width: 100">Nombre_Cargo</td>
                <td style="width: 100">Descripcion_Cargo</td>
                <td style="width: 100">Estado_Cargo</td>
                <td style="width: 100"  colspan="2"> ACCIONES </td>
            </tr>
        </thead> 
        <?php
        $i = 0;
        foreach ($listaDeCargo as $key => $value) {
            ?>
            <tr>
                <td style="width: 100"><?php echo $listaDeCargo[$i]->rolId; ?></td>
                <td style="width: 100"><?php echo $listaDeCargo[$i]->rolNombre; ?></td>
                <td style="width: 100"><?php echo $listaDeCargo[$i]->rolDescripcion; ?></td>
                <td style="width: 100"><?php echo $listaDeCargo[$i]->rolEstado; ?></td>
                <td style="width: 100"><a href="controladores/ControladorPrincipal.php?ruta=actualizarCargo&idAct=<?php echo $listaDeCargo[$i]->rolId; ?>" >Actualizar</a></td>
                <td style="width: 100">  <a href="controladores/ControladorPrincipal.php?ruta=eliminarCargo&idAct=<?php echo $listaDeCargo[$i]->rolId; ?>">Eliminar</a>   </td>
                <?php
                $i++;
                ?><tr><?php
                }
                ?>
        <tfoot> 
            <tr>
                <td colspan="8">
                    <?php
                    echo $paginacionVinculos;
                    ?>
                </td>
            </tr>
        </tfoot>
    </table>
</div>