<?php
session_start();
if (!isset($_SESSION['user']['id'])){
    redirect('login');
}
include('sections/head.php');
include('sections/header.php');
include('dbmysql.php');
include('functions.php');

$user_id = $_SESSION['user']['id'];
$orders = getOrders($user_id);


if (isset($_POST['submit'])){

    $folder = "avatar";
    $folder_file = $folder . basename($_FILES["image"]["name"]);
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $folder_file)){
        $image_name = 'avatar' . basename($_FILES["image"]["name"]);
        $data['image'] = $image_name;
    }



    $data['id'] = $user_id;
    $data['firstname'] = $_POST['firstname'];
    $data['lastname'] = $_POST['lastname'];
    $data['phone'] = $_POST['phone'];
    $data['email'] = $_POST['email'];
    $data['gender'] = $_POST['gender'];

    updateUser($data);
}
$userdata = getUser($user_id);
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
                                <h1 class="h2 text-white">Profil haqida</h1>
                            </div>

                            <!-- Breadcrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-light mb-0">
                                    <li class="breadcrumb-item">Account</li>
                                    <li class="breadcrumb-item active" aria-current="page">Profil haqida</li>
                                </ol>
                            </nav>
                            <!-- End Breadcrumb -->
                        </div>
                        <!-- End Col -->

                        <div class="col-auto">
                            <div class="d-none d-lg-block">
                                <a class="btn btn-soft-light btn-sm" href="logout.php">Chiqish</a>
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
                                                <img class="avatar-img" src="<?= isset($userdata['image']) ? $userdata['image'] : 'assets/img/160x160/img1.jpg' ?>" alt="Image Description">
                                                <img class="avatar-status avatar-lg-status" src="./assets/svg/illustrations/top-vendor.svg" alt="Image Description" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Verified user" aria-label="Verified user">
                                            </div>

                                            <h4 class="card-title mb-0"><?= $userdata['firstname'] . '' . $userdata['lastname']?></h4>
                                            <p class="card-text small"><?= $userdata['email']?></p>
                                        </div>
                                        <!-- End Avatar -->

                                        <!-- Nav -->
                                        <span class="text-cap">Account</span>

                                        <!-- List -->
                                        <ul class="nav nav-sm nav-tabs nav-vertical mb-4">
                                            <li class="nav-item">
                                                <a class="nav-link  active" href="./account-overview.html">
                                                    <i class="bi-person-badge nav-icon"></i> Profil haqida
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " href="accaunt.php">
                                                    <i class="bi-shield-shaded nav-icon"></i> Parolni almashtirish
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
                                                <a class="nav-link" href="orders.php">
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
                                                    <a class="nav-link" href="logout.php">
                                                        <i class="bi-box-arrow-right nav-icon"></i> Chiqish
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
                        <div class="d-grid gap-3 gap-lg-5">
                            <!-- Card -->
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-header-title">Men haqimda</h4>
                                </div>

                                <!-- Body -->
                                <div class="card-body">
                                    <form method="post" action="profile.php" enctype="multipart/form-data" ">
                                    <!-- Form -->
                                    <div class="row mb-4">
                                        <label class="col-sm-3 col-form-label form-label">Profile rasmi</label>

                                        <div class="col-sm-9">
                                            <!-- Media -->
                                            <div class="d-flex align-items-center">
                                                <!-- Avatar -->
                                                <label class="avatar avatar-xl avatar-circle" for="avatarUploader">
                                                    <img id="avatarImg" class="avatar-img" src=" <?= isset($userdata['image']) ? $userdata['image'] : 'assets/img/160x160/img1.jpg' ?>" alt="Image Description">
                                                </label>

                                                <div class="d-grid d-sm-flex gap-2 ms-4">
                                                    <div class="form-attachment-btn btn btn-primary btn-sm">Rasm Qushish
                                                        <input type="file" name="image" class="js-file-attach form-attachment-btn-label" id="avatarUploader" >
                                                    </div>
                                                    <!-- End Avatar -->

                                                    <button type="button" class="js-file-attach-reset-img btn btn-white btn-sm">O'chirish</button>
                                                </div>
                                            </div>
                                            <!-- End Media -->
                                        </div>
                                    </div>
                                    <!-- End Form -->

                                    <!-- Form -->
                                    <div class="row mb-4">
                                        <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">Ism familiya <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Displayed on public forums, such as Front." aria-label="Displayed on public forums, such as Front."></i></label>

                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="firstname" id="firstNameLabel" placeholder="ism" aria-label="Clarice" value="<?= $userdata['firstname']?>">
                                                <input type="text" class="form-control" name="lastname" id="lastNameLabel" placeholder="familiya" aria-label="Boone" value="<?= $userdata['lastname']?>">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Form -->

                                    <!-- Form -->
                                    <div class="row mb-4">
                                        <label for="emailLabel" class="col-sm-3 col-form-label form-label">Email</label>

                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" name="email" id="emailLabel" placeholder="clarice@example.com" aria-label="clarice@example.com" value="<?= $userdata['email']?>">
                                        </div>
                                    </div>
                                    <!-- End Form -->

                                    <!-- Form -->
                                    <div class="js-add-field row mb-4" data-hs-add-field-options="{
                          &quot;template&quot;: &quot;#addPhoneFieldTemplate&quot;,
                          &quot;container&quot;: &quot;#addPhoneFieldContainer&quot;,
                          &quot;defaultCreated&quot;: 0
                        }">
                                        <label for="phoneLabel" class="col-sm-3 col-form-label form-label">Raqam <span class="form-label-secondary">(Optional)</span></label>

                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="text" class="js-input-mask form-control" name="phone" id="phoneLabel" placeholder="+x(xxx)xxx-xx-xx" aria-label="+x(xxx)xxx-xx-xx" value="<?= $userdata['phone']?>" data-hs-mask-options="{
                                 &quot;mask&quot;: &quot;+{0}(000)000-00-00&quot;
                               }">


                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Form -->


                                    <!-- Form -->
                                    <div class="row mb-4">
                                        <label class="col-sm-3 col-form-label form-label">Jinsi</label>

                                        <div class="col-sm-9">
                                            <div class="input-group input-group-md-down-break">
                                                <!-- Radio Check -->
                                                <label class="form-control" for="genderTypeRadio1">
                          <span class="form-check">
                            <input type="radio" class="form-check-input" name="gender" value="1" id="genderTypeRadio1" <?= $userdata['gender'] == 1 ? "checked":'';?>>
                            <span class="form-check-label">Erkak</span>
                          </span>
                                                </label>
                                                <!-- End Radio Check -->

                                                <!-- Radio Check -->
                                                <label class="form-control" for="genderTypeRadio2">
                          <span class="form-check">
                            <input type="radio" class="form-check-input" name="gender" value="2" id="genderTypeRadio" <?= $userdata['gender'] == 2 ? "checked":'';?>>
                            <span class="form-check-label">Ayol</span>
                          </span>
                                                </label>
                                                <!-- End Radio Check -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Form -->
                                    <div class="card-footer pt-0">
                                        <div class="d-flex justify-content-end ">
                                            <input type="submit" name="submit" class="btn btn-primary" value="Saqlash" ></input>
                                        </div>
                                    </div>
                                    <!-- End Footer -->
                                </div>
                                </form>
                            </div>
                            <!-- End Body -->

                            <!-- Footer -->

                            <!-- End Card -->


                        </div>
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