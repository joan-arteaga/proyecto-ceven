<?php
//@session_start();
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
if (isset($_SESSION['actualizarDatosAsigRol'])) {
    $actualizarDatosAsigRol = $_SESSION['actualizarDatosAsigRol'];
    unset($_SESSION['actualizarAsigRol']);
}
if (isset($_SESSION['registroCategoriasAsigRol'])) { /* * ************************ */
    $registroCategoriasAsigRol = $_SESSION['registroCategoriasAsigRol'];
    $cantCategorias = count($registroCategoriasAsigRol);
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
                    <input class="form-control" placeholder="Id_Usuario" name="id_usuario_s" type="number"  required="required"
                           value="<?php
                           if (isset($actualizarDatosAsigRol->id_usuario_s))
                               echo $actualizarDatosAsigRol->id_usuario_s;                            
                           if (isset($erroresValidacion['datosViejos']['id_usuario_s']))
                               echo $erroresValidacion['datosViejos']['id_usuario_s'];
                           if (isset($_SESSION['id_usuario_s']))
                               echo $_SESSION['id_usuario_s'];
                           unset($_SESSION['id_usuario_s']);
                           ?>">
                           <?php if (isset($erroresValidacion['marcaCampo']['id_usuario_s'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['id_usuario_s'] . "</font>"; ?>                                        
                           <?php if (isset($erroresValidacion['mensajesError']['id_usuario_s'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['id_usuario_s'] . "</font>"; ?>                                        
                </td>
            </tr>
            <tr>
                <td>                  
                    <input class="form-control" placeholder="Id_Cargo" name="id_rol" type="number"  required="required"
                           value="<?php
                           if (isset($actualizarDatosAsigRol->id_rol))
                               echo $actualizarDatosAsigRol->id_rol;                            
                           if (isset($erroresValidacion['datosViejos']['id_rol']))
                               echo $erroresValidacion['datosViejos']['id_rol'];
                           if (isset($_SESSION['id_rol']))
                               echo $_SESSION['id_rol'];
                           unset($_SESSION['id_rol']);
                           ?>">
                           <?php if (isset($erroresValidacion['marcaCampo']['id_rol'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['id_rol'] . "</font>"; ?>                                        
                           <?php if (isset($erroresValidacion['mensajesError']['id_rol'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['id_rol'] . "</font>"; ?>                                        
                </td>
            </tr>
            <tr>
                <td>                  
                    <input class="form-control" placeholder="Estado_del_Cargo" name="estado" type="number"  required="required"
                           value="<?php
                           if (isset($actualizarDatosAsigRol->estado))
                               echo $actualizarDatosAsigRol->estado;                            
                           if (isset($erroresValidacion['datosViejos']['estado']))
                               echo $erroresValidacion['datosViejos']['estado'];
                           if (isset($_SESSION['estado']))
                               echo $_SESSION['estado'];
                           unset($_SESSION['estado']);
                           ?>">
                           <?php if (isset($erroresValidacion['marcaCampo']['estado'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['estado'] . "</font>"; ?>                                        
                           <?php if (isset($erroresValidacion['mensajesError']['estado'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['estado'] . "</font>"; ?>                                        
                </td>
            </tr>
            
            <input type="hidden" name="ruta" value="confirmaActualizarAsigRol">
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




