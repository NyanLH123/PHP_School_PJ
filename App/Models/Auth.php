<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Legacy compatibility model.
 * Authentication flow is handled by UserController + Session.
 */
class Auth extends User
{
}

