<?php require($_SERVER['DOCUMENT_ROOT'] . '/admin/partials/header.php');  ?>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/admin/partials/sidebar.php'); ?>


<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <div class="container-fluid py-4 px-5">

    <!-- Navbar -->
    <?php require($_SERVER['DOCUMENT_ROOT'] . '/admin/partials/navbar.php');  ?>


    <?php
      require($_SERVER['DOCUMENT_ROOT'] . '/admin/modules/users/all.php');
      require($_SERVER['DOCUMENT_ROOT'] . '/admin/modules/products/all.php');  
      // require($_SERVER['DOCUMENT_ROOT'] . '/admin/modules/newsletters/all.php');  
    ?>


    <!-- Footer -->
    <?php require($_SERVER['DOCUMENT_ROOT'] . '/admin/modules/tables_main_footer.php');  ?>

  </div>
</main>


<?php require($_SERVER['DOCUMENT_ROOT'] . '/admin/partials/footer.php');  ?>