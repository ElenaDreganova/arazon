<?php
require($_SERVER['DOCUMENT_ROOT'] . '/admin/partials/header.php');
require($_SERVER['DOCUMENT_ROOT'] . '/admin/partials/sidebar.php');
?>
<style>
    .navbar-vertical.navbar-expand-xs {
        overflow-y: unset;
    }
</style>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <div class="container-fluid py-4 px-5">

        <?php
        $page = 'tables';
        if (isset($_GET['page'])) {
            switch ($_GET['page']) {
                case 'users':
                    $page = 'users';
                    break;
                case 'products':
                    $page = 'products';
                    break;
                case 'categories':
                    $page = 'categories';
                    break;
                case 'orders':
                    $page = 'orders';
                    break;
                case 'newsletters':
                    $page = 'newsletters';
                    break;
                case 'request':
                    $page = 'request';
                    break;
            }
        }
        require($_SERVER['DOCUMENT_ROOT'] . "/admin/pages/$page.php");
        require($_SERVER['DOCUMENT_ROOT'] . '/admin/modules/tables_main_footer.php');
        ?> </div>
</main>

<?php
require($_SERVER['DOCUMENT_ROOT'] . '/admin/partials/footer.php')
?>