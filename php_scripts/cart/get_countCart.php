<?php
require($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');
require($_SERVER['DOCUMENT_ROOT'] . '/configs/function.php');

$cart_count = 0; // Предположим, что корзина пуста
if (isset($_SESSION['order_number'])) {
    $cartID = getCart($_SESSION['order_number']);
    $row = $cartID->fetch_assoc();
    $num_rows = $cartID->num_rows; // Если корзина не пуста, считаем количество товаров в ней
}

// Формируем массив с количеством товаров в корзине
$data = array(
    'cart_count' => $num_rows
);

// Возвращаем результат в формате JSON
header('Content-Type: application/json');
echo json_encode($data);