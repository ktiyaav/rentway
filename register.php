<?php
	include'config.php';
    // If the values are posted, insert them into the database.
    if (isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
		$email = $_POST['email'];
        $password = $_POST['password'];
		$pass = md5($password);
        $query = "INSERT INTO `users` (user_name, user_pass, user_email) VALUES ('$username', '$pass', '$email')";
        $result = mysqli_query($con, $query);
        if($result){
            $smsg = "User Created Successfully.";
        }else{
            $fmsg ="User Registration Failed";
        }
    }
$title = 'Register - Rentway';   ?>
<?php include'header.php';
include'navigation.php';
include'slider.php';?>
		<form action="" method="post">
		<div class="banner-top">
			<div class="container">
			<h3>My Account</h3>
			<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
			<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
			<h4><a href="index.html">Home</a><label>></label><a href="account.php">Account</a><label>></label> Register</h4>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div id="main">
			<section id="content">
				<div id="login">
					<h3>Register</h3><br>
						<label>Name</label>: 
							<input type="text" name="username" placeholder="Full Name" required><br>	
						<label>Email address</label>:
							<input type="email" name="email" placeholder="mail@domain.com" required autofocus><br>
						<label>Password</label>:
							<input type="password" name="password" placeholder="123@abc@ABC" required><br>
						<button class="btn btn-success" type="submit">Register</button><br>
			<br><p class="myborder">Already Registered ?<a href="login.php"> Login Here</a></p>
			</section>
				</div>
			</form>
		</div>
<?php include'footer.php';?>