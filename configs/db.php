<?php
$servername = "localhost";
$database = "aranoz";
$username = "root";
$password = "";
// Создаем соединение
$conn = mysqli_connect($servername, $username, $password, $database);
$conn->set_charset("utf8mb4");
// Проверяем соединение
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

if (!isset($_SESSION)) {
	session_start();
}
?>