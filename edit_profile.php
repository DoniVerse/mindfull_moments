<?php
session_start();
require_once 'includes/autoloader.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $profile_picture = $_FILES['profile_picture'];
    $temp_file= $_FILES['profile_picture']['tmp_name'];

    $user = new User();

    // Handle Profile Picture Upload
    if ($profile_picture['error'] === UPLOAD_ERR_OK) {
        $targetDir = 'uploads/';
         $fileName = uniqid() . "-" . basename($profile_picture['name']);
        $targetFile = $targetDir . $fileName;
        move_uploaded_file($temp_file , $targetFile);
    } else {
        $targetFile = "img/default_pic.png"; // Default image
    }

    // Update User Info
    $result = $user->updateProfile($_SESSION['userId'], $username, $targetFile);

    if ($result) {
        echo "Profile updated successfully!";
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Error updating profile!";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit profile</title>
    <link rel="stylesheet" href="css/landing.css">
    <script type="text/javascript" src="javascript/landing.js" defer></script>
</head>
<body>
    <form  method="POST" enctype="multipart/form-data">
        <!-- File Upload -->
        <label for="profile_picture" class="profile-pic-label">
            <img src="img/default_pic.png" alt="Profile Picture" id="profilePreview">
            <input type="file" id="profile_picture" name="profile_picture" accept="image/*" onchange="previewImage(event)">
        </label>
    
        <!-- Username Input -->
        <label for="username">New Username:</label>
        <input type="text" id="username" name="username" placeholder="Enter new username" required>
    
        <button type="submit" class="update-button">Save Changes</button>
    </form>
    
</body>
</html>