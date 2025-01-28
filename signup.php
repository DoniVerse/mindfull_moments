<?php
require_once 'controller/userController.class.php';
session_start();

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $confirmPassword = $_POST['confirm_password'];
  
    function validatePassword($password) {
       
        $pattern = '/^(?=.*[A-Z].*[A-Z])  # At least 2 uppercase letters
                     (?=.*[a-z])           # At least 1 lowercase letter
                     (?=.*\d.*\d.*\d)     # At least 3 numbers
                     (?=.*[\W_].*[\W_])  # At least 2 special characters
                     .{8,}$               # Minimum 8 characters
                    /x';

        return preg_match($pattern, $password);
    }
    if(empty($username) || empty($password) || empty($email) || empty($confirmPassword)) {
        $error = "All fields are required";
    } elseif($password !== $confirmPassword) {
        $error = "Passwords do not match";
    } 
    elseif (!validatePassword($password)) {
        $error = "Password must be at least 8 characters, 
        include 2 uppercase letters, 3 numbers, 1 lowercase letter, 
        and 2 special characters.";
    } 
    else {
        $user = new userController();
        $result = $user->register($username, $password);
        
        if($result === "success") {
            header("Location: login.php?registered=success");
            exit();
        } else {
            $error = $result;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>
    <div class="login-container">
        <h2>signup</h2>
        <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
            </div> <div class="form-group">
                <label for="email">email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
                <span id="toggle-password" class="toggle-text">Hide</span>
               
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" name="confirm_password" id="confirm_password" required>
                
            </div>
            <button type="submit" name="submit">signup</button>
        </form>
        <p class="form-link">Already have an account? <a href="login.php">Login here</a></p>
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
