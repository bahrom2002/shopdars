<?php
require ('../dbmysql.php');

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $delete_sql = "DELETE FROM buy_step WHERE id = {$id}";
    $conn->query($delete_sql);
    header('location: buy_step.php');
}
