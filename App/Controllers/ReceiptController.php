<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\BaseController;
use App\Core\Session;
use App\Models\FoodItem;
use App\Models\Receipt;

class ReceiptController extends BaseController
{
    private Receipt $receiptModel;
    private FoodItem $foodModel;

    public function __construct()
    {
        $this->receiptModel = new Receipt();
        $this->foodModel = new FoodItem();
    }

    public function index(): void
    {
        $userId = (int)Session::get('user_id');

        $this->render('receipts/index', [
            'receipts' => $this->receiptModel->allByUser($userId),
            'success' => Session::flash('success'),
            'error' => Session::flash('error'),
        ]);
    }

    public function create(): void
    {
        $this->render('receipts/create', [
            'foods' => $this->foodModel->all(),
            'error' => Session::flash('error'),
            'currentDate' => date('Y-m-d'),
        ]);
    }

    public function store(): void
    {
        $userId = (int)Session::get('user_id');
        $receiptNumber = trim((string)($_POST['receipt_number'] ?? ''));
        $receiptDate = trim((string)($_POST['receipt_date'] ?? ''));
        $foodIds = $_POST['food_id'] ?? [];
        $quantities = $_POST['quantity'] ?? [];

        if ($receiptNumber === '' || $receiptDate === '') {
            Session::flash('error', 'Receipt number and date are required.');
            $this->redirect('/receipts/create');
        }

        if (!is_array($foodIds) || !is_array($quantities) || count($foodIds) === 0) {
            Session::flash('error', 'At least one receipt item is required.');
            $this->redirect('/receipts/create');
        }

        $items = [];
        $totalAmount = 0.0;

        for ($i = 0; $i < count($foodIds); $i++) {
            $foodId = (int)($foodIds[$i] ?? 0);
            $quantity = (int)($quantities[$i] ?? 0);

            if ($foodId <= 0 || $quantity <= 0) {
                continue;
            }

            $food = $this->foodModel->find($foodId);
            if (!$food) {
                continue;
            }

            $unitPrice = (float)$food['price'];
            $lineTotal = $unitPrice * $quantity;
            $totalAmount += $lineTotal;

            $items[] = [
                'food_item_id' => $foodId,
                'quantity' => $quantity,
                'unit_price' => $unitPrice,
                'line_total' => $lineTotal,
            ];
        }

        if (count($items) === 0) {
            Session::flash('error', 'No valid items found in receipt.');
            $this->redirect('/receipts/create');
        }

        $receiptId = $this->receiptModel->createWithItems(
            $userId,
            $receiptNumber,
            $receiptDate,
            $totalAmount,
            $items
        );

        if ($receiptId <= 0) {
            Session::flash('error', 'Failed to create receipt.');
            $this->redirect('/receipts/create');
        }

        Session::flash('success', 'Receipt created successfully.');
        $this->redirect('/receipts/show?id=' . $receiptId);
    }

    public function show(): void
    {
        $receiptId = (int)($_GET['id'] ?? 0);
        $userId = (int)Session::get('user_id');

        $receipt = $this->receiptModel->findByIdWithItems($receiptId, $userId);

        if (!$receipt) {
            Session::flash('error', 'Receipt not found.');
            $this->redirect('/receipts');
        }

        $this->render('receipts/show', [
            'receipt' => $receipt,
        ]);
    }
}
