
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

<?php require('../dbmysql.php'); ?>
<?php
$partner = "SELECT * FROM partners ORDER BY level DESC ";
$partners = $conn->query($partner);
$partners = $partners->fetch_all(MYSQLI_ASSOC);
?>
<div class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <a class="btn btn-success" href="add-partners.php">Hamkorlar qo'shish</a>
        <h1>Hamkorlar ro'yxati</h1>

        <table class="table">
            <thead>
            <tr>
                <td class="col">ID</td>
                <td class="col">Logosi</td>
                <td class="col">Level</td>
                <td class="col">Amallar</td>

            </tr>
            </thead>
            <tbody>
            <?php foreach ($partners as $part):?>
                <tr>
                    <th><?= $part['id']; ?></th>
                    <th><img src="../<?= $part['image'];?>" width="150"></th>
                    <th><?= $part['level']; ?></th>
                    <td>
                        <a href="edit-partners.php?id=<?= $part['id'];?>" class =  "btn btn-warning" >O'zgartirish</a>
                        <a href="delete-partners.php?id=<?= $part['id'];?>" class =  "btn btn-danger" >O'chirish</a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
</div>
<?php require ('sections/footer.php');?>