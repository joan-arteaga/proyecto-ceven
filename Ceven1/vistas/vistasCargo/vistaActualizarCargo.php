<?php
//@session_start();
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
if (isset($_SESSION['actualizarDatosCargo'])) {
    $actualizarDatosCargo = $_SESSION['actualizarDatosCargo'];
    unset($_SESSION['actualizarCargo']);
}
if (isset($_SESSION['registroCategoriasCargo'])) { /* * ************************ */
    $registroCategoriasCargo = $_SESSION['registroCategoriasCargo'];
    $cantCategorias = count($registroCategoriasCargo);
}
if (isset($_GET['erroresValidacion'])) {
    $erroresValidacion = json_decode($_GET['erroresValidacion'], true); //true para que convierta un json a "array" y no a objeto
}
?>        
<div class="panel-heading">
    <h3 class="panel-title">Actualización del Cargo.</h3>
</div>
<form role="form" method="POST" action="controladores/ControladorPrincipal.php" id="formRegistro">
    <table>
        <fieldset>
            <tr>
                <td>                
                    <input class="form-control" placeholder="Nombre_Cargo" name="rolNombre" type="text"   required="required"
                           value="<?php
                           if (isset($actualizarDatosCargo->rolNombre))
                               echo $actualizarDatosCargo->rolNombre;                           
                           if (isset($erroresValidacion['datosViejos']['rolNombre']))
                               echo $erroresValidacion['datosViejos']['rolNombre'];
                           if (isset($_SESSION['rolNombre']))
                               echo $_SESSION['rolNombre'];
                           unset($_SESSION['rolNombre']);
                           ?>">
                            <?php if (isset($erroresValidacion['marcaCampo']['rolNombre'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['rolNombre'] . "</font>"; ?>                                        
                            <?php if (isset($erroresValidacion['mensajesError']['rolNombre'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['rolNombre'] . "</font>"; ?>                                        
                    <!--<p class="help-block">Example block-level help text here.</p>-->
                </td>
            </tr>
            <tr>
                <td>                  
                    <input class="form-control" placeholder="Descripcion_Cargo" name="rolDescripcion" type="text"  required="required"
                           value="<?php
                           if (isset($actualizarDatosCargo->rolDescripcion))
                               echo $actualizarDatosCargo->rolDescripcion;                            
                           if (isset($erroresValidacion['datosViejos']['rolDescripcion']))
                               echo $erroresValidacion['datosViejos']['rolDescripcion'];
                           if (isset($_SESSION['rolDescripcion']))
                               echo $_SESSION['rolDescripcion'];
                           unset($_SESSION['rolDescripcion']);
                           ?>">
                           <?php if (isset($erroresValidacion['marcaCampo']['rolDescripcion'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['rolDescripcion'] . "</font>"; ?>                                        
                           <?php if (isset($erroresValidacion['mensajesError']['rolDescripcion'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['rolDescripcion'] . "</font>"; ?>                                        
                </td>
            </tr>                  
            <tr>
                <td>                  
                    <input class="form-control" placeholder="Estado_Cargo" name="rolEstado" type="number"  required="required"
                           value="<?php
                           if (isset($actualizarDatosCargo->rolEstado))
                               echo $actualizarDatosCargo->rolEstado;                            
                           if (isset($erroresValidacion['datosViejos']['rolEstado']))
                               echo $erroresValidacion['datosViejos']['rolEstado'];
                           if (isset($_SESSION['rolEstado']))
                               echo $_SESSION['rolEstado'];
                           unset($_SESSION['rolEstado']);
                           ?>">
                           <?php if (isset($erroresValidacion['marcaCampo']['rolEstado'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['rolEstado'] . "</font>"; ?>                                        
                           <?php if (isset($erroresValidacion['mensajesError']['rolEstado'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['rolEstado'] . "</font>"; ?>                                        
                </td>
            </tr>  
            
            <input type="hidden" name="ruta" value="confirmaActualizarCargo">
            <!--<input type="hidden" name="contenido" value="controlarRegistro">-->
            <tr>
                <td>            
                    <!--<button  onclick="valida_registro()">Actualizar </button>-->
                    <button type="submit" >Actualizar Cargo</button>
                </td>
            </tr>             
    </table>
</form>
<?php if (isset($erroresValidacion)) $erroresValidacion = NULL; ?>




