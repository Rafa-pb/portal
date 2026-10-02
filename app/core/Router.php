<?php
class Router {
    private $routes;

    public function __construct($routes) {
        $this->routes = $routes;
    }

    public function dispatch($uri) {
        // Detecta base URI automaticamente (ex: /portal/public)
        $base = str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);

        // Remove a base do URI acessado
        $path = str_replace($base, '', parse_url($uri, PHP_URL_PATH));
        $path = rtrim($path, '/');

        // Se estiver vazio, define como raiz
        if ($path === '') {
            $path = '/';
        }

        if (isset($this->routes[$path])) {
            list($controllerName, $method) = explode('@', $this->routes[$path]);
            $controllerFile = __DIR__ . '/../controllers/' . $controllerName . '.php';

            if (file_exists($controllerFile)) {
                require_once $controllerFile;
                $controller = new $controllerName();

                if (method_exists($controller, $method)) {
                    $controller->$method();
                    return;
                } else {
                    http_response_code(500);
                    echo "Método '$method' não encontrado no controller '$controllerName'.";
                    return;
                }
            } else {
                http_response_code(500);
                echo "Controller '$controllerName' não encontrado.";
                return;
            }
        }

        http_response_code(404);
        echo "Página não encontrada.";
    }
}
