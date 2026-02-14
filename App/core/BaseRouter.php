<?php

declare(strict_types=1);

namespace App\Core;

abstract class BaseRouter
{
    protected array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public function get(string $path, callable|array $handler, bool $authRequired = false): void
    {
        $this->addRoute('GET', $path, $handler, $authRequired);
    }

    public function post(string $path, callable|array $handler, bool $authRequired = false): void
    {
        $this->addRoute('POST', $path, $handler, $authRequired);
    }

    protected function addRoute(
        string $method,
        string $path,
        callable|array $handler,
        bool $authRequired
    ): void {
        $normalizedPath = $this->normalizePath($path);
        $this->routes[$method][$normalizedPath] = [
            'handler' => $handler,
            'auth' => $authRequired,
        ];
    }

    protected function normalizePath(string $path): string
    {
        $trimmed = '/' . trim($path, '/');
        return $trimmed === '//' ? '/' : $trimmed;
    }

    protected function findRoute(string $method, string $path): ?array
    {
        $normalizedPath = $this->normalizePath($path);
        return $this->routes[$method][$normalizedPath] ?? null;
    }

    abstract public function dispatch(string $method, string $uri): void;
}

