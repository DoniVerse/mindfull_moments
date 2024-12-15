<?php
require_once __DIR__ . '/includes/autoloader.inc.php';
session_start();

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $user = new User();
    if($user->login($username, $password)) {
        header("Location: dashboard.html");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>
   <link rel="stylesheet" href="css/login.css">
</head>
<body>
   <div class="signup-form">
       <h2>login</h2>
       <?php 
        if(isset($_GET['registered']) && $_GET['registered'] === 'success') {
            echo "<p class='success'>Registration successful! Please login.</p>";
        }
        if(isset($error)) echo "<p class='error'>$error</p>"; 
        ?>
       <form action="" method="POST">
           <label for="username">Username:</label>
           <input type="text" id="username" name="username" required>
           <label for="password">Password:</label>
           <input type="password" id="password" name="password" required>
           
           <button type="submit">login</button>
       </form>
</body>
</html>