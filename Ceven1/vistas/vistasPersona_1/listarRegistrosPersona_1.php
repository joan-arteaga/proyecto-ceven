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
if (isset($_SESSION['listaDePersona_1'])) {
    $listaDePersona_1 = $_SESSION['listaDePersona_1'];
}
if (isset($_SESSION['paginacionVinculos'])) {
    $paginacionVinculos = $_SESSION['paginacionVinculos'];
}
if (isset($_SESSION['totalRegistros'])) {
    $totalRegistros = $_SESSION['totalRegistros'];
}
if (isset($_SESSION['registroCategoriasPersona_1'])) {
    $registroCategoriasPersona_1 = $_SESSION['registroCategoriasPersona_1'];
    $cantCategorias=count($registroCategoriasPersona_1);
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
            <h1 class="page-header">Gestión de Usuarios.</h1>
        </div>                        
        <!-- /.col-lg-12 -->    
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
<div>
    
</div>

<br>
<br>
<a name="listaDePersona_1" id="a"></a>
<div style="width: 800">
    <p>Total de Registros: <?php echo $totalRegistros; ?></p>
    <table border=1>
        <thead>
            <tr>
                <td style="width: 100">Id_Usuario</td>
                <td style="width: 100">Documento</td>
                <td style="width: 100">Nombre</td>
                <td style="width: 100">Apellido</td>
                <td style="width: 100">Usuario_Login</td>
                <td style="width: 100">Estado_Usuario</td>
                <td style="width: 100"  colspan="2"> ACCIONES </td>
            </tr>
        </thead> 
        <?php
        $i = 0;
        foreach ($listaDePersona_1 as $key => $value) {
            ?>
            <tr>
                <td style="width: 100"><?php echo $listaDePersona_1[$i]->perId; ?></td>
                <td style="width: 100"><?php echo $listaDePersona_1[$i]->perDocumento; ?></td>
                <td style="width: 100"><?php echo $listaDePersona_1[$i]->perNombre; ?></td>;
                <td style="width: 100"><?php echo $listaDePersona_1[$i]->perApellido; ?></td>
                <td style="width: 100"><?php echo $listaDePersona_1[$i]->usuLogin; ?></td>
                <td style="width: 100"><?php echo $listaDePersona_1[$i]->perEstado; ?></td>;
                <td style="width: 100"><a href="controladores/ControladorPrincipal.php?ruta=actualizarPersona_1&idAct=<?php echo $listaDePersona_1[$i]->perId; ?>" >Actualizar</a></td>
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