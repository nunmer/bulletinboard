<?php
	session_start(); //Сессия для пользователя
	include('connection.php'); //Связь с БД

	if(!isset($_SESSION['id'])){
		//Проверка на авторизацию
		echo("<script>alert('You are not authorized, please log in or register!')</script>");
		echo("<script>window.location = 'login.php';</script>");
		//header('Location: http://www.localhost/bulletinboard/login.php');
	}

 if (isset($_POST["image"])) {
	 //Если кнопка "Выбрать файл" нажата
	$fileInfo = PATHINFO($_FILES["image"]["name"]); //Двумерный массив для файла
	$url=$_GET['userid'];
	$size = $_FILES['image']['size']; //Берем объем файла
	
			$category_id = mysqli_real_escape_string($conn, $_REQUEST['select1']);
			$locationn = mysqli_real_escape_string($conn, $_REQUEST['location']); 
			$title = mysqli_real_escape_string($conn, $_REQUEST['title']);
			$price = mysqli_real_escape_string($conn, $_REQUEST['price']);
			$description = mysqli_real_escape_string($conn, $_REQUEST['description']); 
			$email = mysqli_real_escape_string($conn, $_REQUEST['email']); 
			$phone = mysqli_real_escape_string($conn, $_REQUEST['phone']); 
			
	echo $size.'bytes'; //Выводим размер файла
	if ($size >= 2000000) {
		//Если размер файла больше 2МБ
		?>
		<script>
			window.alert('Uploaded photo is to big!');
			window.history.back();
		</script>
		<?php
	}
	elseif (empty($_FILES["image"]["tmp_name"])){ //Если ничего не загружено
		?>
			<script>
				window.alert('Sorry photo is not uploaded!');
				window.history.back();
			</script>
		<?php
	}
	else{
	    //Проверка на правильность формат файла
		if ($fileInfo['extension'] == "jpg" OR $fileInfo['extension'] == "png" OR $fileInfo['extension'] == "jpeg") { 
			$name_file = $_FILES['image']['name'];
			$tmp_name = $_FILES['image']['tmp_name'];
			$newFilename = $fileInfo['filename'] .$fileInfo['extension'];
			move_uploaded_file($tmp_name, "upload/".$name_file);
			$location = "upload/" . $name_file;
			//Берем файл, даем название с папкой и вводим в БД
			
			mysqli_query($conn,"INSERT INTO `ads`(`ad_id`, `owner_id`, `category_id`, `title`, `photo`, `price`, `description`, `email`, `phone`, `location`) 
			VALUES ('','$url','$category_id','$title','$location','$price','$description','$email','$phone','$locationn')");
			echo("<script>alert('Great, your ad has been published!')</script>");
	        //Вводим в таблицу с ID пользователя
			
		}
		else{
			?>
				<script>
					window.alert('Photo not updated. Please upload JPG or PNG files only!');
					window.history.back();
				</script>
			<?php
		}
	}
}

if (isset($_POST['logout'])){
	session_unset();
	header('Location: http://www.localhost/bulletinboard/login.php');
}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>Profile | My ads</title>

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
                    <h3 class="title">User profile</h3>
                    <ul class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li>User profile</li>
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
				<?php
				$url=$_GET['userid'];

				$query=mysqli_query($conn,"select * from `users` where user_id='$url'");
				while($row=mysqli_fetch_array($query)){
				?>
				<div class="col-lg-4">
                    <div class="contact_info">
                        <div class="contact_title mt-30">
                            <h5 class="title">User information</h5>
                        </div>
                        <div class="single_info d-flex">
                            <div class="info_icon">
                                <i class="far fa-address-card"></i>
                            </div>
                            <div class="info_content media-body">
                                <p><?php echo $row['first_name']; echo " "; echo $row['last_name']; ?></p>
                            </div>
                        </div>
						
                        <div class="single_info d-flex">
                            <div class="info_icon">
                                <i class="far fa-envelope"></i>
                            </div>
                            <div class="info_content media-body">
                                <p><?php echo $row['email']; ?></p>
                            </div>
                        </div>
                        <div class="single_info d-flex">
                            <div class="info_icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="info_content media-body">
                                <p><?php echo $row['phone']; ?></p>
                            </div>
                        </div>
                        <div class="single_info d-flex">
                            <div class="info_icon">
                                <i class="fas fa-envelope-open-text"></i>
                            </div>
                            <div class="info_content media-body">
							<?php 
							$counter = mysqli_query($conn, "SELECT COUNT(*) as Count FROM ads WHERE owner_id='$url'"); 
							while($rows=mysqli_fetch_array($counter)){
							?>
							<p>Ads published: <?php echo $rows["Count"]; }?></p>
							
                            </div>
                        </div>
						<div class="single_info d-flex">
                            <div class="info_content media-body">
								<form  method="post">  
									<div class="single_form">
										<button type="submit" class="main-btn" name="logout">Log out</button>
									</div>
								</form>
                            </div>
                        </div>
                    </div>
                </div>
			
                <div class="col-lg-8">
                    <div class="contact_form mt-30">
                        <div class="contact_title">
                            <h5 class="title">Publish new ad </h5>
                        </div>
                        <form method="post" enctype='multipart/form-data'>
                            <div class="contact_form_wrapper">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="single_form">
                                            <input type="text" name="title" placeholder="Title" required>
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
									
									<div style=" padding: 20px 15px;" class="col-md-12">
										<select name="select1" required>
											<option value="" disabled selected hidden>Select Category</option>
											<option value="1">Food</option>
											<option value="2">Electronic devices</option>
											<option value="3">Work</option>
											<option value="4">Clothes</option>
										</select>
									</div>
									<div class="col-md-12">
                                        <div class="single_form">
                                            <input type="text" name="location" placeholder="Adress" required>
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                    </div>
									<div class="col-md-12">
                                        <div class="single_form">
											<p>Add photo</p>
                                            <input style="display: none; border: 1px solid #ccc; display: inline-block; padding: 6px 12px;cursor: pointer;" type="file" name="image" placeholder="Add photo">
                                        </div>
                                    </div>
									<div class="col-md-12">
                                        <div class="single_form">
                                            <input type="text" name="price" placeholder="Price" required>
                                            <i class="fas fa-tenge"></i>
                                        </div>
                                    </div>
									<div class="col-md-12">
                                        <div class="single_form">
                                            <textarea name="description" placeholder="Short description"></textarea>
                                            <i class="fas fa-edit"></i>
                                        </div>
                                    </div>
									<p style=" padding: 15px 15px;">Contact information:</p>
                                    <div class="col-md-12">
                                        <div class="single_form">
                                            <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                    </div>
									<div class="col-md-12">
                                        <div class="single_form">
                                            <input type="phone;" name="phone" value="<?php echo $row['phone']; ?>" enctype="multipart/form-data" required>
                                            <i class="fas fa-phone-alt"></i>
                                        </div>
                                    </div>
                                    
                                    <p class="form-message"></p>
                                    <div class="col-md-12">
                                        <div class="single_form">
											<button type="submit" class="main-btn" name="image">Publish ad</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <!--====== CONTACT PART ENDS ======-->
	<?php
				}
			?>
	
	<!--====== PUBLISHED PART START ======-->

    <section class="published_area pt-115">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section_title pb-15">
                        <h3 class="title">Your ads</h3>
						<br><br>
                    </div>
                </div>
            </div>
			<?php 
				$user_id = $_GET['userid'];
				$allads=mysqli_query($conn,"select * from `ads` where owner_id='$user_id'");
				
				$counter = mysqli_query($conn, "SELECT COUNT(*) as Count FROM ads WHERE owner_id='$url'"); 
				while($rows=mysqli_fetch_array($counter)){
					if($rows['Count']<1){echo "You do not have publications yet!"; }
				}
							
				while($row2=mysqli_fetch_array($allads)){

			
				
			?>
            <div class="published_wrapper">
                <div class="row">
                    <div style="width: 500px;" class="col-lg-6 col-sm-12">
                        <div class="single_ads_card mt-30">
                            <div class="ads_card_image">
                                <img src="<?php echo $row2['photo']; ?>">
                            </div>
                            <div class="ads_card_content">
                                <div class="meta d-flex justify-content-between">
                                    <h3><?php echo $row2['title']; ?></h3>
                                    <a class="like" href="#"><i class="fas fa-heart"></i></a>
                                </div>
                                
                                <p><i class="far fa-map"></i><?php echo $row2['location']; ?></p>
								<p><i class="fas fa-align-justify"></i><?php echo $row2['description']; ?></p>
								<h4 class="title"><a href="#">CONTACTS: <?php echo $row2['phone']; ?></a></h4>
								<h4 class="title"><a href="#">EMAIL: <?php echo $row2['email']; ?></a></h4>
                                <div class="ads_price_date d-flex justify-content-between">	
                                    <span class="price"><i class="fas fa-tenge"></i> <?php echo $row2['price']; ?></span>
                                </div>
								<form  method="post">  
									<div class="single_form">
										<button type="submit" class="main-btn" name="<?php echo $row2['ad_id'] ?>">Delete ad</button>
									</div>
								</form>
                            </div>
							
                        </div>
						
                    </div>
                    
                </div>
            </div>
			<?php
					if (isset($_POST[$row2['ad_id']])) {
								$url = $_SESSION['id'];
								$ad_id = $row2['ad_id'];
								// Удаление фотографии
								mysqli_real_query($conn,"DELETE FROM `ads` WHERE ad_id='$ad_id'");
								
								echo("<script>alert('Ad has been deleted!')</script>");
								echo("<script>window.location = 'login.php';</script>");
					}
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
