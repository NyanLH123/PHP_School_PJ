<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Auth;

class UserController
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = new User();
    }

    public function index()
    {
        $users = $this->userModel->getAll();
        include __DIR__ . '/../../Views/UserList.php';
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirm_password = $_POST['confirm_password'] ?? '';

            $auth = new Auth();
            $auth->handleRegistration($name, $email, $password, $confirm_password);
        } else {
            include __DIR__ . '/../../Views/Register.html';
        }
    }

}
