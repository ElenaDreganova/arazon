<?php
require($_SERVER['DOCUMENT_ROOT'] . '/partials/header.php');
require($_SERVER['DOCUMENT_ROOT'] . '/partials/navbar.php');
$user = getCurrentUser();
?>

<style>
    .btn {
        margin-top: 0;
    }
</style>
<!--================Home Banner Area =================-->
<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>Cart Products</h2>
                        <p>Home <span>-</span>Cart Products</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->

<!--================Cart Area =================-->
<section class="cart_area padding_top">
    <div class="container">
        <div class="cart_inner">
            <?php
            if ($user && isset($_SESSION['order_number'])) :
                $cartID = getCart($_SESSION['order_number']);
                if (mysqli_num_rows($cartID)) { ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col" width="120">Total</th>
                                    <th scope="col" width="120">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($cartID)) :
                                    $productListCart = getProduct($row['product_id']);
                                ?>
                                    <tr class="listCartProduct">
                                        <td>
                                            <div class="media">
                                                <div class="d-flex">
                                                    <img style="height:150px;width:150px;object-fit:contain;" src="/assets/img/product/chairs/<?php echo $productListCart['image'] ?>" alt="" />
                                                </div>
                                                <div class="media-body">
                                                    <p> <?php echo $productListCart['productname'] ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5 data-id="<?php echo $productListCart['id'] ?>"><?php echo $productListCart['price'] . " uah" ?></h5>
                                        </td>
                                        <td>
                                            <div class="product_count">
                                                <span class="input-number-decrement" data-id="<?php echo $productListCart['id'] ?>"> <i class="ti-angle-down"></i></span>
                                                <input class="input-number2" type="text" value="<?php echo $row['quantity']; ?>" min="1" max="100" data-id="<?php echo $productListCart['id'] ?>">
                                                <span class="input-number-increment" data-id="<?php echo $productListCart['id'] ?>"> <i class="ti-angle-up"></i></span>
                                            </div>
                                        <td>
                                            <h5 data-id="<?php echo $productListCart['id'] ?>_total">
                                                <?php echo $row['total'] . " uah" ?>
                                            </h5>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger deleteProductCart" id="" data-id="<?php echo $productListCart['id']; ?>">Delete</button>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>

                                <tr class="bottom_button">
                                    <td> </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div class="cupon_text float-right">
                                            <a class="btn_1 update_cart" href="#">Update Cart</a>
                                            <span style="display: flex;margin-top:20px;">Shipping - <b> &nbsp;Free Shipping</b></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <h5 id="sub">Subtotal</h5>
                                    </td>
                                    <td>
                                        <h5 data-id="totalSum"><?php echo getCartSum($_SESSION['order_number']) . " uah"; ?></h5>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <p class="float-right"> </p>
                        <div class="checkout_btn_inner float-right">
                            <a class="btn_1" href="/partials/pages/category.php">Continue Shopping</a>
                            <a class="btn_1 checkout_btn_1" href="/partials/cart/checkout.php">Proceed to checkout</a>
                        </div>
                    </div>
                <?php } else { ?>
                    <div>
                        You have not placed any orders yet.
                        But you can always fix it:)
                        <br><br><a class='user_href-catalog' href='/partials/pages/category.php'>Go to the catalog</a>
                    </div>
            <?php
                }
            endif; ?>

        </div>
</section>
<!--================End Cart Area =================-->

<?php
require($_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php');
require($_SERVER['DOCUMENT_ROOT'] . '/partials/scripts.php');
?>