<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Config\Config;
use App\Core\Session;

class AuthMiddleware
{
    public static function check(): bool
    {
        return Session::has('user_id');
    }

    public static function handle(): void
    {
        if (self::check()) {
            return;
        }

        Session::flash('error', 'Please login first.');
        header('Location: ' . Config::BASE_URL . '/login');
        exit;
    }
}

