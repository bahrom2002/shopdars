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

if (isset($_POST['firstname']) && isset($_POST['lastname'])
    && isset($_POST['username']) && isset($_POST['phone'])
    && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['gender'])){

     $data = [
         'firstname' => $_POST['firstname'],
         'lastname' => $_POST['lastname'],
         'username' => $_POST['username'],
         'phone' => $_POST['phone'],
         'email' => $_POST['email'],
         'password' => md5(md5($_POST['password'])),
         'gender' => $_POST['gender'],
     ];

     addUser($data);


}

?>
    <!-- Section-->
<section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
        <h1>Foydalanuvchilar</h1>
        <form action="add-user.php" method="post">
            <div class="mb-3">
                <label for="firstname" class="form-label">Ismi</label>
                <input name="firstname" type="text" class="form-control" id="firstname" placeholder="Ismi">
            </div>

            <div class="mb-3">
                <label for="lastname" class="form-label"> Familiyasi</label>
                <input name="lastname" type="text" class="form-control" id="lastname" placeholder="Familiyasi">
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Login</label>
                <input name="username" type="text" class="form-control" id="username" placeholder="Login">
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label"> Telefon raqami</label>
                <input name="phone" type="text" class="form-control" id="phone" placeholder="Telefon raqami">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input name="email" type="text" class="form-control" id="email" placeholder="Email address">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label"> Parol</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="Parol">
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">gender</label>
                <select class="form-control" name="gender">
                    <option value="1">erkak</option>
                    <option value="0">ayol</option>
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

