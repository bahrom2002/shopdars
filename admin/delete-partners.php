<?php
require ('../dbmysql.php');

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $delete_sql = "DELETE FROM partners WHERE id = {$id}";
    $conn->query($delete_sql);
    header('location: partners.php');
}

