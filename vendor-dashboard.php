<?php
session_start();
$title="My Account - Rentway";
include'header.php';
include'config.php';
include'navigation.php';
include'slider.php';
	if(isset($_SESSION['vendor_email'])){
	$user_email = $_SESSION['user_email'];
	$result = mysqli_query($con,"SELECT * FROM vendors WHERE vendor_email='$vendor_email'");
	$row = mysqli_fetch_array($result);
			echo'
			<div class="banner-top">
			<div class="container">
				<h3>My Account</h3>
				<h4><a href="index.html">Home</a><label>></label><a href="vendor-dashboard.php">Account</a></h4>
				<div class="clearfix"> </div>
			</div>
			</div>
			<div class="container">
			<div id="main">
				<section id="content">
					<div id="image">
						<img class="img-responsive" src="user/uploads/'.$row['vendor_image'].'">
						<a href="vendor-post.php">POST</a>
					</div>
					<div id="right">
						<h3>Hello, '. $row['vendor_name'] . '</h3>
						<br><a class="button" href="vendor-post.php" title="Rent"><i class="" aria-hidden="true"></i>Post someting to rent</a>
						<br><a class="button" href="vendor-update.php" title="Rent"><i class="" aria-hidden="true"></i>Update Account Details</a>
						<br><a class="btn btn-danger" href="logout.php" title="Logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>

					</div>
					<div id="description-item">
						<br>
						<br>
					</div>
				</section>
			</div>
			</div>
			';
			include'footer.php';
	}else{
		echo'
			<div class="banner-top">
			<div class="container">
				<h3>My Account</h3>
				<h4><a href="index.html">Home</a><label>></label><a href="account.php">Account</a></h4>
				<div class="clearfix"> </div>
			</div>
			</div>
			<br>
			<div class="container">
				<div class="main">
					<section id="content">
						<h3> Kindly <a href="login.php">Login</a></h3>
					</section>
				</div>
			</div>
				<br><br>
				';
				include'footer.php';
			}
			?>