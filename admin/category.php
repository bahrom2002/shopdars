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
       $category = "SELECT * FROM category ORDER BY id DESC ";
       $categoryes = $conn->query($category);
       $categoryes = $categoryes->fetch_all(MYSQLI_ASSOC);
?>
<div class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
         <a class="btn btn-success" href="add-category.php">Kategoriya qo'shish</a>
         <h1>Kategoriyalar ro'yxati</h1>

<table class="table">
                <thead>
                          <tr>
                              <td class="col">ID</td>
                              <td class="col">Nomi</td>
                              <td class="col">Ota kategoriya</td>
                              <td class="col">Amallar</td>

                          </tr>
                </thead>
                         <tbody>
                             <?php foreach ($categoryes as $cat):?>
                                <tr>
                                    <th><?= $cat['id']; ?></th>
                                    <th><?= $cat['name']; ?></th>
                                     <th><?= $cat['category_id']; ?></th>
                                   <td>
                                     <a href="edit-category.php?id=<?= $cat['id'];?>" class =  "btn btn-warning" >O'zgartirish</a>
                                     <a href="delete-category.php?id=<?= $cat['id'];?>" class =  "btn btn-danger" >O'chirish</a>
                                    </td>
                                </tr>
                                 <?php endforeach;?>
                         </tbody>
         </table>
     </div>
</div>
</div>
<?php require ('sections/footer.php');?>