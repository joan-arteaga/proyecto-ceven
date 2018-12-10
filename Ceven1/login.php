<?PHP
// session_start();
//if (isset($_SESSION['mensaje'])) {
//    $mensaje = $_SESSION['mensaje'];
//    echo "<script languaje='javascript'>alert('$mensaje')</script>";
//    unset($_SESSION['mensaje']);
//}
?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">


        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="Imagenes-proyecto_interfaz/logo1-grande.png">

        <title>Inicio de sesión</title>

        <script type="text/javascript" src="javascript/funciones.js"></script>
        <script type="text/javascript" src="javascript/md5.js"></script>        


        <!-- Bootstrap core CSS -->
        <link href="1_log-in/Floating labels example for Bootstrap_files/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="1_log-in/Floating labels example for Bootstrap_files/floating-labels.css" rel="stylesheet">

        <!--#1 hoja de estilo css-->
        <link rel="stylesheet" href="1_log-in/estilos.css">

        <script type="text/javascript" src="javascript/funciones.js"></script>
        <script type="text/javascript" src="javascript/md5.js"></script>

         <style type="text/css">
            body{
                background: url(Imagenes-proyecto_interfaz/Fondos/fondo-hoja.PNG);
                background-size:cover; 

            }
        </style>
    </head>
    <body>

        <!--#2 fondo y particulas-->
        <div id="particles-js"></div>
       

        <!-- contenido -->
        <form class="form-signin" role="form" method="POST" action="controladores/ControladorPrincipal.php" name="formLogin">

            <div class="text-center mb-4">
                <!--<fieldset>-->

                    <a class="hero-brand" href="home.php" title="Home"><img alt="Ceven Logo" src="Imagenes-proyecto_interfaz/C-logo-completo-mediano.png"></a>

                    <h1 class="h3 mb-3 font-weight-normal">Inicio de sesión</h1>
                    <p>Ingresa a tu cuenta <strong>CEVEN</strong></p>
            </div>



            <div class="form-label-group">
                <input type="email" id="InputCorreo"  name="email" class="form-control" placeholder="Correo Electrónico" required="" autofocus="">
                <label for="InputCorreo">Correo Electrónico...</label>
            </div>

            <div class="form-label-group">
                <input type="password" id="InputPassword" name="password" class="form-control" placeholder="Password" required="" value="">
                <label for="InputPassword">Contraseña...</label>
            </div>

            <input type="hidden" name="ruta" value="gestionDeAcceso">
            <input type="hidden" name="contenido" value="controlarLogin">


            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me" checked="checked"> <u>recordarme...</u>
                </label>
            </div>
            <!-- class="btn btn-lg btn-success btn-block"-->
            <input type="button" class="btn btn-lg btn-primary btn-block" onclick="validar_logueo()" value="Ingresar">


            <!--</fieldset>-->

            <a href="registro.php"><u><strong style="text-align: center;">*Crear cuenta*</strong></u><br>

                <a href="forgot-password.php"><u><strong style="text-align: center;">Olvido su Contraseña???</strong></u></a>

                <p class="mt-5 mb-3 text-muted text-center">© 2018</p>
        </form>
        <!-- /contenido -->


        <!-- #3 primero el archivo de la libreria-->
        <script src="1_log-in/particles.js"></script>
        <script src="1_log-in/particulas.js"></script>

    </body></html>