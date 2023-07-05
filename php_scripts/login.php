<?php
require($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');
if (!empty($_POST)) {
    $password=md5($_POST['password']);
    $sql = "SELECT * FROM users WHERE email ='" . $_POST['email'] . "' AND password ='" . $password . "'";
    $result = mysqli_query($conn, $sql);
    $user = $result->fetch_assoc();

    if ($user) {
        $_SESSION["user_id"] = $user['id'];
        if (isset($_POST['remember'])) { // куки 
            setcookie(
                'user_id',
                $user['id'],
                time() + 60 * 60 * 24 * 30,
                '/'
            );
        } 
        header("Location: /index.php"); // редирект
    } else {
        
        $_SESSION["user_id"] = null; // очистить данные выйти из сесии
        setcookie(
            'user_id',  // пользователб
            '', // конкретный пользователь
            0, // время куки на 0
            '/' // сохраняем на всех страницах домена
        );
        header("Location: /login-form.php"); // редирект
        
    }
}
?>

