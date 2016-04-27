<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once '../vendor/autoload.php';

use app\src\User;
$updateCategory = new User();


$updateCategory->prepare($_POST)->updateCategory();




echo "<pre>";
print_r($_POST);
echo "</pre>";

?>
