<?php
require($_SERVER['DOCUMENT_ROOT'] . '/admin/modules/users/all.php');

if (!empty($_GET['p'])) {
    switch ($_GET['p']) {
        case 'edit':
            require($_SERVER['DOCUMENT_ROOT'] . '/admin/modules/users/edit.php');
            break;
        case 'add':
            require($_SERVER['DOCUMENT_ROOT'] . '/admin/modules/users/add.php');
            break;
        case 'delete':
            require($_SERVER['DOCUMENT_ROOT'] . '/admin/modules/users/delete.php');
            break;
    }
}
