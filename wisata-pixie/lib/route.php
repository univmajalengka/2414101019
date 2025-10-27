<?php
$route = $_GET['route'] ?? "home";

switch ($route) {
    case 'pemesan':
        include 'main/pemesan.php';
        break;
    case 'edit':
        include 'main/edit-form.php';
        break;
    case 'detail':
        include 'main/detail.php';
        break;

    default:
        include 'main/home.php';
        break;
}
