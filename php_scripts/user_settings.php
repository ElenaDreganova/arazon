<?php
require($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');
require($_SERVER['DOCUMENT_ROOT'] . '/configs/function.php');
$imageName = '';
$user = getCurrentUser();
$name = $_POST['name'];
$surname = $_POST['surname'];
$combinedUsername = implode(' ', [$name, $surname]);
$phone = $_POST['phone'];
$phone = str_replace('+', '', $phone);
$country = $_POST['country'];
$city = $_POST['city'];
$address = $_POST['address'];
$postcode = $_POST['postcode'];

if (!empty($_FILES['image']['name'])) {
    $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/avatar/';
    $imageName = generateRandomString(64) . time() . "." . pathinfo($_FILES['image']['name'])['extension'];
    $uploadfile = $uploaddir . $imageName;
    move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);
    $sql = "UPDATE `users` SET `username` = '$combinedUsername', `telephone` = '$phone', `country` = '$country', `city` = '$city' , `address` = '$address', `postcode` = '$postcode',`avatar` = '$imageName' WHERE `id` =" . $user['id'];
    if (mysqli_query($conn, $sql)) {
        echo json_encode(array('success' => true, 'imageName' => $imageName,'username' => $combinedUsername));
    } else {
        echo json_encode(array('success' => false, 'message' => "Error: " . $sql . "<br>" . mysqli_error($conn)));
    }
    
    mysqli_close($conn);
} else {
    $sql = "UPDATE `users` SET `username` = '$combinedUsername', `telephone` = '$phone', `country` = '$country', `city` = '$city' , `address` = '$address', `postcode` = '$postcode' WHERE `id` =" . $user['id'];
    if (mysqli_query($conn, $sql)) {
        echo json_encode(array('success' => true, 'username' => $combinedUsername));

    } else {
        echo "Error:" . $sql . "<br>" . mysqli_error($conn);
    }
}
