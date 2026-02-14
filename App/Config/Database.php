<?php

declare(strict_types=1);

namespace App\Config;

/**
 * Legacy compatibility file.
 * Use App\Config\Config for active DB configuration.
 */
class Database
{
    public const HOST = Config::DB_HOST;
    public const PORT = Config::DB_PORT;
    public const NAME = Config::DB_NAME;
    public const USER = Config::DB_USER;
    public const PASS = Config::DB_PASS;
    public const CHARSET = Config::DB_CHARSET;
}

