<?php
//@session_start();
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
if (isset($_SESSION['eliminarDatosAsigRol'])) {
    $eliminarDatosAsigRol = $_SESSION['eliminarDatosAsigRol'];
    unset($_SESSION['eliminarAsigRol']);
}
if (isset($_SESSION['registroCategoriasAsigRol'])) { /* * ************************ */
    $registroCategoriasAsigRol = $_SESSION['registroCategoriasAsigRol'];
    $cantCategorias = count($registroCategoriasAsigRol);
}
if (isset($_GET['erroresValidacion'])) {
    $erroresValidacion = json_decode($_GET['erroresValidacion'], true); //true para que convierta un json a "array" y no a objeto
}
?>  





<div class="d-flex justify-content-center  mb-3">
    <div class="card col-lg-3 ">

        <div class="card-title">
            <h3 class="panel-title">Eliminación de Cargo</h3>
        </div>

    <form role="form" method="POST" action="controladores/ControladorPrincipal.php" id="formRegistro">
        <input class="form-control" placeholder="Id_Usuario" name="id_usuario_s" type="number" pattern="" required="required" autofocus readonly="readonly"
                            value="<?php
                            if (isset($eliminarDatosAsigRol->id_usuario_s))
                                echo $eliminarDatosAsigRol->id_usuario_s;
                            if (isset($erroresValidacion['datosViejos']['id_usuario_s']))
                                echo $erroresValidacion['datosViejos']['id_usuario_s'];
                            if (isset($_SESSION['id_usuario_s']))
                                echo $_SESSION['id_usuario_s'];
                            unset($_SESSION['id_usuario_s']);
                            ?>">
                                <?php if (isset($erroresValidacion['marcaCampo']['id_usuario_s'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['id_usuario_s'] . "</font>"; ?>
                                <?php if (isset($erroresValidacion['mensajesError']['id_usuario_s'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['id_usuario_s'] . "</font>"; ?>                                        
                        <!--<p class="help-block">Example block-level help text here.</p>-->
                        <br>
                        <input class="form-control" placeholder="Id_Cargo" name="id_rol" type="number"   required="required" readonly="readonly"
                            value="<?php
                            if (isset($eliminarDatosAsigRol->id_rol))
                                echo $eliminarDatosAsigRol->id_rol;                           
                            if (isset($erroresValidacion['datosViejos']['id_rol']))
                                echo $erroresValidacion['datosViejos']['id_rol'];
                            if (isset($_SESSION['id_rol']))
                                echo $_SESSION['id_rol'];
                            unset($_SESSION['id_rol']);
                            ?>">
                                <?php if (isset($erroresValidacion['marcaCampo']['id_rol'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['id_rol'] . "</font>"; ?>                                        
                                <?php if (isset($erroresValidacion['mensajesError']['id_rol'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['id_rol'] . "</font>"; ?>                                        
                        <!--<p class="help-block">Example block-level help text here.</p>-->
                 <br>
                 <input class="form-control" placeholder="Estado_del_Cargo" name="estado" type="number"  required="required" readonly="readonly"
                            value="<?php
                            if (isset($eliminarDatosAsigRol->estado))
                                echo $eliminarDatosAsigRol->estado;                            
                            if (isset($erroresValidacion['datosViejos']['estado']))
                                echo $erroresValidacion['datosViejos']['estado'];
                            if (isset($_SESSION['estado']))
                                echo $_SESSION['estado'];
                            unset($_SESSION['estado']);
                            ?>">
                            <?php if (isset($erroresValidacion['marcaCampo']['estado'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['estado'] . "</font>"; ?>                                        
                            <?php if (isset($erroresValidacion['mensajesError']['estado'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['estado'] . "</font>"; ?>                                        
                            <br>
                        
                <input type="hidden" name="ruta" value="confirmaEliminarAsigRol">
                <!--<input type="hidden" name="contenido" value="controlarRegistro">-->
                 
                        <!--<button  onclick="valida_registro()">eliminar </button>-->
                        <button class="btn btn-info m-b-10 m-l-5 m-30" type="submit" >Eliminar Insumo</button>

    </form>
    <?php if (isset($erroresValidacion)) $erroresValidacion = NULL; ?>
    </div>
    


</div>