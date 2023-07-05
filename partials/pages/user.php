<?php
if (!isset($_SESSION)) {
	session_start();
}
if(!isset($_SESSION["user_id"])){
    header("Location: /index.php"); 
}

require($_SERVER['DOCUMENT_ROOT'] . '/partials/header.php');
require($_SERVER['DOCUMENT_ROOT'] . '/partials/navbar.php');



?>
<style>
    .user-profile {
        margin-top: 7rem !important;
    }

    .contact-info {
        padding-top: 3rem !important;
        padding-bottom: 1rem !important;
    }

    .col-mt {
        margin-top: 1rem !important;
    }

    .border_contact-info {
        border-bottom: 1px solid #dee2e6 !important;
    }

    .vis-n {
        display: none;
    }

    .user_href-catalog {
        font-size: 20px;
    }

    .table td,
    .table th {
        border: 1px solid #dee2e6;
        text-align: center;
        /* выравнивание содержимого по центру горизонтально */
        vertical-align: middle;
    }
</style>
<div class="container rounded bg-white mt-5 mb-5 user-profile">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center ">
                <img class="rounded-circle" width="150px" height="150px" id="ImageUser" style="object-fit: cover;" alt="Avatar" src="/uploads/avatar/<?php echo $user['avatar'] ?>">
                <span class="font-weight-bold" id="usernameSettings" style="margin-top: 20px;">
                    <?php
                    echo $user['username']; ?></span>
                <span class="text-black-50">
                    <?php
                    echo $user['email']; ?></span>
            </div>
            <div class="d-flex flex-column align-items-center text-center border-top menu_contact-info">
                <button class="btn" id="user-orders">Orders</button>
                <button class="btn" id="user-favorites">Favorites</button>
                <button class="btn" id="user-settings">Settings</button>
            </div>

        </div>

        <div class="col-md-9 border-right border_contact-info">
            <div class="p-3 py-5 contact-info 
                <?php if (isset($_GET['p'])) {
                    echo "vis-n";
                } ?>" id="form-orders">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Orders</h4>
                </div>
                <?php $userOrder = getCountOrdersCU($user['id']);
                $userOrder = $userOrder['orders'];
                if ($userOrder > 0) {
                    if ($userOrder == 1) {
                        echo "<p>You have placed " . $userOrder . " order.</p>";
                    } else if ($userOrder > 1) {
                        echo "<p>You have placed " . $userOrder . " orders.</p>";
                    }
                    $sql = "SELECT * FROM order_cart WHERE user_id =" . $user['id'];
                    $row = mysqli_query($conn, $sql);

                    echo '<table class="table align-middle mb-0 bg-white" style="border-collapse: collapse;">
                    <thead class="bg-light">
                      <tr>
                        <th>№</th>
                        <th>OrderID</th>
                        <th>Products</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Status</th>
                      </tr>
                    </thead>';
                    $ID_orders = getOrderIdOfCU($user['id']);
                    $is = 1;
                    while ($userAllOrder = $ID_orders->fetch_assoc()) {
                        $order_number = $userAllOrder['ordernumber'];
                        $sql = "SELECT *  FROM `order_cart` WHERE `ordernumber` LIKE '" . $order_number . "' AND `user_id` = " . $user['id'];
                        $result = mysqli_query($conn, $sql);
                        echo '<tbody>';
                        $i = 1;
                        while ($productID = $result->fetch_assoc()) {
                            if ($productID['status'] == 'Your order has been received.') {
                                echo '<tr>';

                                if ($i == 1) {
                                    echo '<td rowspan="' . $userAllOrder['countOrder'] . '"  >' . $is . '</td>';
                                    echo '<td rowspan="' . $userAllOrder['countOrder'] . '" >' . $userAllOrder['ordernumber'] . '</td>';
                                }
                                $product = getProduct($productID['product_id']);
                                echo "<td>" . "<a href='/partials/pages/product.php?id=" . $product['id'] . "'>" . $product['productname'] . '</a>' . "</td>";
                                echo '<td align="center">' . $productID['quantity'] . '</td>';
                                $suma = $productID['total'] * $productID['quantity'];
                                $suma = 0;
                                echo '<td>' .  $productID['total'] . ' uah' . '</td>';
                                echo '<td><span class="badge badge-success rounded-pill d-inline">Received</span></td>';
                            }

                            echo '</tr>';
                            $i++;
                        }
                        $is++;
                    }
                    echo '</tbody>
                  </table>';
                } else {
                    echo "You have not placed any orders yet.
                    But you can always fix it:)" . "<br><br>" . "<a class='user_href-catalog' href='/partials/pages/category.php'>Go to the catalog</a>";
                } ?>

            </div>
            <div class="p-3 py-5 contact-info 
                <?php if (!isset($_GET['p'])) {
                    echo "vis-n";
                } ?>" id="form-favorites">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Favorites</h4>
                </div>
                <div class="row align-items-center justify-content-between" id="products-list_likedUser">
                    <?php
                    $sql = "SELECT * FROM favorites WHERE id_user=" . $user['id'];
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) :
                            $sql2 = "SELECT * FROM product WHERE id=" . $row['product_id'];
                            $result2 = mysqli_query($conn, $sql2);
                            $row2 = $result2->fetch_assoc(); ?>

                            <div class="col-lg-6 col-sm-6 h400 product-item" id="product_<?php echo $row2['id']; ?>">
                                <div class="single_product_item">
                                    <a href="/partials/pages/product.php?id=<?php echo $row2['id'] ?>">
                                        <img class="card-img" style="background-image:url('/assets/img/product/chairs/<?php echo $row2['image'] ?>')" alt="">
                                        <div class="single_product_text">
                                            <h4><?php echo $row2['productname'] ?></h4>
                                    </a>
                                    <h3><?php echo $row2['price'] . " uah" ?></h3>
                                    <span id="<?php $row2['id'] ?>">
                                        <a class="add_cart" href="#" data-productid="<?php echo $row2['id'] ?>">+ add to cart</a>
                                        <a href="#" class="delete-product" data-id="<?php echo $row2['id']; ?>">
                                            <i class="ti-heart_custom" style="background-image: url('/assets/img/icon/heart_liked.svg');"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                </div>
        <?php endwhile;
                    } else {
                        echo "0 results";
                    }
        ?>
            </div>
        </div>
        <div class="p-3 py-5 contact-info vis-n" id="form-settings">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="text-right">Profile Settings</h4>
            </div>
            <form action="#" method="POST" enctype="multipart/form-data" id="profile-form">
                <?php
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
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="first name" value="<?php echo $name ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Surname</label>
                        <input type="text" class="form-control" value="<?php echo $surname; ?>" name="surname" placeholder="surname">
                    </div>
                    <div class="col-md-12 col-mt">
                        <label class="labels">Your avatar </label>
                        <input class="form-control_custom" name="image" type="file">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12 col-mt">
                        <label class="labels">Mobile Number</label>
                        <input type="text" class="form-control" name="phone" placeholder="enter phone number" value="<?php
                                                                                                                        if ($user['telephone'] != null) {
                                                                                                                            echo '+' . $user['telephone'];
                                                                                                                        } else {
                                                                                                                            $user['telephone'];
                                                                                                                        } ?>">
                    </div>
                    <div class="col-md-6 col-mt">
                        <label class="labels">Country</label>
                        <input type="text" class="form-control" name="country" placeholder="country" value="<?php echo $user['country']; ?>">
                    </div>
                    <div class="col-md-6 col-mt">
                        <label class="labels">City</label>
                        <input type="text" class="form-control" name="city" value="<?php echo $user['city']; ?>" placeholder="city">
                    </div>
                    <div class="col-md-12 col-mt">
                        <label class="labels">Address</label>
                        <input type="text" class="form-control" name="address" value="<?php echo $user['address']; ?>">
                    </div>
                    <div class="col-md-12 col-mt">
                        <label class="labels">Postcode</label>
                        <input type="text" class="form-control" name="postcode" placeholder="enter postcode" value="<?php echo $user['postcode']; ?>">
                    </div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" id="SaveSettings" type="submit">Save Profile</button></div>
            </form>
        </div>
    </div>

</div>
</div>
</div>
</div>


<?php
require($_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php');
require($_SERVER['DOCUMENT_ROOT'] . '/partials/scripts.php');
?>