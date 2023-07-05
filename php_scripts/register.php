<?php
require($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');
    if (!empty($_POST)) {
        $password=md5($_POST['password']);
        $sql = "INSERT INTO `users`(`username`, `email`, `password`) VALUES ('" . $_POST['name'] . "', '" . $_POST['email'] . "', '" . $password . "');";
        if (mysqli_query($conn, $sql)) {
            header("location: /login-form.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>