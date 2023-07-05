<?php
require($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');
require($_SERVER['DOCUMENT_ROOT'] . '/configs/function.php');
if (!isset($_SESSION)) {
  session_start();
}
$is_session = isset($_SESSION['user_id']) && ($_SESSION["user_id"]) != null;
$is_cookie = isset($_COOKIE['user_id']) && ($_COOKIE["user_id"]) != null;
$user = getCurrentUser();
$liked = false;
?>
<!doctype html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>aranoz</title>
  <link rel="icon" href="/assets/img/favicon.png">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <!-- animate CSS -->
  <link rel="stylesheet" href="/assets/css/animate.css">
  <!-- owl carousel CSS -->
  <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="/assets/css/lightslider.min.css">
  <link rel="stylesheet" href="/assets/css/nice-select.css">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="/assets/css/all.css">
  <!-- flaticon CSS -->
  <link rel="stylesheet" href="/assets/css/flaticon.css">
  <link rel="stylesheet" href="/assets/css/themify-icons.css">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="/assets/css/magnific-popup.css">
  <!-- swiper CSS -->
  <link rel="stylesheet" href="/assets/css/slick.css">
  <link rel="stylesheet" href="/assets/css/price_rangs.css">
  <!-- style CSS -->
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="stylesheet" href="/assets/css/user-profile.css">
</head>

<body>
  