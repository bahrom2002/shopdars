
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
<?php // require ('sections/header.php'); ?>

<?php require('../dbmysql.php'); ?>

<?php
      $user = "SELECT * FROM user ORDER BY id DESC ";
      $users  = $conn->query($user);
      $users = $users->fetch_all(MYSQLI_ASSOC);
?>

<div class="py-5">
     <div class="container px-4 px-lg-5 mt-5">
         <a class="btn btn-success" href="add-user.php">Foydalanuvchi qo'shish</a>
          <h1>Foydalanuvchilar</h1>

         <table class="table">
               <thead>
                        <tr>
                            <td class="col">Id</td>
                            <td class="col">Ismi</td>
                            <td class="col">Familiyasi</td>
                            <td class="col">Login</td>
                            <td class="col">Telefon</td>
                            <td class="col">Email</td>
                            <td class="col">Parol</td>
                            <td class="col">Gender</td>
                            <td class="col">Kiritilgan vaqti</td>
                            <td class="col">Yangilangan vaqti</td>
                            <td class="col">Amallar</td>
                        </tr>
               </thead>
               <tbody>
                   <?php foreach ($users as $us): ?>
                        <tr>
                              <th><?= $us['id'];?></th>
                              <th><?= $us['firstname'];?></th>
                              <th><?= $us['lastname'];?></th>
                              <th><?= $us['username'];?></th>
                              <th><?= $us['phone'];?></th>
                              <th><?= $us['email'];?></th>
                              <th><?= $us['password'];?></th>
                              <th><?= $us['gender'];?></th>
                              <th><?= $us['created_at'];?></th>
                              <th><?= $us['updated_at'];?></th>

                              <th>
                                 <a href="edit-user.php?id=<?= $us['id'];?>" class = "btn btn-warning">O'zgartirish</a>
                                 <a href="delete-user.php?id=<?= $us['id'];?>" class = "btn btn-danger">O'chirish</a>
                              </th>
                        </tr>
                    <?php endforeach;?>
               </tbody>
         </table>
     </div>
</div>

<?php require ('sections/footer.php'); ?>
