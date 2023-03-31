<?php
session_start();
require('dbmysql.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

   $products = $_SESSION['cart']['products'];

   $i = 0;
   while ($i <= count($products)){
       if ($id == $products[$i]){
           unset( $_SESSION['cart']['products'][$i]);
           $_SESSION['cart']['count']--;
       }
       $i++;
   }
    header('location: cart.php');
}