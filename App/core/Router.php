<?php

declare(strict_types=1);

namespace App\Core;

use App\Config\Config;
use App\Middleware\AuthMiddleware;
use RuntimeException;

class Router extends BaseRouter
{
    public function dispatch(string $method, string $uri): void
    {
        $path = parse_url($uri, PHP_URL_PATH) ?? '/';
        $path = $this->stripBaseUrl($path);
        $route = $this->findRoute($method, $path);

        if ($route === null) {
            http_response_code(404);
            require dirname(__DIR__) . '/views/404.php';
            return;
        }

        if ($route['auth'] === true) {
            AuthMiddleware::handle();
        }

        $handler = $route['handler'];

        if (is_callable($handler)) {
            call_user_func($handler);
            return;
        }

        if (is_array($handler) && count($handler) === 2) {
            [$className, $methodName] = $handler;

            if (!class_exists($className)) {
                throw new RuntimeException("Controller {$className} was not found.");
            }

            $controller = new $className();

            if (!method_exists($controller, $methodName)) {
                throw new RuntimeException("Method {$methodName} was not found.");
            }

            $controller->$methodName();
            return;
        }

        throw new RuntimeException('Invalid route handler.');
    }

    private function stripBaseUrl(string $path): string
    {
        $basePath = parse_url(Config::BASE_URL, PHP_URL_PATH) ?? '';

        if ($basePath !== '' && str_starts_with($path, $basePath)) {
            $path = substr($path, strlen($basePath));
        }

        return $path === '' ? '/' : $path;
    }
}

