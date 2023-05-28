<?php session_start();
if (!isset($_SESSION['user']['username'])){
    header('location: student.php');
}
?>

<?php require ('sections/head.php'); ?>


<?php require('sections/menu.php'); ?>


<?php include ('../dbmysql.php'); ?>
<?php include ('functions.php'); ?>

<?php

if (isset($_POST['name']) && isset($_FILES['image']) && isset($_POST['level'])
    && isset($_POST['description'])) {

    $data = [
    'name' => $_POST['name'],
    'level' => $_POST['level'],
    'description' => $_POST['description'],
    ];


   addBuystep($data);

}
?>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h1>Buy Step qo'shish</h1>
        <form action="add-buy_step.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label"> Buy Step nomi</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Buy Step nomi">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label"> Buy Step rasmi</label>
                <input name="image" type="file" class="form-control" id="image" placeholder="Buy Step rasmi">
            </div>
            <div class="mb-3">
                <label for="level" class="form-label"> Buy Step leveli</label>
                <input name="level" type="text" class="form-control" id="level" placeholder="Buy Step tartibi">
            </div>

            <div class="mb-3">
                <label for="description">Buy Step haqida</label>

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