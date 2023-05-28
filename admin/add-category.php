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

<?php  include('../dbmysql.php'); ?>
<?php  include('functions.php'); ?>

    <?php

        if (isset($_POST['name']) && isset($_POST['category_id'])) {

            $name = $_POST['name'];
            if ($_POST['category_id'] != '') {
                $category_id = $_POST['category_id'];
                addCategory($name, $category_id);

            }else{
                addCategory($name);
            }

        }

           $cat_list = categoryList();
?>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
            <h1>Kategoriya qo'shish</h1>
                <form action="add-category.php" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label"> Kategoriya nomi</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Kategoriya nomi">
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label"> Kategoriyalar</label>
                            <select class="form-select" name="category_id">

                                <option value="">Kategoriyalarni tanlang</option>

                                <?php  foreach ($cat_list as $cat):?>
                                      <option value="<?= $cat['id']?>"><?= $cat['name']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" value="Saqlash">
                        </div>
                </form>
    </div>
</section>
<!-- Footer-->
<?php require ('sections/footer.php'); ?>

