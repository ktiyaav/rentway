<?php 
session_start();
$title = "Cart - Rentway";
require_once('config.php'); 
include('header.php'); 
include('navigation.php');
include'slider.php';
if(isset($_SESSION['cart'])){
?>

<div class="banner-top">
	<div class="container">
		<h3>CART</h3>
		<h4><a href="index.html">Home</a><label>></label><a href="account.php">Account</a><label>></label>Cart</h4>
		<div class="clearfix"> </div>
	</div>
</div><div class="container">
	<?php if(isset($_GET['status']) & !empty($_GET['status'])){ 
			if($_GET['status'] == 'success'){
				echo "<div class=\"alert alert-success\" role=\"alert\">Item Successfully Added to Cart</div>";
			}elseif ($_GET['status'] == 'incart') {
				echo "<div class=\"alert alert-info\" role=\"alert\">Item is Already Exists in Cart</div>";
			}elseif ($_GET['status'] == 'failed') {
				echo "<div class=\"alert alert-danger\" role=\"alert\">Failed to Add item, try to Add Again</div>";
			}
	}

$items = $_SESSION['cart'];
$cartitems = explode(",", $items);
?>
	<form action="checkout.php" method="get">
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
	  		<td><?php echo $r['item_name']; ?></td><label for="renew"></label>
			<td><input id="date" name="date" required="required" type="date" min="<?php echo date("Y-m-d");?>"><input id="input" required="required" name="time" type="time" min="10:10" max="21:45"></td>
	  		<td>₹ <?php echo $r['item_price']; ?></td>
			<td>₹ <input type="text" name="price" id="price"></td>
			
	  	</tr>
		</table>
		
		<script type="text/javascript">
		const start = new Date();
       function live() {
           var seconds = 60;
           var minutes = seconds * 60;
           var hours = minutes * 60;

           var rate = '<?php echo$r['item_price']; ?>';
           var scale = rate/3600000;
  
         
           var inputDate = document.getElementById('date').value;
           var inputHour = document.getElementById('input').value;
           var output = document.getElementById('output');
         
           var time = new Date(inputDate + " " + inputHour)

           var now = new Date();
           var diference = time - start;
           
           var clock_in = input.value;

           var elapsed = now.toString();
         
            console.log(input)
		   document.getElementById("price").value = ` ${diference*scale}`;
       }
	   
  setInterval(live, 1000)
</script>

		<?php 
		
			$total = $total + $r['item_price'];
			$i++; 
			}
			
		?>
			
			<a class="btn btn-info" href="delcart.php?remove=1">Remove Items</a>

			<input type="submit" onclick="live()" value="Continue" class="btn btn-success">
	</div>
	</form>
 
</div>
<?php }else{
	echo'
	<div class="banner-top">
	<div class="container">
		<h3>CART</h3>
		<h4><a href="index.html">Home</a><label>></label><a href="account.php">Account</a><label>></label>Cart</h4>
		<div class="clearfix"> </div>
	</div>
	</div>
<div id="main">
	    <section id="content">
	        <div id="left"><h3>No Items in the Cart, Please add some. Go to<a href="shop.php"> Shop</a></div></h3>
			</section>
</div>


';	
}
include('footer.php'); ?>