<?php
require_once 'controllers/errores.php';
class App
{
    function __construct()
    {
        // echo '<p>Nueva App</p>';
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
        } else {
            $url = null;
        }
        /**localhost/MVC/{index.php?url}/Controlador/Metdo{llama tambien a la vista} */
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        //cuando se ingresa sin definir controlador
        if (empty($url[0])) {
            $archivoController = 'controllers/main.php';
            require_once $archivoController;
            $controller = new Main();
            $controller->loadModel('main');
            $controller->render();
            return false;
        }

        $archivoController = 'controllers/' . $url[0] . '.php';

        if (file_exists($archivoController)) {
            require_once $archivoController;

            //inicializamos el controlador
            $controller = new $url[0];
            $controller->loadModel($url[0]);

            //Nos permitira ver cuantos parametros tiene la url.
            //1 llama al controlador, 2 al controlador con el metodo
            // y 3 al controlador, metodo y envia parametro
            //controlador/metodo/valor_enviado
            $nparam = sizeof($url);

            if ($nparam > 1) {
                if ($nparam > 2) {
                    $param = [];
                    for ($i = 2; $i < $nparam; $i++) {
                        array_push($param, $url[$i]);
                    }
                    //llamamos al metodo y le pasamos el parametro
                    $controller->{$url[1]}($param);
                } else {
                    //llamamos al metodo de no tener mas parametros y si este no necesita mas
                    $controller->{$url[1]}();
                }
            } else {
                $controller->render();
            }
        } else {
            $controller = new Errores();
        }
    }
}
