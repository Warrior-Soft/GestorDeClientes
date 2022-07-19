<?php
//session_start();
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
if (isset($_GET['cerrar_sesion'])) {
    session_unset();
    session_destroy();
}

if (isset($_SESSION['usuario'])) {
    header('location:' . constant('URL') . 'administrador');
}
?>

<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/custom/css/bootstrap.min.css">
<script src="<?php echo constant('URL'); ?>public/custom/js/jquery-3.6.0.min.js"></script>
<script src="<?php echo constant('URL'); ?>public/custom/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/template/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/template/css/normalize.css">
<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/template/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/template/css/style.css">
<script src="<?php echo constant('URL'); ?>public/template/js/modernizr.js"></script>
<script src="<?php echo constant('URL'); ?>public/template/js/bootstrap.min.js"></script>
<script src="<?php echo constant('URL'); ?>public/template/js/main.js"></script>
<title>Inicio de sesion</title>

<?php require 'views/mainHeader.php' ?>

<body>
    <div style="margin-top: 50px; margin-bottom: 50px" id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="<?php echo constant('URL'); ?>main/validarUsuario" method="post">
                            <h3 class="text-center text-info"><img src="<?php echo constant('URL'); ?>public/custom/images/logo.png" height="200" alt="Image preview..."></h3>
                            <div class="form-group">
                                <label for="nombre" style="color: #159adb;">Usuario:</label><br>
                                <input type="text" name="nombre" id="nombre" maxlength="15" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="contrasena" style="color: #159adb;">Contraseña:</label><br>
                                <input type="password" name="contrasena"  id="contrasena" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" style="background-color:  #159adb;" class="btn btn-info btn-md" value="Iniciar Sesión">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="<?php echo constant('URL'); ?>public/custom/js/usercontrol.js"></script>
</body>
<?php require 'views/footer.php' ?>