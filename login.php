<?php
require_once __DIR__ . '/includes/autoloader.inc.php';
session_start();

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $user = new User();
    if($user->login($username, $password)) {
        header("Location: dashboard.php");
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
   <link rel="stylesheet" href="css/signup.css">
</head>
<body>
<div class="login-container">
        <h2>Login</h2>
        <?php 
        if(isset($_GET['registered']) && $_GET['registered'] === 'success') {
            echo "<p class='success'>Registration successful! Please login.</p>";
        }
        if(isset($error)) echo "<p class='error'>$error</p>"; 
        ?>
        <form method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit" name="submit">Login</button>
        </form>
        <p class="form-link">Don't have an account? <a href="signup.php">Register here</a></p>
    </div>
</body>
</html>