<?php
class Routes
{
    public function routes()
    {
        // ([0-9]+) ==> for numbers
        return $routes = [
            'GET' => [
                "" => ['controller' => 'app\controllers\HomeController', 'method' => 'index'],
                "route" => ['controller' => 'app\controllers\NameController', 'method' => 'index'],
            ],
            'POST' => []
        ];
    }
}
