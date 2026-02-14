<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\BaseController;
use App\Core\Session;
use App\Models\User;

class UserController extends BaseController
{
    private User $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function showLogin(): void
    {
        if (Session::has('user_id')) {
            $this->redirect('/receipts');
        }

        $this->render('auth/login', [
            'error' => Session::flash('error'),
            'success' => Session::flash('success'),
        ]);
    }

    public function login(): void
    {
        $email = trim((string)($_POST['email'] ?? ''));
        $password = (string)($_POST['password'] ?? '');

        if ($email === '' || $password === '') {
            Session::flash('error', 'Email and password are required.');
            $this->redirect('/login');
        }

        $user = $this->userModel->findByEmail($email);

        if (!$user || !password_verify($password, $user['password'])) {
            Session::flash('error', 'Invalid credentials.');
            $this->redirect('/login');
        }

        Session::set('user_id', (int)$user['id']);
        Session::set('user_name', $user['name']);

        $this->redirect('/receipts');
    }

    public function showRegister(): void
    {
        if (Session::has('user_id')) {
            $this->redirect('/receipts');
        }

        $this->render('auth/register', [
            'error' => Session::flash('error'),
        ]);
    }

    public function register(): void
    {
        $name = trim((string)($_POST['name'] ?? ''));
        $email = trim((string)($_POST['email'] ?? ''));
        $password = (string)($_POST['password'] ?? '');

        if ($name === '' || $email === '' || $password === '') {
            Session::flash('error', 'All fields are required.');
            $this->redirect('/register');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            Session::flash('error', 'Invalid email format.');
            $this->redirect('/register');
        }

        if (strlen($password) < 6) {
            Session::flash('error', 'Password must be at least 6 characters.');
            $this->redirect('/register');
        }

        if ($this->userModel->findByEmail($email)) {
            Session::flash('error', 'Email is already registered.');
            $this->redirect('/register');
        }

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $this->userModel->create($name, $email, $passwordHash);

        Session::flash('success', 'Registration successful. Please login.');
        $this->redirect('/login');
    }

    public function logout(): void
    {
        Session::destroy();
        $this->redirect('/login');
    }
}

