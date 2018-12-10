<?php
//@session_start();
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
if (isset($_SESSION['actualizarDatosServicios'])) {
    $actualizarDatosServicios = $_SESSION['actualizarDatosServicios'];
    unset($_SESSION['actualizarServicios']);
}
if (isset($_SESSION['registroCategoriasServicios'])) { /* * ************************ */
    $registroCategoriasServicios = $_SESSION['registroCategoriasServicios'];
    $cantCategorias = count($registroCategoriasServicios);
}
if (isset($_GET['erroresValidacion'])) {
    $erroresValidacion = json_decode($_GET['erroresValidacion'], true); //true para que convierta un json a "array" y no a objeto
}
?>        
<div class="panel-heading">
    <h3 class="panel-title">Actualización de Clientes.</h3>
</div>
<form role="form" method="POST" action="controladores/ControladorPrincipal.php" id="formRegistro">
    <table>
        <fieldset>
            <tr>
                <td>
                    <input class="form-control" placeholder="Id_Servicio" name="serId" type="number" pattern="" required="required" autofocus readonly="readonly"
                           value="<?php
                           if (isset($actualizarDatosServicios->serId))
                               echo $actualizarDatosServicios->serId;
                           if (isset($erroresValidacion['datosViejos']['serId']))
                               echo $erroresValidacion['datosViejos']['serId'];
                           if (isset($_SESSION['serId']))
                               echo $_SESSION['serId'];
                           unset($_SESSION['serId']);
                           ?>">
                            <?php if (isset($erroresValidacion['marcaCampo']['serId'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['serId'] . "</font>"; ?>
                            <?php if (isset($erroresValidacion['mensajesError']['serId'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['serId'] . "</font>"; ?>                                        
                    <!--<p class="help-block">Example block-level help text here.</p>-->
                </td>
            </tr>
            <tr>
                <td>                
                    <input class="form-control" placeholder="Nombre" name="serNombre" type="text"   required="required"
                           value="<?php
                           if (isset($actualizarDatosServicios->serNombre))
                               echo $actualizarDatosServicios->serNombre;                           
                           if (isset($erroresValidacion['datosViejos']['serNombre']))
                               echo $erroresValidacion['datosViejos']['serNombre'];
                           if (isset($_SESSION['serNombre']))
                               echo $_SESSION['serNombre'];
                           unset($_SESSION['serNombre']);
                           ?>">
                            <?php if (isset($erroresValidacion['marcaCampo']['serNombre'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['serNombre'] . "</font>"; ?>                                        
                            <?php if (isset($erroresValidacion['mensajesError']['serNombre'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['serNombre'] . "</font>"; ?>                                        
                    <!--<p class="help-block">Example block-level help text here.</p>-->
                </td>
            </tr>
            <tr>
                <td>                  
                    <input class="form-control" placeholder="Descripcion" name="serDescripcion" type="text"  required="required"
                           value="<?php
                           if (isset($actualizarDatosServicios->serDescripcion))
                               echo $actualizarDatosServicios->serDescripcion;                            
                           if (isset($erroresValidacion['datosViejos']['serDescripcion']))
                               echo $erroresValidacion['datosViejos']['serDescripcion'];
                           if (isset($_SESSION['serDescripcion']))
                               echo $_SESSION['serDescripcion'];
                           unset($_SESSION['serDescripcion']);
                           ?>">
                           <?php if (isset($erroresValidacion['marcaCampo']['serDescripcion'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['serDescripcion'] . "</font>"; ?>                                        
                           <?php if (isset($erroresValidacion['mensajesError']['serDescripcion'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['serDescripcion'] . "</font>"; ?>                                        
                </td>
            </tr>                  
            <tr>
                <td>                  
                    <input class="form-control" placeholder="Estado_del_Servicio" name="serEstado" type="number"  required="required"
                           value="<?php
                           if (isset($actualizarDatosServicios->serEstado))
                               echo $actualizarDatosServicios->serEstado;                            
                           if (isset($erroresValidacion['datosViejos']['serEstado']))
                               echo $erroresValidacion['datosViejos']['serEstado'];
                           if (isset($_SESSION['serEstado']))
                               echo $_SESSION['serEstado'];
                           unset($_SESSION['serEstado']);
                           ?>">
                           <?php if (isset($erroresValidacion['marcaCampo']['serEstado'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['serEstado'] . "</font>"; ?>                                        
                           <?php if (isset($erroresValidacion['mensajesError']['serEstado'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['serEstado'] . "</font>"; ?>                                        
                </td>
            </tr>    
            <input type="hidden" name="ruta" value="confirmaActualizarServicios">
            <!--<input type="hidden" name="contenido" value="controlarRegistro">-->
            <tr>
                <td>            
                    <!--<button  onclick="valida_registro()">Actualizar </button>-->
                    <button type="submit" >Actualizar Servicio</button>
                </td>
            </tr>             
    </table>
</form>
<?php if (isset($erroresValidacion)) $erroresValidacion = NULL; ?>




