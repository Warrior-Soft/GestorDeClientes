<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:' . constant('URL') . 'main/Login');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/custom/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/custom/css/custom.css" type="text/css">
    <script src="<?php echo constant('URL'); ?>public/custom/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo constant('URL'); ?>public/custom/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        * {
            box-sizing: border-box;
        }

        /* Button used to open the contact form - fixed at the bottom of the page */
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

        /* The popup form - hidden by default */
        .form-popup {
            display: none;
            position: fixed;
            bottom: 0;
            right: 15px;
            border: 3px solid #f1f1f1;
            z-index: 9;
        }

        /* Add styles to the form container */
        .form-container {
            max-width: 300px;
            padding: 10px;
            background-color: white;
        }

        /* Full-width input fields */
        .form-container input[type=text],
        .form-container input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
        }

        /* When the inputs get focus, do something */
        .form-container input[type=text]:focus,
        .form-container input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Set a style for the submit/login button */
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

        /* Add a red background color to the cancel button */
        .form-container .cancel {
            background-color: red;
        }

        /* Add some hover effects to buttons */
        .form-container .btn:hover,
        .open-button:hover {
            opacity: 1;
        }
    </style>
    <title>Portafolio</title>
</head>

<body>
    <?php require 'views/adminHeader.php' ?>

    <div style="padding-left:10px; padding-right:10px; margin-left:auto; margin-right:auto; margin-top:10px; margin-bottom:10px;">
        <div style="text-align:center; margin:10px; color:#159adb; font-weight:bold;">
            <h1>Clientes de OrionTek</h1>
        </div>
        <div>
            <table class="table" style="color:#159adb;">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Detalles</th>
                        <th scope="col">Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (empty($this->clientes)) {
                        echo '
                      <tr>
                      <td>Sin Clientes registrados</td>
                      </tr>
                     ';
                    } else {
                        foreach ($this->clientes as $key => $cliente) {
                            $key = $key + 1;
                            echo '
                            <tr>
                            <td>' . $key . '</td>
                            <td>' . $cliente->nombre . ' ' . $cliente->apellido . '</td>
                            <td><a class="btn btn-primary"  href="' . constant('URL') . 'Administrador/Detalles/' . $cliente->idCliente . '">Detalles</a></td>
                            <td><a class="btn btn-primary" onclick="return checkDelete()" href="' . constant('URL') . 'Administrador/borrarCliente/' . $cliente->idCliente . '">Borrar</a></td>
                            </tr>
                           ';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="form-group">
            <a class="btn btn-primary" href="<?php echo constant("URL") . "Administrador/registrarCliente" ?>">Registrar Cliente</a>
        </div>

    </div>

</body>
<script>
     function checkDelete() {
        return confirm('Estas seguro de borrar el siguiente cliente?');
    }
</script>

<?php
require_once("views/footer.php");
?>

</html>