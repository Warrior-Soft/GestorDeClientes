<?php
class Main extends Controller
{
    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function render()
    {
        $this->view->render('main/index');
    }

    function Login()
    {
        $this->view->render('main/login');
    }

    function validarUsuario()
    {
        $nombre = $_POST['nombre'];
        $contrasena = $_POST['contrasena'];

        $usuario = $this->model->validarUsuario($nombre, $contrasena);

        $_SESSION['usuario'] = $usuario; 
        header('location:' . constant('URL') . 'Administrador');
        
    }
}
