<?php
//@session_start();
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
if (isset($_SESSION['actualizarDatosEventos'])) {
    $actualizarDatosEventos = $_SESSION['actualizarDatosEventos'];
    unset($_SESSION['actualizarEventos']);
}
if (isset($_SESSION['registroCategoriasEventos'])) { /* * ************************ */
    $registroCategoriasEventos = $_SESSION['registroCategoriasEventos'];
    $cantCategorias = count($registroCategoriasEventos);
}
if (isset($_GET['erroresValidacion'])) {
    $erroresValidacion = json_decode($_GET['erroresValidacion'], true); //true para que convierta un json a "array" y no a objeto
}
?>        
<div class="panel-heading">
    <h3 class="panel-title">Actualización del Evento.</h3>
</div>
<form role="form" method="POST" action="controladores/ControladorPrincipal.php" id="formRegistro">
    <table>
        <fieldset>
            <tr>
                <td>
                    <input class="form-control" placeholder="Id_Evento" name="eveId" type="number" pattern="" required="required" autofocus readonly="readonly"
                           value="<?php
                           if (isset($actualizarDatosEventos->eveId))
                               echo $actualizarDatosEventos->eveId;
                           if (isset($erroresValidacion['datosViejos']['eveId']))
                               echo $erroresValidacion['datosViejos']['eveId'];
                           if (isset($_SESSION['eveId']))
                               echo $_SESSION['eveId'];
                           unset($_SESSION['eveId']);
                           ?>">
                            <?php if (isset($erroresValidacion['marcaCampo']['eveId'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['eveId'] . "</font>"; ?>
                            <?php if (isset($erroresValidacion['mensajesError']['eveId'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['eveId'] . "</font>"; ?>                                        
                    <!--<p class="help-block">Example block-level help text here.</p>-->
                </td>
            </tr>
            <tr>
                <td>                
                    <input class="form-control" placeholder="Fecha_Inicial" name="eveFechaInicial" type="date"   required="required"
                           value="<?php
                           if (isset($actualizarDatosEventos->eveFechaInicial))
                               echo $actualizarDatosEventos->eveFechaInicial;                           
                           if (isset($erroresValidacion['datosViejos']['eveFechaInicial']))
                               echo $erroresValidacion['datosViejos']['eveFechaInicial'];
                           if (isset($_SESSION['eveFechaInicial']))
                               echo $_SESSION['eveFechaInicial'];
                           unset($_SESSION['eveFechaInicial']);
                           ?>">
                            <?php if (isset($erroresValidacion['marcaCampo']['eveFechaInicial'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['eveFechaInicial'] . "</font>"; ?>                                        
                            <?php if (isset($erroresValidacion['mensajesError']['eveFechaInicial'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['eveFechaInicial'] . "</font>"; ?>                                        
                    <!--<p class="help-block">Example block-level help text here.</p>-->
                </td>
            </tr>
            <tr>
                <td>                  
                    <input class="form-control" placeholder="Cantidad_de_Personas" name="eveCantidadPax" type="number"  required="required"
                           value="<?php
                           if (isset($actualizarDatosEventos->eveCantidadPax))
                               echo $actualizarDatosEventos->eveCantidadPax;                            
                           if (isset($erroresValidacion['datosViejos']['eveCantidadPax']))
                               echo $erroresValidacion['datosViejos']['eveCantidadPax'];
                           if (isset($_SESSION['eveCantidadPax']))
                               echo $_SESSION['eveCantidadPax'];
                           unset($_SESSION['eveCantidadPax']);
                           ?>">
                           <?php if (isset($erroresValidacion['marcaCampo']['eveCantidadPax'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['eveCantidadPax'] . "</font>"; ?>                                        
                           <?php if (isset($erroresValidacion['mensajesError']['eveCantidadPax'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['eveCantidadPax'] . "</font>"; ?>                                        
                </td>
            </tr>                  
            <tr>
                <td>                  
                    <input class="form-control" placeholder="Documento_Cliente" name="Clientes_cliDocumento" type="number"  required="required"
                           value="<?php
                           if (isset($actualizarDatosEventos->Clientes_cliDocumento))
                               echo $actualizarDatosEventos->Clientes_cliDocumento;                            
                           if (isset($erroresValidacion['datosViejos']['Clientes_cliDocumento']))
                               echo $erroresValidacion['datosViejos']['Clientes_cliDocumento'];
                           if (isset($_SESSION['Clientes_cliDocumento']))
                               echo $_SESSION['Clientes_cliDocumento'];
                           unset($_SESSION['Clientes_cliDocumento']);
                           ?>">
                           <?php if (isset($erroresValidacion['marcaCampo']['Clientes_cliDocumento'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['Clientes_cliDocumento'] . "</font>"; ?>                                        
                           <?php if (isset($erroresValidacion['mensajesError']['Clientes_cliDocumento'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['Clientes_cliDocumento'] . "</font>"; ?>                                        
                </td>
            </tr>  
            <tr>
                <td>                  
                    <input class="form-control" placeholder="Estado_Evento" name="eveEstado" type="number"  required="required"
                           value="<?php
                           if (isset($actualizarDatosEventos->eveEstado))
                               echo $actualizarDatosEventos->eveEstado;                            
                           if (isset($erroresValidacion['datosViejos']['eveEstado']))
                               echo $erroresValidacion['datosViejos']['eveEstado'];
                           if (isset($_SESSION['eveEstado']))
                               echo $_SESSION['eveEstado'];
                           unset($_SESSION['eveEstado']);
                           ?>">
                           <?php if (isset($erroresValidacion['marcaCampo']['eveEstado'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['eveEstado'] . "</font>"; ?>                                        
                           <?php if (isset($erroresValidacion['mensajesError']['eveEstado'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['eveEstado'] . "</font>"; ?>                                        
                </td>
            </tr>  
            <input type="hidden" name="ruta" value="confirmaActualizarEventos">
            <!--<input type="hidden" name="contenido" value="controlarRegistro">-->
            <tr>
                <td>            
                    <!--<button  onclick="valida_registro()">Actualizar </button>-->
                    <button type="submit" >Actualizar Evento</button>
                </td>
            </tr>             
    </table>
</form>
<?php if (isset($erroresValidacion)) $erroresValidacion = NULL; ?>




