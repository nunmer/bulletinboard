<?php
include('connection.php'); //Связь с БД

if (isset($_POST['feedback_btn'])) {
			
			$name = mysqli_real_escape_string($conn, $_REQUEST['name']);
			$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
			$subject = mysqli_real_escape_string($conn, $_REQUEST['subject']);
			$message = mysqli_real_escape_string($conn, $_REQUEST['message']);
			
			mysqli_query($conn,"INSERT INTO `feedbacks`(`feedback_id`, `name`, `email`, `subject`, `message`) VALUES ('','$name','$email', '$subject', '$message')");
			
			echo("<script>alert('Thank you, for your feedback!')</script>");
			echo("<script>window.location = 'index.html';</script>");
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>Contact | Page</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">

    <!--====== Nice Select CSS ======-->
    <link rel="stylesheet" href="assets/css/nice-select.css">

    <!--====== Font Awesome CSS ======-->
    <link rel="stylesheet" href="assets/css/all.min.css">

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="assets/css/default.css">

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body class="gray-bg">
    
    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->

    <!--====== HEADER PART START ======-->

    <header class="header_area">

        <div class="header_navbar">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="index.html">
                        <!-- -->
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="fasse" aria-label="Toggle navigation">
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto">
                            <li>
                                <a class="active" href="index.html">Home <span class="line"></span></a>
                            </li>
                            <li>
                                <a href="#">Pages <i class="fa fa-angle-down"></i> <span class="line"></span></a>

                                <ul class="sub-menu">
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="login.php">Sign In</a></li>
                                    <li><a href="register.html">Sign Up</a></li>
                                </ul>
                            </li>
							
                            <li><a href="contact.php">Contact <span class="line"></span></a></li>
                        </ul>
                    </div>

                    <div class="navbar_btn">
                        <ul>
                            <li>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="fasse">My Account</a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <ul>
                                            <li><a href="login.php"><i class="fas fa-layer-group"></i> My Ads</a></li>
                                            <li><a href="favourite-ads.html"><i class="fas fa-heart"></i> My Favourites</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li><a class="sign-up" href="login.php">Post Ads</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <div class="page_banner bg_cover" style="background-image: url(assets/images/page-banner.jpg)">
            <div class="container">
                <div class="page_banner_content">
                    <h3 class="title">Contact Us</h3>
                    <ul class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <!--====== HEADER PART ENDS ======-->
    
    <!--====== CONTACT PART START ======-->

    <section class="contact_page pt-120 pb-120">
        <div class="container">
            
            <div class="row">
                <div class="col-lg-8">
                    <div class="contact_form mt-30">
                        <div class="contact_title">
                            <h5 class="title">Send Message Us </h5>
                        </div>
                        <form method="post">
                            <div class="contact_form_wrapper">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="single_form">
                                            <input type="text" name="name" placeholder="Name">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single_form">
                                            <input type="email" name="email" placeholder="Email">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single_form">
                                            <input type="text" name="subject" placeholder="Subject">
                                            <i class="far fa-i-cursor"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single_form">
                                            <textarea name="message" placeholder="Message"></textarea>
                                            <i class="fas fa-edit"></i>
                                        </div>
                                    </div>
                                    <p class="form-message"></p>
                                    <div class="col-md-12">
                                        <div class="single_form">
                                            <button class="main-btn" name="feedback_btn">Send Message</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact_info">
                        <div class="contact_title mt-30">
                            <h5 class="title">Call us</h5>
                        </div>
                        <p>If you need technical support, contact using address below:</p>
                        
                        <div class="single_info d-flex">
                            <div class="info_icon">
                                <i class="far fa-map"></i>
                            </div>
                            <div class="info_content media-body">
                                <p>Kazakhstan, Aktobe, Batys-2, Nazarbayev Intellectual School</p>
                            </div>
                        </div>
                        <div class="single_info d-flex">
                            <div class="info_icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="info_content media-body">
                                <p>+7 747 345 67 89</p>
                                <p>+7 775 345 56 67</p>
                            </div>
                        </div>
                        <div class="single_info d-flex">
                            <div class="info_icon">
                                <i class="fas fa-envelope-open-text"></i>
                            </div>
                            <div class="info_content media-body">
                                <p>info@nis.edu.kz</p>
                                <p>info@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== CONTACT PART ENDS ======-->

    <!--====== CALL TO ACTION PART START ======-->

    <section class="call_to_action_area pt-20 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="call_to_action_content mt-45">
                        <h4 class="title">Subscribe For Update</h4>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="call_to_action_form mt-50">
                        <form action="#">
                            <i class="fas fa-envelope"></i>
                            <input type="text" placeholder="Enter your mail address . . .">
                            <button class="main-btn">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== CALL TO ACTION PART ENDS ======-->

    <!--====== FOOTER PART START ======-->

    <footer class="footer_area">
        <div class="footer_widget pt-70 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer_link mt-45">
                            <h5 class="footer_title">Company</h5>
                            <ul class="link">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Our Factories</a></li>
                                <li><a href="#">Mission and Strategy</a></li>
                                <li><a href="#">Profitable Actions</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer_link mt-45">
                            <h5 class="footer_title">How to Sell Fast</h5>
                            <ul class="link">
                                <li><a href="#">Selling TIps</a></li>
                                <li><a href="#">Buy and Sell Quickly</a></li>
                                <li><a href="#">Membership</a></li>
                                <li><a href="#">Banner Advertising</a></li>
                                <li><a href="#">Promote Your Ad</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer_link mt-45">
                            <h5 class="footer_title">Information</h5>
                            <ul class="link">
                                <li><a href="#">Company & Contact Info</a></li>
                                <li><a href="#">Blog & Articles</a></li>
                                <li><a href="#">Sitemap</a></li>
                                <li><a href="#">Terms of Service</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer_link mt-45">
                            <h5 class="footer_title">Help & Support</h5>
                            <ul class="link">
                                <li><a href="#">Live Chat</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">How to Stay Safe</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->

    <!--====== PART START ======-->

<!--
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-">
                    
                </div>
            </div>
        </div>
    </section>
-->

    <!--====== PART ENDS ======-->










    <!--====== Jquery js ======-->
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--====== Slick js ======-->
    <script src="assets/js/slick.min.js"></script>

    <!--====== Magnific Popup js ======-->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>

    <!--====== Nice Select js ======-->
    <script src="assets/js/jquery.nice-select.min.js"></script>

    <!--====== Counter Up js ======-->
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>

    <!--====== Price Range js ======-->
    <script src="assets/js/ion.rangeSlider.min.js"></script>

    <!--====== Ajax Contact js ======-->
    <script src="assets/js/ajax-contact.js"></script>

    <!--====== Main js ======-->
    <script src="assets/js/main.js"></script>

</body>

</html>
