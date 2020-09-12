<?php
session_start();
$title = "Login | My Account - Rentway";
include'config.php';
include'header.php';
include'navigation.php';
include'slider.php';

if(isset($_POST['user_email']) and isset($_POST['user_pass'])){
	$user_email = $_POST['user_email'];
	$user_pass = $_POST['user_pass'];
	$user_pass = md5($user_pass);
	$query = "SELECT * FROM users WHERE user_email = '$user_email'";
	$result = mysqli_query($con, $query) or die(mysqli_error($con));
	$count = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	echo $row['user_pass'];
	echo $row['user_email'];
	if($count == 1 && $row['user_pass'] == $user_pass){
		$_SESSION['user_email'] = $user_email;
	}else{
		$error = "INVALID LOGIN CREDENTIALS.";
	}
}
if(isset($_SESSION['user_email'])){
	$user_email = $_SESSION['user_email'];
	$result = mysqli_query($con,"SELECT * FROM users WHERE user_email='$user_email'");
	$row = mysqli_fetch_array($result);
	
	$_SESSION['user_id']= $row["user_id"];
	if(isset($_SESSION['cart'])){
		header('Location:cart.php');
	}else{
	header('Location:account.php');
	include'footer.php';}
}else{
	?>
	<div class="banner-top">
	<div class="container">
		<h3>My Account</h3>
		<h4><a href="index.html">Home</a><label>></label><a href="account.php">Account</a></h4>
		<div class="clearfix"> </div>
	</div>
	</div>
	<div id="main">
	    <section id="content">
	        <div id="login">
			<h3>Login</h3><br>
			<form action="" method="POST">
			<?php if(isset($error)){ ?><div class="alert alert-danger" role="alert"><?php echo $error; ?></div><?php } ?>
			<label>Email Id :</label><input type="text" name="user_email"/><br>
			<label>Password :</label><input type="text" name="user_pass"/><br>
			<input type = "submit" class="login btn" value = " Login "/><br></center>
			</form><br>
			<p class="myborder">Not Registered ?<a href="register.php"> Register Here</a></p>
			</div>
		</section>
	</div>
	
	<?php include'footer.php';
} ?>
	