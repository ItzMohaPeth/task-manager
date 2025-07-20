<?php
class Router {
    private $routes = [];
    
    public function add($method, $path, $handler) {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'handler' => $handler
        ];
    }
    
    public function resolve() {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        
        // Supprimer le slash final s'il existe
        $requestPath = rtrim($requestPath, '/');
        if (empty($requestPath)) {
            $requestPath = '/';
        }
        
        foreach ($this->routes as $route) {
            if ($route['method'] === $requestMethod) {
                $pattern = preg_replace('/\{([^}]+)\}/', '([^/]+)', $route['path']);
                $pattern = '#^' . $pattern . '$#';
                
                if (preg_match($pattern, $requestPath, $matches)) {
                    array_shift($matches); // Supprimer le match complet
                    
                    list($controller, $method) = explode('@', $route['handler']);
                    $controllerInstance = new $controller();
                    
                    if (empty($matches)) {
                        $controllerInstance->$method();
                    } else {
                        $controllerInstance->$method(...$matches);
                    }
                    return;
                }
            }
        }
        
        // Route non trouvée
        http_response_code(404);
        echo "Page non trouvée";
    }
}
?>
