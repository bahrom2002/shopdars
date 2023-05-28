<?php
session_start();
include('sections/head.php');
include('sections/header.php');
include('dbmysql.php');
include('functions.php');


$user_id = $_SESSION['user']['id'];

$orders = getOrders($user_id);



?>

    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">
        <main id="content" role="main" class="bg-light">
            <!-- Breadcrumb -->
            <div class="navbar-dark bg-dark" style="background-image: url(./assets/svg/components/wave-pattern-light.svg);">
                <div class="container content-space-1 content-space-b-lg-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="d-none d-lg-block">
                                <h1 class="h2 text-white">Personal info</h1>
                            </div>

                            <!-- Breadcrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-light mb-0">
                                    <li class="breadcrumb-item">Account</li>
                                    <li class="breadcrumb-item active" aria-current="page">Personal Info</li>
                                </ol>
                            </nav>
                            <!-- End Breadcrumb -->
                        </div>
                        <!-- End Col -->

                        <div class="col-auto">
                            <div class="d-none d-lg-block">
                                <a class="btn btn-soft-light btn-sm" href="#">Log out</a>
                            </div>

                            <!-- Responsive Toggle Button -->
                            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarNav" aria-controls="sidebarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-default">
                <i class="bi-list"></i>
              </span>
                                <span class="navbar-toggler-toggled">
                <i class="bi-x"></i>
              </span>
                            </button>
                            <!-- End Responsive Toggle Button -->
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
            </div>
            <!-- End Breadcrumb -->

            <!-- Content Section -->
            <div class="container content-space-1 content-space-t-lg-0 content-space-b-lg-2 mt-lg-n10">
                <div class="row">
                    <div class="col-lg-3">
                        <!-- Navbar -->
                        <div class="navbar-expand-lg navbar-light">
                            <div id="sidebarNav" class="collapse navbar-collapse navbar-vertical">
                                <!-- Card -->
                                <div class="card flex-grow-1 mb-5">
                                    <div class="card-body">
                                        <!-- Avatar -->
                                        <div class="d-none d-lg-block text-center mb-5">
                                            <div class="avatar avatar-xxl avatar-circle mb-3">
                                                <img class="avatar-img" src="./assets/img/160x160/img9.jpg" alt="Image Description">
                                                <img class="avatar-status avatar-lg-status" src="./assets/svg/illustrations/top-vendor.svg" alt="Image Description" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Verified user" aria-label="Verified user">
                                            </div>

                                            <h4 class="card-title mb-0">Natalie Curtis</h4>
                                            <p class="card-text small">natalie@example.com</p>
                                        </div>
                                        <!-- End Avatar -->

                                        <!-- Nav -->
                                        <span class="text-cap">Account</span>

                                        <!-- List -->
                                        <ul class="nav nav-sm nav-tabs nav-vertical mb-4">
                                            <li class="nav-item">
                                                <a class="nav-link " href="./account-overview.html">
                                                    <i class="bi-person-badge nav-icon"></i> Personal info
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " href="./account-security.html">
                                                    <i class="bi-shield-shaded nav-icon"></i> Security
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " href="./account-notifications.html">
                                                    <i class="bi-bell nav-icon"></i> Notifications
                                                    <span class="badge bg-soft-dark text-dark rounded-pill nav-link-badge">1</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " href="./account-preferences.html">
                                                    <i class="bi-sliders nav-icon"></i> Preferences
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- End List -->

                                        <span class="text-cap">Shopping</span>

                                        <!-- List -->
                                        <ul class="nav nav-sm nav-tabs nav-vertical mb-4">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="./account-orders.html">
                                                    <i class="bi-basket nav-icon"></i> Your orders
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " href="./account-wishlist.html">
                                                    <i class="bi-heart nav-icon"></i> Wishlist
                                                    <span class="badge bg-soft-dark text-dark rounded-pill nav-link-badge">2</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- End List -->

                                        <span class="text-cap">Billing</span>

                                        <!-- List -->
                                        <ul class="nav nav-sm nav-tabs nav-vertical">
                                            <li class="nav-item">
                                                <a class="nav-link " href="./account-payments.html">
                                                    <i class="bi-credit-card nav-icon"></i> Payments
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " href="./account-address.html">
                                                    <i class="bi-geo-alt nav-icon"></i> Address
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " href="./account-teams.html">
                                                    <i class="bi-people nav-icon"></i> Teams
                                                    <span class="badge bg-soft-dark text-dark rounded-pill nav-link-badge">+2 new users</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- End List -->

                                        <div class="d-lg-none">
                                            <div class="dropdown-divider"></div>

                                            <!-- List -->
                                            <ul class="nav nav-sm nav-tabs nav-vertical">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">
                                                        <i class="bi-box-arrow-right nav-icon"></i> Log out
                                                    </a>
                                                </li>
                                            </ul>
                                            <!-- End List -->
                                        </div>
                                        <!-- End Nav -->
                                    </div>
                                </div>
                                <!-- End Card -->
                            </div>
                        </div>
                        <!-- End Navbar -->
                    </div>
                    <!-- End Col -->

                    <div class="col-lg-9">
                        <!-- Card -->
                        <div class="card">
                            <!-- Header -->
                            <div class="card-header border-bottom">
                                <form class="input-group input-group-merge">
                                    <div class="input-group-prepend input-group-text">
                                        <i class="bi-search"></i>
                                    </div>
                                    <input type="search" class="form-control" placeholder="Search orders" aria-label="Search orders">
                                </form>
                            </div>
                            <!-- End Header -->

                            <!-- Body -->
                            <div class="card-body">
                                <!-- Nav Scroller -->
                                <div class="js-nav-scroller hs-nav-scroller-horizontal">
                <span class="hs-nav-scroller-arrow-prev" style="display: none;">
                  <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                    <i class="bi-chevron-left"></i>
                  </a>
                </span>

                                    <span class="hs-nav-scroller-arrow-next" style="display: none;">
                  <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                    <i class="bi-chevron-right"></i>
                  </a>
                </span>

                                    <!-- Nav -->
                                    <ul class="nav nav-segment nav-fill mb-7" id="featuresTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" href="#accountOrdersOne" id="accountOrdersOne-tab" data-bs-toggle="tab" data-bs-target="#accountOrdersOne" role="tab" aria-controls="accountOrdersOne" aria-selected="true">Orders</a>
                                        </li>

                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" href="#accountOrdersTwo" id="accountOrdersTwo-tab" data-bs-toggle="tab" data-bs-target="#accountOrdersTwo" role="tab" aria-controls="accountOrdersTwo" aria-selected="false">Open Orders</a>
                                        </li>

                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" href="#accountOrdersThree" id="accountOrdersThree-tab" data-bs-toggle="tab" data-bs-target="#accountOrdersThree" role="tab" aria-controls="accountOrdersThree" aria-selected="false">Canceled Orders</a>
                                        </li>
                                    </ul>
                                    <!-- End Nav -->
                                </div>
                                <!-- End Nav Scroller -->

                                <?php if (!empty($orders)):?>
                                    <!-- Table -->
                                    <table class="table">
                                        <thead class="thead-light">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Buyurtma qilingan vaqti</th>
                                            <th scope="col">Yetkazilish vaqti</th>
                                            <th scope="col">Yetkazilgan vaqti</th>
                                            <th scope="col">Holati</th>
                                            <th scope="col">Amallar</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($orders as $order): ?>
                                            <tr>
                                            <th scope="row"><?= isset($order['id']) ? $order['id'] : '' ?></th>
                                            <td><?= isset($order['order_date']) ? $order['order_date'] : '' ?></td>
                                            <td><?= isset($order['required_date']) ? $order['required_date'] : '' ?></td>
                                            <td><?= isset($order['shipped_date']) ? $order['shipped_date'] : '<span class="badge bg-warning">Yetkazilmagan</span>' ?></td>
                                            <td>
                                                <?php
                                                    switch ($order['status']){
                                                        case 0:
                                                            echo '<span class="badge bg-info">Buyurtma qabul qilindi</span>';
                                                            break;
                                                        case 1:
                                                            echo '<span class="badge bg-warning">Jarayonda</span>';
                                                            break;
                                                        case 2:
                                                            echo '<span class="badge bg-success">Yetkazilgan</span>';
                                                            break;
                                                    }
                                                ?>
                                            </td>
                                            <td><a href="order-detail.php?id=<?= isset($order['id']) ? $order['id'] : '' ?>" class="btn btn-link">Batafsil</a></td>

                                        </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <!-- End Table -->
                                <?php else:?>
                                    <h3 class="text-center">Siz hali hech narsa buyrtma qilmadingiz!</h3>
                                    <a href="index.php" class="btn btn-primary d-block">Buyurtma qilish</a>
                                <?php endif;?>


                            </div>
                            <!-- End Body -->
                        </div>
                        <!-- End Card -->
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
            <!-- End Content Section -->
        </main>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

<?php include('sections/footer.php'); ?>