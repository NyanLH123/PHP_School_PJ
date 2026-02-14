<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\BaseController;
use App\Core\Session;
use App\Models\FoodItem;

class FoodController extends BaseController
{
    private FoodItem $foodModel;

    public function __construct()
    {
        $this->foodModel = new FoodItem();
    }

    public function index(): void
    {
        $this->render('foods/index', [
            'foods' => $this->foodModel->all(),
            'success' => Session::flash('success'),
            'error' => Session::flash('error'),
        ]);
    }

    public function create(): void
    {
        $this->render('foods/create', [
            'error' => Session::flash('error'),
        ]);
    }

    public function store(): void
    {
        $name = trim((string)($_POST['name'] ?? ''));
        $price = (float)($_POST['price'] ?? 0);

        if ($name === '' || $price <= 0) {
            Session::flash('error', 'Name and valid price are required.');
            $this->redirect('/foods/create');
        }

        $this->foodModel->create($name, $price);
        Session::flash('success', 'Food item added successfully.');
        $this->redirect('/foods');
    }

    public function edit(): void
    {
        $id = (int)($_GET['id'] ?? 0);
        $food = $this->foodModel->find($id);

        if (!$food) {
            Session::flash('error', 'Food item not found.');
            $this->redirect('/foods');
        }

        $this->render('foods/edit', [
            'food' => $food,
            'error' => Session::flash('error'),
        ]);
    }

    public function update(): void
    {
        $id = (int)($_POST['id'] ?? 0);
        $name = trim((string)($_POST['name'] ?? ''));
        $price = (float)($_POST['price'] ?? 0);

        if ($id <= 0 || $name === '' || $price <= 0) {
            Session::flash('error', 'Invalid update request.');
            $this->redirect('/foods');
        }

        $this->foodModel->update($id, $name, $price);
        Session::flash('success', 'Food item updated successfully.');
        $this->redirect('/foods');
    }

    public function destroy(): void
    {
        $id = (int)($_POST['id'] ?? 0);

        if ($id <= 0) {
            Session::flash('error', 'Invalid delete request.');
            $this->redirect('/foods');
        }

        $this->foodModel->delete($id);
        Session::flash('success', 'Food item deleted successfully.');
        $this->redirect('/foods');
    }
}

