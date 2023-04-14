<?php
include ('dbmysql.php');


function allProduct(){
    global $conn;
    $product = "SELECT * FROM product ";
    $products = $conn->query($product);
    return $products->fetch_all(MYSQLI_ASSOC);
}

function getProduct(){
    global $conn;
    $product = "SELECT * FROM product LIMIT 8 ";
    $products = $conn->query($product);
    return $products->fetch_all(MYSQLI_ASSOC);
}

function getCategoryName($id){
    global $conn;
    $sql = "SELECT name FROM category WHERE id = $id";
    $result = $conn->query($sql);
    $result = $result->fetch_assoc();
    return isset($result['name']) ? $result['name'] : '';
}

function getSlide(){
    global $conn;
    $slide = "SELECT * FROM slide ORDER BY level DESC ";
    $slides = $conn->query($slide);
    return $slides->fetch_all(MYSQLI_ASSOC);
}

function getPartners(){
    global $conn;
    $partners = "SELECT * FROM partners ORDER BY level DESC ";
    $partners = $conn->query($partners);
    return $partners->fetch_all(MYSQLI_ASSOC);
}

function getProductsCart($cart_products){
    global $conn;
    $ids = array_column($cart_products,'product_id');
    if (count($ids) > 0){
        $ids = implode(',', $ids);
        $product = "SELECT * FROM product WHERE id IN($ids)";
        $products = $conn->query($product);
        $products =  $products->fetch_all(MYSQLI_ASSOC);

        foreach ($products as $key => $value){
            foreach ($cart_products as $key2 => $value2){
                if($value2['product_id'] == $value['id']){
                    $products[$key]['count'] = $cart_products[$key2]['count'];
                }
            }
        }
        return $products;
    }else{
        return [];
    }

}

function getBuyStep(){
    global $conn;
    $buy_step = "SELECT * FROM buy_step ORDER BY level DESC ";
    $buy_steps = $conn->query($buy_step);
    return $buy_steps->fetch_all(MYSQLI_ASSOC);
}