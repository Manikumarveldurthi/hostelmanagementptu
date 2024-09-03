<?php
session_start();
require 'includes/config.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Allocated Rooms</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="web_home/css_home/bootstrap.css">
    <link rel="stylesheet" href="web_home/css_home/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="web_home/css_home/fontawesome-all.css">
    <link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
</head>
<body>
<div class="inner-page-banner" id="home">
    <header>
        <div class="container agile-banner_nav">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <h1><a class="navbar-brand" href="home_manager.php">PTU <span class="display"></span></a></h1>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="home_manager.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="allocate_room.php">Allocate Room</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="allocate_mess_card.php">Allocate Mess</a>
                        </li>
                        <li class="dropdown nav-item">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Rooms
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu agile_short_dropdown">
                                <li>
                                    <a href="allocated_rooms.php">Allocated Rooms</a>
                                </li>
                                <li>
                                    <a href="empty_rooms.php">Empty Rooms</a>
                                </li>
                                <li>
                                    <a href="vacate_rooms.php">Vacate Rooms</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown nav-item">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Mess
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu agile_short_dropdown">
                                <li>
                                    <a href="allocated_mess_card.php">Allocated Mess</a>
                                </li>
                                <li>
                                    <a href="vacate_mess.php">Vacate Mess</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown nav-item">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><?php echo $_SESSION['username']; ?>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu agile_short_dropdown">
                                <li>
                                    <a href="admin/manager_profile.php">My Profile</a>
                                </li>
                                <li>
                                    <a href="includes/logout.inc.php">Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
</div>

<section class="contact py-5">
    <div class="container">
        <div id="ajax-content">
            <?php
            
            include 'allocated_rooms_content.php';
            ?>
        </div>


        <form id="searchForm" action="allocated_rooms_content.php" method="post">
            <div class="row">
                <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="Search by Roll Number" name="search_box">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
    </div>
</section>

<footer class="py-5">
    <div class="container py-md-5">
        <div class="footer-logo mb-5 text-center">
            <a class="navbar-brand" href="https://ptuniv.edu.in/" target="_blank">PTU <span class="display"> PUDUCHERRY</span></a>
        </div>
        <div class="footer-grid">
            <div class="list-footer">
                <ul class="footer-nav text-center">
                    <li>
                        <a href="home_manager.php">Home</a>
                    </li>
                    <li>
                        <a href="allocate_room.php">Allocate</a>
                    </li>
                    <li>
                        <a href="admin/manager_profile.php">Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<script src="web_home/js/jquery-3.6.0.min.js"></script>
<script src="web_home/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        function loadContent(page) {
            $.ajax({
                url: page,
                type: 'POST',
                success: function(response) {
                    $('#ajax-content').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        $('#searchForm').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: 'allocated_rooms_content.php',
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('#ajax-content').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        loadContent('allocated_rooms_content.php');
    });
</script>

</body>
</html>
