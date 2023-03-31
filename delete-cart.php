<?php
session_start();
require('dbmysql.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

   $products = $_SESSION['cart']['products'];

  foreach ($products as $key => $value ){
      if ($id == $value){
          unset($_SESSION['cart']['products'][$key]);
          $_SESSION['cart']['count']--;
      }
  }
    header('location: cart.php');
}