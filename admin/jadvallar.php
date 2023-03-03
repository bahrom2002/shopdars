<?php

require ('../dbmysql.php');

$sql = "CREATE TABLE category(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    category_id INT
);";

$sql .= "CREATE TABLE orders(
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    order_date DATETIME,
    shipped_date DATETIME,
    required_date DATETIME,
    status VARCHAR(255)
);";


$sql .= "CREATE TABLE order_detail(
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_id INT,
    quantity INT,
    priceEach DECIMAL(16,2)
);";

$sql .=  "CREATE TABLE product(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR (255),
    price DECIMAL(16,2),
    category_id INT,
    instock INT,
    description TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);";

$sql .= "CREATE TABLE user(
            id INT AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(100),
            lastname VARCHAR(100),
            phone VARCHAR(100),
            email VARCHAR(100),
            username VARCHAR(100),
            password VARCHAR(100),
            gender INT,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            );";

$conn->multi_query($sql);