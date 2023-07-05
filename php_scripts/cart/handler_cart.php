<?php
require($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');
require($_SERVER['DOCUMENT_ROOT'] . '/configs/function.php');

$response = array();
$user = getCurrentUser();
if ($user) {
    if (!isset($_SESSION['order_number'])) {
        $order_number = getNewNumberOrder();
        $_SESSION['order_number'] = $order_number;
    } else {
        $order_number = $_SESSION['order_number'];
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $userid = $user['id'];
        $productid = $_POST['productid'];
        $product = getProduct($productid);
        $product = $product['price'];
        $quantity = 1;

        $sqlTest = "SELECT * FROM `order_cart` WHERE `ordernumber`='$order_number' AND `user_id` ='$userid' AND `product_id` = '$productid'";
        $resultTest = $conn->query($sqlTest);
        if ($resultTest->num_rows > 0) {
            $rowTest = mysqli_fetch_assoc($resultTest);
            $rowTest = $rowTest['quantity'];
            $rowTest = $rowTest + 1;
            $sqlUpdate = "UPDATE `order_cart` SET `quantity` = '$rowTest' WHERE `product_id` = '$productid'";
            $resultUpdate = mysqli_query($conn, $sqlUpdate);
            echo "Product added to cart!";
        } else {
            $sql = "INSERT INTO `order_cart` (`ordernumber`, `user_id`, `product_id`, `quantity`, `total`) VALUES ('$order_number','$userid','$productid','$quantity','$product')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $response['success'] = true;
                echo "Product added to cart!";
            } else {
                $response['success'] = false;
            }
        }
    }
} else {
    echo "You must be logged in to add products to cart.";
}
