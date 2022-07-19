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
            <h2>Modificar datos del cliente</h2>
        </div>
        <form action="<?php echo constant('URL'); ?>administrador/actualizarCliente/<?php echo $this->cliente->idCliente ?>" style="margin-left:25%; margin-right:25%; margin-top:10px; margin-bottom:10px;" method="POST">
            <div class="form-group">
                <label style="color:#159adb;" for="nombreCliente">Nombre</label>
                <input type="text" class="form-control" id="nombreCliente" name="nombreCliente" aria-describedby="emailHelp" placeholder="Nombre Completo" value="<?php echo $this->cliente->nombre ?>" required>
            </div>
            <div class="form-group">
                <label style="color:#159adb;" for="apellidoCliente">Apellido</label>
                <input type="text" class="form-control" id="apellidoCliente" name="apellidoCliente" placeholder="Apellido Completo" value="<?php echo $this->cliente->apellido ?>" required>
            </div>
            <div class="form-group">
                <div style="display:flex; margin-bottom:10px;">
                    <div><input type="button" class="btn btn-primary" onClick="agregarDireccion()" value="Agregar Direcciones" /></div>
                </div>

                <div id="direcciones">

                </div>
            </div>
            <button type="submit" class="btn btn-primary" onclick="addHidden()">Actualizar</button>
        </form>

        <div style="padding-bottom:50px;">
            <div style="text-align:center; margin:10px;  color:#159adb;">
                <h2>Direcciones del cliente</h2>
            </div>
            <table class="table" style="color:#159adb;">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (empty($this->direcciones)) {
                        echo '
                      <tr>
                      <td>No hay direcciones registradas</td>
                      </tr>
                     ';
                    } else {
                        foreach ($this->direcciones as $key => $direccion) {
                            $posicion = $key + 1;
                            echo '
                            <tr>
                            <td>' . $posicion . '</td>
                            <td>' . $direccion->direccion . '</td>
                            <td><a class="btn btn-primary"  href="' . constant('URL') . 'administrador/editarDireccion/' . $direccion->idDireccion . '/' . $this->cliente->idCliente . '">Editar</a></td>
                            <td><a class="btn btn-primary" onclick="return checkDelete()" href="' . constant('URL') . 'administrador/borrarDireccion/' . $direccion->idDireccion . '/' . $this->cliente->idCliente . '">Borrar</a></td>
                            </tr>
                           ';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>


</body>
<script>
    a = 0;

    function agregarDireccion() {
        a++;
        var div = document.createElement('div');
        div.innerHTML = '<label style="color:#159adb;" for="direccion' + a + '">Dirección ' + a + '</label><br><textarea class="form-control" id="direccion' + a + '" name="direccion' + a + '" rows="3"></textarea>';
        document.getElementById('direcciones').appendChild(div);

    }

    function addHidden() {

        var div = document.createElement('div');
        div.innerHTML = '<input type="hidden" id="custId" name="contadorDeDirecciones" value="' + a + '">';
        document.getElementById('direcciones').appendChild(div);

    }

    function checkDelete() {
        return confirm('Estas seguro de borrar la siguiente dirección?');
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php
require_once("views/footer.php");
?>

</html>