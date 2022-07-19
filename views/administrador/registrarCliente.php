<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/template/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/template/css/style.css" />
    <script src="<?php echo constant('URL'); ?>public/template/s/bootstrap.min.js"></script>
    <title>Registrar Clientes</title>
</head>

<body>
    <header class="full-reset header">
        <div class="full-reset logo">

            <a style="color:white;" class="navbar-brand" href="#">
                OrionTek
            </a>
        </div>

        <nav class="full-reset navigation">
            <ul class="full-reset list-unstyled">
                <li><a href="<?php echo constant('URL'); ?>administrador">Listar Clientes</a></li>

                <li><a href="<?php echo constant('URL'); ?>administrador/cerrarSesion">Cerrar Sesión</a></li>
            </ul>
        </nav>
        <a href="#" class="hidden-sm hidden-md hidden-lg pull-right button-menu-mobile show-close-menu-m"><i class="fa fa-ellipsis-v"></i></a>
    </header>

    <div style="padding-left:10px; padding-right:10px; margin-left:auto; margin-right:auto; margin-top:10px; padding-bottom:100px;">
        <div style="text-align:center; margin:10px; color:#159adb;">
            <h1>Registro de clientes</h1>
        </div>
        <form action="<?php echo constant('URL'); ?>administrador/guardarCliente/" style="margin-left:25%; margin-right:25%; margin-top:10px; margin-bottom:10px;" method="POST">
            <div class="form-group">
                <label style="color:#159adb;" for="nombreCliente">Nombre</label>
                <input type="text" class="form-control" id="nombreCliente" name="nombreCliente" aria-describedby="emailHelp" placeholder="Nombre Completo" required>
            </div>
            <div class="form-group">
                <label style="color:#159adb;" for="apellidoCliente">Apellido</label>
                <input type="text" class="form-control" id="apellidoCliente" name="apellidoCliente" placeholder="Apellido Completo" required>
            </div>
            <div class="form-group">
                <div style="display:flex; margin-bottom:10px;">
                    <div><input type="button" class="btn btn-primary" onClick="agregarDireccion()" value="Agregar Direcciones" /></div>
                </div>

                <div id="direcciones">

                </div>
            </div>
            <button type="submit" class="btn btn-primary" onclick="addHidden()">Guardar</button>
        </form>

    </div>
</body>
<script>
    a = 0;

    function agregarDireccion() {
        a++;
        var div = document.createElement('div');
        div.innerHTML = '<label style="margin-top:10px; color:#159adb;" for="direccion' + a + '">Dirección ' + a + '</label><br><textarea class="form-control" id="direccion' + a + '" name="direccion' + a + '" rows="3" required></textarea>';
        document.getElementById('direcciones').appendChild(div);

    }


    function addHidden() {

        var div = document.createElement('div');
        div.innerHTML = '<input type="hidden" id="custId" name="contadorDeDirecciones" value="' + a + '">';
        document.getElementById('direcciones').appendChild(div);

    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
require_once("views/footer.php");
?>

</html>