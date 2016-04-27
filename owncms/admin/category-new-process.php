<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once '../vendor/autoload.php';
use app\src\User;
use app\src\Message;
$user = new User();
if (!$user->getSession()) {
    header('Location:../login.php');
}

$sID        =  $_SESSION['uid'];
$sUname     =  $_SESSION['uname'];
$sUemail    =  $_SESSION['uemail'];
$sUuniqueID =  $_SESSION['uniqueid'];

$user->prepare($_POST)->insertCategoryName();


?>
