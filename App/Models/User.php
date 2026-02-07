<?php

namespace App\Models;

use App\Config\Database;

class User
{
    private $conn;

    public function __construct()
    {
        $database = Database::getInstance();
        $this->conn = $database->getConnection();
    }

    public function getAll()
    {
        $stmt = $this->conn->query("SELECT * FROM users");
        return $stmt->fetchAll();
    }

    public function emailExists($email)
    {
        $stmt = $this->conn->prepare(
            "SELECT 1 FROM users WHERE email = ? LIMIT 1"
        );
        $stmt->execute([$email]);
        return $stmt->fetch() !== false;
    }

    public function create($name, $email, $password)
    {
        $stmt = $this->conn->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        return $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':password' => password_hash($password, PASSWORD_BCRYPT)
        ]);
    }
}
