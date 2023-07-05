<?php
require($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');
require($_SERVER['DOCUMENT_ROOT'] . '/configs/function.php');
$user = getCurrentUser();
$user = $user['id'];
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `favorites` WHERE `id_user` = '$user' and `product_id` =" .$id;
    if (mysqli_query($conn, $sql)) {
        echo "success";
    } else {
        echo "error";
    }
}
