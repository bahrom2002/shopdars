<?php
session_start();
if ($_GET['id']){
    $id = $_GET['id'];
    if (isset($_SESSION['cart']['count'])){
        $_SESSION['cart']['count']++;
    }else{
        $_SESSION['cart']['count'] = 1;
    }

    $_SESSION['cart']['products'][] = $id;


    echo $_SESSION['cart']['count'];
}