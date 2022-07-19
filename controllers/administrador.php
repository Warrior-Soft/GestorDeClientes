<?php


class Administrador extends Controller
{
    function __construct()
    {
        parent::__construct();
        session_start();
        error_reporting(E_ERROR | E_WARNING | E_PARSE);
        //$this->view->render('administrador/index');
    }

    function render()
    {
        $this->view->clientes = $this->model->consultarClientes();
        $this->view->render('administrador/index');
    }


    function cerrarSesion()
    {
        session_start();
        session_unset();
        session_destroy();
        header('location:' . constant('URL') . 'main/Login');
    }

    function registrarCliente($param = null)
    {
        $this->view->render('administrador/registrarCliente');
    }

    function guardarCliente()
    {
        echo $_POST['nombreCliente'] . "<br>";
        echo $_POST['apellidoCliente'] . "<br>";
        $direccion = "direccion";

        if ($this->model->guardarCliente($_POST['nombreCliente'], $_POST['apellidoCliente'])) {
            if ($_POST['contadorDeDirecciones'] == 0) {
                header('location:' . constant('URL') . 'administrador/');
            } else {
                $idCliente = $this->model->obtenerUltimoCliente();
                for ($i = 1; $i <= $_POST['contadorDeDirecciones']; $i++) {
                    if ($this->model->guardarDireccion($_POST[$direccion . $i])) {
                        $idDireccion = $this->model->obtenerUltimaDireccion();
                        if ($this->model->guardarClienteDireccion($idCliente, $idDireccion)) {
                            header('location:' . constant('URL') . 'administrador/');
                        }
                    }
                }
            }
        }
    }

    function actualizarCliente($param = null)
    {
        $idCliente = $param[0];
        $nombre = $_POST['nombreCliente'];
        $apellido = $_POST['apellidoCliente'];
        $direccion = "direccion";

        if ($this->model->actualizarCliente($nombre, $apellido, $idCliente)) {

            if ($_POST['contadorDeDirecciones'] == 0) {
                header('location:' . constant('URL') . 'Administrador/Detalles/' . $idCliente);
            } else {
                for ($i = 1; $i <= $_POST['contadorDeDirecciones']; $i++) {
                    if ($this->model->guardarDireccion($_POST[$direccion . $i])) {
                        $idDireccion = $this->model->obtenerUltimaDireccion();
                        if ($this->model->guardarClienteDireccion($idCliente, $idDireccion)) {
                            header('location:' . constant('URL') . 'Administrador/Detalles/' . $idCliente);
                        }
                    }
                }
            }
        }
    }

    function actualizarDireccion($param = null)
    {
        $idDireccion = $param[0];
        $idCliente = $param[1];
        $direccion = $_POST['direccion'];

        if ($this->model->actualizarDireccion($idDireccion, $direccion)) {

            header('location:' . constant('URL') . 'Administrador/Detalles/' . $idCliente);
        }
    }

    function editarDireccion($param = null)
    {
        $idDireccion = $param[0];
        $idCliente = $param[1];
        $direccion = $this->model->consultarDireccion($idDireccion);
        $this->view->idCliente = $idCliente;
        $this->view->direccion = $direccion;
        $this->view->render('administrador/modificarDireccion');
    }


    function Detalles($param = null)
    {
        $idCliente = $param[0];
        $cliente = $this->model->consultarCliente($idCliente);
        $direcciones = $this->model->consultarDirecciones($idCliente);
        $this->view->cliente = $cliente;
        $this->view->direcciones = $direcciones;
        $this->view->render('administrador/modificarCliente');
    }

    function borrarCliente($param = null)
    {
        $idCliente = $param[0];
        if ($this->model->borrarCliente($idCliente)) {
            header('location:' . constant('URL') . 'administrador/');
        }
    }

    function borrarDireccion($param = null)
    {
        $idDireccion = $param[0];
        $idCliente = $param[1];
        if ($this->model->borrarClienteDireccion($idDireccion)) {
            header('location:' . constant('URL') . 'Administrador/Detalles/' . $idCliente);
        }
    }
}
