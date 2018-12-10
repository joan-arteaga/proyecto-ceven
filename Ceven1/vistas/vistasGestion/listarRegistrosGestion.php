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
if (isset($_SESSION['listaDeGestion'])) {
    $listaDeGestion = $_SESSION['listaDeGestion'];
}
if (isset($_SESSION['paginacionVinculos'])) {
    $paginacionVinculos = $_SESSION['paginacionVinculos'];
}
if (isset($_SESSION['totalRegistros'])) {
    $totalRegistros = $_SESSION['totalRegistros'];
}
if (isset($_SESSION['registroCategoriasGestion'])) {
    $registroCategoriasGestion = $_SESSION['registroCategoriasGestion'];
    $cantCategorias=count($registroCategoriasGestion);
}

//http://www.forosdelweb.com/f18/notice-session-had-already-been-started-ignoring-session_start-1021808/
//http://ajpdsoft.com/modules.php?name=News&file=print&sid=486

/* * ********FILTROS************ */
if (isset($_POST['eveEstado']) && !isset($_SESSION['eveEstadoF']))
    $_SESSION['eveEstadoF'] = $_POST['eveEstado'];
else if (isset($_SESSION['isbnF']) && !isset($_POST['isbn']))
    $_POST['eveEstado'] = $_SESSION['eveEstadoF'];
/* * ********************************************* */
/* * ********FILTROS************ */
if (isset($_POST['eveId']) && !isset($_SESSION['eveIdF']))
    $_SESSION['eveIdF'] = $_POST['eveId'];
else if (isset($_SESSION['eveIdF']) && !isset($_POST['eveId']))
    $_POST['eveId'] = $_SESSION['eveIdF'];
/* * ********************************************* */
/* * ********FILTROS************ */
if (isset($_POST['eveFechaInicial']) && !isset($_SESSION['eveFechaInicialF']))
    $_SESSION['eveFechaInicialF'] = $_POST['eveFechaInicial'];
else if (isset($_SESSION['eveFechaInicialF']) && !isset($_POST['eveFechaInicial']))
    $_POST['eveFechaInicial'] = $_SESSION['eveFechaInicialF'];
/* * ********************************************* */
/* * ********FILTROS************ */
if (isset($_POST['eveCantidadPax']) && !isset($_SESSION['eveCantidadPaxF']))
    $_SESSION['eveCantidadPaxF'] = $_POST['eveCantidadPax'];
else if (isset($_SESSION['eveCantidadPaxF']) && !isset($_POST['eveCantidadPax']))
    $_POST['eveCantidadPax'] = $_SESSION['eveCantidadPaxF'];
/* * ********************************************* */
/* * ********FILTROS************ */
if (isset($_POST['serNombre']) && !isset($_SESSION['serNombreF']))
    $_SESSION['serNombreF'] = $_POST['serNombre'];
else if (isset($_SESSION['serNombreF']) && !isset($_POST['serNombre']))
    $_POST['serNombre'] = $_SESSION['serNombreF'];
/* * ********************************************* */
/* * ********FILTROS************ */
if (isset($_POST['Servicios_serId']) && !isset($_SESSION['Servicios_serIdF']))
    $_SESSION['Servicios_serIdF'] = $_POST['Servicios_serId'];
else if (isset($_SESSION['Servicios_serIdF']) && !isset($_POST['Servicios_serId']))
    $_POST['Servicios_serId'] = $_SESSION['Servicios_serIdF'];
/* * ********************************************* */

/* * ********FILTROS************ */
if (isset($_POST['Eventos_Clientes_cliDocumento']) && !isset($_SESSION['Eventos_Clientes_cliDocumentoF']))
    $_SESSION['Eventos_Clientes_cliDocumentoF'] = $_POST['Eventos_Clientes_cliDocumento'];
else if (isset($_SESSION['Eventos_Clientes_cliDocumentoF']) && !isset($_POST['Eventos_Clientes_cliDocumento']))
    $_POST['Eventos_Clientes_cliDocumento'] = $_SESSION['Eventos_Clientes_cliDocumentoF'];
/* * ********************************************* */
/* * ********FILTROS************ */
if (isset($_POST['cliNombre']) && !isset($_SESSION['cliNombreF']))
    $_SESSION['cliNombreF'] = $_POST['cliNombre'];
else if (isset($_SESSION['cliNombreF']) && !isset($_POST['cliNombre']))
    $_POST['cliNombre'] = $_SESSION['cliNombreF'];
/* * ********************************************* */
/* * ********FILTROS************ */
if (isset($_POST['cliApellido1']) && !isset($_SESSION['cliApellido1F']))
    $_SESSION['cliApellido1F'] = $_POST['cliApellido1'];
else if (isset($_SESSION['cliApellido1F']) && !isset($_POST['cliApellido1']))
    $_POST['cliApellido1'] = $_SESSION['cliApellido1F'];
/* * ********************************************* */
/* * ********FILTROS************ */
if (isset($_POST['cliApellido2']) && !isset($_SESSION['cliApellido2F']))
    $_SESSION['cliApellido2F'] = $_POST['cliApellido2'];
else if (isset($_SESSION['cliApellido2F']) && !isset($_POST['cliApellido2']))
    $_POST['cliApellido2'] = $_SESSION['cliApellido2F'];
/* * ********************************************* */
/* * ********FILTROS************ */
if (isset($_POST['persona_perId']) && !isset($_SESSION['persona_perIdF']))
    $_SESSION['persona_perIdF'] = $_POST['persona_perId'];
else if (isset($_SESSION['persona_perIdF']) && !isset($_POST['persona_perId']))
    $_POST['persona_perId'] = $_SESSION['persona_perIdF'];
/* * ********************************************* */
/* * ********FILTROS************ */
if (isset($_POST['perDocumento']) && !isset($_SESSION['isbnF']))
    $_SESSION['perDocumentoF'] = $_POST['isbn'];
else if (isset($_SESSION['perDocumentoF']) && !isset($_POST['isbn']))
    $_POST['perDocumento'] = $_SESSION['perDocumentoF'];
/* * ********************************************* */
/* * ********FILTROS************ */
if (isset($_POST['perNombre']) && !isset($_SESSION['perNombreF']))
    $_SESSION['perNombreF'] = $_POST['perNombre'];
else if (isset($_SESSION['perNombreF']) && !isset($_POST['perNombre']))
    $_POST['perNombre'] = $_SESSION['perNombreF'];
/* * ********************************************* */
/* * ********FILTROS************ */
if (isset($_POST['perApellido']) && !isset($_SESSION['perApellidoF']))
    $_SESSION['perApellidoF'] = $_POST['perApellido'];
else if (isset($_SESSION['perApellidoF']) && !isset($_POST['perApellido']))
    $_POST['perApellido'] = $_SESSION['perApellidoF'];
/* * ********************************************* */
/* * ********FILTROS************ */
if (isset($_POST['rolNombre']) && !isset($_SESSION['rolNombreF']))
    $_SESSION['rolNombreF'] = $_POST['rolNombre'];
else if (isset($_SESSION['rolNombreF']) && !isset($_POST['rolNombre']))
    $_POST['rolNombre'] = $_SESSION['rolNombreF'];
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
            <h1 class="page-header">Gestión de los Eventos.</h1>
        </div>                        
        <!-- /.col-lg-12 -->    
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
<div>
   <fieldset class="scheduler-border"><legend class="scheduler-border">FILTRO</legend>

        <form name="formFiltroGestion" action="controladores/ControladorPrincipal.php" method="POST">
            <input type="hidden" name="ruta" value="listarGestion"/>
            <table> 
                <tr><td>Estado_Evento:</td><td><input type="number" name="eveEstado" onclick="" value="<?php
                        if (isset($registroAInsertar['eveEstado'])) {
                            echo $registroAInsertar['eveEstado'];
                        }
                        if (isset($_SESSION['eveEstadoF'])) {
                            echo $_SESSION['eveEstadoF'];
                        }else if($_POST['eveEstado']){ echo $_POST['eveEstado']; };
                        ?>"/></td>
                      
                    <td>
                        <?php
                        if (isset($marcaCampo['eveEstado'])) {
                            echo $marcaCampo['eveEstado'];
                        }
                        ?>
                    </td>                        
                </tr> 
                <tr><td>Id_Evento:</td><td><input type="number" name="eveId" onclick="" value="<?php
                        if (isset($registroAInsertar['eveId'])) {
                            echo $registroAInsertar['eveId'];
                        }
                        if (isset($_SESSION['eveIdF'])) {
                            echo $_SESSION['eveIdF'];
                        }else if($_POST['eveId']){ echo $_POST['eveId']; };
                        ?>"/></td>
                      
                    <td>
                        <?php
                        if (isset($marcaCampo['eveId'])) {
                            echo $marcaCampo['eveId'];
                        }
                        ?>
                    </td>                        
                </tr>
                <tr><td>Fecha_de_Inicio:</td><td><input type="date" name="eveFechaInicial" onclick="" value="<?php
                        if (isset($registroAInsertar['eveFechaInicial'])) {
                            echo $registroAInsertar['eveFechaInicial'];
                        }
                        if (isset($_SESSION['eveFechaInicialF'])) {
                            echo $_SESSION['eveFechaInicialF'];
                        }else if($_POST['eveFechaInicial']){ echo $_POST['eveFechaInicial']; };
                        ?>"/></td>
                      
                    <td>
                        <?php
                        if (isset($marcaCampo['eveFechaInicial'])) {
                            echo $marcaCampo['eveFechaInicial'];
                        }
                        ?>
                    </td>                        
                </tr>
                <tr><td>Cantidad_Personas:</td><td><input type="number" name="eveCantidadPax" onclick="" value="<?php
                        if (isset($registroAInsertar['eveCantidadPax'])) {
                            echo $registroAInsertar['eveCantidadPax'];
                        }
                        if (isset($_SESSION['eveCantidadPaxF'])) {
                            echo $_SESSION['eveCantidadPaxF'];
                        }else if($_POST['eveCantidadPax']){ echo $_POST['eveCantidadPax']; };
                        ?>"/></td>
                      
                    <td>
                        <?php
                        if (isset($marcaCampo['eveCantidadPax'])) {
                            echo $marcaCampo['eveCantidadPax'];
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
                            javascript:document.formFiltroLibros.eveEstado.value = '';
                            javascript:document.formFiltroLibros.eveId.value = '';
                            javascript:document.formFiltroLibros.eveFechaInicial.value = '';
                            javascript:document.formFiltroLibros.eveCantidadPax.value = '';
                            javascript:document.formFiltroLibros.Servicios_serId.value = '';
                            javascript:document.formFiltroLibros.Eventos_Clientes_cliDocumento.value = '';
                            javascript:document.formFiltroLibros.submit();
                               "/></td><td></td></tr> 
            </table>
        </form>
    </fieldset> 
</div>
<fieldset class="scheduler-border"><legend class="scheduler-border">BUSCAR</legend>

    <div style="width: 800">
        <span class="izquierdo">
            <!--NUEVO BOTÓN PARA BUSCAR*************************-->
            <form name="formBuscarGestion" action="controladores/ControladorPrincipal.php" method="POST">
                <input type="hidden" name="ruta" value="listarGestion"/>
                <input type="text" name="buscar" placeholder="Término a Buscar" value="<?php
                if (isset($_SESSION['buscarF'])) {
                    echo $_SESSION['buscarF'];
                }
                ?>">
                <input type="submit"  value="Buscar" title="Si es necesario limpie 'Filtrar'">&nbsp;&nbsp;||&nbsp;&nbsp;
                <input type="button"  value="Limpiar Búsqueda" onclick="javascript:document.formBuscarGestion.buscar.value = '';
                        javascript:document.formBuscarGestion.submit();">
            </form>
        </span>
    </div>        
</fieldset>
<br>
<br>
<a name="listaDeGestion" id="a"></a>
<div class="card">

    <p>Total de Registros: <?php echo $totalRegistros; ?></p>
       <table class="table table-hover table-responsive" border=1>

        <thead>
            <tr>
                <td style="width: 100">Estado_Evento</td>
                <td style="width: 100">Id_Evento</td>
                <td style="width: 100">Fecha_de_Inicio</td>
                <td style="width: 100">Cantidad_Personas</td>
                <td style="width: 100">Id_Servicio</td>
                <td style="width: 100">Nombre_Servicio</td>
                <td style="width: 100">Documento_Cliente</td>
                <td style="width: 100">Nombre_Cliente</td>
                </tr>
        </thead> 
        <?php
        $i = 0;
        foreach ($listaDeGestion as $key => $value) {
            ?>
            <tr>
                <td style="width: 100"><?php echo $listaDeGestion[$i]->eveEstado; ?></td>
                <td style="width: 100"><?php echo $listaDeGestion[$i]->eveId; ?></td>
                <td style="width: 100"><?php echo $listaDeGestion[$i]->eveFechaInicial; ?></td>
                <td style="width: 100"><?php echo $listaDeGestion[$i]->eveCantidadPax; ?></td>
                <td style="width: 100"><?php echo $listaDeGestion[$i]->Servicios_serId; ?></td>
                <td style="width: 100"><?php echo $listaDeGestion[$i]->serNombre; ?></td>
                <td style="width: 100"><?php echo $listaDeGestion[$i]->Eventos_Clientes_cliDocumento; ?></td>
                <td style="width: 100"><?php echo $listaDeGestion[$i]->cliNombre; ?></td>
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
    <br/><br/><br/>
    <table border=1>
        <thead>
            <tr>
                <td style="width: 100">Apellido1_Cliente</td>
                <td style="width: 100">Apellido2_Cliente</td>
                <td style="width: 100">Id_Responsable</td>
                <td style="width: 100">Documento_Responsable</td>
                <td style="width: 100">Nombre_Responsable</td>
                <td style="width: 100">Apellido_Responsable</td>
                <td style="width: 100">Nombre_Cargo</td>
                </tr>
        </thead> 
        <?php
        $i = 0;
        foreach ($listaDeGestion as $key => $value) {
            ?>
            <tr>
                <td style="width: 100"><?php echo $listaDeGestion[$i]->cliApellido1; ?></td>
                <td style="width: 100"><?php echo $listaDeGestion[$i]->cliApellido2; ?></td>
                <td style="width: 100"><?php echo $listaDeGestion[$i]->persona_perId; ?></td>
                <td style="width: 100"><?php echo $listaDeGestion[$i]->perDocumento; ?></td>
                <td style="width: 100"><?php echo $listaDeGestion[$i]->perNombre; ?></td>
                <td style="width: 100"><?php echo $listaDeGestion[$i]->perApellido; ?></td>
                <td style="width: 100"><?php echo $listaDeGestion[$i]->rolNombre; ?></td>
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