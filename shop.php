<?php
session_start();
$title = "Shop - Find your Rent - Rentway";
include'header.php';
include'config.php';
include'navigation.php';
include'slider.php';
echo'<div class="banner-top">
	<div class="container">
		<h3>Shop</h3>
		<h4><a href="index.html">Home</a><label>></label><a href="shop.php">Shop</a><label>></label></h4>
		<div class="clearfix"> </div>
	</div>
</div>
<div id="main">
	    <section id="content">
	        <div id="left">
	            <ul>';
	$raw_results = mysqli_query($con,"SELECT * FROM items") or die(mysqli_error($con));
		if(mysqli_num_rows($raw_results) > 0){ 
			while($results = mysqli_fetch_array($raw_results)){
				
			echo '
				<li>
	                <div class="img"><a href="item.php?item='.$results["item_id"].'"><img class="img-responsive" src="data:image/jpeg;base64,'.base64_encode( $results['item_image'] ).'">
							</a></div>
	                <div class="info">
	                        <a class="title" href="item.php?item='.$results["item_id"].'">'.$results["item_name"].' </a>
	                        <p class="description">'.$results["item_description"].'</p>
	                        <div class="price">
	                            <span class="st">PRICE:</span><strong>₹ '.$results["item_price"].'</strong>
	                        </div>
	                        <div class="actions">
	                            <a href="#"></a>
	                            <a href="addtocart.php?id='.$results["item_id"].'">RENT IT!</a>
	                        </div>
	                </div>
	            </li>
			';
			}
             
		}
        else{
            echo "No results";
        }
         
echo'      </ul>
	        </div>
	    </section>
	</div>';
include'footer.php';
?>
