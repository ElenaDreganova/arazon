<?php

require($_SERVER['DOCUMENT_ROOT'] . '/partials/header.php');
require($_SERVER['DOCUMENT_ROOT'] . '/partials/navbar.php');
$user = getCurrentUser();
$order = getLastOrder($user['id']);

$formattedDate = date('M d, Y H:i', strtotime($order['created']));
?>
<!--================Home Banner Area =================-->
<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>Order Confirmation</h2>
                        <p>Home <span>-</span> Order Confirmation</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->

<!--================ confirmation part start =================-->
<section class="confirmation_part padding_top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="confirmation_tittle">
                    <span>Thank you. Your order has been received.</span>
                </div>
            </div>
            <div class="col-lg-6 col-lx-4">
                <div class="single_confirmation_details">
                    <h4>order info</h4>
                    <ul>
                        <li>
                            <p>order number</p><span>: <?php echo $order['ordernumber'] ?></span>
                        </li>
                        <li>
                            <p>data</p><span>: <?php echo $formattedDate;?></span>
                        </li>
                        <li>
                            <p>total</p><span>: USD 2210</span>
                        </li>
                        <li>
                            <p>mayment methord</p><span>: Check payments</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-lx-4">
                <div class="single_confirmation_details">
                    <h4>shipping Address</h4>
                    <ul>
                        <li>
                            <p>country</p><span>: <?php echo $user['country'];?></span>
                        </li>
                        <li>
                            <p>city</p><span>: <?php echo $user['city'];?></span>
                        </li>
                        <li>
                            <p>Street</p><span>: <?php echo $user['address'];?></span>
                        </li>
                        <li>
                            <p>postcode</p><span>: <?php echo $user['postcode'];?></span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="order_details_iner">
                    <h3>Order Details</h3>
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col" colspan="2">Product</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $orderList = getCart($order['ordernumber']);
                            while ($row = mysqli_fetch_assoc($orderList)) :
                                $productListCart = getProduct($row['product_id']);
                            ?>
                            <tr>
                                <th colspan="2"><span><?php echo $productListCart['productname'] ?></span></th>
                                <th>x<?php echo $row['quantity']; ?></th>
                                <th> <span><?php echo $row['total'] . " uah";?></span></th>
                            </tr>
                            <?php endwhile;?>
                            <tr>
                                <th colspan="3">Total</th>
                                <th> <span><?php 
                                echo getCartSum($order['ordernumber']) . " uah";
                                ?></span></th>
                            </tr>
                            <tr>
                                <th colspan="3">shipping</th>
                                <th><span>Free Shipping</span></th>
                            </tr>
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ confirmation part end =================-->

<?php
require($_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php');
require($_SERVER['DOCUMENT_ROOT'] . '/partials/scripts.php');
?>