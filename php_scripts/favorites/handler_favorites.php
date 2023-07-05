<?php
require($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');
require($_SERVER['DOCUMENT_ROOT'] . '/configs/function.php');
$user = getCurrentUser();

$response = array();

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    if (isset($user)) {
        $user_id = $user['id'];

        $sql = "SELECT * FROM  favorites WHERE id_user = '$user_id' and `product_id` =" . $product_id;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $sql = "DELETE FROM `favorites` WHERE id_user = '$user_id' and `product_id` =" . $product_id;
            $conn->query($sql);
            echo json_encode(['status' => 'disliked']);
        } else {
            $sql = "INSERT INTO favorites (id_user, product_id) VALUES ('$user_id', '$product_id')";
            if ($result = $conn->query($sql)) {
                echo json_encode(['status' => 'liked']);
            }
        }
    } else {
        echo 'no login';
    }
} else {
    echo 'error';
}

