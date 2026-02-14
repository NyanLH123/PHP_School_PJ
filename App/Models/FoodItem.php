<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\BaseModel;

class FoodItem extends BaseModel
{
    public function all(): array
    {
        $sql = 'SELECT id, name, price, created_at FROM food_items ORDER BY id DESC';
        return $this->query($sql)->fetchAll();
    }

    public function find(int $id): ?array
    {
        $sql = 'SELECT id, name, price FROM food_items WHERE id = :id LIMIT 1';
        $item = $this->query($sql, ['id' => $id])->fetch();

        return $item ?: null;
    }

    public function create(string $name, float $price): bool
    {
        $sql = 'INSERT INTO food_items (name, price, created_at, updated_at)
                VALUES (:name, :price, NOW(), NOW())';

        return $this->query($sql, [
            'name' => $name,
            'price' => $price,
        ])->rowCount() > 0;
    }

    public function update(int $id, string $name, float $price): bool
    {
        $sql = 'UPDATE food_items
                SET name = :name, price = :price, updated_at = NOW()
                WHERE id = :id';

        return $this->query($sql, [
            'id' => $id,
            'name' => $name,
            'price' => $price,
        ])->rowCount() > 0;
    }

    public function delete(int $id): bool
    {
        $sql = 'DELETE FROM food_items WHERE id = :id';
        return $this->query($sql, ['id' => $id])->rowCount() > 0;
    }
}

