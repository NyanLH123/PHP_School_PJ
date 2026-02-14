CREATE DATABASE IF NOT EXISTS food_receipt_db
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE food_receipt_db;

CREATE TABLE IF NOT EXISTS users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS food_items (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(120) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS receipts (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED NOT NULL,
    receipt_number VARCHAR(50) NOT NULL,
    receipt_date DATE NOT NULL,
    total_amount DECIMAL(10, 2) NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    UNIQUE KEY uq_receipts_receipt_number (receipt_number),
    INDEX idx_receipts_user_id (user_id),
    CONSTRAINT fk_receipts_user_id
        FOREIGN KEY (user_id) REFERENCES users(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS receipt_items (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    receipt_id INT UNSIGNED NOT NULL,
    food_item_id INT UNSIGNED NOT NULL,
    quantity INT UNSIGNED NOT NULL,
    unit_price DECIMAL(10, 2) NOT NULL,
    line_total DECIMAL(10, 2) NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    INDEX idx_receipt_items_receipt_id (receipt_id),
    INDEX idx_receipt_items_food_item_id (food_item_id),
    CONSTRAINT fk_receipt_items_receipt_id
        FOREIGN KEY (receipt_id) REFERENCES receipts(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    CONSTRAINT fk_receipt_items_food_item_id
        FOREIGN KEY (food_item_id) REFERENCES food_items(id)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
) ENGINE=InnoDB;

