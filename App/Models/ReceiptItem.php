<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\BaseModel;

class ReceiptItem extends BaseModel
{
    public function allByReceipt(int $receiptId): array
    {
        $sql = 'SELECT receipt_id, food_item_id, quantity, unit_price, line_total
                FROM receipt_items
                WHERE receipt_id = :receipt_id
                ORDER BY id ASC';

        return $this->query($sql, ['receipt_id' => $receiptId])->fetchAll();
    }
}

