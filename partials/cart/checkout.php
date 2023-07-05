<?php
if (!isset($_SESSION)) {
	session_start();
}
if (!isset($_SESSION['order_number'])) {
  header("Location: /partials/cart/cart.php");
}
require($_SERVER['DOCUMENT_ROOT'] . '/partials/header.php');
require($_SERVER['DOCUMENT_ROOT'] . '/partials/navbar.php');
$user = getCurrentUser();
$name_surname = $user["username"];
// разделяем значение на две части по пробелу или нижнему подчеркиванию
$name_surname_parts = preg_split("/[\s_]+/", $name_surname);

// проверяем, сколько частей получилось
if (count($name_surname_parts) == 2) {
  $name = $name_surname_parts[0];
  $surname = $name_surname_parts[1];
} else {
  $name = $name_surname;
  $surname = "";
}
?>
<!--================Home Banner Area =================-->
<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="breadcrumb_iner">
          <div class="breadcrumb_iner_item">
            <h2>Product Checkout</h2>
            <p>Home <span>-</span> Shop Single</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- breadcrumb start-->

<!--================Checkout Area =================-->
<section class="checkout_area padding_top">
  <div class="container">
    <div class="billing_details">
      <div class="row">
        <div class="col-lg-8">
          <h3>Billing Details</h3>
          <form class="row contact_form" action="#" method="post" id="ConfirmForm">
            <div class="col-md-6 form-group p_star">
              <input type="text" class="form-control" id="first" name="first" value="<?php echo $name; ?>" placeholder="First name" readonly />
            </div>
            <div class="col-md-6 form-group p_star">
              <input type="text" class="form-control" id="last" name="last" value="<?php echo $surname; ?>" placeholder="Last name" readonly />
            </div>
            <div class="col-md-6 form-group p_star">
              <input type="text" class="form-control" id="number" name="number" value="<?php echo "+" . $user['telephone']; ?>" placeholder="Phone number" />
            </div>
            <div class="col-md-6 form-group p_star">
              <input type="text" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" placeholder="Email Address" readonly />
            </div>
            <div class="col-md-12 form-group p_star">
              <input type="text" class="form-control" id="country" name="country" value="<?php echo $user['country']; ?>" placeholder="Country" />
            </div>
            <div class="col-md-12 form-group p_star">
              <input type="text" class="form-control" id="city" name="city" value="<?php echo $user['city']; ?>" placeholder="Town/City" />
            </div>
            <div class="col-md-12 form-group p_star">
              <input type="text" class="form-control" id="add1" name="add1" value="<?php echo $user['address']; ?>" placeholder="Address line" />
            </div>
            <div class="col-md-12 form-group">
              <input type="text" class="form-control" id="zip" name="zip" value="<?php echo $user['postcode']; ?>" placeholder="Postcode/ZIP" />
            </div>
          </form>
        </div>
        <div class="col-lg-4">
          <div class="order_box">
            <h2>Your Order</h2>
            <ul class="list">
              <li>
                <a>Product
                  <span>Total</span>
                </a>
              </li>
              <?php $cartList = getCart($_SESSION['order_number']);
              while ($row = mysqli_fetch_assoc($cartList)) :
                $productListCart = getProduct($row['product_id']);
              ?>
                <li>
                  <a><?php echo substr($productListCart['productname'], 0, 15); ?>
                    <span class="middle">x <?php echo $row['quantity']; ?></span>
                    <span class="last"><?php echo $row['total']; ?> </span>
                  </a>
                </li>
              <?php endwhile; ?>
            </ul>
            <ul class="list list_2">
              <li>
                <a>Total
                  <span><?php echo getCartSum($_SESSION['order_number']) . " uah"; ?></span>
                </a>
              </li>
            </ul>
            <a class="btn_3" id="confirmationOrder" type="submit" form="ConfirmForm" style="margin-top: 20px;" href="#">Proceed to Paypal</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================End Checkout Area =================-->


<?php
require($_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php');
require($_SERVER['DOCUMENT_ROOT'] . '/partials/scripts.php');
?>