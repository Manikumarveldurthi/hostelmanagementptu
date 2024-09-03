<?php
session_start();
require '../includes/config.inc.php';

if (isset($_GET['hostel'])) {
    $hostel = $_GET['hostel'];

    
    $allowed = array('txt', 'pdf', 'doc', 'docx', 'jpg', 'jpeg', 'png', 'gif');

    
    $fileDeleted = false;

    
    foreach ($allowed as $ext) {
        $filePath = "../menus/{$hostel}_menu.{$ext}";

        if (file_exists($filePath)) {
            if (unlink($filePath)) {
                $fileDeleted = true;
                break;
            }
        }
    }

    if ($fileDeleted) {
        header("Location: admin_home.php?deletesuccess");
    } else {
        header("Location: admin_home.php?deletefail");
    }
} else {
    header("Location: admin_home.php");
}
?>
