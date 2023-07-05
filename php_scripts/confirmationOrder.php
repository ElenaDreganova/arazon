<?php require($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');
require($_SERVER['DOCUMENT_ROOT'] . '/configs/function.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = getCurrentUser();
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];

    $phone = $_POST['phone'];
    $phone = str_replace('+', '', $phone);

    $country = $_POST['country'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $postcode = $_POST['postcode'];

    if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    // Добавляем данные в БД
    $sql ="UPDATE `order_cart` SET `status` = 'Your order has been received.' WHERE `ordernumber` = ".$_SESSION['order_number'];
    $sql2 = "UPDATE `users` SET  `telephone` = '$phone', `country` = '$country', `city` = '$city' , `address` = '$address', `postcode` = '$postcode' WHERE `id` =" . $user['id'];
    if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)) {
        unset($_SESSION['order_number']);
    } else {
        echo "Error adding data: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
