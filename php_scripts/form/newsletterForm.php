<?php
require($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');
require($_SERVER['DOCUMENT_ROOT'] . '/configs/function.php');

$email = $_POST['email'];

if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Добавляем данные в БД
$sql ="INSERT INTO `newsletter` (`email`) VALUES ('$email')";
if (mysqli_query($conn, $sql)) {

} 

mysqli_close($conn);