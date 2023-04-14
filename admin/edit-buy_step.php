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
<?php include ('functions.php'); ?>

<?php
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $get_buy_step_sql = "SELECT * FROM buy_step WHERE id = {$id}";
    $get_buy_step = $conn->query($get_buy_step_sql);
    $get_buy_step = $get_buy_step->fetch_assoc();
}


if (isset($_POST['id']) && isset($_POST['name']) && isset($_FILES['image']) && isset($_POST['level'])
    && isset($_POST['description'])){

    $data = [
         'id' =>  $_POST['id'],
        'name' => $_POST['name'],
        'level' => $_POST['level'],
        'description' => $_POST['description'],
    ];



}
?>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h1>Buy stepni yangilash</h1>
        <form action="edit-buy_step.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="hidden" name="id" value="<?= isset($get_buy_step['id']) ? $get_buy_step['id'] : ''  ?>">
                <label for="name" class="form-label">Buy step nomi</label>
                <input name="name" value="<?= isset($get_buy_step['name']) ? $get_buy_step['name'] : ''  ?>"
                       type="text" class="form-control" id="name" placeholder="Buy step nomi">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label"> Rasm</label>
                <input name="image" value="<?= isset($get_buy_step['image']) ? $get_buy_step['image'] : ''?>"
                       type="file" class="form-control" id="image" placeholder="Rasm">
            </div>
            <div class="mb-3">
                <label for="level" class="form-label"> Leveli</label>
                <input name="level" value="<?= isset($get_buy_step['level']) ? $get_buy_step['level'] : '' ?>"
                       type="text" class="form-control" id="level" placeholder="Buy step leveli">
            </div>

            <div class="mb-3">
                <label for="description">Buy step haqida</label>

                <textarea id="" name="description" value="<?= isset($get_buy_step['description']) ? $get_buy_step['description'] : '' ?>"
                          class="form-control" rows="4" cols="50"><?= isset($get_buy_step['description']) ? $get_buy_step['description'] : '' ?></textarea>
            </div>

            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Saqlash">
            </div>
        </form>
    </div>
</section>
<!-- Footer-->
<?php require ('sections/footer.php'); ?>




