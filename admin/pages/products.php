<?php
require($_SERVER['DOCUMENT_ROOT'] . '/admin/modules/products/all.php');

if (!empty($_GET['p'])) {
    switch ($_GET['p']) {
        case 'edit':
            require($_SERVER['DOCUMENT_ROOT'] . '/admin/modules/products/edit.php');
            break;
        case 'add':
            require($_SERVER['DOCUMENT_ROOT'] . '/admin/modules/products/add.php');
            break;
        case 'delete':
            require($_SERVER['DOCUMENT_ROOT'] . '/admin/modules/products/delete.php');
            break;
    }
}
