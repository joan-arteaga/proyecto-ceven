<?php
//@session_start();
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
if (isset($_SESSION['actualizarDatosPersona_1'])) {
    $actualizarDatosPersona_1 = $_SESSION['actualizarDatosPersona_1'];
    unset($_SESSION['actualizarPersona_1']);
}
if (isset($_SESSION['registroCategoriasPersona_1'])) { /* * ************************ */
    $registroCategoriasPersona_1 = $_SESSION['registroCategoriasPersona_1'];
    $cantCategorias = count($registroCategoriasPersona_1);
}
if (isset($_GET['erroresValidacion'])) {
    $erroresValidacion = json_decode($_GET['erroresValidacion'], true); //true para que convierta un json a "array" y no a objeto
}
?>        
<div class="panel-heading">
    <h3 class="panel-title">Actualización de Usuarios.</h3>
</div>
<form role="form" method="POST" action="controladores/ControladorPrincipal.php" id="formRegistro">
    <table>
        <fieldset>
            <tr>
                <td>
                    <input class="form-control" placeholder="Id_Usuario" name="perId" type="number" pattern="" required="required" autofocus readonly="readonly"
                           value="<?php
                           if (isset($actualizarDatosPersona_1->perId))
                               echo $actualizarDatosPersona_1->perId;
                           if (isset($erroresValidacion['datosViejos']['perId']))
                               echo $erroresValidacion['datosViejos']['perId'];
                           if (isset($_SESSION['perId']))
                               echo $_SESSION['perId'];
                           unset($_SESSION['perId']);
                           ?>">
                            <?php if (isset($erroresValidacion['marcaCampo']['perId'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['perId'] . "</font>"; ?>
                            <?php if (isset($erroresValidacion['mensajesError']['perId'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['perId'] . "</font>"; ?>                                        
                    <!--<p class="help-block">Example block-level help text here.</p>-->
                </td>
            </tr>
            <tr>
                <td>                
                    <input class="form-control" placeholder="Documento" name="perDocumento" type="number"   required="required"
                           value="<?php
                           if (isset($actualizarDatosPersona_1->perDocumento))
                               echo $actualizarDatosPersona_1->perDocumento;                           
                           if (isset($erroresValidacion['datosViejos']['perDocumento']))
                               echo $erroresValidacion['datosViejos']['perDocumento'];
                           if (isset($_SESSION['perDocumento']))
                               echo $_SESSION['perDocumento'];
                           unset($_SESSION['perDocumento']);
                           ?>">
                            <?php if (isset($erroresValidacion['marcaCampo']['perDocumento'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['perDocumento'] . "</font>"; ?>                                        
                            <?php if (isset($erroresValidacion['mensajesError']['perDocumento'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['perDocumento'] . "</font>"; ?>                                        
                    <!--<p class="help-block">Example block-level help text here.</p>-->
                </td>
            </tr>
            <tr>
                <td>                  
                    <input class="form-control" placeholder="Nombre" name="perNombre" type="text"  required="required"
                           value="<?php
                           if (isset($actualizarDatosPersona_1->perNombre))
                               echo $actualizarDatosPersona_1->perNombre;                            
                           if (isset($erroresValidacion['datosViejos']['perNombre']))
                               echo $erroresValidacion['datosViejos']['perNombre'];
                           if (isset($_SESSION['perNombre']))
                               echo $_SESSION['perNombre'];
                           unset($_SESSION['perNombre']);
                           ?>">
                           <?php if (isset($erroresValidacion['marcaCampo']['perNombre'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['perNombre'] . "</font>"; ?>                                        
                           <?php if (isset($erroresValidacion['mensajesError']['perNombre'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['perNombre'] . "</font>"; ?>                                        
                </td>
            </tr>                  
            <tr>
                <td>                  
                    <input class="form-control" placeholder="Apellido" name="perApellido" type="text"  required="required"
                           value="<?php
                           if (isset($actualizarDatosPersona_1->perApellido))
                               echo $actualizarDatosPersona_1->perApellido;                            
                           if (isset($erroresValidacion['datosViejos']['perApellido']))
                               echo $erroresValidacion['datosViejos']['perApellido'];
                           if (isset($_SESSION['perApellido']))
                               echo $_SESSION['perApellido'];
                           unset($_SESSION['perApellido']);
                           ?>">
                           <?php if (isset($erroresValidacion['marcaCampo']['perApellido'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['perApellido'] . "</font>"; ?>                                        
                           <?php if (isset($erroresValidacion['mensajesError']['perApellido'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['perApellido'] . "</font>"; ?>                                        
                </td>
            </tr>  
            <tr>
                <td>                  
                    <input class="form-control" placeholder="Estado_Usuario" name="perEstado" type="number"  required="required"
                           value="<?php
                           if (isset($actualizarDatosPersona_1->perEstado))
                               echo $actualizarDatosPersona_1->perEstado;                            
                           if (isset($erroresValidacion['datosViejos']['perEstado']))
                               echo $erroresValidacion['datosViejos']['perEstado'];
                           if (isset($_SESSION['perEstado']))
                               echo $_SESSION['perEstado'];
                           unset($_SESSION['perEstado']);
                           ?>">
                           <?php if (isset($erroresValidacion['marcaCampo']['perEstado'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['perEstado'] . "</font>"; ?>                                        
                           <?php if (isset($erroresValidacion['mensajesError']['perEstado'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['perEstado'] . "</font>"; ?>                                        
                </td>
            </tr>  
            
            <input type="hidden" name="ruta" value="confirmaActualizarPersona_1">
            <!--<input type="hidden" name="contenido" value="controlarRegistro">-->
            <tr>
                <td>            
                    <!--<button  onclick="valida_registro()">Actualizar </button>-->
                    <button type="submit" >Actualizar Usuario</button>
                </td>
            </tr>             
    </table>
</form>
<?php if (isset($erroresValidacion)) $erroresValidacion = NULL; ?>




