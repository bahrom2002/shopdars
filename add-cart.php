<?php
session_start();

if ($_GET['id']) {
    $id = $_GET['id'];

    if (isset($_SESSION['cart']['count'])) {
        $_SESSION['cart']['count']++;
    } else {
        $_SESSION['cart']['count'] = 1;
    }

    $old_product = false;
    if (isset($_SESSION['cart']['products'])){
    foreach ($_SESSION['cart']['products'] as $key => $product){
        if ($product['product_id'] == $id) {
            $_SESSION['cart']['products'][$key]['count']++;
            $old_product = true;
        }

}

    if(!$old_product) {

        $_SESSION['cart']['products'][] = ['product_id' => $id, 'count' => 1];
    }

    }else{
        $_SESSION['cart']['products'][] = ['product_id' => $id, 'count' => 1];
    }

    echo $_SESSION['cart']['count'];
}

