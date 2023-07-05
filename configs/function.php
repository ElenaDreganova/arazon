<?php

function isAuth()
{
    $is_session = isset($_SESSION['user_id']) && ($_SESSION["user_id"]) != null;
    $is_cookie = isset($_COOKIE['user_id']) && ($_COOKIE["user_id"]) != null;

    if ($is_session || $is_cookie) {
        return true;
    } else {
        return false;
    }
}

function getCurrentUser()
{
    global $conn;
    $is_session = isset($_SESSION['user_id']) && ($_SESSION["user_id"]) != null;
    $is_cookie = isset($_COOKIE['user_id']) && ($_COOKIE["user_id"]) != null;
    if ($is_session || $is_cookie) {
        $userID = $is_session ? $_SESSION['user_id'] : $_COOKIE['user_id'];
        $sql = "SELECT * FROM users WHERE id =" . $userID;
        $result = mysqli_query($conn, $sql);
        return $result->fetch_assoc();
    } else {
        return null;
    }
}
function getNameUser($user_id)
{
    global $conn;

    $sql = "SELECT * FROM users WHERE id =" . $user_id;
    $result = mysqli_query($conn, $sql);
    return $result->fetch_assoc();
}
function getidUserbyEmail($email)
{
    global $conn;

    $sql = "SELECT * FROM users WHERE `email`='$email'";
    $result = mysqli_query($conn, $sql);
    return $result->fetch_assoc();
}
function getCountOrdersCU($user_id) // вивід кількості (цифра) усіх замовлень 
{
    global $conn;

    $sql = "SELECT COUNT(DISTINCT(ordernumber)) AS orders FROM order_cart WHERE `status` != '' and user_id =" . $user_id;
    $result = mysqli_query($conn, $sql);
    return $result->fetch_assoc();
}

function getOrderIdOfCU($user_id) // вивід ordernumber і rowcount in td
{
    global $conn;

    $sql = "SELECT `ordernumber`, COUNT(*) AS countOrder FROM order_cart  WHERE `user_id` = " . $user_id . " GROUP BY ordernumber";
    $result = mysqli_query($conn, $sql);
    return $result;
}


function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}

function getProductSlider()
{
    global $conn;

    $sql = "SELECT *  FROM `product` WHERE `slider` LIKE 1";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function getProducts($min, $max)
{
    global $conn;

    $sql = "SELECT * FROM `product` LIMIT $min,$max";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function getCategory()
{
    global $conn;

    $sql = "SELECT * FROM `categories`";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function getAvailibility()
{
    global $conn;

    $sql = "SELECT * FROM `availibility`";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function getColor()
{
    global $conn;

    $sql = "SELECT DISTINCT(`color`) FROM `product_specification` order by color asc";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function getLiked($user_id, $product_id)
{
    global $conn;

    $sql = "SELECT * FROM `favorites` WHERE `id_user` = $user_id and `product_id` = $product_id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}
function getNewNumberOrder()
{
    global $conn;

    $sql = "SELECT MAX(`ordernumber`) AS latest FROM `order_cart`";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    $old = $row['latest'];
    $new = intval($old) + 1;
    $new = str_pad($new, strlen($old), '0', STR_PAD_LEFT);
    return $new;
}

function getProduct($id)
{
    global $conn;

    $sql = "SELECT * FROM `product` WHERE id=" . $id;
    $result = mysqli_query($conn, $sql);
    return $result->fetch_assoc();
}
function getLastIdProduct()
{
    global $conn;

    $sql = "SELECT id FROM product ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    return $row['id'];
}
function getCategorybyProduct($id_category)
{
    global $conn;

    $sql = "SELECT * FROM `categories` where id=" . $id_category;
    $result = mysqli_query($conn, $sql);
    return $result->fetch_assoc();
}
function getAvailibilitybyProduct($id_availibility)
{
    global $conn;

    $sql = "SELECT * FROM `availibility` where id=" . $id_availibility;
    $result = mysqli_query($conn, $sql);
    return $result->fetch_assoc();
}
function getSpecificationbyProduct($product_id)
{
    global $conn;

    $sql = "SELECT * FROM `product_specification` where product_id=" . $product_id;
    $result = mysqli_query($conn, $sql);
    return $result->fetch_assoc();
}
function getCommentsofProduct($product_id)
{
    global $conn;

    $sql = "SELECT * FROM `comments` WHERE `product_id` = '$product_id' ORDER BY created DESC";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function getCart($order_number)
{
    global $conn;

    $sql = "SELECT * FROM `order_cart` WHERE ordernumber=" . $order_number;
    $result = mysqli_query($conn, $sql);
    return $result;
}
function getCartSum($order_number)
{
    global $conn;

    $sql = "SELECT *, SUM(total) AS suma FROM `order_cart` WHERE ordernumber=" . $order_number;
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    return $row['suma'];
}
function getLastOrder($user)
{
    global $conn;

    $sql = "SELECT * FROM `order_cart` WHERE user_id='$user' and `status` = 'Your order has been received.' ORDER BY created DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    return $row;
}
