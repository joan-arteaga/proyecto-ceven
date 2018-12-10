<?php
session_start();
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
if (isset($_GET['erroresValidacion'])) {
    $erroresValidacion = json_decode($_GET['erroresValidacion'], true); //true para que convierta un json a "array" y no a objeto
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="Imagenes-proyecto_interfaz/logo1-grande.png">

  <title>*Registrarse</title>
  <!-- Bootstrap core CSS-->
  <link href="4_registrar/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="4_registrar/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="4_registrar/css/sb-admin.css" rel="stylesheet">
  
  <link rel="stylesheet" href="4_registrar/estilos.css">
  <div id="particles-js"></div>
  
  <!-- Funciones JavaScript propias del sistema -->
        <script type="text/javascript" src="javascript/funciones.js"></script>
        <!-- Funciones JavaScript propias del sistema -->
        <script type="text/javascript" src="javascript/md5.js"></script>
        
</head>
<body>
    
    <style>
        body{
            background: url(Imagenes-proyecto_interfaz/Fondos/fondo-hoja.PNG);
    background-size:cover; 
            
        }
    </style>
    <br>
    
    <div>
        <form class="container" method="POST" action="controladores/ControladorPrincipal.php" id="formRegistro">
            <!--<fieldset>-->
                
                 <div class="text-center mb-4">
        <img alt="Ceven Logo" src="Imagenes-proyecto_interfaz/C-logo-completo-mediano.png" width="20%" height="25%">
        <div class="card card-register mx-auto mt-0">
          <div class="card-header"><h4>Registrar nueva cuenta <strong> Ceven</h4> </strong></div>
          <div class="card-body">
              
            <form>
              <div class="form-group">
                <div class="form-row">
                    
 <div class="col-md-6">
                            <label for="exampleInputName"><strong><u>Nombres:</u></strong></label>
                            <input class="form-control" id="exampleInputName" name="nombre" type="text" aria-describedby="nameHelp" placeholder="Digite su Nombre..." required="required" value="<?php
                               if (isset($erroresValidacion['datosViejos']['nombre']))
                                   echo $erroresValidacion['datosViejos']['nombre'];
                               if (isset($_SESSION['nombre']))
                                   echo $_SESSION['nombre'];
                               unset($_SESSION['nombre']);
                               ?>"
                               >
                               <?php
                               if (isset($erroresValidacion['marcaCampo']['nombre']))
                                   echo "<font color='red'>" . $erroresValidacion['marcaCampo']['nombre'] . "</font>";
                               ?>                                        
                               <?php
                               if (isset($erroresValidacion['mensajesError']['nombre']))
                                   echo "<font color='red'>" . $erroresValidacion['mensajesError']['nombre'] . "</font>";
                               ?>
                          </div>
                    
                    
                    

                  <div class="col-md-6">
                            <label for="exampleInputLastName"><strong><u>Apellidos:</u></strong></label>
                            <input class="form-control" id="exampleInputLastName" name="apellidos" type="text" aria-describedby="nameHelp" placeholder="Digite su Apellido..." required="required" value="<?php
                               if (isset($erroresValidacion['datosViejos']['apellidos']))
                                   echo $erroresValidacion['datosViejos']['apellidos'];
                               if (isset($_SESSION['apellidos']))
                                   echo $_SESSION['apellidos'];
                               unset($_SESSION['apellidos']);
                               ?>"
                               >
                               <?php
                               if (isset($erroresValidacion['marcaCampo']['apellidos']))
                                   echo "<font color='red'>" . $erroresValidacion['marcaCampo']['apellidos'] . "</font>";
                               ?>
                               <?php
                               if (isset($erroresValidacion['mensajesError']['apellidos']))
                                   echo "<font color='red'>" . $erroresValidacion['mensajesError']['apellidos'] . "</font>";
                               ?>
                          </div>
                </div>

                  
                  
              </div>
              <div class="form-group">
                        <label for="email"><strong><u>Correo Electronico:</u></strong></label>
                        <input class="form-control" id="InputCorreo" name="email" type="email" aria-describedby="emailHelp" style="text-align: center;" placeholder="Ingrese su Correo..." required="required"  value="<?php
                               if (isset($erroresValidacion['datosViejos']['email']))
                                   echo $erroresValidacion['datosViejos']['email'];
                               if (isset($_SESSION['email']))
                                   echo $_SESSION['email'];
                               unset($_SESSION['email']);
                               ?>"
                               >
                               <?php
                               if (isset($erroresValidacion['marcaCampo']['email']))
                                   echo "<font color='red'>" . $erroresValidacion['marcaCampo']['email'] . "</font>";
                               ?>
                               <?php
                               if (isset($erroresValidacion['mensajesError']['email']))
                                   echo "<font color='red'>" . $erroresValidacion['mensajesError']['email'] . "</font>";
                               ?>
                      </div>

                
                
                
              <div class="form-group">
                        <label for="documento"><strong><u>Documento:</u></strong></label>
                        <input class="form-control" name="documento" id="documento" type="number" style="text-align: center;" placeholder="Digite su Documento..." maxlength="10" minlength="10" pattern="" required="required" value="<?php
                               if (isset($erroresValidacion['datosViejos']['documento']))
                                   echo $erroresValidacion['datosViejos']['documento'];
                               if (isset($_SESSION['documento']))
                                   echo $_SESSION['documento'];
                               unset($_SESSION['documento']);
                               ?>"
                               >
                               <?php
                               if (isset($erroresValidacion['marcaCampo']['documento']))
                                   echo "<font color='red'>" . $erroresValidacion['marcaCampo']['documento'] . "</font>";
                               ?>
                               <?php
                               if (isset($erroresValidacion['mensajesError']['documento']))
                                   echo "<font color='red'>" . $erroresValidacion['mensajesError']['documento'] . "</font>";
                               ?>              
                      </div>
                
                
                

              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                            <label for="exampleInputPassword1"><strong><u>Contraseña:</u></strong></label>
                            <input class="form-control" id="InputPassword" type="password" placeholder="Digite su Contraseña..." value="" required="required" >
                          </div>
                    
                    
                    
                  <div class="col-md-6">
                            <label for="exampleConfirmPassword"><strong><u>Confirme Contraseña:</u></strong></label>
                            <input class="form-control" id="InputPassword2" name="password2" type="password" value="" placeholder="Vuelva a digitar su Contraseña...">
                          </div>
                    
                     <input type="hidden" name="ruta" value="gestionDeRegistro">
                    <input type="hidden" name="contenido" value="controlarRegistro">
                    
                </div>
              </div>
                <button onclick="valida_registro()" class="btn btn-primary btn-block"><strong>* Registrarse *</strong></button>
            </form>
            <div class="text-center">
            <h5><a class="d-block small mt-3" href="login.php"><strong>Log-in Page</strong></a><a class="d-block small" href="forgot-password.php"><strong>Olvido su contraseña???</strong></a></h5>
            <p class="mt-5 mb-3 text-muted text-center">© 2018</p>
            </div>
          </div>
        </div>
      </div>
      <!-- Bootstrap core JavaScript-->
      <script src="4_registrar/vendor/jquery/jquery.min.js"></script>
      <script src="4_registrar/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="4_registrar/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!--primero el archivo de la libreria-->
        <script src="4_registrar/particles.js"></script>
        <script src="4_registrar/particulas.js"></script>
    </form>

    <?php
    if (isset($erroresValidacion))
        $erroresValidacion = NULL;
    ?>
</div>
</body>
</html>
