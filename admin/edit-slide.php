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
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $get_slide_sql = "SELECT * FROM slide WHERE id = {$id}";
    $get_slide = $conn->query($get_slide_sql);
    $get_slide = $get_slide->fetch_assoc();
}


if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price'])
    && isset($_FILES['image']) && isset($_POST['level'])
    && isset($_POST['description'])){

    $data = [
        'id' =>  $_POST['id'],
        'name' => $_POST['name'],
        'price' => $_POST['price'],
        'level' => $_POST['level'],
        'description' => $_POST['description'],
    ];


       editSlide($data);
}
?>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h1>Slidelarni yangilash</h1>
        <form action="edit-slide.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="hidden" name="id" value="<?= isset($get_slide['id']) ? $get_slide['id'] : ''  ?>">
                <label for="name" class="form-label"> Slide nomi</label>
                <input name="name" value="<?= isset($get_slide['name']) ? $get_slide['name'] : ''  ?>"
                       type="text" class="form-control" id="name" placeholder="Slide nomi">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label"> Rasm</label>
                <input name="image" value="<?= isset($get_slide['image']) ? $get_slide['image'] : ''?>"
                       type="file" class="form-control" id="image" placeholder="Rasm">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label"> Mahsulot narxi</label>
                <input name="price" value="<?= isset($get_slide['price']) ? $get_slide['price'] : ''?>"
                           type="text" class="form-control" id="price" placeholder="Mahsulot narxi">
            </div>
            <div class="mb-3">
                <label for="level" class="form-label"> Tartibi</label>
                <input name="level" value="<?= isset($get_slide['level']) ? $get_slide['level'] : '' ?>"
                       type="text" class="form-control" id="level" placeholder="Mahsulot tartibi">
            </div>

            <div class="mb-3">
                <label for="description">Mahsulot haqida</label>

                <textarea id="" name="description" value="<?= isset($get_slide['description']) ? $get_slide['description'] : '' ?>"
                          class="form-control" rows="4" cols="50"><?= isset($get_slide['description']) ? $get_slide['description'] : '' ?></textarea>
            </div>

            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Saqlash">
            </div>
        </form>
    </div>
</section>
<!-- Footer-->
<?php require ('sections/footer.php'); ?>




