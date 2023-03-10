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

<?php include ('../dbmysql.php'); ?>

<?php

if (isset($_FILES['image']) && isset($_POST['level'])) {

    $level = $_POST['level'];

    $folder = "../partners/";
    $target_file = $folder . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $image_name = 'partners/' . basename($_FILES["image"]["name"]);


        $insert_sql = "INSERT INTO partners (image,level)  VALUES ('$image_name',$level)";

    }

    if ($conn->query($insert_sql)) {
        header("Location: partners.php");


    }
}
?>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h1>Hamkorlar qo'shish</h1>
        <form action="add-partners.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="image" class="form-label"> Hamkorlar logosi</label>
                <input name="image" type="file" class="form-control" id="image" placeholder="Hamkorlar logosi">
            </div>
            <div class="mb-3">
                <label for="level" class="form-label"> Level</label>
                <input name="level" type="text" class="form-control" id="level" placeholder="Level">
            </div>

            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Saqlash">
            </div>
        </form>
    </div>
</section>
<!-- Footer-->
<?php require ('sections/footer.php'); ?>




