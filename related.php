<?php
$sql = "SELECT hits_item_id FROM hits ORDER BY hits DESC LIMIT 4";
$res = mysqli_query($con,$sql);

if(mysqli_num_rows($res) > 0){ 
echo'<div id="main">
				<section id="content">
					<div id="left">
					<ul>
					<h3> Most Viewed Products :</h3>'; 
			while($results = mysqli_fetch_array($res)){
				$raw_results = mysqli_query($con,"SELECT * FROM items WHERE item_id = $results[hits_item_id] ");
				
				$results = mysqli_fetch_array($raw_results);
		
				echo'
				
	            <li><br>
	                <div class="img"><a href="item.php?item='.$results["item_id"].'"><img class="img-responsive" src="data:image/jpeg;base64,'.base64_encode( $results['item_image'] ).'">
							</a></div>
	                <div class="info">
	                        <a class="title" href="item.php?item='.$results["item_id"].'">'.$results["item_name"].' </a>
	                        <p class="description">'.$results["item_description"].'</p>
	                        <div class="price">
	                            <span class="st">PRICE:</span><strong>₹ '.$results["item_price"].'</strong>
	                        </div>
	                       
	                </div>
	            </li>
				
			'; }
}
echo'</ul>
	        </div>
	    </section>
	</div>';
			?>
			