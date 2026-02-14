<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\BaseModel;
use Throwable;

class Receipt extends BaseModel
{
    public function createWithItems(
        int $userId,
        string $receiptNumber,
        string $receiptDate,
        float $totalAmount,
        array $items
    ): int {
        try {
            $this->db->beginTransaction();

            $receiptSql = 'INSERT INTO receipts
                (user_id, receipt_number, receipt_date, total_amount, created_at, updated_at)
                VALUES (:user_id, :receipt_number, :receipt_date, :total_amount, NOW(), NOW())';

            $this->query($receiptSql, [
                'user_id' => $userId,
                'receipt_number' => $receiptNumber,
                'receipt_date' => $receiptDate,
                'total_amount' => $totalAmount,
            ]);

            $receiptId = (int)$this->db->lastInsertId();

            $itemSql = 'INSERT INTO receipt_items
                (receipt_id, food_item_id, quantity, unit_price, line_total, created_at, updated_at)
                VALUES (:receipt_id, :food_item_id, :quantity, :unit_price, :line_total, NOW(), NOW())';

            foreach ($items as $item) {
                $this->query($itemSql, [
                    'receipt_id' => $receiptId,
                    'food_item_id' => $item['food_item_id'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                    'line_total' => $item['line_total'],
                ]);
            }

            $this->db->commit();
            return $receiptId;
        } catch (Throwable $exception) {
            $this->db->rollBack();
            return 0;
        }
    }

    public function allByUser(int $userId): array
    {
        $sql = 'SELECT r.id, r.receipt_number, r.receipt_date, r.total_amount,
                       COUNT(ri.id) AS item_count
                FROM receipts r
                LEFT JOIN receipt_items ri ON ri.receipt_id = r.id
                WHERE r.user_id = :user_id
                GROUP BY r.id, r.receipt_number, r.receipt_date, r.total_amount
                ORDER BY r.id DESC';

        return $this->query($sql, ['user_id' => $userId])->fetchAll();
    }

    public function findByIdWithItems(int $receiptId, int $userId): ?array
    {
        $receiptSql = 'SELECT id, user_id, receipt_number, receipt_date, total_amount
                       FROM receipts
                       WHERE id = :id AND user_id = :user_id
                       LIMIT 1';

        $receipt = $this->query($receiptSql, [
            'id' => $receiptId,
            'user_id' => $userId,
        ])->fetch();

        if (!$receipt) {
            return null;
        }

        $itemsSql = 'SELECT ri.food_item_id, fi.name AS food_name, ri.quantity, ri.unit_price, ri.line_total
                     FROM receipt_items ri
                     INNER JOIN food_items fi ON fi.id = ri.food_item_id
                     WHERE ri.receipt_id = :receipt_id
                     ORDER BY ri.id ASC';

        $receipt['items'] = $this->query($itemsSql, [
            'receipt_id' => $receiptId,
        ])->fetchAll();

        return $receipt;
    }
}

