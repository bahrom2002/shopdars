<?php

$slides = getSlideName();
?>


<div class="position-relative">
    <!-- Swiper Main Slider -->
    <div class="js-swiper-shop-classic-hero swiper bg-light">
        <div class="swiper-wrapper">
            <?php foreach ($slides as  $slide): ?>
            <!-- Slide -->
            <div class="swiper-slide">
                <!-- Container -->
                <div class="container content-space-t-2 content-space-b-3">
                    <div class="row align-items-lg-center">
                        <div class="col-lg-5 order-lg-2 mb-7 mb-lg-0">
                            <div class="mb-6">
                                <h1 class="display-4 mb-4"><?= isset($slide['name']) ?  $slide['name'] : ''?></h1>
                                <p><?= isset($slide['description']) ?  $slide['description'] : ''?></p>
                            </div>

                            <div class="d-flex gap-2">
                                <a class="btn btn-primary rounded-pill" href="#">$<?= isset($slide['price']) ?  $slide['price'] : ''?> - Add to cart</a>
                                <a class="btn btn-outline-primary btn-icon rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Save for later">
                                    <i class="bi-heart-fill"></i>
                                </a>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-lg-6 order-lg-1">
                            <div class="w-75 mx-auto">
                                <img class="img-fluid" src="<?= isset($slide['image']) ?  $slide['image'] : ''?>" alt="Image Description">
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
                <!-- End Container -->
            </div>
            <!-- End Slide -->
            <?php endforeach; ?>


        <!-- Arrows -->
        <div class="js-swiper-shop-classic-hero-button-next swiper-button-next"></div>
        <div class="js-swiper-shop-classic-hero-button-prev swiper-button-prev"></div>
    </div>
    <!-- End Swiper Main Slider -->

    <!-- Swiper Thumbs Slider -->
    <div class="position-absolute bottom-0 start-0 end-0 mb-3">
        <div class="js-swiper-shop-hero-thumbs swiper" style="max-width: 13rem;">
            <div class="swiper-wrapper">
                <!-- Slide -->
                <?php foreach ($slides as  $slide): ?>
                <div class="swiper-slide">
                    <a class="js-swiper-thumb-progress swiper-thumb-progress-avatar" href="javascript:;" tabindex="0">
                        <img class="swiper-thumb-progress-avatar-img" src="<?= isset($slide['image']) ?  $slide['image'] : ''?>" alt="Image Description">
                    </a>
                </div>
                <?php endforeach; ?>
                <!-- End Slide -->

            </div>
        </div>
    </div>
    <!-- End Swiper Thumbs Slider -->
</div>
