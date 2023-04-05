<?php session_start();
if (!isset($_SESSION['user']['username'])){
    header('location: login.php');
}
?>

<?php require ('sections/head.php'); ?>

<!-- Navigation-->
<?php require('sections/menu.php'); ?>

<?php include ('../dbmysql.php'); ?>

<?php

if (isset($_POST['name']) && isset($_POST['price'])
    && isset($_FILES['image']) && isset($_POST['level'])
    && isset($_POST['description'])) {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $level = $_POST['level'];
    $description = $_POST['description'];


    $folder = "../slides/";
    $target_file = $folder . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $image_name = 'slides/' . basename($_FILES["image"]["name"]);


        $insert_sql = "INSERT INTO slide (name,price,image, level, description) 
                               VALUES ('$name', $price,'$image_name', $level,'$description')";

    }else{
        $insert_sql = "INSERT INTO slide (name,price, level, description) 
                               VALUES ('$name', $price, $level,'$description')";
    }

    if ($conn->query($insert_sql)) {
        header("Location: slide.php");

    }
}
?>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h1>Slidelar qo'shish</h1>
        <form action="add-slide.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label"> Slide nomi</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="slide nomi">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label"> Slide rasmi</label>
                <input name="image" type="file" class="form-control" id="image" placeholder="Slide rasmi">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label"> Slide narxi</label>
                <input name="price" type="text" class="form-control" id="price" placeholder="Slide narxi">
            </div>
            <div class="mb-3">
                <label for="level" class="form-label"> Slide tartibi</label>
                <input name="level" type="number" class="form-control" id="level" placeholder="Slide tartibi">
            </div>

            <div class="mb-3">
                <label for="description">Slide haqida</label>

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




