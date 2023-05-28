<?php session_start();
if (!isset($_SESSION['user']['username'])){
    header('location: student.php');
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
$follower = "SELECT * FROM follower ORDER BY id DESC ";
$followers = $conn->query($follower);
$followers = $followers->fetch_all(MYSQLI_ASSOC);
?>
<div class="py-5">
    <div class="container px-4 px-lg-5 mt-5">

        <h1>Followerlarning emaili</h1>
        <table class="table">
            <thead>
            <tr>
                <td class="col">ID</td>
                <td class="col">Emaili</td>
            </tr>
            </thead>
         <tbody>
            <?php foreach ($followers as $follower):?>
            <tr>
                <th><?= $follower['id']; ?></th>
                <th><?= $follower['email']; ?></th>
            </tr>
            <?php endforeach;?>
         </tbody>
        </table>
    </div>
</div>

<?php require ('sections/footer.php');?>