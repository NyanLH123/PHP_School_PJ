<?php

declare(strict_types=1);

namespace App\Core;

use App\Config\Config;

abstract class BaseController
{
    protected function render(string $view, array $data = []): void
    {
        $data['appName'] = Config::APP_NAME;
        $data['baseUrl'] = Config::BASE_URL;
        $data['isAuthenticated'] = Session::has('user_id');
        $data['currentUserName'] = Session::get('user_name', 'Guest');

        extract($data, EXTR_SKIP);

        $viewPath = dirname(__DIR__) . '/views/' . $view . '.php';
        $headerPath = dirname(__DIR__) . '/views/partials/header.php';
        $footerPath = dirname(__DIR__) . '/views/partials/footer.php';

        if (!file_exists($viewPath)) {
            http_response_code(404);
            exit('View not found.');
        }

        require $headerPath;
        require $viewPath;
        require $footerPath;
    }

    protected function redirect(string $path): void
    {
        header('Location: ' . Config::BASE_URL . $path);
        exit;
    }
}
