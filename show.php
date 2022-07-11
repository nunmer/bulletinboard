<?php
include('connection.php'); //Связь с БД

if (isset($_POST["search"])) {
				$category_id = mysqli_real_escape_string($conn, $_REQUEST['select1']);
				$keyword = mysqli_real_escape_string($conn, $_REQUEST['keyword']); 
				
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>Search | Page</title>

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
                                <a href="#categories">Categories <span class="line"></span></a>
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
		
		<div class="header_content bg_cover">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        
                    </div>
                </div>
                <div class="header_search">
                    <form action="show.php" method="post">
                        <div class="search_wrapper d-flex flex-wrap">
                            <div class="search_column d-flex flex-wrap">	
                                <div class="search_select mt-15">
                                    <select placeholder="category" name="select1" value="<?php echo $category_id;?>">
										<option value="2">Electronic devices</option>
                                        <option value="1">Food</option>
                                        <option value="3">Work</option>
										<option value="4">Clothes</option>
                                    </select>
                                    <i class="fas fa-tag"></i>
                                </div>
                            </div>
                            <div class="search_column d-flex flex-wrap">
                                <div class="search_form mt-15">
                                    <input name="keyword" style="width: 600px; float: right;" type="text" value="<?php echo $keyword?>">
                                </div>
                                <div class="search_btn mt-15">
                                    <input name="search" type="submit" class="main-btn" value="Search">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="header_keyword d-sm-flex">
                        <span class="title">Trending Keywords:</span>
                        <ul class="tags media-body">
                            <li><a href="#">Camera</a></li>
                            <li><a href="#">Mobile</a></li>
                            <li><a href="#">DSLR</a></li>
                            <li><a href="#">Packet</a></li>
                            <li><a href="#">Dress</a></li>
                            <li><a href="#">Shirt</a></li>
                            <li><a href="#">Pant</a></li>
                            <li><a href="#">Shoe</a></li>
                            <li><a href="#">Table</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!--====== HEADER PART ENDS ======-->
    
    <!--====== PUBLISHED PART START ======-->

    <section class="published_area pt-115">
        <div class="container">
		<?php
				$counter = mysqli_query($conn, "SELECT COUNT(*) as Count FROM ads where category_id='$category_id' AND title LIKE '%$keyword%'"); 
				$categoryname = mysqli_query($conn, "SELECT category_name FROM categories where category_id='$category_id'"); 
				while($rows=mysqli_fetch_array($categoryname)){
				
		?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="section_title pb-15">
                        <h3 class="title"> "<?php echo $keyword;?>"</h3>
						<h3 style="color: grey;">Category: <?php echo $rows["category_name"]; }?> </h3>
						<?php while($rows=mysqli_fetch_array($counter)){?>
						<br><br>
						<h4 style="color: grey;">found <?php echo $rows["Count"]; }?> ad(s)</h4>
                    </div>
                </div>
            </div>
			<?php 
				}
			
				
				$query=mysqli_query($conn,"select * from `ads` where category_id='$category_id' AND title LIKE '%$keyword%'");
				
				
				while($row=mysqli_fetch_array($query)){

			
				
			?>
            <div class="published_wrapper">
                <div class="row">
                    <div style="width: 500px;" class="col-lg-6 col-sm-12">
                        <div class="single_ads_card mt-30">
                            <div class="ads_card_image">
                                <img src="<?php echo $row['photo']; ?>">
                            </div>
                            <div class="ads_card_content">
                                <div class="meta d-flex justify-content-between">
                                    <h3><?php echo $row['title']; ?></h3>
									
                                </div>
                                
                                <p><i class="far fa-map"></i><?php echo $row['location']; ?></p>
								<p><i class="fas fa-align-justify"></i><?php echo $row['description']; ?></p>
								<h4 class="title"><a href="#">CONTACTS: <?php echo $row['phone']; ?></a></h4>
								<h4 class="title"><a href="#">EMAIL: <?php echo $row['email']; ?></a></h4>
                                <div class="ads_price_date d-flex justify-content-between">	
                                    <span class="price"><i class="fas fa-tenge"></i> <?php echo $row['price']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
			<?php
				}
				
			?>
        </div>
    </section>

    <!--====== PUBLISHED PART ENDS ======-->

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
