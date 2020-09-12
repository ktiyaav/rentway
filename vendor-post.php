<?php
session_start();
$title ="Post Products For Rent - Rentway";
include('header.php');
include'navigation.php';
include'slider.php';
include'config.php';
if(isset($_SESSION['vendor_email'])){
	$email = $_SESSION['vendor_email'];
	$result = mysqli_query($con,"SELECT * FROM vendors WHERE vendor_email = '$email'");
	$row = mysqli_fetch_array($result);
	if(isset($_POST['submit'])){
		
	$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	$price = filter_var($_POST['price'], FILTER_SANITIZE_STRING);
	$type = filter_var($_POST['type'], FILTER_SANITIZE_STRING);
	$category = filter_var($_POST['category'], FILTER_SANITIZE_STRING);
	$description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$id = $row['user_id'];
    $isql = "INSERT INTO items (item_name,item_price,item_status,item_type,item_category,item_description,item_image,item_owner_id) VALUES ('$name','$price','1','$type','$category','$description','$image','$id')";
    $ires = mysqli_query($con, $isql) or die(mysqli_error($con));
	if($res=true){
		echo'Done';
	}else{
		echo'failed';
	}
	}
?>
<div class="banner-top">
	<div class="container">
		<h3>POST something to Rent</h3>
		<h4><a href="index.html">Home</a><label>></label><a href="account.php">Account</a><label>></label>POST for Rent</h4>
		<div class="clearfix"> </div>
	</div>
</div>
<img src="ML/plot.png"></img>
<div class="container">
	<div id="main">
	    <section id="content">
		<form action="" method="post" enctype="multipart/form-data">
		
		<label for="name"><i class="fa fa-user"></i> Product :</label>
        <input type="text" required="required"  id="fname" name="name" placeholder="Sony XMX Watch">
		
		
		<label for="price"><i class="fa fa-user"></i> Price :</label>
        <input type="text" required="required"  id="fname" name="price" placeholder="999">
			
		<label for="category"><i class="fa fa-user"></i> Category :</label>
        <input type="text" required="required"  id="fname" name="category" placeholder="Electronics/Home/etc">
		
		<label for="type"><i class="fa fa-user"></i> Where you can give it to rent easily? :</label>
		<select name="type">
					<option value="airport">Airport</option>
					<option value="railway">Railway</option>
					<option value="normally">Locally</option>
		</select>
		
		<label for="description"><i class="fa fa-user"></i> Description :</label>
        <input type="text" required="required"  id="fname" name="description" placeholder="Sony XMX Watch is.....">
		
		
		<label for="image"><i class="fa fa-user"></i> Image :</label>
		<input type = "file" name = "image" class = "box"/><br /><br />
		<input type="submit" value="Post" name="submit" class="btn btn-success">
      </form>		  
		</section>
		</div>
</div>
<?php }else{
	echo'Login';
}
include'footer.php';?>