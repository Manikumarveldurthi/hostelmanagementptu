<?php
session_start();
require 'includes/config.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>HOME</title>

    
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
    

    <link href="web_home/css_home/slider.css" type="text/css" rel="stylesheet" media="all">

    
    <link rel="stylesheet" href="web_home/css_home/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="web_home/css_home/style.css" type="text/css" media="all"/> <!-- Style-CSS -->
    <link rel="stylesheet" href="web_home/css_home/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
    
    <link rel="stylesheet" href="web_home/css_home/flexslider.css" type="text/css" media="screen" property="" /><!-- flexslider css -->
    
    <link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
    
</head>

<body>


<div class="banner" id="home">
    <div class="cd-radial-slider-wrapper">

        
        <header>
            <div class="container agile-banner_nav">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">

                    <h1><a class="navbar-brand" href="home.php">PTU <span class="display"></span></a></h1>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="services.php">Blocks</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="payment_form.php">Payment</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="services_mess.php">Mess</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="weather.php">WEATHER</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="blog_add.php">ADD BLOGS</a>
                            </li>
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <?php echo $_SESSION['roll']; ?>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu agile_short_dropdown">
                                    <li>
                                        <a href="profile.php">MY PROFILE</a>
                                    </li>
                                    <li>
                                        <a href="includes/logout.inc.php">LOGOUT</a>
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
                        <image height='800px' width="1400px" clip-path="url(#cd-image-1)" xlink:href="web_home/images/1.png"></image>
                    </svg>
                </div>
                <div class="cd-radial-slider-content">
                    <div class="wrapper">
                        <div class="text-center">
                            <h2>PTU HOSTELS</h2>
                            <h3> MANAGEMENT SYSTEM </h3>

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
                        <image height='800px' width="1400px" clip-path="url(#cd-image-2)" xlink:href="web_home/images/2.png"></image>
                    </svg>
                </div> 
                <div class="cd-radial-slider-content text-center">
                    <div class="wrapper">
                        <div class="text-center">
                            <h3>ROOMS</h3>
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
                        <image height='800px' width="1400px" clip-path="url(#cd-image-3)" xlink:href="web_home/images/3.png"></image>
                    </svg>
                </div> 
                <div class="cd-radial-slider-content">
                    <div class="wrapper">
                        <div class="text-center">
                            <h3>HOSTELS</h3>
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

<div class="container">
    <h2>Welcome to PTU Hostel Management System</h2>
    <div class="cookie-info">
        <?php
        if (isset($_COOKIE['userId']) && isset($_COOKIE['userRoll'])) {
            echo "<p>User ID: " . $_COOKIE['userId'] . "</p>";
            echo "<p>User Roll No: " . $_COOKIE['userRoll'] . "</p>";
            echo "<p>First Name: " . $_COOKIE['userFname'] . "</p>";
            echo "<p>Last Name: " . $_COOKIE['userLname'] . "</p>";
            echo "<p>Department: " . $_COOKIE['userDept'] . "</p>";
            echo "<p>Year of Study: " . $_COOKIE['userYear'] . "</p>";
        } else {
            echo "<p>No user information found.</p>";
        }
        ?>
    </div>
</div>


<footer class="py-5">
    <div class="container py-md-5">
        <div class="footer-logo mb-5 text-center">
            <a class="navbar-brand" href="https://ptuniv.edu.in/" target="_blank">PTU <span class="display"> PUDUCHERRY</span></a>
        </div>
        <div class="footer-grid">
            

            <div class="list-footer">
                <ul class="footer-nav text-center">
                    <li>
                        <a href="home.php">Home</a>
                    </li>

                    <li>
                        <a href="services.php">Blocks</a>
                    </li>
                    <li>
                        <a href="profile.php">Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<script type="text/javascript" src="web_home/js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="web_home/js/bootstrap.js"></script> 

<script src="web_home/js/snap.svg-min.js"></script>
<script src="web_home/js/main.js"></script> 

<script defer src="web_home/js/jquery.flexslider.js"></script>
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

<script src="web_home/js/SmoothScroll.min.js"></script>
<script type="text/javascript" src="web_home/js/move-top.js"></script>
<script type="text/javascript" src="web_home/js/easing.js"></script>
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
