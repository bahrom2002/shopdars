<?php session_start(); ?>

<?php require ('sections/head.php'); ?>

<?php require ('../dbmysql.php');?>

<?php
if (isset($_SESSION['user']['username'])){
    header('location: index.php');

}if (isset($_POST['login']) && $_POST['login'] != '' && isset($_POST['password']) && $_POST['password'] != ''){
    $login = $_POST['login'];
    $password = md5(md5($_POST['password']));
    $login_sql = "SELECT * FROM user WHERE username = '$login' AND password = '$password' AND type = 'admin'";
    $result = $conn->query($login_sql);
    $user = $result->fetch_assoc();

    if (!is_null($user)){
        $_SESSION['user']['username'] = $login;
        $_SESSION['user']['id'] = $user['id'];

        header('location: index.php');
    }else{
        $error = 'Sizga bu joyga kirishga ruxsat berilmagan';
    }
}
?>

<div class="container mt-5">
    <div class="row">
        <div class="offset-3 col-6">
            <?php if (isset($error) && $error != ''):?>
                <div class="alert alert-danger" role="alert">
                    <?= $error; ?>
                </div>
            <?php endif;?>
                <form action="login.php" method="post">
                    <div class="form-group">
                        <label for="inputLogin">Login</label>
                        <input type="text" name="login" class="form-control" id="inputLogin" placeholder="Login">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">Password</label>
                            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Parol">
                        </div>
                        <div class="form-group">
                            <label class="form-check-label"><input type="checkbox">Eslab qol</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirish</button>
                </form>
        </div>
    </div>
</div>