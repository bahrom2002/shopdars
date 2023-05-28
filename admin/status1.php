<?php
include "functions.php";
if (isset($_GET['id'])){
    $id = $_GET['id'];
    addOrders1($id);
}else{
  echo 'xato';
}

