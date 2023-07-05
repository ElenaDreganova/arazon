<?php
require($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');
require($_SERVER['DOCUMENT_ROOT'] . '/configs/function.php');
$user = getCurrentUser();
$user = $user['id'];
$ordernumber =$_SESSION['order_number'];
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `order_cart` WHERE `ordernumber` = '$ordernumber' and `user_id` = '$user' and `product_id` =" . $id;
    if (mysqli_query($conn, $sql)) {
        echo "success";
    } else {
        echo "error";
    }
}
