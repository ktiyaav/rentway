<?php 
session_start();
$title ="Update Account - Rentway";
include'header.php';
include'navigation.php';
include'slider.php';
include'config.php';
if(isset($_SESSION['vendor_email'])){
	$vendor_email = $_SESSION['vendor_email'];
	if(isset($_POST)){
	$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	$pass = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	$pass = md5($pass);
	$address = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	$city = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	$state = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	$zip = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	$phone = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	
	$uid = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	$pan = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	$bank = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	
	$banks = addslashes(file_get_contents($_FILES['banks']['tmp_name']));
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	
		$sql = "UPDATE vendors 
					SET vendor_name = $name, vendor_pass = $pass, vendor_address = $address, vendor_city = $city, vendor_state = $state, vendor_zip = $zip, vendor_phone = $phone, vendor_uid = $uid, vendor_pan = $pan, vendor_bank = $bank, vendor_image = $image, vendor_bank_stat = $banks
				WHERE vendor_email = $vendor_email";
		$res = mysqli_query($con, $sql) or die(mysqli_error($con));
			if($res = true){
				header('location:vendor-dashboard.php');
			}else{
				echo'Errors';
			}		
}?>
	<div class="banner-top">
		<div class="container">
			<h3>Update Details</h3>
			<h4><a href="index.html">Home</a><label>></label><a href="vendor-dashboard.php.php">Account</a><label>></label>Checkout</h4>
			<div class="clearfix"> </div>
		</div>
	</div>
	<br><br><br>
	<div class="checkout-row">
		<div class="col-75">
		<div class="container">
			<div class="container-checkout">
				<form action="" method="post" enctype="multipart/form-data">
					<div class="checkout-row">
						<div class="col-25">
							<h3>Update Account Details</h3>
								<label for="fname"><i class="fa fa-vendor"></i> Full Name</label>
									<input type="text"   id="fname" name="name" placeholder="">
								<label for="email"><i class="fa fa-lock"></i> Password</label>
									<input type="text"   id="pass" name="pass" placeholder="">
								<label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
									<input type="text"   id="adr" name="address" placeholder="">
								<label for="city"><i class="fa fa-institution"></i> City</label>
									<input type="text"   id="city" name="city" placeholder="">
							<div class="row">
								<div class="col-50">
									<label for="state">State</label>
										<input type="text"   id="state" name="state" placeholder="">
								</div>
								<div class="col-50">
									<label for="zip">Zip</label>
										<input type="text"   id="zip" name="zip" placeholder="">
									<label for="phone">Phone Number</label>
										<input type="text"   id="phone" name="phone" placeholder="">
				<br><br>
								</div>
							</div>
						</div>
						<div class="col-25">
							<h3>SECURITY DETAILS</h3>
								<label for="uid">UID Number</label>
									<input type="text"   id="uid" name="uid" placeholder="">
								<label for="pan">PAN Number</label>
									<input type="text"   id="pan" name="pan" placeholder="">
								<label for="bank">BANK DETAILS</label>
									<input type="text"   id="bank" name="bank" placeholder=""> 
				<br><br>	<h3>UPLOADS</h3>
								<label for="bankstat">Upload Bank Statement</label>
									<input type="file"   id="bankstat" name="banks" placeholder="">
								<label for="image">Upload Image</label>
									<input type="file"   id="image" name="image" placeholder="">
						</div>
						<div class="col-25">
							<h3>TRAVEL DETAILS</h3>
								<label for="passport">Passport</label>
									<input type="text"   id="passport" name="passport" placeholder="">
								<label for="pnr">Railway PNR</label>
									<input type="text"   id="pnr" name="pnr" placeholder="">
						</div>
				
					</div>
						<input type="submit"  value="UPDATE" name="submit" class="btn btn-success">
				</form>
			</div>
		</div>
		</div>
	</div>';
<?php 
	}else{
			echo'<div id="main">
					<section id="content"><br><br>
					<div id="left"><h3>login First, <a href="vendor-login.php">Click Here</a></h3></div></section></div>';
	}
	include'footer.php';
	?>