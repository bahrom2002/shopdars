<?php
include 'functions.php';
if (isset($_GET['id'])){
    $id =  $_GET['id'];
    addOrders2($id);
}