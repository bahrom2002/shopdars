<?php
include ('dbmysql.php');


function Product(){
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

function getProducts($ids){
    global $conn;
    if (count($ids) > 0){
        $ids = implode(',', $ids);
        $product = "SELECT * FROM product WHERE id IN($ids)  ";
        $products = $conn->query($product);
        return $products->fetch_all(MYSQLI_ASSOC);
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