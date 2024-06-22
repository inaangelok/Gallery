<?php
include_once('controller/Controller.php');
session_start();

class App extends Controller
{
    public static function run()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $url = explode('/', $uri);
        $controller = 'front';
        $action = 'home';
        $params = '';
        if ($url[1] != '') {
            $controller = $url[1];
            if ($url[2] != '') {
                $action = $url[2];
                if (isset($url[3])) {
                    if ($url[3] != '') {
                        $params = $url[3];
                    }
                }
            }
        }
        $controllerName = ucfirst($controller) . 'Controller';
        $contFileName = $controllerName . '.php';
        if (file_exists('../controllers/' . $contFileName)) {
            include_once('../controllers/' . $contFileName);
            $newobj = new $controllerName();
            $newobj->$action($params);
        } else {
            echo "file doesn't exist";
        }
    }
}