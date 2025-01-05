<?php
require_once 'includes/autoloader.inc.php';

$user = new User();
$user->logout();

header("Location: login.php");
exit();
?>