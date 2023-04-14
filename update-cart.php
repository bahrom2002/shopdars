<?php
session_start();
include 'functions.php';

if ($_GET['id'] && $_GET['count']) {
    $id = $_GET['id'];
    $count = $_GET['count'];


    $old_product = false;
    if (isset($_SESSION['cart']['products'])){
        foreach ($_SESSION['cart']['products'] as $key => $product){
            if ($product['product_id'] == $id) {
                $old_count = $_SESSION['cart']['products'][$key]['count'];
                $_SESSION['cart']['count'] += $count - $old_count;
                $_SESSION['cart']['products'][$key]['count'] = $count;
                $old_product = true;
            }

        }
    }

    if (isset($_SESSION['cart']['products'])){
        $products = $_SESSION['cart']['products'];

        $products = getProductsCart($products);

        $total = 0;
        foreach ($products as $product){

              $total += $product['price'] * $product['count'];
        }
    }

    $data = [
      'count' => $_SESSION['cart']['count'],
      'total' => $total
    ];

    echo json_encode($data);
}



