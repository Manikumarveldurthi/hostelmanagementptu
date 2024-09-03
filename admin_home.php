<?php
session_start();

require '../includes/config.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Home</title>


<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="keywords" content="Intrend Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript">
    addEventListener("load", function () {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
</script>


<link href="../web_home/css_home/slider.css" type="text/css" rel="stylesheet" media="all">


<link rel="stylesheet" href="../web_home/css_home/bootstrap.css"> 
<link rel="stylesheet" href="../web_home/css_home/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="../web_home/css_home/fontawesome-all.css">


<link rel="stylesheet" href="../web_home/css_home/flexslider.css" type="text/css" media="screen" property="" />



<link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">


</head>

<body>


<div class="banner" id="home">
    <div class="cd-radial-slider-wrapper">

     
        <header>
            <div class="container agile-banner_nav">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">

                    <h1><a class="navbar-brand" href="admin_home.php">PTU <span class="display"></span></a></h1>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="admin_home.php">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="create_hm.php">Appoint/Remove Hostel Manager</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="students.php">Students</a>
                            </li>

                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><?php echo $_SESSION['username']; ?>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu agile_short_dropdown">
                                    <li>
                                        <a href="admin_profile.php">My Profile</a>
                                    </li>
                                    <li>
                                        <a href="../includes/logout.inc.php">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                </nav>
            </div>
        </header>
       

        <ul class="cd-radial-slider" data-radius1="60" data-radius2="1364" data-centerx1="110" data-centerx2="1290">
            <li class="visible">
                <div class="svg-wrapper">
                    <svg viewBox="0 0 1400 800">
                        <title>Animated SVG</title>
                        <defs>
                            <clipPath id="cd-image-1">
                                <circle id="cd-circle-1" cx="110" cy="400" r="1364"/>
                            </clipPath>
                        </defs>
                        <image height='800px' width="1400px" clip-path="url(#cd-image-1)" xlink:href="../web_home/images/1.png"></image>
                    </svg>
                </div>
                <div class="cd-radial-slider-content">
                    <div class="wrapper">
                        <div class="text-center">
                            <h2>PTU HOSTELS </h2>
                            <h3>  MANAGEMENT SYSTEM</h3>

                        </div>
                    </div>
                </div> 
            </li>
            <li class="next-slide">
                <div class="svg-wrapper">
                    <svg viewBox="0 0 1400 800">
                        <title>Animated SVG</title>
                        <defs>
                            <clipPath id="cd-image-2">
                                <circle id="cd-circle-2" cx="1290" cy="400" r="60"/>
                            </clipPath>
                        </defs>
                        <image height='800px' width="1400px" clip-path="url(#cd-image-2)" xlink:href="../web_home/images/2.png"></image>
                    </svg>
                </div> 
                <div class="cd-radial-slider-content text-center">
                    <div class="wrapper">
                        <div class="text-center">
                            <h3>Rooms</h3>


                        </div>
                    </div>
                </div> 
            </li>
            <li>
                <div class="svg-wrapper">
                    <svg viewBox="0 0 1400 800">
                        <title>Animated SVG</title>
                        <defs>
                            <clipPath id="cd-image-3">
                                <circle id="cd-circle-3" cx="110" cy="400" r="60"/>
                            </clipPath>
                        </defs>
                        <image height='800px' width="1400px" clip-path="url(#cd-image-3)" xlink:href="../web_home/images/3.png"></image>
                    </svg>
                </div>
                <div class="cd-radial-slider-content text-center">
                    <div class="wrapper">
                        <div class="text-center">
                            <h3>Hostels </h3>


                        </div>
                    </div>
                </div> 
            </li>

        </ul> 
        <ul class="cd-radial-slider-navigation">
            <li><a href="#0" class="next"><i class="fas fa-chevron-right"></i></a></li>
            <li><a href="#0" class="prev"><i class="fas fa-chevron-left"></i></a></li>
        </ul> 
    </div> 
</div>





<div class="container mt-4" style="background-color: #f8f9fa; padding: 20px; border: 1px solid #dee2e6; border-radius: 5px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
    <h2 style="color: #007bff; margin-bottom: 20px;">Manage Menus</h2>
    <form action="upload_menu.php" method="post" enctype="multipart/form-data" style="margin-bottom: 20px;">
        <div class="form-group" style="margin-bottom: 20px;">
            <label for="hostel">Select Hostel:</label>
            <select class="form-control" name="hostel" id="hostel">
                <option value="hostel1">Hostel 1</option>
                <option value="hostel2">Hostel 2</option>
                <option value="hostel3">Hostel 3</option>
                <option value="hostel4">Hostel 4</option>
                <option value="hostel5">Hostel 5</option>
                <option value="hostel6">Hostel 6</option>
            </select>
        </div>
        <div class="form-group" style="margin-bottom: 20px;">
            <label for="menuFile">Upload Menu (TXT only):</label>
            <input type="file" class="form-control-file" name="menuFile" id="menuFile">
        </div>
        <button type="submit" class="btn btn-primary" name="submit" style="background-color: #007bff; border-color: #007bff;">Upload Menu</button>
    </form>

    
    <h3 class="mt-4" style="color: #007bff; margin-top: 20px;">Existing Menus</h3>
<ul class="existing-menus" style="list-style-type: none; padding-left: 0;">
    <?php
    $hostels = ['hostel1', 'hostel2', 'hostel3', 'hostel4', 'hostel5', 'hostel6'];
    foreach ($hostels as $hostel) {
        // Define allowed file types
        $allowed = array('txt', 'pdf', 'doc', 'docx', 'jpg', 'jpeg', 'png', 'gif');

        // Initialize variables
        $menuFile = '';
        $menuType = '';

        // Check for allowed file types
        foreach ($allowed as $ext) {
            $menuFilePath = "../menus/{$hostel}_menu.{$ext}";
            if (file_exists($menuFilePath)) {
                $menuFile = $menuFilePath;
                $menuType = $ext;
                break;
            }
        }

        if (!empty($menuFile)) {
            echo "<li style=\"margin-bottom: 10px;\"><span style=\"font-weight: bold; margin-right: 10px;\">{$hostel}:</span> <a href=\"{$menuFile}\" target=\"_blank\">View Menu ({$menuType})</a> | <a href=\"delete_menu.php?hostel={$hostel}\" style=\"color: #dc3545;\">Delete</a></li>";
        } else {
            echo "<li style=\"margin-bottom: 10px;\"><span style=\"font-weight: bold; margin-right: 10px;\">{$hostel}:</span> No menu uploaded</li>";
        }
    }
    ?>
</ul>

</div>




<footer class="py-5">
    <div class="container py-md-5">
        <div class="footer-logo mb-5 text-center">
            <a class="navbar-brand" href="https://ptuniv.edu.in/" target="_blank">PTU<span class="display"> PUDUCHERRY</span></a>
        </div>
        <div class="footer-grid">

            <div class="list-footer">
                <ul class="footer-nav text-center">
                    <li>
                        <a href="admin_home.php">Home</a>
                    </li>

                    <li>
                        <a href="create_hm.php">Appoint</a>
                    </li>
                    <li>
                        <a href="students.php">Student</a>
                    </li>
                    <li>
                        <a href="admin_profile.php">Profile</a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</footer>

<script type="text/javascript" src="../web_home/js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="../web_home/js/bootstrap.js"></script> 

<script src="../web_home/js/snap.svg-min.js"></script>
<script src="../web_home/js/main.js"></script> 


<script defer src="../web_home/js/jquery.flexslider.js"></script>
<script type="text/javascript">
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
</script>

<script src="../web_home/js/SmoothScroll.min.js"></script>
<script type="text/javascript" src="../web_home/js/move-top.js"></script>
<script type="text/javascript" src="../web_home/js/easing.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
       

        $().UItoTop({ easingType: 'easeOutQuart' });

        });
</script>


</body>
</html>
