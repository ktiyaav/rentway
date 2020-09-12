<?php 
session_start();
$title ="Checkout - Rentway";
include'header.php';
include'navigation.php';
include'slider.php';
include'config.php';
if(isset($_GET['date'])){
$date = $_GET['date'];
//Shakti Saurav
$time = $_GET['time'];
$price = $_GET['price'];
$price = number_format((float)$price, 2, '.', ''); 
}
if(isset($_SESSION['user_email'])){
	if(isset($_SESSION['cart'])){
		$items = $_SESSION['cart'];
		$cartitems = explode(",", $items);
		if(isset($_POST) & !empty($_POST)){
			$item_id = filter_var($_SESSION['cart'], FILTER_SANITIZE_STRING);
			$user_id = filter_var($_SESSION['user_id'], FILTER_SANITIZE_STRING);
			$trano = filter_var($_POST['transaction-no'], FILTER_SANITIZE_STRING);
			$phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
			$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
			$address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
			$city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
			$state = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
			$zip = filter_var($_POST['zip'], FILTER_SANITIZE_STRING);
			$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
			$isql = "INSERT INTO orders (price,rent_upto,order_item_id,order_user_id,order_transaction_no,order_user_phone,order_name,order_email,order_address,order_city,order_state,order_zip) VALUES ('$price','$date $time','$item_id','$user_id','$trano','$phone','$name','$email','$address','$city','$state','$zip')";
			$ires = mysqli_query($con, $isql) or die(mysqli_error($con));
				if($ires = true){
					unset($_SESSION['cart']);
					header('location:thanks.php');
				}else{
					echo'Errors';
				}		
		}?>
	<div class="banner-top">
		<div class="container">
			<h3>Checkout</h3>
			<h4><a href="index.html">Home</a><label>></label><a href="account.php">Account</a><label>></label>Checkout</h4>
			<div class="clearfix"> </div>
		</div>
	</div>
	<br><br><br>
	<div class="checkout-row">
		<div class="col-75">
		<div class="container">
			<div class="container-checkout">
				<form action="" method="post">
					<div class="checkout-row">
						<div class="col-50">
							<h3>Billing Address</h3>
								<label for="fname"><i class="fa fa-user"></i> Full Name</label>
									<input type="text" required="required"  id="fname" name="name" placeholder="">
								<label for="email"><i class="fa fa-envelope"></i> Email</label>
									<input type="text" required="required"  id="email" name="email" placeholder="">
								<label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
									<input type="text" required="required"  id="adr" name="address" placeholder="">
								<label for="city"><i class="fa fa-institution"></i> City</label>
									<input type="text" required="required"  id="city" name="city" placeholder="">
							<div class="row">
								<div class="col-50">
									<label for="state">State</label>
										<input type="text" required="required"  id="state" name="state" placeholder="">
								</div>
								<div class="col-50">
									<label for="zip">Zip</label>
										<input type="text" required="required"  id="zip" name="zip" placeholder="">
								</div>
							</div>
						</div>
						<div class="col-50">
							<h3>Payment Modes</h3>
								<label for="fname">Accepted Cards</label>
								<div class="icon-container">
									<i class="fa fa-cc-visa" style="color:navy;"></i>
									<i class="fa fa-cc-mastercard" style="color:red;"></i>
								</div>
								<li><a href="https://www.paypal.me/ktiyaav" target="_blank"><button class="button">Pay with PayPal &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</button></a><br></li>
								<li><a href="" target="_blank"><button class="button">Pay via DEBIT CARD (CC AVENUE)</button></a></li>
								<label for="fname">Click above and pay the necessary amount and then enter the mentioned details below :</label>
								<label for="transaction_no">Transaction Number</label>
									<input type="text" required="required"  id="cname" name="transaction-no" placeholder="">
								<label for="phone_no">Phone Number</label>
									<input type="text" required="required"  id="ccnum" name="phone" placeholder="">            
						</div>
				
					</div>
						<label>
							<input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
						</label>
					<div class="space"></div>	
					<div class="row">
						<table class="table">
						<tr>
							<th>S.NO</th>
							<th>Item Name</th>
							<th>Enter Renew Date/Time</th>
							<th>Price/hr</th>
							<th>Total Price</th>
						</tr>
		<?php
		$total = '0';
		$i=1;
		 foreach ($cartitems as $key=>$id) {
			$sql = "SELECT * FROM items WHERE item_id = $id";
			$res=mysqli_query($con, $sql);
			$r = mysqli_fetch_assoc($res);
		?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $r['item_name']; ?></td>
							<td><?php echo$date;?> <?php  echo$time;?></td>
							<td>₹ <?php echo $r['item_price']; ?> / hr</td>
							<td>₹ <?php echo $price;?></td>
						</tr>
						</table>	
		<?php 
			$total = $total + $r['item_price'];
			$i++; 
			}
		?>
					</div>
						<input type="submit" value="CHECKOUT" name="submit" class="btn btn-success">
				</form>
			</div>
		</div>
		</div>
	</div><br>
<?php 
	}else{
		echo'<div id="main">
					<section id="content"><br><br>
				<div id="left"><h3>NO items in the cart, <a href="login.php">Click Here</a></h3></div></section></div>';}
}else{
			echo'<div id="main">
					<section id="content"><br><br>
					<div id="left"><h3>login First, <a href="login.php">Click Here</a></h3></div></section></div>';
}
	include'footer.php';
	?>