<?php
require($_SERVER['DOCUMENT_ROOT'] . '/admin/modules/newsletters/all.php');

if (!empty($_GET['p'])) {
    switch ($_GET['p']) {
        case 'edit':
            require($_SERVER['DOCUMENT_ROOT'] . '/admin/modules/newsletters/edit.php');
            break;
        case 'add':
            require($_SERVER['DOCUMENT_ROOT'] . '/admin/modules/newsletters/add.php');
            break;
        case 'delete':
            require($_SERVER['DOCUMENT_ROOT'] . '/admin/modules/newsletters/delete.php');
            break;
    }
}
