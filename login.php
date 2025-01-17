<?php
require_once 'includes/autoloader.inc.php';
session_start();

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $user = new userController();
    $user->login($username, $password);
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
                <span id="toggle-password" class="toggle-text">Hide</span>
            </div>
            <button type="submit" name="submit">Login</button>
        </form>
        <p class="form-link">Don't have an account? <a href="signup.php">Register here</a></p>
    </div>
    <script>
        const passwordInput = document.getElementById("password");
const togglePassword = document.getElementById("toggle-password");

togglePassword.addEventListener("click", () => {
  const isPasswordVisible = passwordInput.type === "text";
  passwordInput.type = isPasswordVisible ? "password" : "text";
  togglePassword.textContent = isPasswordVisible ? "Show" : "Hide";
});

    </script>
</body>
</html>