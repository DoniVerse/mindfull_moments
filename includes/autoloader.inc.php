<?php
spl_autoload_register('myAutoLoader');

function myAutoLoader($className) {
    $path ="classes/";
    $extension = ".class.php";
    $fullPath = $path . $className . $extension;

    if (!file_exists($fullPath)) {
        die("File not found: $fullPath");  // Debugging info
    }

    include_once $fullPath;
}
?>
