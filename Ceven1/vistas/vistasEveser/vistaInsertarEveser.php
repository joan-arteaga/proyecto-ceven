<?php
//@session_start();
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
if (isset($_SESSION['registroCategoriasEveser'])) {   /***************************/
    $registroCategoriasEveser = $_SESSION['registroCategoriasEveser'];
    $cantCategorias=count($registroCategoriasEveser);
}
if (isset($_GET['erroresValidacion'])) {
    $erroresValidacion = json_decode($_GET['erroresValidacion'], true); //true para que convierta un json a "array" y no a objeto
}
?>        
<div class="panel-heading">
    <h3 class="panel-title">Inserción de Servicios al Evento.</h3>
</div>
<form role="form" method="POST" action="controladores/ControladorPrincipal.php" id="formRegistro">
    <table>
        <fieldset>
            <tr>
                <td>
                    <input class="form-control" placeholder="Id_Evento	" name="Eventos_eveId" type="number" pattern="" required="required" autofocus
                           value="<?php if (isset($erroresValidacion['datosViejos']['Eventos_eveId'])) echo $erroresValidacion['datosViejos']['Eventos_eveId'];  
                                                if (isset($_SESSION['Eventos_eveId'])) echo $_SESSION['Eventos_eveId']; unset($_SESSION['Eventos_eveId']); ?>"
                           >
                           <?php if (isset($erroresValidacion['marcaCampo']['Eventos_eveId'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['Eventos_eveId'] . "</font>"; ?>
                           <?php if (isset($erroresValidacion['mensajesError']['Eventos_eveId'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['Eventos_eveId'] . "</font>"; ?>                                        
                    <!--<p class="help-block">Example block-level help text here.</p>-->
                </td>
            </tr>
            <tr>
                <td>                
                    <input class="form-control" placeholder="Documento_Cliente" name="Eventos_Clientes_cliDocumento" type="number"   required="required"
                           value="<?php if (isset($erroresValidacion['datosViejos']['Eventos_Clientes_cliDocumento'])) echo $erroresValidacion['datosViejos']['Eventos_Clientes_cliDocumento'];  
                                                if (isset($_SESSION['Eventos_Clientes_cliDocumento'])) echo $_SESSION['Eventos_Clientes_cliDocumento']; unset($_SESSION['Eventos_Clientes_cliDocumento']); ?>"
                           >
                           <?php if (isset($erroresValidacion['marcaCampo']['Eventos_Clientes_cliDocumento'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['Eventos_Clientes_cliDocumento'] . "</font>"; ?>                                        
                           <?php if (isset($erroresValidacion['mensajesError']['Eventos_Clientes_cliDocumento'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['Eventos_Clientes_cliDocumento'] . "</font>"; ?>                                        
                    <!--<p class="help-block">Example block-level help text here.</p>-->
                </td>
            </tr>
            <tr>
                <td>                
                    <input class="form-control" placeholder="Id_Servicio" name="Servicios_serId" type="number"   required="required"
                           value="<?php if (isset($erroresValidacion['datosViejos']['Servicios_serId'])) echo $erroresValidacion['datosViejos']['Servicios_serId'];  
                                                if (isset($_SESSION['Servicios_serId'])) echo $_SESSION['Servicios_serId']; unset($_SESSION['Servicios_serId']); ?>"
                           >
                           <?php if (isset($erroresValidacion['marcaCampo']['Servicios_serId'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['Servicios_serId'] . "</font>"; ?>                                        
                           <?php if (isset($erroresValidacion['mensajesError']['Servicios_serId'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['Servicios_serId'] . "</font>"; ?>                                        
                    <!--<p class="help-block">Example block-level help text here.</p>-->
                </td>
            </tr>
            <tr>
                <td>                  
                    <input class="form-control" placeholder="Estado_Evento" name="evsEstado" type="number"  required="required"
                           value="<?php if (isset($erroresValidacion['datosViejos']['evsEstado'])) echo $erroresValidacion['datosViejos']['evsEstado']; 
                                                if (isset($_SESSION['evsEstado'])) echo $_SESSION['evsEstado']; unset($_SESSION['evsEstado']); ?>"
                           >
                           <?php if (isset($erroresValidacion['marcaCampo']['evsEstado'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['evsEstado'] . "</font>"; ?>                                        
                           <?php if (isset($erroresValidacion['mensajesError']['evsEstado'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['evsEstado'] . "</font>"; ?>                                        
                </td>
            </tr>                  
                     
            <input type="hidden" name="ruta" value="insertarEveser">
            <!--<input type="hidden" name="contenido" value="controlarRegistro">-->
            <tr>
                <td>            
                    <button  onclick="valida_registro()">Añadir Servicio</button>
                </td>
            </tr>             
    </table>
</form>
<?php if (isset($erroresValidacion)) $erroresValidacion = NULL; ?>




