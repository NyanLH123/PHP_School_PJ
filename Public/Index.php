<?php

declare(strict_types=1);

use App\Controllers\FoodController;
use App\Controllers\ReceiptController;
use App\Controllers\UserController;
use App\Core\Router;
use App\Core\Session;

define('BASE_PATH', dirname(__DIR__));

spl_autoload_register(function (string $className): void {
    $prefix = 'App\\';
    $baseDir = BASE_PATH . '/app/';

    if (strncmp($prefix, $className, strlen($prefix)) !== 0) {
        return;
    }

    $relativeClass = substr($className, strlen($prefix));
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

Session::start();

$router = new Router();

// Guest routes
$router->get('/', [UserController::class, 'showLogin']);
$router->get('/login', [UserController::class, 'showLogin']);
$router->post('/login', [UserController::class, 'login']);
$router->get('/register', [UserController::class, 'showRegister']);
$router->post('/register', [UserController::class, 'register']);

// Authenticated routes
$router->post('/logout', [UserController::class, 'logout'], true);

$router->get('/foods', [FoodController::class, 'index'], true);
$router->get('/foods/create', [FoodController::class, 'create'], true);
$router->post('/foods/store', [FoodController::class, 'store'], true);
$router->get('/foods/edit', [FoodController::class, 'edit'], true);
$router->post('/foods/update', [FoodController::class, 'update'], true);
$router->post('/foods/delete', [FoodController::class, 'destroy'], true);

$router->get('/receipts', [ReceiptController::class, 'index'], true);
$router->get('/receipts/create', [ReceiptController::class, 'create'], true);
$router->post('/receipts/store', [ReceiptController::class, 'store'], true);
$router->get('/receipts/show', [ReceiptController::class, 'show'], true);

$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

