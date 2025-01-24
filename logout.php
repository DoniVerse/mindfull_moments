<?php
require_once 'controller/userController.class.php';

$user = new userController();
$user->logout();

header("Location: login.php");
exit();
?>