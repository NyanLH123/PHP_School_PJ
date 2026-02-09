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
        header('Location:' . 'App/Views/Home.php');
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
            header('Location:'. __DIR__ .'/../../Views/Login.php');
        } else {
            include __DIR__ . '/../../Views/Register.php';
        }
    }

    public function login() 
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            
        }
    }

}
