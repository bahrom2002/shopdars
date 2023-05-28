
<header id="header" class="navbar navbar-expand-lg navbar-end navbar-light">
    <!-- Topbar -->
    <?php require "sections/menu.php";?>
    <!-- End Topbar -->

    <div class="container">
        <nav class="js-mega-menu navbar-nav-wrap">
            <!-- Default Logo -->
            <a class="navbar-brand" href="index.php" aria-label="Front">
                <img class="navbar-brand-logo" src="assets/svg/logos/logo.svg" alt="Logo">
            </a>
            <!-- End Default Logo -->

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-default">
            <i class="bi-list"></i>
          </span>
                <span class="navbar-toggler-toggled">
            <i class="bi-x"></i>
          </span>
            </button>
            <!-- End Toggler -->

            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>

                    <!-- Dropdown -->
                    <li class="hs-has-sub-menu nav-item">
                        <a id="listingsDropdown" class="hs-mega-menu-invoker nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Listings</a>
                        <div class="hs-sub-menu dropdown-menu" aria-labelledby="listingsDropdown" style="min-width: 14rem;">
                            <a class="dropdown-item " href="product.php">Listing</a>
                            <a class="dropdown-item " href="product.php">Listing (Grid)</a>
                        </div>
                    </li>
                    <!-- End Dropdown -->

                    <li class="nav-item">
                        <a class="nav-link " href="orders.php">Buyurtmalar</a>
                    </li>

                    <!-- Pages -->
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php" >Profil</a>

                        <!-- Mega Menu -->
                        <!-- End Mega Menu -->
                    </li>
                    <!-- End Pages -->

                    <li class="nav-item">
                        <!-- Search -->
                        <button class="btn btn-ghost-secondary btn-sm btn-icon" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarSearch" aria-controls="offcanvasNavbarSearch">
                            <i class="bi-search"></i>
                        </button>
                        <!-- End Search -->

                        <!-- Shopping Cart -->
                        <button type="button" class="btn btn-ghost-secondary btn-sm btn-icon" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarEmptyShoppingCart" aria-controls="offcanvasNavbarEmptyShoppingCart">
                            <i class="bi-basket"></i>
                        </button>
                        <a type="button" class="btn btn-primary" href="cart.php">
                        Cart<span class="badge badge-light" id="count-cart"><?= isset($_SESSION['cart']['count']) ? $_SESSION['cart']['count'] : ''?></span>
                        </a>
                        <!-- End Shopping Cart -->
                        <?php if (!isset($_SESSION['user'])): ?>
                        <a type="button" class="btn btn-primary" href="login.php">Login</a>
                        <?php else: ?>
                        <ul class="badge badge-light">
                            <li class="nav-item dropdown">
                        <a class="btn btn-primary btn-transition" id="navbarDropdown" href="profile.php" ><?= isset($_SESSION['user']['username']) ? $_SESSION['user']['username'] : '' ?></a>
                            </li>
                </ul>
                     <?php endif; ?>
                </li>

            </div>
            <!-- End Collapse -->
        </nav>
    </div>
</header>
