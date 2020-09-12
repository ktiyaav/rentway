<?php
session_start();
$title = "Search Results - Rentway";
include'header.php';
include'config.php';
include'navigation.php';
include'slider.php';


echo'<div class="banner-top">
	<div class="container">
		<h3>Search Results</h3>
		<h4><a href="index.html">Home</a><label>></label><a href="search.php">Search</a><label>></label></h4>
		<div class="clearfix"> </div>
	</div>
</div>
<div class="container">
<div id="main">
	    <section id="content">
	        <div id="left">
	            <ul>';
	$query = $_GET['item'];
	$place = $_GET['rent-at'];
			if(isset($_GET['city']) & !empty($_GET['city'])){
				$city = $_GET['city'];
			}else{
				$city = 0;
			}
	if(isset($_SESSION['user_email'])){	
				if($city == 1){					
				$email = $_SESSION['user_email'];
				$raw = mysqli_query($con, "SELECT * FROM users where user_email = '$email'");
				$raw = mysqli_fetch_array($raw);
				$city1 = $raw['user_city'];
				$raw_results = mysqli_query($con,"SELECT * FROM items WHERE `item_name` LIKE '%".$query."%' AND `item_type` LIKE '%".$place."%' AND item_city = '$city1'") or die(mysqli_error($con));
				echo'
				<div id="main">
				<section id="content">
					<div id="left">
						<h3>Search filtered on your location, so you will see products only available in your city.<br>
						Showing products available at '.$place.' in '.$city1.'.
					</div>
				</section>
			</div>';
				}else{ 
				$raw_results = mysqli_query($con,"SELECT * FROM items WHERE `item_name` LIKE '%".$query."%' AND `item_type` LIKE '%".$place."%'") or die(mysqli_error($con));
				echo'';
				}
	} else {
		echo'<div id="main">
				<section id="content">
					<div id="left">
						<h3>Search is not filtered on location, to see items / prodcuts in your locality kindly <a href="login.php">login</a> for this.<br>
						Showing products available at '.$place.'.
					</div>
				</section>
			</div>
		';
		$raw_results = mysqli_query($con,"SELECT * FROM items WHERE `item_name` LIKE '%".$query."%' AND `item_type` LIKE '%".$place."%'") or die(mysqli_error($con));
	}
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
	</div>
';
	include'related.php';
	echo'</div>';
include'footer.php';
?>
