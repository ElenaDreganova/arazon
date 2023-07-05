<?php
require($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');
require($_SERVER['DOCUMENT_ROOT'] . '/configs/function.php');
$user = getCurrentUser();
$user = $user['id'];
if ($_SESSION['order_number']) {
    $ordernumber = $_SESSION['order_number'];
    $sql = "DELETE FROM `order_cart` WHERE `ordernumber` = '$ordernumber' and `user_id` = '$user'";
    $result = mysqli_query($conn, $sql);
    unset($_SESSION['order_number']);
}

unset($_SESSION['user_login']);
if (isset($_SESSION['user_id']) && ($_SESSION["user_id"]) != null) {
    $_SESSION['user_id'] = null;
    header("Location: /index.php");
}
if (isset($_COOKIE['user_id']) && ($_COOKIE["user_id"]) != null) {
    setcookie('user_id', '', 0, '/');
    header("Location: /index.php");
}
