<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/template/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/template/css/style.css" />
    <script src="<?php echo constant('URL'); ?>public/template/s/bootstrap.min.js"></script>
    <title>Modificar Cliente</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        * {
            box-sizing: border-box;
        }

        .open-button {
            background-color: #555;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            opacity: 0.8;
            position: fixed;
            bottom: 23px;
            right: 28px;
            width: 280px;
        }

        .form-popup {
            display: none;
            position: fixed;
            bottom: 0;
            right: 15px;
            border: 3px solid #f1f1f1;
            z-index: 9;

            width: 300px;
            border-radius: 5px;
            position: fixed;
            bottom: 14px;
            border-color: white;
            background-color: #1da4e6;
            opacity: 0.99;
        }


        .form-container {
            max-width: 300px;
            padding: 10px;
            background-color: #1da4e6;
        }


        .form-container textarea {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
        }



        .form-container .btn {
            background-color: #04AA6D;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom: 10px;
            opacity: 0.8;
        }

        .form-container .cancel {
            background-color: #E74C3C;

        }

        .form-container .btn:hover,
        .open-button:hover {
            opacity: 1;
        }
    </style>
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
    <div style="padding-left:10px; padding-right:10px; margin-left:auto; margin-right:auto; margin-top:10px; margin-bottom:10px;">
        <div style="text-align:center; margin:10px;  color:#159adb;">
            <h2>Modificar dirección</h2>
        </div>
        <form action="<?php echo constant('URL'); ?>administrador/actualizarDireccion/<?php echo $this->direccion->idDireccion ?>/<?php echo $this->idCliente ?>" style="margin-left:25%; margin-right:25%; margin-top:10px; margin-bottom:10px;" method="POST">
            <div class="form-group">
                <label style="color:#159adb;" for="nombreCliente">Dirección</label>
                <textarea class="form-control"  name="direccion" rows="3" required><?php echo $this->direccion->direccion ?>
                </textarea>
            </div>
            <button type="submit" class="btn btn-primary" onclick="addHidden()">Actualizar</button>
        </form>

    </div>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php
require_once("views/footer.php");
?>

</html>