<?php
require ('../dbmysql.php');
require 'functions.php';

if (isset($_GET['id'])){
    $id = $_GET['id'];

    deleteSlide($id);
}
