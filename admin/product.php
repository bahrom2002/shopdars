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
       $product = "SELECT * FROM product ORDER BY id DESC ";
       $products = $conn->query($product);
       $products = $products->fetch_all(MYSQLI_ASSOC);
?>
    <div class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <a class="btn btn-success" href="add-product.php">Produkt qo'shish</a>
            <h1>Productlar ro'yxati</h1>
<table class="table">
      <thead>
                <tr>
                    <td class="col">ID</td>
                    <td class="col">Nomi</td>
                    <td class="col">Narxi</td>
                    <td class="col">category_id</td>
                    <td class="col">Soni</td>
                    <td class="col">Malumoti</td>
                    <td class="col">Kiritilgan vaqti</td>
                    <td class="col">Yangilangan vaqti</td>
                    <td class="col">Amallar</td>

                </tr>
      </thead>
<tbody>
            <?php foreach ($products as $pro):?>
                    <tr>
                        <th><?= $pro['id']; ?></th>
                        <th><?= $pro['name']; ?></th>
                        <th><?= $pro['price']; ?></th>
                        <th><?= $pro['category_id']; ?></th>
                        <th><?= $pro['instock']; ?></th>
                        <th><?= $pro['description']; ?></th>
                        <th><?= $pro['created_at']; ?></th>
                        <th><?= $pro['updated_at']; ?></th>

                        <td>
                            <a href="edit-product.php?id=<?= $pro['id'];?>" class =  "btn btn-warning" >O'zgartirish</a>
                            <a href="delete-product.php?id=<?= $pro['id'];?>" class =  "btn btn-danger" >O'chirish</a>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>

<?php require ('sections/footer.php');?>