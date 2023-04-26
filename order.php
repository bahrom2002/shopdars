<?php
session_start();
require 'functions.php';

if (!empty($_SESSION['cart']['products']) && isset($_SESSION['cart']['products'])){

    createOrder();
}
