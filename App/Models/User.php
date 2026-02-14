<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\BaseModel;

class User extends BaseModel
{
    public function create(string $name, string $email, string $passwordHash): bool
    {
        $sql = 'INSERT INTO users (name, email, password, created_at, updated_at)
                VALUES (:name, :email, :password, NOW(), NOW())';

        return $this->query($sql, [
            'name' => $name,
            'email' => $email,
            'password' => $passwordHash,
        ])->rowCount() > 0;
    }

    public function findByEmail(string $email): ?array
    {
        $sql = 'SELECT id, name, email, password FROM users WHERE email = :email LIMIT 1';
        $user = $this->query($sql, ['email' => $email])->fetch();

        return $user ?: null;
    }

    public function findById(int $id): ?array
    {
        $sql = 'SELECT id, name, email FROM users WHERE id = :id LIMIT 1';
        $user = $this->query($sql, ['id' => $id])->fetch();

        return $user ?: null;
    }
}

