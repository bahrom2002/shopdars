<?php session_start();
if (!isset($_SESSION['user']['username'])){
    header('location: login.php');
}
?>
<?php

require ('sections/head.php'); ?>

<!-- Navigation-->
<?php require('sections/menu.php'); ?>

<!-- Header-->
<?php //require ('sections/header.php'); ?>

<?php require('../dbmysql.php');
require ('../functions.php')
?>
<?php
$buy_steps = getBuyStep();
?>
<div class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <a class="btn btn-success" href="add-buy_step.php">Buy Step qo'shish</a>
        <h1>Buy Step ro'yxati</h1>
        <table class="table">
            <thead>
            <tr>
                <td class="col">ID</td>
                <td class="col">Nomi</td>
                <td class="col">Malumoti</td>
                <td class="col">Rasmi</td>
                <td class="col">Tartibi</td>
                <td class="col">Amallar</td>

            </tr>
            </thead>
            <tbody>
            <?php foreach ($buy_steps as $buy_step):?>
                <tr>
                    <th><?= $buy_step['id']; ?></th>
                    <th><?= $buy_step['name']; ?></th>
                    <th><?= $buy_step['description'];?></th>
                    <th><img src="../<?= $buy_step['image'];?>" alt="" width="150"></th>
                    <th><?= $buy_step['level'];?></th>


                    <td>
                        <a href="edit-buy_step.php?id=<?= $buy_step['id'];?>" class="btn btn-warning">O'zgartirish</a>
                        <a href="delete-buy_step.php?id=<?= $buy_step['id'];?>" class="btn btn-danger" >O'chirish</a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>

<?php require ('sections/footer.php');?>

