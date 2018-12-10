<?php
//@session_start();
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
if (isset($_SESSION['registroCategoriasClientes'])) {   /***************************/
    $registroCategoriasClientes = $_SESSION['registroCategoriasClientes'];
    $cantCategorias=count($registroCategoriasClientes);
}
if (isset($_GET['erroresValidacion'])) {
    $erroresValidacion = json_decode($_GET['erroresValidacion'], true); //true para que convierta un json a "array" y no a objeto
}
?>        
<div class="panel-heading">
    <h3 class="panel-title">Inserción de Clientes.</h3>
</div>
<div class="card row container d-flex justify-content-center">
<form role="form" method="POST" action="controladores/ControladorPrincipal.php" id="formRegistro">
    <table>
        <fieldset>
            <tr>
                <td>
                    <input class="form-control" placeholder="Documento_Cliente" name="cliDocumento" type="number" pattern="" required="required" autofocus
                           value="<?php if (isset($erroresValidacion['datosViejos']['cliDocumento'])) echo $erroresValidacion['datosViejos']['cliDocumento'];  
                                                if (isset($_SESSION['cliDocumento'])) echo $_SESSION['cliDocumento']; unset($_SESSION['cliDocumento']); ?>"
                           >
                           <?php if (isset($erroresValidacion['marcaCampo']['cliDocumento'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['cliDocumento'] . "</font>"; ?>
                           <?php if (isset($erroresValidacion['mensajesError']['cliDocumento'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['cliDocumento'] . "</font>"; ?>                                        
                    <!--<p class="help-block">Example block-level help text here.</p>-->
                </td>
            </tr>
            <tr>
                <td>                
                    <input class="form-control" placeholder="Nombre" name="cliNombre" type="text"   required="required"
                           value="<?php if (isset($erroresValidacion['datosViejos']['cliNombre'])) echo $erroresValidacion['datosViejos']['cliNombre'];  
                                                if (isset($_SESSION['cliNombre'])) echo $_SESSION['cliNombre']; unset($_SESSION['cliNombre']); ?>"
                           >
                           <?php if (isset($erroresValidacion['marcaCampo']['cliNombre'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['cliNombre'] . "</font>"; ?>                                        
                           <?php if (isset($erroresValidacion['mensajesError']['cliNombre'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['cliNombre'] . "</font>"; ?>                                        
                    <!--<p class="help-block">Example block-level help text here.</p>-->
                </td>
            </tr>
            <tr>
                <td>                  
                    <input class="form-control" placeholder="P_Apellido" name="cliApellido1" type="text"  required="required"
                           value="<?php if (isset($erroresValidacion['datosViejos']['cliApellido1'])) echo $erroresValidacion['datosViejos']['cliApellido1']; 
                                                if (isset($_SESSION['cliApellido1'])) echo $_SESSION['cliApellido1']; unset($_SESSION['cliApellido1']); ?>"
                           >
                           <?php if (isset($erroresValidacion['marcaCampo']['cliApellido1'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['cliApellido1'] . "</font>"; ?>                                        
                           <?php if (isset($erroresValidacion['mensajesError']['cliApellido1'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['cliApellido1'] . "</font>"; ?>                                        
                </td>
            </tr>                  
            <tr>
                <td>                  
                    <input class="form-control" placeholder="S_Apellido" name="cliApellido2" type="text"  required="required"
                           value="<?php if (isset($erroresValidacion['datosViejos']['cliApellido2'])) echo $erroresValidacion['datosViejos']['cliApellido2']; 
                                                if (isset($_SESSION['cliApellido2'])) echo $_SESSION['cliApellido2']; unset($_SESSION['cliApellido2']); ?>"
                           >
                           <?php if (isset($erroresValidacion['marcaCampo']['cliApellido2'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['cliApellido2'] . "</font>"; ?>                                        
                           <?php if (isset($erroresValidacion['mensajesError']['cliApellido2'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['cliApellido2'] . "</font>"; ?>                                        
                </td>
            </tr>                  
            <tr>
                <td>                  
                    <input class="form-control" placeholder="Fecha_Nacimiento" name="cliFechaNacimiento" type="date"  required="required"
                           value="<?php if (isset($erroresValidacion['datosViejos']['cliFechaNacimiento'])) echo $erroresValidacion['datosViejos']['cliFechaNacimiento']; 
                                                if (isset($_SESSION['cliFechaNacimiento'])) echo $_SESSION['cliFechaNacimiento']; unset($_SESSION['cliFechaNacimiento']); ?>"
                           >
                           <?php if (isset($erroresValidacion['marcaCampo']['cliFechaNacimiento'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['cliFechaNacimiento'] . "</font>"; ?>                                        
                           <?php if (isset($erroresValidacion['mensajesError']['cliFechaNacimiento'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['cliFechaNacimiento'] . "</font>"; ?>                                        
                </td>
            </tr>             
            <tr>
                <td>                  
                    <input class="form-control" placeholder="Genero" name="cliGenero" type="text"  required="required"
                           value="<?php if (isset($erroresValidacion['datosViejos']['cliGenero'])) echo $erroresValidacion['datosViejos']['cliGenero']; 
                                                if (isset($_SESSION['cliGenero'])) echo $_SESSION['cliGenero']; unset($_SESSION['cliGenero']); ?>"
                           >
                           <?php if (isset($erroresValidacion['marcaCampo']['cliGenero'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['cliGenero'] . "</font>"; ?>                                        
                           <?php if (isset($erroresValidacion['mensajesError']['cliGenero'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['cliGenero'] . "</font>"; ?>                                        
                </td>
            </tr>             
            <tr>
                <td>                  
                    <input class="form-control" placeholder="Estado_Cliente" name="cliEstado" type="number"  required="required"
                           value="<?php if (isset($erroresValidacion['datosViejos']['cliEstado'])) echo $erroresValidacion['datosViejos']['cliEstado']; 
                                                if (isset($_SESSION['cliEstado'])) echo $_SESSION['cliEstado']; unset($_SESSION['cliEstado']); ?>"
                           >
                           <?php if (isset($erroresValidacion['marcaCampo']['cliEstado'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['cliEstado'] . "</font>"; ?>                                        
                           <?php if (isset($erroresValidacion['mensajesError']['cliEstado'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['cliEstado'] . "</font>"; ?>                                        
                </td>
            </tr>             
            <input type="hidden" name="ruta" value="insertarClientes">
            <!--<input type="hidden" name="contenido" value="controlarRegistro">-->
            <tr>
                <td>            
                    <button class=""  onclick="valida_registro()">Agregar Cliente</button>
                </td>
            </tr>             
    </table>
</form>
</div>
<?php if (isset($erroresValidacion)) $erroresValidacion = NULL; ?>




