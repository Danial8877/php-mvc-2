<?php

class Core extends Routes
{
    public function __construct()
    {
        $routes = $this->route();

        if ($_ENV["WEB"] === "on") {
            $path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/");
        } elseif ($_ENV["WEB"] === "off") {
            $path = trim(str_replace(PROJECTNAME . "/", "", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)), "/");
        } else {
            $error = new ErrorPage();
            $error->_500_();
        }

        $method = $_SERVER['REQUEST_METHOD'];
        foreach ($routes[$method] as $route => $info) {

            if (preg_match("#^$route$#", $path, $matches)) {

                $id = $matches[1] ?? null;
                $controller = new $info['controller'];

                if ($method === 'POST') {
                    $controller->{$info['method']}($_POST, $id);
                } else {
                    $controller->{$info['method']}($id);
                }

                break;
            }
        }

        if (!isset($controller)) {
            $error = new ErrorPage();
            $error->_404_();
        }
    }
    private function route()
    {
        $routes = new Routes();
        return $routes->routes();
    }
}
