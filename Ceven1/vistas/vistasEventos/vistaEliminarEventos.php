<?php
//@session_start();
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
if (isset($_SESSION['eliminarDatosEventos'])) {
    $eliminarDatosEventos = $_SESSION['eliminarDatosEventos'];
    unset($_SESSION['eliminarEventos']);
}
if (isset($_SESSION['registroCategoriasEventos'])) { /* * ************************ */
    $registroCategoriasEventos = $_SESSION['registroCategoriasEventos'];
    $cantCategorias = count($registroCategoriasEventos);
}
if (isset($_GET['erroresValidacion'])) {
    $erroresValidacion = json_decode($_GET['erroresValidacion'], true); //true para que convierta un json a "array" y no a objeto
}
?>  





<div class="d-flex justify-content-center  mb-3">
    <div class="card col-lg-3 ">

        <div class="card-title">
            <h3 class="panel-title">Eliminación de Evento</h3>
        </div>

    <form role="form" method="POST" action="controladores/ControladorPrincipal.php" id="formRegistro">
        <input class="form-control" placeholder="Id_Evento" name="eveId" type="number" pattern="" required="required" autofocus readonly="readonly"
                            value="<?php
                            if (isset($eliminarDatosEventos->eveId))
                                echo $eliminarDatosEventos->eveId;
                            if (isset($erroresValidacion['datosViejos']['eveId']))
                                echo $erroresValidacion['datosViejos']['eveId'];
                            if (isset($_SESSION['eveId']))
                                echo $_SESSION['eveId'];
                            unset($_SESSION['eveId']);
                            ?>">
                                <?php if (isset($erroresValidacion['marcaCampo']['eveId'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['eveId'] . "</font>"; ?>
                                <?php if (isset($erroresValidacion['mensajesError']['eveId'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['eveId'] . "</font>"; ?>                                        
                        <!--<p class="help-block">Example block-level help text here.</p>-->
                        <br>
                        <input class="form-control" placeholder="Fecha_de_Inicio" name="eveFechaInicial" type="number"   required="required" readonly="readonly"
                            value="<?php
                            if (isset($eliminarDatosEventos->eveFechaInicial))
                                echo $eliminarDatosEventos->eveFechaInicial;                           
                            if (isset($erroresValidacion['datosViejos']['eveFechaInicial']))
                                echo $erroresValidacion['datosViejos']['eveFechaInicial'];
                            if (isset($_SESSION['eveFechaInicial']))
                                echo $_SESSION['eveFechaInicial'];
                            unset($_SESSION['eveFechaInicial']);
                            ?>">
                                <?php if (isset($erroresValidacion['marcaCampo']['eveFechaInicial'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['eveFechaInicial'] . "</font>"; ?>                                        
                                <?php if (isset($erroresValidacion['mensajesError']['eveFechaInicial'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['eveFechaInicial'] . "</font>"; ?>                                        
                        <!--<p class="help-block">Example block-level help text here.</p>-->
                 <br>
                 <input class="form-control" placeholder="Cantidad_de_Personas" name="eveCantidadPax" type="number"  required="required" readonly="readonly"
                            value="<?php
                            if (isset($eliminarDatosEventos->eveCantidadPax))
                                echo $eliminarDatosEventos->eveCantidadPax;                            
                            if (isset($erroresValidacion['datosViejos']['eveCantidadPax']))
                                echo $erroresValidacion['datosViejos']['eveCantidadPax'];
                            if (isset($_SESSION['eveCantidadPax']))
                                echo $_SESSION['eveCantidadPax'];
                            unset($_SESSION['eveCantidadPax']);
                            ?>">
                            <?php if (isset($erroresValidacion['marcaCampo']['eveCantidadPax'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['eveCantidadPax'] . "</font>"; ?>                                        
                            <?php if (isset($erroresValidacion['mensajesError']['eveCantidadPax'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['eveCantidadPax'] . "</font>"; ?>                                        
                            <br>
                 <input class="form-control" placeholder="Documento_Cliente" name="Clientes_cliDocumento" type="number"  required="required" readonly="readonly"
                            value="<?php
                            if (isset($eliminarDatosEventos->Clientes_cliDocumento))
                                echo $eliminarDatosEventos->Clientes_cliDocumento;                            
                            if (isset($erroresValidacion['datosViejos']['Clientes_cliDocumento']))
                                echo $erroresValidacion['datosViejos']['Clientes_cliDocumento'];
                            if (isset($_SESSION['Clientes_cliDocumento']))
                                echo $_SESSION['Clientes_cliDocumento'];
                            unset($_SESSION['Clientes_cliDocumento']);
                            ?>">
                            <?php if (isset($erroresValidacion['marcaCampo']['Clientes_cliDocumento'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['Clientes_cliDocumento'] . "</font>"; ?>                                        
                            <?php if (isset($erroresValidacion['mensajesError']['Clientes_cliDocumento'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['Clientes_cliDocumento'] . "</font>"; ?>                                        
                            <br>
                 <input class="form-control" placeholder="Estado_del_Evento" name="eveEstado" type="number"  required="required" readonly="readonly"
                            value="<?php
                            if (isset($eliminarDatosEventos->eveEstado))
                                echo $eliminarDatosEventos->eveEstado;                            
                            if (isset($erroresValidacion['datosViejos']['eveEstado']))
                                echo $erroresValidacion['datosViejos']['eveEstado'];
                            if (isset($_SESSION['eveEstado']))
                                echo $_SESSION['eveEstado'];
                            unset($_SESSION['eveEstado']);
                            ?>">
                            <?php if (isset($erroresValidacion['marcaCampo']['eveEstado'])) echo "<font color='red'>" . $erroresValidacion['marcaCampo']['eveEstado'] . "</font>"; ?>                                        
                            <?php if (isset($erroresValidacion['mensajesError']['eveEstado'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['eveEstado'] . "</font>"; ?>                                        
                            <br>
                        
                <input type="hidden" name="ruta" value="confirmaEliminarEventos">
                <!--<input type="hidden" name="contenido" value="controlarRegistro">-->
                 
                        <!--<button  onclick="valida_registro()">eliminar </button>-->
                        <button class="btn btn-info m-b-10 m-l-5 m-30" type="submit" >Eliminar Evento</button>

    </form>
    <?php if (isset($erroresValidacion)) $erroresValidacion = NULL; ?>
    </div>
    


</div>