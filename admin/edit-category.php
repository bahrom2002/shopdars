
<?php session_start(); ?>
<?php require ('sections/head.php'); ?>

<!-- Navigation-->
<?php require('sections/menu.php'); ?>

<!-- Header-->
<?php // require ('sections/header.php'); ?>

<?php include ('../dbmysql.php'); ?>
<?php include ('functions.php'); ?>

<?php

if (!isset($_SESSION['user']['username'])) {
    header('location: student.php');
}

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $edit_sql = "SELECT * FROM category WHERE id = {$id}";
    $cat_edit = $conn->query($edit_sql);
    $cat_update = $cat_edit->fetch_assoc();

}

if ( isset($_POST['id']) && isset($_POST['name']) && isset($_POST['category_id'])) {

    $name = $_POST['name'];
    $id = $_POST['id'];
    if ($_POST['category_id'] != '') {
        $category_id = $_POST['category_id'];
        editCategory($id, $name, $category_id);

    } else {
        editCategory($id, $name);
    }
}
         $cat_list = categoryList();
?>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <h1>Kategoriyani o'zgartirish</h1>
        <div class="container">
            <form action="edit-category.php" method="post">
                <div class="mb-3">
                    <input type="hidden" name="id" value="<?= $cat_update['id'] ?>">
                    <label for="name" class="form-label"> Kategoriya nomi</label>
                    <input name="name" type="text" value="<?= $cat_update['name'] ;?>" class="form-control" id="name" placeholder="Kategoriya nomi">
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label"> Kategoriyalar</label>
                    <select class="form-select" name="category_id">

                        <option value="">Kategoriyalarni tanlang</option>
                        <?php foreach ($cat_list as $cat):?>
                        <?php if ($cat_update['category_id'] == $cat['id']): ?>
                            <option selected value="<?= $cat['id']?>"><?= $cat['name']?></option>
                            <?php else:?>
                            <option value="<?= $cat['id']?>"><?= $cat['name']?></option>
                            <?php endif; ?>
                        <?php endforeach;?>
                    </select>
                </div>

                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Saqlash">
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Footer-->
<?php  require ('sections/footer.php'); ?>
