<?php session_start();
if (!isset($_SESSION['user']['username'])){
    header('location: student.php');
}
?>

<?php require ('sections/head.php'); ?>

<!-- Navigation-->
<?php require('sections/menu.php'); ?>

<!-- Header-->
<?php // require ('sections/header.php'); ?>

<?php include ('../dbmysql.php'); ?>
<?php include ('functions.php'); ?>

<?php

if (isset($_POST['name']) && isset($_POST['price'])
    && isset($_POST['category_id']) && isset($_POST['instock'])
    && isset($_POST['description']))
{
    $data = [
    'name' => $_POST['name'],
    'price' => $_POST['price'],
    'category_id' => $_POST['category_id'],
    'instock' => $_POST['instock'],
    'description' => $_POST['description'],
    ];


  addProduct($data);
}

$cat_list = categoryList();
?>
<!-- Section-->
<section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
        <h1>Mahsulotlar qo'shish</h1>
        <form action="add-product.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label"> Mahsulot nomi</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Mahsulot nomi">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label"> Mahsulot rasmi</label>
                <input name="image" type="file" class="form-control" id="image" placeholder="Mahsulot rasmi">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label"> Mahsulot narxi</label>
                <input name="price" type="text" class="form-control" id="price" placeholder="Mahsulot narxi">
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label"> Kategoriyalar</label>
                <select class="form-select" name="category_id">
                    <?php  foreach ($cat_list as $cat):?>
                        <option value="<?= $cat['id']?>"><?= $cat['name']?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="mb-3">
                <label for="instock" class="form-label"> Mahsulot miqdori</label>
                <input name="instock" type="text" class="form-control" id="instock" placeholder="Mahsulot miqdori">
            </div>

            <div class="mb-3">
                <label for="description">Mahsulot haqida</label>

                <textarea id="" name="description" class="form-control" rows="4" cols="50"></textarea>
            </div>

            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Saqlash">
            </div>
        </form>
    </div>
</section>
<!-- Footer-->
<?php require ('sections/footer.php'); ?>



