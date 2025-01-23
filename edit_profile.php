<?php
session_start();
require_once 'includes/autoloader.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $profile_picture = $_FILES['profile_picture'];
    $temp_file= $_FILES['profile_picture']['tmp_name'];

    $user = new userController();
    
    // $user->updatePro($userId, $username,  $profile_picture);

    // Handle Profile Picture Upload
    // if ($profile_picture['error'] === UPLOAD_ERR_OK) {
    //     $targetDir = 'uploads/';
    //      $fileName = uniqid() . "-" . basename($profile_picture['name']);
    //     $targetFile = $targetDir . $fileName;
    //     move_uploaded_file($temp_file , $targetFile);
    // } else {
    //     $targetFile = "img/default_pic.png"; // Default image
    // }
    $target_dir = "uploads/";
$target_file = $target_dir . basename( $profile_picture["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($temp_file);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($profile_picture["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($temp_file, $target_file)) {
    echo "The file ". htmlspecialchars( basename( $profile_picture["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

    // Update User Info
    $result = $user->updatePro($_SESSION['userId'], $username, $target_file);

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