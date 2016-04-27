<?php

if (!isset($_SESSION)) {
    session_start();
}
include_once '../vendor/autoload.php';
use app\src\User;
$id = $_GET['id'];
$deleteCategory = new User();
$deleteCategory->delCategory($id);
?>
