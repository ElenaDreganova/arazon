<?php
require($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');
require($_SERVER['DOCUMENT_ROOT'] . '/configs/function.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Получаем данные о продуктах из массива $_POST['cartProducts']
    $cartProducts = $_POST['cartProducts'];

    foreach ($cartProducts as $product) {
        $id = $product['id'];
        $quantity = $product['quantity'];
        $total = $product['total'];

        $sql = "UPDATE `order_cart` SET `quantity` = '$quantity', `total` = '$total' WHERE `product_id` = '$id'";
        
        $result = mysqli_query($conn, $sql);
        
        if (!$result) {
            die('Error updating product: ' . mysqli_error($conn));
        }
        
    }
    

    $result =getCartSum($_SESSION['order_number']);
    // Отправляем ответ об успешном выполнении операции
   
    header('Content-Type: application/json');
    echo json_encode(array('success' => true,'sql'=> $sql,'totalSUM'=>$result));
    mysqli_close($conn);
} else {
    // Если запрос не является POST, отправляем ошибку
    header('HTTP/1.1 405 Method Not Allowed');
    header('Allow: POST');
    echo 'Invalid request method';
}
