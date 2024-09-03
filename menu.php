<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    
    <link rel="stylesheet" href="path_to_your_stylesheet.css">
    
    <link rel="stylesheet" href="web_home/css_home/bootstrap.css">
</head>
<body>


<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="home.php">PTU <span class="display">PUDUCHERRY</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="container mt-4">
    <h2>Menu</h2>

    <div class="row">
        <div class="col-md-8">
            <h3>Available Menus</h3>
            <ul>
                <?php
                $hostels = ['hostel1', 'hostel2', 'hostel3', 'hostel4', 'hostel5', 'hostel6'];
                foreach ($hostels as $hostel) {
                    $menuFilePath = "menus/{$hostel}_menu.txt";
                    if (file_exists($menuFilePath)) {
                        echo "<li>{$hostel}: <a href=\"{$menuFilePath}\" target=\"_blank\">View Menu</a></li>";
                    } else {
                        echo "<li>{$hostel}: No menu uploaded</li>";
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</div>

<footer class="py-5">
    <div class="container">
        <div class="footer-logo mb-5 text-center">
            <a class="navbar-brand" href="https://ptuniv.edu.in/" target="_blank">PTU <span class="display">PUDUCHERRY</span></a>
        </div>
        <div class="footer-grid">
            <div class="list-footer">
                <ul class="footer-nav text-center">
                    <li><a href="home.php">Home</a></li>
                    
                </ul>
            </div>
        </div>
    </div>
</footer>

<script src="web_home/js/jquery-3.6.0.min.js"></script>
<script src="web_home/js/bootstrap.bundle.min.js"></script>

</body>
</html>
