<?php
require($_SERVER['DOCUMENT_ROOT'] . '/partials/header.php');
require($_SERVER['DOCUMENT_ROOT'] . '/partials/navbar.php');


$search = explode(" ", $_POST['search']);
$count = count($search);

$array = array();
$i = 0;
foreach ($search as $key) {
    $i++;
    if ($i < $count) $array[] = "`productname` LIKE '%" . $key . "%'";
    else $array[] .= "`productname` LIKE '%" . $key . "%'";
}
$order_by = '';
if (isset($_POST['order_by'])) {
    switch ($_POST['order_by']) {
        case '1':
            $order_by = 'ORDER BY price ASC';
            break;
        case '2':
            $order_by = 'ORDER BY productname ASC';
            break;
        default:
            break;
    }
}
$sqlSearch = "SELECT * FROM `product` WHERE " . implode("", $array);
$resultSearch = mysqli_query($conn, $sqlSearch) or trigger_error("SQL", E_USER_ERROR);

?>

<!--================Home Banner Area =================-->
<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>Shop Category</h2>
                        <p>Home <span>-</span> Shop Category</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->
<!--================Category Product Area =================-->
<section class="cat_product_area section_padding">
    <div class="container">
        <h2 class="search-h">Search Results: «<?php echo $_POST['search']; ?>»</h2>
        <div class="row">
            <div class="col-lg-3">
                <div class="left_sidebar_area">
                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <h3>Browse Categories</h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">
                                <?php
                                $categories =  getCategory();
                                while ($row = mysqli_fetch_assoc($categories)) :
                                    $sql = "SELECT COUNT(`category_id`) AS count FROM `product` WHERE category_id = " . $row['id'];
                                    $result = mysqli_query($conn, $sql);
                                    while ($row2 = mysqli_fetch_assoc($result)) :
                                ?>
                                        <li>
                                            <a href="#"><?php echo $row['title']; ?></a>
                                            <span><?php echo $row2['count']; ?></span>
                                        </li>
                                    <?php endwhile; ?>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    </aside>

                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <h3>Availibility</h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">
                                <?php
                                $availibility = getAvailibility();
                                while ($row = mysqli_fetch_assoc($availibility)) :
                                ?>
                                    <li>
                                        <a href="#"><?php echo $row['title']; ?></a>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    </aside>

                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <h3>Color Filter</h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">
                                <?php
                                $color = getColor();
                                while ($row = mysqli_fetch_assoc($color)) :
                                ?>
                                    <li>
                                        <a href="#"><?php echo ucfirst($row['color']); ?></a>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    </aside>

                    <aside class="left_widgets p_filter_widgets price_rangs_aside">
                        <div class="l_w_title">
                            <h3>Price Filter</h3>
                        </div>
                        <div class="widgets_inner">
                            <div class="range_item">
                                <!-- <div id="slider-range"></div> -->

                                <input type="text" class="js-range-slider" value="" />
                                <div class="d-flex">
                                    <div class="price_text">
                                        <p>Price :</p>
                                    </div>
                                    <div class="price_value d-flex justify-content-center">
                                        <input type="text" class="js-input-from" id="amount" readonly />
                                        <span>to</span>
                                        <input type="text" class="js-input-to" id="amount" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product_top_bar d-flex justify-content-between align-items-center">
                            <div class="single_product_menu">
                                <p>
                                    <span>
                                        <?php
                                        $numRows = mysqli_num_rows($resultSearch);
                                        echo  $numRows;
                                        ?>
                                    </span> Product Found
                                </p>
                            </div>
                            <div class="single_product_menu d-flex">
                                <h5 for="sort">short by : </h5>
                                <select id="sort" name="order_by">
                                    <!-- <option data-display="Select">name product</option> -->
                                    <option value="1">price</option>
                                    <option value="2">product</option>
                                </select>
                            </div>
                            <div class="single_product_menu d-flex">
                                <h5>show :</h5>
                                <div class="top_pageniation">
                                    <ul>
                                        <li>2</li>
                                        <li>3</li>
                                        <li>4</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="single_product_menu d-flex">
                                <div class="input-group">
                                    <form action="/partials/pages/search.php" method="post" style="display: inline-flex;">
                                        <input type="text" class="form-control" name="search" placeholder="search" id="SearchCategory">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text SearchCategory" id="search_input">
                                                <button type="submit" style="border: none; background-color: white;">
                                                    <i class="ti-search "></i>
                                                </button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center latest_product_inner">
                    <?php
                    while ($list = mysqli_fetch_assoc($resultSearch)) : ?>
                        <div class="col-lg-4 col-sm-6 h400" id="ResultSearch">
                            <div class="single_product_item">
                            <a href="/partials/pages/product.php?id=<?php echo $list['id'] ?>">
                                <img class="card-img" style="background-image:url(/assets/img/product/chairs/<?php echo $list['image'] ?>)" alt="">
                                <div class="single_product_text">
                                    <h4><?php echo $list['productname'] ?></h4>
                                    </a>
                                    <h3><?php echo $list['price'] . " uah" ?></h3>
                                    <span id="<?php $list['id'] ?>">
                                        <a class="add_cart" href="#" data-productid="<?php echo $list['id'] ?>">+ add to cart</a>
                                        <a href="#" class="add_to_favorites" data-productid="<?php echo $list['id'] ?>">
                                            <?php if (isset($user['id'])) {
                                                $liked = getLiked($user['id'], $list['id']);
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
        </div>
    </div>
</section>
<!--================End Category Product Area =================-->

<!-- product_list part start-->
<section class="product_list best_seller">
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
                        <div class="single_product_item">
                            <img class="card-img" style="background-image:url(/assets/img/product/chairs/<?php echo $row['image'] ?>)" alt="">
                            <div class="single_product_text">
                                <h4><?php echo $row['productname'] ?></h4>
                                <h3><?php echo $row['price'] . " uah" ?></h3>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product_list part end-->

<?php
require($_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php');
require($_SERVER['DOCUMENT_ROOT'] . '/partials/scripts.php');
?>