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
if (isset($_SESSION['listaDeEveser'])) {
    $listaDeEveser = $_SESSION['listaDeEveser'];
}
if (isset($_SESSION['paginacionVinculos'])) {
    $paginacionVinculos = $_SESSION['paginacionVinculos'];
}
if (isset($_SESSION['totalRegistros'])) {
    $totalRegistros = $_SESSION['totalRegistros'];
}
if (isset($_SESSION['registroCategoriasEveser'])) {
    $registroCategoriasEveser = $_SESSION['registroCategoriasEveser'];
    $cantCategorias=count($registroCategoriasEveser);
}

//http://www.forosdelweb.com/f18/notice-session-had-already-been-started-ignoring-session_start-1021808/
//http://ajpdsoft.com/modules.php?name=News&file=print&sid=486

/* * ********FILTROS************ */
if (isset($_POST['Eventos_eveId']) && !isset($_SESSION['Eventos_eveIdF']))
    $_SESSION['Eventos_eveIdF'] = $_POST['Eventos_eveId'];
else if (isset($_SESSION['Eventos_eveIdF']) && !isset($_POST['Eventos_eveId']))
    $_POST['Eventos_eveId'] = $_SESSION['Eventos_eveIdF'];
/* * ********************************************* */
/* * ********FILTROS************ */
if (isset($_POST['Eventos_Clientes_cliDocumento']) && !isset($_SESSION['Eventos_Clientes_cliDocumentoF']))
    $_SESSION['Eventos_Clientes_cliDocumentoF'] = $_POST['Eventos_Clientes_cliDocumento'];
else if (isset($_SESSION['Eventos_Clientes_cliDocumentoF']) && !isset($_POST['Eventos_Clientes_cliDocumento']))
    $_POST['Eventos_Clientes_cliDocumento'] = $_SESSION['Eventos_Clientes_cliDocumentoF'];
/* * ********************************************* */
/* * ********FILTROS************ */
if (isset($_POST['Servicios_serId']) && !isset($_SESSION['Servicios_serIdF']))
    $_SESSION['Servicios_serIdF'] = $_POST['Servicios_serId'];
else if (isset($_SESSION['Servicios_serIdF']) && !isset($_POST['Servicios_serId']))
    $_POST['Servicios_serId'] = $_SESSION['Servicios_serIdF'];
/* * ********************************************* */
/* * ********FILTROS************ */
if (isset($_POST['serNombre']) && !isset($_SESSION['serNombreF']))
    $_SESSION['serNombreF'] = $_POST['serNombre'];
else if (isset($_SESSION['serNombreF']) && !isset($_POST['serNombre']))
    $_POST['serNombre'] = $_SESSION['serNombreF'];
/* * ********************************************* */
/* * ********FILTROS************ */
if (isset($_POST['evsEstado']) && !isset($_SESSION['evsEstadoF']))
    $_SESSION['evsEstadoF'] = $_POST['evsEstado'];
else if (isset($_SESSION['evsEstadoF']) && !isset($_POST['evsEstado']))
    $_POST['evsEstado'] = $_SESSION['evsEstadoF'];
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
            <h1 class="page-header">Detallado de Eventos.</h1>
        </div>                        
        <!-- /.col-lg-12 -->    
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
<div>
    <fieldset class="scheduler-border"><legend class="scheduler-border">FILTRO</legend>

        <form name="formFiltroEveser" action="controladores/ControladorPrincipal.php" method="POST">
            <input type="hidden" name="ruta" value="listarEveser"/>
            <table> 
                <tr><td>Id_Evento:</td><td><input type="number" name="Eventos_eveId" onclick="" value="<?php
                        if (isset($registroAInsertar['Eventos_eveId'])) {
                            echo $registroAInsertar['Eventos_eveId'];
                        }
                        if (isset($_SESSION['Eventos_eveIdF'])) {
                            echo $_SESSION['Eventos_eveIdF'];
                        }else if($_POST['Eventos_eveId']){ echo $_POST['Eventos_eveId']; };
                        ?>"/></td>
                      
                    <td>
                        <?php
                        if (isset($marcaCampo['Eventos_eveId'])) {
                            echo $marcaCampo['Eventos_eveId'];
                        }
                        ?>
                    </td>                        
                </tr>        
                <tr><td>Documento_Cliente:</td><td><input type="number" name="Eventos_Clientes_cliDocumento" onclick="" value="<?php
                        if (isset($registroAInsertar['Eventos_Clientes_cliDocumento'])) {
                            echo $registroAInsertar['Eventos_Clientes_cliDocumento'];
                        }
                        if (isset($_SESSION['Eventos_Clientes_cliDocumentoF'])) {
                            echo $_SESSION['Eventos_Clientes_cliDocumentoF'];
                        }else if($_POST['Eventos_Clientes_cliDocumento']){ echo $_POST['Eventos_Clientes_cliDocumento']; };
                        ?>"/></td>
                      
                    <td>
                        <?php
                        if (isset($marcaCampo['Eventos_Clientes_cliDocumento'])) {
                            echo $marcaCampo['Eventos_Clientes_cliDocumento'];
                        }
                        ?>
                    </td>                        
                </tr>        
                <tr><td>Id_Servicio:</td><td><input type="number" name="Servicios_serId" onclick="" value="<?php
                        if (isset($registroAInsertar['Servicios_serId'])) {
                            echo $registroAInsertar['Servicios_serId'];
                        }
                        if (isset($_SESSION['Servicios_serIdF'])) {
                            echo $_SESSION['Servicios_serIdF'];
                        }else if($_POST['Servicios_serId']){ echo $_POST['Servicios_serId']; };
                        ?>"/></td>
                      
                    <td>
                        <?php
                        if (isset($marcaCampo['Servicios_serId'])) {
                            echo $marcaCampo['Servicios_serId'];
                        }
                        ?>
                    </td>                        
                </tr>        
                <tr><td>Estado_Evento:</td><td><input type="number" name="evsEstado" onclick="" value="<?php
                        if (isset($registroAInsertar['evsEstado'])) {
                            echo $registroAInsertar['evsEstado'];
                        }
                        if (isset($_SESSION['evsEstadoF'])) {
                            echo $_SESSION['evsEstadoF'];
                        }else if($_POST['evsEstado']){ echo $_POST['evsEstado']; };
                        ?>"/></td>
                      
                    <td>
                        <?php
                        if (isset($marcaCampo['evsEstado'])) {
                            echo $marcaCampo['evsEstado'];
                        }
                        ?>
                    </td>                        
                </tr>        
                <?php
                if (isset($mensajesError)) {

                    echo "<tr>\n"; //fila para imprimir errores si los hay
                    echo "<td colspan=3>\n";
                    foreach ($mensajesError as $value) {
                        echo $value;
                    }
                    echo "</td>\n";
                    echo "</tr>\n";
                }
                ?>                    
                <tr><td><input type="submit" value="Filtrar" name="enviar" title="Si es necesario limpie 'Buscar'"/></td>
                    <td><input type="reset" value="limpiar" onclick="
                            javascript:document.formFiltroEveser.Eventos_eveId.value = '';
                            javascript:document.formFiltroEveser.Eventos_Clientes_cliDocumento.value = '';
                            javascript:document.formFiltroEveser.Servicios_serId.value = '';
                            javascript:document.formFiltroEveser.evsEstado.value = '';
                            javascript:document.formFiltroEveser.submit();
                               "/></td><td></td></tr> 
            </table>
        </form>
    </fieldset>
</div>

<br>
<div class="card">
    <span class="izquierdo">
        <!--NUEVO BOTÓN PARA DARLE FUNCIONALIDAD*************************-->

        <input type="button" onclick="javascript:location.href = 'principal.php?contenido=vistas/vistasEveser/vistaInsertarEveser.php'" value="Nueva Asociacion">

    </span>
</div>
<br>
<a name="listaDeEveser" id="a"></a>
<div style="width: 800">
    <p>Total de Registros: <?php echo $totalRegistros; ?></p>
        <table class="table table-hover table-responsive" border=1>

        <thead>
            <tr>
                <td style="width: 100">Id_Evento</td>
                <td style="width: 100">Documento_Cliente</td>
                <td style="width: 100">Id_Servicio</td>
                <td style="width: 100">Nombre</td>
                <td style="width: 100">Estado_Evento</td>
                <td style="width: 100"  colspan="2"> ACCIONES </td>
            </tr>
        </thead> 
        <?php
        $i = 0;
        foreach ($listaDeEveser as $key => $value) {
            ?>
            <tr>
                <td style="width: 100"><?php echo $listaDeEveser[$i]->Eventos_eveId; ?></td>
                <td style="width: 100"><?php echo $listaDeEveser[$i]->Eventos_Clientes_cliDocumento; ?></td>
                <td style="width: 100"><?php echo $listaDeEveser[$i]->Servicios_serId; ?></td>;
                <td style="width: 100"><?php echo $listaDeEveser[$i]->serNombre; ?></td>;
                <td style="width: 100"><?php echo $listaDeEveser[$i]->evsEstado; ?></td>
                <td style="width: 100"><a href="controladores/ControladorPrincipal.php?ruta=actualizarEveser&idAct=<?php echo $listaDeEveser[$i]->Eventos_eveId; ?>" >Actualizar</a></td>
                <td style="width: 100">  <a href="controladores/ControladorPrincipal.php?ruta=eliminarEveser&idAct=<?php echo $listaDeEveser[$i]->Eventos_eveId; ?>">Eliminar</a>   </td>
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