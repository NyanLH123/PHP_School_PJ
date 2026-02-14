# Food Receipt Management System (Pure PHP MVC)

This project is a beginner-friendly but professional MVC implementation using pure PHP and PDO.

## Folder Structure

```text
L5DC116/
├── app/
│   ├── config/
│   │   └── Config.php
│   ├── controllers/
│   │   ├── FoodController.php
│   │   ├── ReceiptController.php
│   │   └── UserController.php
│   ├── core/
│   │   ├── BaseController.php
│   │   ├── BaseModel.php
│   │   ├── BaseRouter.php
│   │   ├── Database.php
│   │   ├── Router.php
│   │   └── Session.php
│   ├── middleware/
│   │   └── AuthMiddleware.php
│   ├── models/
│   │   ├── FoodItem.php
│   │   ├── Receipt.php
│   │   ├── ReceiptItem.php
│   │   └── User.php
│   └── views/
│       ├── 404.php
│       ├── auth/
│       ├── foods/
│       ├── partials/
│       └── receipts/
├── database/
│   └── schema.sql
├── public/
│   ├── assets/
│   │   └── css/style.css
│   ├── .htaccess
│   └── index.php
└── README.md
```

## Setup

1. Create database and tables:
   - Run `database/schema.sql` in MySQL.
2. Update DB credentials in `app/config/Config.php`.
3. Place project in XAMPP htdocs as shown.
4. Open in browser:
   - `http://localhost/Projects/L5DC116/public`

## MVC Request Lifecycle

1. Browser sends request to `public/index.php`.
2. `index.php` bootstraps autoloading, starts session, registers routes.
3. `Router` matches request method + path.
4. If route is protected, `AuthMiddleware` verifies logged-in session.
5. Controller action runs and handles request validation/coordination.
6. Controller calls Model for database operations.
7. Controller passes clean data to View.
8. View renders HTML only (no business logic).
9. Response is returned to browser.

