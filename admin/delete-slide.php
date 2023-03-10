<?php
require ('../dbmysql.php');

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $delete_sql = "DELETE FROM slide WHERE id = {$id}";
    $conn->query($delete_sql);
    header('location: slide.php');
}
