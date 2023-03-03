<?php session_start();
if (!isset($_SESSION['user']['username'])){
    header('location: login.php');
}
?>
<?php require ('sections/head.php'); ?>

<!-- Navigation-->
<?php require('sections/menu.php'); ?>

<!-- Header-->
<?php // require ('sections/header.php'); ?>

<?php  include('../dbmysql.php'); ?>

    <?php

        if (isset($_POST['name']) && isset($_POST['category_id'])) {

            $name = $_POST['name'];
            if ($_POST['category_id'] != '') {
                $category_id = $_POST['category_id'];
                $insert_sql = "INSERT INTO category (name, category_id) VALUES ('$name', $category_id)";

            }else{
                $insert_sql = "INSERT INTO category (name) VALUES ('$name')";
            }
            if ($conn->query($insert_sql)) {
                header( "Location: select-category.php");
            }
        }

            $cat_list = "SELECT * FROM category";
            $cat_list = $conn->query($cat_list);
            $cat_list = $cat_list->fetch_all(MYSQLI_ASSOC);
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

