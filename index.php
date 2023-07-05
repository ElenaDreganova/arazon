<?php
require($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');
require($_SERVER['DOCUMENT_ROOT'] . '/partials/header.php');
?>
<?php
require($_SERVER['DOCUMENT_ROOT'] . '/partials/navbar.php');
$user = getCurrentUser();

?>

<!-- banner part start-->
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="banner_slider owl-carousel">

                    <?php $sliderProduct = getProductSlider();
                    while ($row = mysqli_fetch_assoc($sliderProduct)) :
                    ?>
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1><?php echo $row['productname']; ?></h1>
                                            <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                                suspendisse ultrices gravida. Risus commodo viverra</p>
                                            <a href="#" data-productid="<?php echo $row['id'] ?>" class="add_cart btn_2">buy now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img src="/assets/img/banner_img.png" alt="">
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>


                </div>
                <div class="slider-counter"></div>
            </div>
        </div>
    </div>
</section>
<!-- banner part start-->

<!-- feature_part start-->
<section class="feature_part padding_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section_tittle text-center">
                    <h2>Featured Category</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-7 col-sm-6">
                <div class="single_feature_post_text">
                    <p>Premium Quality</p>
                    <h3>Latest foam Sofa</h3>
                    <a href="/partials/pages/product.php?id=7" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                    <img src="/assets/img/feature/feature_1.png" alt="">
                </div>
            </div>
            <div class="col-lg-5 col-sm-6">
                <div class="single_feature_post_text">
                    <p>Premium Quality</p>
                    <h3>Latest foam Sofa</h3>
                    <a href="/partials/pages/product.php?id=3" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                    <img src="/assets/img/feature/feature_2.png" alt="">
                </div>
            </div>
            <div class="col-lg-5 col-sm-6">
                <div class="single_feature_post_text">
                    <p>Premium Quality</p>
                    <h3>Latest foam Sofa</h3>
                    <a href="/partials/pages/product.php?id=24" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                    <img src="/assets/img/feature/feature_3.png" alt="">
                </div>
            </div>
            <div class="col-lg-7 col-sm-6">
                <div class="single_feature_post_text">
                    <p>Premium Quality</p>
                    <h3>Latest foam Sofa</h3>
                    <a href="/partials/pages/product.php?id=12" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                    <img src="/assets/img/feature/feature_4.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- upcoming_event part start-->

<!-- product_list start-->
<section class="product_list section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>awesome <span>shop</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="product_list_slider owl-carousel">
                    <div class="single_product_list_slider">
                        <div class="row align-items-center justify-content-between">
                            <?php $products = getProducts(8, 8);
                            while ($row = mysqli_fetch_assoc($products)) : ?>

                                <div class="col-lg-3 col-sm-6 h400">
                                    <div class="single_product_item">
                                        <a href="/partials/pages/product.php?id=<?php echo $row['id'] ?>">
                                            <img class="card-img" style="background-image:url('/assets/img/product/chairs/<?php echo $row['image'] ?>')" alt="">
                                            <div class="single_product_text">
                                                <h4><?php echo $row['productname'] ?></h4>
                                        </a>
                                        <h3><?php echo $row['price'] . " uah" ?></h3>
                                        <span id="<?php $row['id'] ?>">
                                            <a class="add_cart" href="#" data-productid="<?php echo $row['id'] ?>">+ add to cart</a>
                                            <a href="#" class="add_to_favorites" data-productid="<?php echo $row['id'] ?>">
                                                <?php if (isset($user['id'])) {
                                                    $liked = getLiked($user['id'], $row['id']);
                                                } ?>
                                                <i class="ti-heart_custom" <?php if ($liked == true) : ?>style="background-image: url('/assets/img/icon/heart_liked.svg')" <?php endif; ?>></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                        </div>

                    <?php endwhile; ?>
                    </div>
                </div>
                <div class="single_product_list_slider">
                    <div class="row align-items-center justify-content-between">
                        <?php $products = getProducts(16, 8);
                        while ($row = mysqli_fetch_assoc($products)) : ?>

                            <div class="col-lg-3 col-sm-6 h400">
                                <div class="single_product_item">
                                    <a href="/partials/pages/product.php?id=<?php echo $row['id'] ?>">
                                        <img class="card-img" style="background-image:url(/assets/img/product/chairs/<?php echo $row['image'] ?>)" alt="">
                                        <div class="single_product_text">
                                            <h4><?php echo $row['productname'] ?></h4>
                                    </a>
                                    <h3><?php echo $row['price'] . " uah" ?></h3>
                                    <span id="<?php $row['id'] ?>">
                                        <a href="#" class="add_cart" data-productid="<?php echo $row['id'] ?>">+ add to cart</a>
                                        <a href="#" class="add_to_favorites" data-productid="<?php echo $row['id'] ?>">
                                            <?php if (isset($user['id'])) {
                                                $liked = getLiked($user['id'], $row['id']);
                                            } ?>
                                            <i class="ti-heart_custom" <?php if ($liked == true) : ?> style="background-image: url('/assets/img/icon/heart_liked.svg')" <?php endif; ?>></i>
                                        </a>
                                    </span>
                                </div>

                            </div>
                    </div>

                <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
<!-- product_list part start-->

<!-- awesome_shop start-->
<section class="our_offer section_padding">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-6 col-md-6">
                <div class="offer_img">
                    <img src="/assets/img/offer_img.png" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="offer_text">
                    <h2>Weekly Sale on
                        60% Off All Products</h2>
                    <div class="date_countdown">
                        <div id="timer">
                            <div id="days" class="date"></div>
                            <div id="hours" class="date"></div>
                            <div id="minutes" class="date"></div>
                            <div id="seconds" class="date"></div>
                        </div>
                    </div>
                    <form action="#" method="post">
                        <div class="input-group">
                            <input type="email" class="form-control" name="emailNewsletter" id="email" placeholder="enter email address">
                            <div class="input-group-append" id="basic-addon2">
                                <button style="border:none;background-color:rgba(255, 255, 255, 0);" type="submit"><a href="#" class="input-group-text btn_2">book now</a></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- awesome_shop part start-->

<!-- product_list part start-->
<section class="product_list best_seller section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Best Sellers <span>shop</span></h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-12">
                <div class="best_product_slider owl-carousel">
                    <?php $products = getProducts(0, 5);
                    while ($row = mysqli_fetch_assoc($products)) : ?>
                        <a href="/partials/pages/product.php?id=<?php echo $row['id'] ?>">
                            <div class="single_product_item ">
                                <img class="card-img" style="background-image:url(/assets/img/product/chairs/<?php echo $row['image'] ?>)" alt="">
                                <div class="single_product_text">
                                    <h4><?php echo $row['productname'] ?></h4>
                                    <h3><?php echo $row['price'] . " uah" ?></h3>
                                </div>
                            </div>
                        </a>
                    <?php endwhile; ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- product_list part end-->

<!-- subscribe_area part start-->
<section class="subscribe_area section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="subscribe_area_text text-center">
                    <h5>Join Our Newsletter</h5>
                    <h2>Subscribe to get Updated
                        with new offers</h2>
                    <form action="#" method="post">
                        <div class="input-group">
                            <input type="email" class="form-control" name="email" id="email2" placeholder="enter email address">
                            <div class="input-group-append" id="basic-addon3">
                                <button style="border:none;background-color:rgba(255, 255, 255, 0);" type="submit"><a href="#" class="input-group-text btn_2">subscribe now</a></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--::subscribe_area part end::-->

<!-- subscribe_area part start-->
<section class="client_logo padding_top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="single_client_logo">
                    <img src="/assets/img/client_logo/client_logo_1.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="/assets/img/client_logo/client_logo_2.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="/assets/img/client_logo/client_logo_3.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="/assets/img/client_logo/client_logo_4.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="/assets/img/client_logo/client_logo_5.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="/assets/img/client_logo/client_logo_3.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="/assets/img/client_logo/client_logo_1.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="/assets/img/client_logo/client_logo_2.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="/assets/img/client_logo/client_logo_3.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="/assets/img/client_logo/client_logo_4.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!--::subscribe_area part end::-->





<?php
require($_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php');
require($_SERVER['DOCUMENT_ROOT'] . '/partials/scripts.php');
?>