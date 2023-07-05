<?php
require($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');
require($_SERVER['DOCUMENT_ROOT'] . '/configs/function.php');

$orderID = $_POST['orderID'];
$email = $_POST['email'];
$userbyEmail = getidUserbyEmail($email);
if ($userbyEmail > 0) {
    $sql = "SELECT * FROM `order_cart` WHERE `ordernumber`= '$orderID'  AND `user_id` =" . $userbyEmail['id'];
    if (mysqli_query($conn, $sql)) {
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        if ($row > 0) {
            $html = $row['status'];
        } else {
            $html = 'No found. Check that the <b> orderID </b> is entered correctly';
        }
        echo $html;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
} else {
    if (empty($orderID) && empty($email)) {
        $html = "No data entered";
    } else {
        $html = "No found. <b>Check</b> that data entered";
    }
    echo $html;
}

