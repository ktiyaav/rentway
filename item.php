<?php
include'config.php';
$id= $_GET['item'];
$raw_results = mysqli_query($con,"SELECT * FROM items WHERE `item_id` = $id ");
$results = mysqli_fetch_array($raw_results);
$title = $results["item_name"];
$check = "SELECT * FROM hits where hits_item_id = '$id'";
$check = mysqli_query($con,$check);
$values = mysqli_fetch_assoc($check);

if ($values == 0){
	$sql = "INSERT INTO hits(hits_item_id,hits) VALUES('$id','0')";
	$res = mysqli_query($con,$sql);
}else{
$sql = "UPDATE hits SET hits=hits+1 WHERE hits_item_id='$id' LIMIT 1";
$res = mysqli_query($con,$sql); 
}
include'header.php';
include'navigation.php';
include'slider.php';

?>
<div class="banner-top">
	<div class="container">
		<h3><?php echo $results["item_name"] ;?></h3>
		<h4><a href="index.html">Home</a><label>></label><a href="shop.php">Shop</a><label>></label><?php echo $results["item_name"] ;?></h4>
		<div class="clearfix"> </div>
	</div>
</div>

<br><br><div class="container">
<div id="main">
	    <section id="content">
		<h3 class="title-single"><?php echo $results["item_name"] ;?></h3><br>
		<div id="image">
			<?php echo'<img class="img-responsive" src="data:image/jpeg;base64,'.base64_encode( $results['item_image'] ).'">'?>
		</div><button class="quick_look"
                data-id="<?php echo $query[$key]["id"] ; ?>">View More</button>
		<div id="right">
			<h3>Description</h3>
			<p><?php echo $results["item_description"] ;?></p>
			<h3>Posted In</h3>
			<p><?php echo $results["item_category"] ;?> -> <?php echo $results["sub_cat"] ;?></p>
			<h3>Available In</h3>
			<p><?php echo $results["item_city"] ;?> City</p>
			<h3>Where you can easily rent it?</h3>
			<p><?php echo $results["item_type"] ;?> - <?php echo $results["item_location"] ;?> </p>
			<h3>Price :</h3>
			<p><?php echo $results["item_price"] ;?> / hr</p>
			<h3>Posted On</h3>
			<p><?php echo $results["item_creation_date"] ;?></p>
			<?php 	$status = $results['item_status'];
				if($status == 0){
				echo'<h2><h3>THE Item / Product you are looking for haas already been rented</h3></h2>';
				}else{
				echo'<a class="btn btn-primary btn-success" href="addtocart.php?id='.$results["item_id"].'">RENT IT!</a>';
				}?>
		</div>
</div>
</div>
</div>
<?php include'related.php';?>

<?php include'footer.php'?>