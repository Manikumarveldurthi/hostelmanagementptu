<?php
session_start();
require '../includes/config.inc.php';

if (isset($_POST['submit'])) {
    $hostel = $_POST['hostel'];
    $menuFile = $_FILES['menuFile'];

    $fileName = $menuFile['name'];
    $fileTmpName = $menuFile['tmp_name'];
    $fileSize = $menuFile['size'];
    $fileError = $menuFile['error'];
    $fileType = $menuFile['type'];

    // Extract the file extension and convert it to lowercase
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // Define allowed file types
    $allowed = array('txt', 'pdf', 'doc', 'docx', 'jpg', 'jpeg', 'png', 'gif');

    // Check if the file type is allowed
    if (in_array($fileExt, $allowed)) {
        // Check for any errors during file upload
        if ($fileError === 0) {
            // Check if the file size is less than 1MB
            if ($fileSize < 1000000) {
                // Create a new filename with the hostel name and the original extension
                $fileNameNew = $hostel . "_menu." . $fileExt;
                // Define the destination path for the uploaded file
                $fileDestination = '../menus/' . $fileNameNew;
                // Move the uploaded file to the destination
                if (move_uploaded_file($fileTmpName, $fileDestination)) {
                    header("Location: admin_home.php?uploadsuccess");
                    exit();
                } else {
                    echo "There was an error moving the uploaded file!";
                }
            } else {
                echo "Your file is too big!";
            }
        } else {
            echo "There was an error uploading your file!";
        }
    } else {
        echo "You cannot upload files of this type!";
    }
} else {
    header("Location: admin_home.php");
    exit();
}
?>
