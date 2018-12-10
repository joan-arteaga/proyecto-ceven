<?php
//@session_start();
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
if (isset($_SESSION['registroCategoriasServicios'])) {   /***************************/
    $registroCategoriasServicios = $_SESSION['registroCategoriasServicios'];
    $cantCategorias=count($registroCategoriasServicios);
}
if (isset($_GET['erroresValidacion'])) {
    $erroresValidacion = json_decode($_GET['erroresValidacion'], true); //true para que convierta un json a "array" y no a objeto
}
?>        
<div class="panel-heading">
    <h3 class="panel-title">Inserción de Nuevo Servicio.</h3>
</div>
<form role="form" method="POST" action="controladores/ControladorPrincipal.php" id="formRegistro">
    <table>
        <fieldset>
            <tr>
                <td>                
                    <input class="form-control" placeholder="Nombre" name="serNombre" type="text"   required="required"
                           value="<?php if (isset($erroresValidacion['datosViejos']['serNombre'])) echo $erroresValidacion['datosViejos']['serNombre'];  
                                                if (isset($_SESSION['serNombre'])) echo $_SESSION['serNombre']; unset($_SESSION['serNombre']); ?>"
                           >
                           <?php if (isset($erroresValidacion['marcaCampo']['serNombre'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['serNombre'] . "</font>"; ?>                                        
                           <?php if (isset($erroresValidacion['mensajesError']['serNombre'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['serNombre'] . "</font>"; ?>                                        
                    <!--<p class="help-block">Example block-level help text here.</p>-->
                </td>
            </tr>
            <tr>
                <td>                  
                    <input class="form-control" placeholder="Descripcion" name="serDescripcion" type="text"  required="required"
                           value="<?php if (isset($erroresValidacion['datosViejos']['serDescripcion'])) echo $erroresValidacion['datosViejos']['serDescripcion']; 
                                                if (isset($_SESSION['serDescripcion'])) echo $_SESSION['serDescripcion']; unset($_SESSION['serDescripcion']); ?>"
                           >
                           <?php if (isset($erroresValidacion['marcaCampo']['serDescripcion'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['serDescripcion'] . "</font>"; ?>                                        
                           <?php if (isset($erroresValidacion['mensajesError']['serDescripcion'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['serDescripcion'] . "</font>"; ?>                                        
                </td>
            </tr>                  
            <tr>
                <td>                  
                    <input class="form-control" placeholder="Estado_del_Servicio" name="serEstado" type="number"  required="required"
                           value="<?php if (isset($erroresValidacion['datosViejos']['serEstado'])) echo $erroresValidacion['datosViejos']['serEstado']; 
                                                if (isset($_SESSION['serEstado'])) echo $_SESSION['serEstado']; unset($_SESSION['serEstado']); ?>"
                           >
                           <?php if (isset($erroresValidacion['marcaCampo']['serEstado'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['serEstado'] . "</font>"; ?>                                        
                           <?php if (isset($erroresValidacion['mensajesError']['serEstado'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['serEstado'] . "</font>"; ?>                                        
                </td>
            </tr>                  
            
            <input type="hidden" name="ruta" value="insertarServicios">
            <!--<input type="hidden" name="contenido" value="controlarRegistro">-->
            <tr>
                <td>            
                    <button  onclick="valida_registro()">Agregar Servicio</button>
                </td>
            </tr>             
    </table>
</form>
<?php if (isset($erroresValidacion)) $erroresValidacion = NULL; ?>




