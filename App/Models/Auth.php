<?php
namespace App\Models;

use App\Config\Database;
use App\Models\User;

class Auth {
    public function handleRegistration($name, $email, $password, $confirm_password)
    {
        if ($password !== $confirm_password) {
            echo "Passwords do not match.";
            return false;
        } else {
            $userModel = new User();
            if ($userModel->emailExists($email)) {
                echo "Email already exists.";
                return false;
            } else {
                $result = $userModel->create($name, $email, $password);
                if ($result) {
                    echo "User registered successfully.";
                }
                return $result;
            }
        }
    }
}