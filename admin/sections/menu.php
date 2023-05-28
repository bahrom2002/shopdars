<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="index.php">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="orders.php">Buyurtmalar</a></li>
                <li class="nav-item"><a class="nav-link" href="buy_step.php">Buy_Step</a></li>
                <li class="nav-item"><a class="nav-link" href="product.php">Productlar</a></li>
                <li class="nav-item"><a class="nav-link" href="category.php">Kategoriyalar</a></li>
                <li class="nav-item"><a class="nav-link" href="user.php">Foydalanuvchilar</a></li>
                <li class="nav-item"><a class="nav-link" href="slide.php">Slidelar</a></li>
                <li class="nav-item"><a class="nav-link" href="partners.php">Hamkorlar</a></li>
                <li class="nav-item"><a class="nav-link" href="follower.php">Obunachilar</a></li>
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= $_SESSION['user']['username'] ?></a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Kabinet</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Chiqish</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
