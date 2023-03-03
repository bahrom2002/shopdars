<?php
 require ('../dbmysql.php');

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $delete_sql = "DELETE FROM category WHERE id = {$id}";
    $conn->query($delete_sql);
    header('location: select-category.php');
}