<?php require($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');
require($_SERVER['DOCUMENT_ROOT'] . '/configs/function.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $subject = $_POST['subject'];


    if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    // Добавляем данные в БД
    $sql ="INSERT INTO `request` (`name`, `email`, `message`, `subject`) VALUES ( '$name', '$email', '$message', '$subject')";
    if (mysqli_query($conn, $sql)) {

    } 

    mysqli_close($conn);
}
