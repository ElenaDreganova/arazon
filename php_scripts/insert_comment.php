<?php require($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');
require($_SERVER['DOCUMENT_ROOT'] . '/configs/function.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = getCurrentUser();
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $product_id = $_POST['product_id'];
    $phone = $_POST['phone'];
    $currentDate = date('jS M, Y \a\t h:i a');

    if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
    }


    $sql = "INSERT INTO `comments` ( `text`, `product_id`, `user_id`) VALUES ( '$message', '$product_id', '{$user['id']}')";
    if (mysqli_query($conn, $sql)) {
        $html = '<div class="review_item" id="commentsList">
        <div class="media">
          <div class="d-flex">
            <img style="object-fit:cover;width:50px;height:50px;border-radius:50%;" src="/uploads/avatar/' . $user['avatar'] . '" alt="" />
          </div>
          <div class="media-body">
            <h4>' . $user['username'] . '</h4>
            <h5>' . $currentDate . '</h5>
          </div>
        </div>
        <p>' . $message . '</p>
      </div>';
        echo $html;
    } else {
        echo "Error adding data: " . mysqli_error($conn);
        $html = "errro";
        echo $html;
    }

    mysqli_close($conn);
}
