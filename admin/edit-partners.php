<?php session_start();
if (!isset($_SESSION['user']['username']) AND !isset($_SESSION['user']['id'])){
    header('Location: login.php');
}
?>
<?php require('sections/head.php'); ?>
<!-- Navigation-->
<?php //require('sections/menu.php'); ?>
<!-- Header-->
<?php //require('sections/header.php'); ?>
<?php require('../dbmysql.php'); ?>

<?php
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $partners_sql = "SELECT * FROM partners WHERE id = {$id}";
    $get_part = $conn->query($partners_sql);
    $get_part = $get_part->fetch_assoc();
}
?>


<?php
if (isset($_POST['id']) && isset($_FILES['image']) && isset($_POST['level'])){

    $id = $_POST['id'];
    $level = $_POST['level'];

    $cat_sql = '';
    $folder = "../partners/";
    $folder_file = $folder . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $folder_file)){
        $image_name = 'partners/' . basename($_FILES["image"]["name"]);
    }
    if ($image_name != ''){

        $update_sql = "UPDATE partners SET level = '$level', image = '$image_name' ".$cat_sql." WHERE id = $id";
    }
    else{
        $update_sql = "UPDATE partners SET level = '$level' ".$cat_sql." WHERE id = $id";
    }


    if ($conn->query($update_sql)){
        header('Location: partners.php');
    }

}

?>

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h1>Hamkorlarni yangilash</h1> <a href="partners.php" class="btn btn-success"></a>

        <form action="edit-partners.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="hidden" name="id" value="<?= isset($get_part['id']) ? $get_part['id'] : '' ?>">
                <label for="image" class="form-label">slide rasmi</label>
                <input name="image" type="file" value="<?= isset($get_part['image'] ) ? $get_part['image'] : NULL  ?>" class="form-control" id="image" placeholder="Hamkorlar rasmi"><br>
            </div>
            <div class="mb-3">
                <label for="level" class="form-label">level </label>
                <input name="level" type="number" value="<?= isset($get_part['level']) ? $get_part['level'] : ''  ?>" class="form-control" id="level" placeholder="level"><br>
            </div>

            <div class="mb-3" style="display:flex;justify-content: space-between">
                <input  type="submit" class="btn btn-outline-primary" value="O`ZGARTIRSH">
            </div>
        </form>
    </div>
</section>
<!-- Footer-->
<?php require('sections/footer.php');?>
