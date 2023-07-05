<?php
require($_SERVER['DOCUMENT_ROOT'] . '/partials/header.php');
require($_SERVER['DOCUMENT_ROOT'] . '/partials/navbar.php');
$user = getCurrentUser();
$range = 6;
$rowsperpage = 9;
$dbtable = '`product`';

$sql = "SELECT COUNT(*) FROM $dbtable";
$result = mysqli_query($conn, $sql);
$r = mysqli_fetch_row($result);
$numrows = $r[0];

$totalpages = ceil($numrows / $rowsperpage);
if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
    $currentpage = (int) $_GET['currentpage'];
} else {
    $currentpage = 1;
}

if ($currentpage > $totalpages) {
    $currentpage = $totalpages;
}
if ($currentpage < 1) {
    $currentpage = 1;
}

$offset = ($currentpage - 1) * $rowsperpage;


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
        <!-- <h2 class="search-h">«Search Results»</h2> -->
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
                                <p><span><?php $FoundProduct = getLastIdProduct();
                                echo $FoundProduct;?> </span> Product Found</p>
                            </div>
                            <div class="single_product_menu d-flex">
                                <h5>short by : </h5>
                                <select>
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
                    <!-- <div class="hidden" id="search_results" ></div> -->
                    <?php $products = getProducts($offset, $rowsperpage);
                    while ($row = mysqli_fetch_assoc($products)) : ?>
                        <div class="col-lg-4 col-sm-6 h400" id="ResultSearch">
                            <div class="single_product_item">
                                <a href="/partials/pages/product.php?id=<?php echo $row['id'] ?>">
                                    <img class="card-img" style="background-image:url(/assets/img/product/chairs/<?php echo $row['image'] ?>)" alt="">
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

            <div class="col-lg-12">
                <div class="pageination">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <?php
                            if ($currentpage > 1) {
                                echo " <li class='page-item'><a  class='page-link' href='{$_SERVER['PHP_SELF']}?currentpage=1'>First</a><li>";
                                $prevpage = $currentpage - 1;
                                echo " <a class='page-link' href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'><<</a> ";
                            } else {
                                echo " <li class='page-item disabled'><a class='page-link' href='{$_SERVER['PHP_SELF']}?currentpage=1'>First</a><li>";
                                $prevpage = $currentpage - 1;
                                echo " <li class='page-item disabled'><a class='page-link' href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'><<</a></li> ";
                            }
                            // цикл, с помощью которого отобразим пагинацию (вокруг текущей страницы)
                            for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
                                // если номер страницы верный...
                                if (($x > 0) && ($x <= $totalpages)) {
                                    // если страница текщая...
                                    if ($x == $currentpage) {
                                        // вывод текущей страницы
                                        echo "  <li class='page-item active'><a class='page-link' href='{$_SERVER['PHP_SELF']}'>$x</a></li>";
                                        // если страница не текущая...
                                    } else {
                                        // вывод не текущей страницы
                                        echo " <li class='page-item'><a class='page-link'  href='{$_SERVER['PHP_SELF']}?currentpage=$x'>$x</a></li> ";
                                    }
                                }
                            }

                            // формируем ссылки на последнюю и следующую страницу     
                            if ($currentpage != $totalpages) {
                                $nextpage = $currentpage + 1;
                                echo " <li class='page-item'><a class='page-link' href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'>>></a><li> ";
                                echo " <li class='page-item'><a class='page-link' href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages'>Last</a><li> ";
                            } else {
                                $nextpage = $currentpage + 1;
                                echo " <li class='page-item disabled'><a class='page-link' href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'>>></a><li> ";
                                echo " <li class='page-item disabled'><a class='page-link' href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages'>Last</a><li> ";
                            }
                            ?>



                        </ul>
                    </nav>
                </div>
            </div>
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