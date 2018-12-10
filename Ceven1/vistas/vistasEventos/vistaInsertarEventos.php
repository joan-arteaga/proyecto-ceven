<?php
//@session_start();
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
if (isset($_SESSION['registroCategoriasEventos'])) {   /***************************/
    $registroCategoriasEventos = $_SESSION['registroCategoriasEventos'];
    $cantCategorias=count($registroCategoriasEventos);
}
if (isset($_GET['erroresValidacion'])) {
    $erroresValidacion = json_decode($_GET['erroresValidacion'], true); //true para que convierta un json a "array" y no a objeto
}
?>        
<div class="panel-heading">
    <h3 class="panel-title">Inserción de Evento.</h3>
</div>
<form role="form" method="POST" action="controladores/ControladorPrincipal.php" id="formRegistro">
    <table>
        <fieldset>
            
            <tr>
                <td>                
                    <input class="form-control" placeholder="Fecha_de_Inicio" name="eveFechaInicial" type="date"   required="required"
                           value="<?php if (isset($erroresValidacion['datosViejos']['eveFechaInicial'])) echo $erroresValidacion['datosViejos']['eveFechaInicial'];  
                                                if (isset($_SESSION['eveFechaInicial'])) echo $_SESSION['eveFechaInicial']; unset($_SESSION['eveFechaInicial']); ?>"
                           >
                           <?php if (isset($erroresValidacion['marcaCampo']['eveFechaInicial'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['eveFechaInicial'] . "</font>"; ?>                                        
                           <?php if (isset($erroresValidacion['mensajesError']['eveFechaInicial'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['eveFechaInicial'] . "</font>"; ?>                                        
                    <!--<p class="help-block">Example block-level help text here.</p>-->
                </td>
            </tr>
            <tr>
                <td>                  
                    <input class="form-control" placeholder="Cantidad_de_Personas" name="eveCantidadPax" type="number"  required="required"
                           value="<?php if (isset($erroresValidacion['datosViejos']['eveCantidadPax'])) echo $erroresValidacion['datosViejos']['eveCantidadPax']; 
                                                if (isset($_SESSION['eveCantidadPax'])) echo $_SESSION['eveCantidadPax']; unset($_SESSION['eveCantidadPax']); ?>"
                           >
                           <?php if (isset($erroresValidacion['marcaCampo']['eveCantidadPax'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['eveCantidadPax'] . "</font>"; ?>                                        
                           <?php if (isset($erroresValidacion['mensajesError']['eveCantidadPax'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['eveCantidadPax'] . "</font>"; ?>                                        
                </td>
            </tr>                  
            <tr>
                <td>                  
                    <input class="form-control" placeholder="Documento_Cliente" name="Clientes_cliDocumento" type="number"  required="required"
                           value="<?php if (isset($erroresValidacion['datosViejos']['Clientes_cliDocumento'])) echo $erroresValidacion['datosViejos']['Clientes_cliDocumento']; 
                                                if (isset($_SESSION['Clientes_cliDocumento'])) echo $_SESSION['Clientes_cliDocumento']; unset($_SESSION['Clientes_cliDocumento']); ?>"
                           >
                           <?php if (isset($erroresValidacion['marcaCampo']['Clientes_cliDocumento'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['Clientes_cliDocumento'] . "</font>"; ?>                                        
                           <?php if (isset($erroresValidacion['mensajesError']['Clientes_cliDocumento'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['Clientes_cliDocumento'] . "</font>"; ?>                                        
                </td>
            </tr>                  
            <tr>
                <td>                  
                    <input class="form-control" placeholder="Estado_del_Evento" name="eveEstado" type="number"  required="required"
                           value="<?php if (isset($erroresValidacion['datosViejos']['eveEstado'])) echo $erroresValidacion['datosViejos']['eveEstado']; 
                                                if (isset($_SESSION['eveEstado'])) echo $_SESSION['eveEstado']; unset($_SESSION['eveEstado']); ?>"
                           >
                           <?php if (isset($erroresValidacion['marcaCampo']['eveEstado'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['eveEstado'] . "</font>"; ?>                                        
                           <?php if (isset($erroresValidacion['mensajesError']['eveEstado'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['eveEstado'] . "</font>"; ?>                                        
                </td>
            </tr>             
                        
            <input type="hidden" name="ruta" value="insertarEventos">
            <!--<input type="hidden" name="contenido" value="controlarRegistro">-->
            <tr>
                <td>            
                    <button  onclick="valida_registro()">Agregar Evento</button>
                </td>
            </tr>             
    </table>
</form>
<?php if (isset($erroresValidacion)) $erroresValidacion = NULL; ?>




