<?php
require_once 'includes/autoloader.inc.php';

$user = new userController();
$user->logout();

header("Location: login.php");
exit();
?>