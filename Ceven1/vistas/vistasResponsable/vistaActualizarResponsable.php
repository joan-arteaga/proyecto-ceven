<?php
//@session_start();
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
if (isset($_SESSION['actualizarDatosResponsable'])) {
    $actualizarDatosResponsable = $_SESSION['actualizarDatosResponsable'];
    unset($_SESSION['actualizarResponsable']);
}
if (isset($_SESSION['registroCategoriasResponsable'])) { /* * ************************ */
    $registroCategoriasResponsable = $_SESSION['registroCategoriasResponsable'];
    $cantCategorias = count($registroCategoriasResponsable);
}
if (isset($_GET['erroresValidacion'])) {
    $erroresValidacion = json_decode($_GET['erroresValidacion'], true); //true para que convierta un json a "array" y no a objeto
}
?>        
<div class="panel-heading">
    <h3 class="panel-title">Actualización de Responsable.</h3>
</div>
<form role="form" method="POST" action="controladores/ControladorPrincipal.php" id="formRegistro">
    <table>
        <fieldset>
            <tr>
                <td>
                    <input class="form-control" placeholder="Id_Evento" name="eventos_eveId" type="number" pattern="" required="required" autofocus readonly="readonly"
                           value="<?php
                           if (isset($actualizarDatosResponsable->eventos_eveId))
                               echo $actualizarDatosResponsable->eventos_eveId;
                           if (isset($erroresValidacion['datosViejos']['eventos_eveId']))
                               echo $erroresValidacion['datosViejos']['eventos_eveId'];
                           if (isset($_SESSION['eventos_eveId']))
                               echo $_SESSION['eventos_eveId'];
                           unset($_SESSION['eventos_eveId']);
                           ?>">
                            <?php if (isset($erroresValidacion['marcaCampo']['eventos_eveId'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['eventos_eveId'] . "</font>"; ?>
                            <?php if (isset($erroresValidacion['mensajesError']['eventos_eveId'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['eventos_eveId'] . "</font>"; ?>                                        
                    <!--<p class="help-block">Example block-level help text here.</p>-->
                </td>
            </tr>
            <tr>
                <td>                
                    <input class="form-control" placeholder="Id_Responsable" name="persona_perId" type="number"   required="required"
                           value="<?php
                           if (isset($actualizarDatosResponsable->persona_perId))
                               echo $actualizarDatosResponsable->persona_perId;                           
                           if (isset($erroresValidacion['datosViejos']['persona_perId']))
                               echo $erroresValidacion['datosViejos']['persona_perId'];
                           if (isset($_SESSION['persona_perId']))
                               echo $_SESSION['persona_perId'];
                           unset($_SESSION['persona_perId']);
                           ?>">
                            <?php if (isset($erroresValidacion['marcaCampo']['persona_perId'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['persona_perId'] . "</font>"; ?>                                        
                            <?php if (isset($erroresValidacion['mensajesError']['persona_perId'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['persona_perId'] . "</font>"; ?>                                        
                    <!--<p class="help-block">Example block-level help text here.</p>-->
                </td>
            </tr>
            <tr>
                <td>                  
                    <input class="form-control" placeholder="Estado_Responsable" name="resEstado" type="number"  required="required"
                           value="<?php
                           if (isset($actualizarDatosResponsable->resEstado))
                               echo $actualizarDatosResponsable->resEstado;                            
                           if (isset($erroresValidacion['datosViejos']['resEstado']))
                               echo $erroresValidacion['datosViejos']['resEstado'];
                           if (isset($_SESSION['resEstado']))
                               echo $_SESSION['resEstado'];
                           unset($_SESSION['resEstado']);
                           ?>">
                           <?php if (isset($erroresValidacion['marcaCampo']['resEstado'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['resEstado'] . "</font>"; ?>                                        
                           <?php if (isset($erroresValidacion['mensajesError']['resEstado'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['resEstado'] . "</font>"; ?>                                        
                </td>
            </tr>                  
              
                  
            <input type="hidden" name="ruta" value="confirmaActualizarResponsable">
            <!--<input type="hidden" name="contenido" value="controlarRegistro">-->
            <tr>
                <td>            
                    <!--<button  onclick="valida_registro()">Actualizar </button>-->
                    <button type="submit" >Actualizar Responsable</button>
                </td>
            </tr>             
    </table>
</form>
<?php if (isset($erroresValidacion)) $erroresValidacion = NULL; ?>




