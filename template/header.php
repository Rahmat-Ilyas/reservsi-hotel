<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hotel Paradiso Makassar</title>

    <!-- Favicon -->
    <link rel="icon" href="images/favicon_p.png" type="image/x-icon" />
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Animate CSS -->
    <link href="vendors/animate/animate.css" rel="stylesheet">
    <!-- Icon CSS-->
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <!-- Camera Slider -->
    <link rel="stylesheet" href="vendors/camera-slider/camera.css">
    <!-- Owlcarousel CSS-->
    <link rel="stylesheet" type="text/css" href="vendors/owl_carousel/owl.carousel.css" media="all">

    <!--Theme Styles CSS-->
    <link rel="stylesheet" type="text/css" href="css/style.css" media="all" />

    <!-- jQuery JS -->
    <script src="js/jquery-1.12.0.min.js"></script>

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
<![endif]-->
</head>
<body>
    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Top Header_Area -->
    <section class="top_header_area">
       <div class="container">
        <ul class="nav navbar-nav top_nav">
            <li><a href="#"><i class="fa fa-phone"></i>(0411) 582582</a></li>
            <li><a href="#"><i class="fa fa-envelope-o"></i>info@hotelparadisomakassar.com</a></li>
            <li><a href="#"><i class="fa fa-clock-o"></i>Buka 24 Jam (Non Stop)</a></li>
            <li style="margin-left: 150px;"><a href="#">
                <i class="wow fadeInUp animated"></i>Jl.Perintis Kemerdekaan No. B/19Makassar SUL-SEL</a>
            </li>
        </ul>
    </div>
</section>
<!-- End Top Header_Area -->

<!-- Header_Area -->
<nav class="navbar navbar-default header_aera" id="main_navbar">
    <div class="container">
        <!-- searchForm -->
        <div class="searchForm">
            <form method="POST" action="web.php?<?= url('room') ?>" class="row m0">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="search" name="search" class="form-control" placeholder="Cari Kamar Pilihan Anda">
                    <span class="input-group-addon form_hide"><i class="fa fa-times"></i></span>
                </div>
            </form>
        </div><!-- End searchForm -->
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="col-md-2 p0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#min_navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="web.php?<?= url('home_user') ?>"><img src="images/1.png" alt=""></a>
            </div>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="col-md-10 p0">
            <div class="collapse navbar-collapse" id="min_navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="web.php?<?= url('home_user') ?>">Home</a></li>
                    <li><a href="web.php?<?= url('profil') ?>">Profil</a></li>
                    <li><a href="web.php?<?= url('room') ?>">Room</a></li>
                    <li><a href="web.php?<?= url('contact') ?>">Contact</a></li>
                    <li class="dropdown submenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">User</a>
                        <ul class="dropdown-menu other_dropdwn">
                            <li><a href="web.php?<?= url('login') ?>">Login</a></li>
                            <li><a href="web.php?<?= url('register') ?>">Register</a></li>
                        </ul>
                    </li>
                    <li><a href="#" class="nav_searchFrom"><i class="fa fa-search"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
