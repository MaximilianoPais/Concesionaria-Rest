<?php

require_once __DIR__ . '/request.php';
require_once __DIR__ . '/response.php';

// Clase base para Rutas y Middlewares
abstract class Routable
{
    abstract public function run($request, $response);
}
// Clase para Middlewares
abstract class Middleware extends Routable
{
    public function match($url, $verb)
    {
        // Middleware siempre coincide
        return true;
    }

    abstract public function run($request, $response);
}

class Route extends Routable
{
    private $url;
    private $verb;
    private $controller;
    private $method;
    private $params;

    public function __construct($url, $verb, $controller, $method)
    {
        $this->url = $url;
        $this->verb = $verb;
        $this->controller = $controller;
        $this->method = $method;
        $this->params = [];
    }
    public function match($url, $verb)
    {
        // Comparar el verbo HTTP
        if ($this->verb != $verb) {
            return false;
        }
        // Comparar la URL de la ruta con la URL solicitada
        $partsURL = explode("/", trim($url, '/'));
        $partsRoute = explode("/", trim($this->url, '/'));
        if (count($partsRoute) != count($partsURL)) {
            return false;
        }
        // Comparar los parámetros de la ruta con los de la URL
        foreach ($partsRoute as $key => $part) {
            if ($part[0] != ":") {
                if ($part != $partsURL[$key])
                    return false;
            } else //es un parámetro
            {
                $this->params['' . substr($part, 1)] = $partsURL[$key];
            }
        }
        return true;
    }
    // Ejecuta el controlador y método asociados a la ruta
    public function run($request, $response)
    {
        $controller = $this->controller;
        $method = $this->method;
        $request->params = (object) $this->params;

        (new $controller())->$method($request, $response);
    }
}
// Clase principal del Router
class Router
{
    private $routeTable = [];
    private $defaultRoute;
    private $request;
    private $response;

    public function __construct()
    {
        $this->defaultRoute = null;
        $this->request = new Request();
        $this->response = new Response();
    }
    // Método para enrutar la solicitud entrante
    public function route($url, $verb)
    {
        // Recorre todas las rutas registradas
        foreach ($this->routeTable as $route) {
            // Verifica si la ruta coincide con la solicitud
            if ($route->match($url, $verb)) {
                // Ejecuta la ruta
                $route->run($this->request, $this->response);
                // Si la respuesta ya fue enviada, se detiene el enrutamiento
                // if ($this->response->hasFinished())  !! esta parte esta comentada pq hacia que cuando pedia solo una moto me traia la moto:id y todas las demas detras. consultar
                    return;
            }
        }
        //Si ninguna ruta coincide con el pedido y se configuró ruta por defecto.
        if ($this->defaultRoute != null)
            $this->defaultRoute->run($this->request, $this->response);
    }

    public function addMiddleware($middleware)
    {
        $this->routeTable[] = $middleware;
    }

    public function addRoute($url, $verb, $controller, $method)
    {
        $this->routeTable[] = new Route($url, $verb, $controller, $method);
    }

    public function setDefaultRoute($controller, $method)
    {
        $this->defaultRoute = new Route("", "", $controller, $method);
    }
}
