<?php session_start();
     if (!isset($_SESSION['user']['username'])){
           header('location: login.php');
}
?>

<!-- Navigation-->
<?php require('sections/menu.php');?>

<?php require ('sections/head.php');?>

<!-- Header-->
<?php require ('sections/header.php');?>

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
    <h1>Biz haqimizda</h1>
        <p>Lorem ipsum dolor sit amet.At beatae cupiditate delectus eveniet, fuga fugiat, illo illum inventore iste necessitatibus nostrum quis sit ut! Aperiam consequatur libero qui repellendus vero!</p>
        <p>Tel : +998978472607 <br> T.me/Bahrom_Qudratov</p>
    </div>
</section>

<!-- Footer-->
<?php require ('sections/footer.php'); ?>
