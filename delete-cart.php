<?php
session_start();
require('dbmysql.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

   $products = $_SESSION['cart']['products'];

  foreach ($products as $key => $value ){
      if ( $value['product_id'] == $id){
          $old_count = $_SESSION['cart']['products'][$key]['count'];
          unset($_SESSION['cart']['products'][$key]);
          $_SESSION['cart']['count'] -= $old_count;
      }
  }
    header('location: cart.php');
}