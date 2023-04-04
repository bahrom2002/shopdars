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
      $slides = getSlide();
?>
    <div class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <a class="btn btn-success" href="add-slide.php">Slide qo'shish</a>
            <h1>Slide ro'yxati</h1>
<table class="table">
      <thead>
                <tr>
                    <td class="col">ID</td>
                    <td class="col">Nomi</td>
                    <td class="col">Narxi</td>
                    <td class="col">Malumoti</td>
                    <td class="col">Rasmi</td>
                    <td class="col">Tartibi</td>
                    <td class="col">Amallar</td>

                </tr>
      </thead>
<tbody>
            <?php foreach ($slides as $slide):?>
                    <tr>
                        <th><?= $slide['id']; ?></th>
                        <th><?= $slide['name']; ?></th>
                        <th><?= $slide['price']; ?></th>
                        <th><?= $slide['description'];?></th>
                        <th><img src="../<?= $slide['image'];?>" alt="" width="150"></th>
                        <th><?= $slide['level'];?></th>


                        <td>
                            <a href="edit-slide.php?id=<?= $slide['id'];?>" class="btn btn-warning">O'zgartirish</a>
                            <a href="delete-slide.php?id=<?= $slide['id'];?>" class="btn btn-danger" >O'chirish</a>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>

<?php require ('sections/footer.php');?>
