<?php
require($_SERVER['DOCUMENT_ROOT'] . '/partials/header.php');
require($_SERVER['DOCUMENT_ROOT'] . '/partials/navbar.php');
?>
<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>Tracking Order</h2>
                        <p>Home <span>-</span> Tracking Order</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->

<!--================Tracking Box Area =================-->
<section class="tracking_box_area padding_top">
    <div class="container">
        <div class="row align-items-center">
            
            <div class="col-lg-12">
                <div class="tracking_box_inner" >
                <p id="resultSearchTracking">To track your order please enter your Order ID in the box below and press the "Track" button. This was
                        given
                        to you on your receipt and in the confirmation email you should have received.</p>
                    <form class="row tracking_form" action="#" method="post" id="formTracking">
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="order" name="orderID" placeholder="Order ID">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Billing Email Address">
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="btn_3">Track Order</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</section>
<!--================End Tracking Box Area =================-->

<?php
require($_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php');
require($_SERVER['DOCUMENT_ROOT'] . '/partials/scripts.php');
?>