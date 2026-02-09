<?php
session_start();

// Automatic Class Loading
spl_autoload_register(function ($class) {
    $file = __DIR__ . '/../app/' . str_replace('App\\', '', $class) . '.php';
    $file = str_replace('\\', '/', $file);

    if (file_exists($file)) {
        require $file;
    }
});


use App\Controllers\UserController;

$controller = new UserController();
$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'register':
        $controller->register();
        break;
    case 'login':
        $controller->login();
        break;
    default:
        $controller->index();
        break;
}