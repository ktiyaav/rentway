<?php
session_start();
$title = "Rentway - Renting in A Smart way";
include'config.php';
include'header.php';
include'navigation.php';
$sql = "SELECT * FROM items";
$res = mysqli_query($con, $sql);
?>			
<img class="slider-img" src="img/banner.jpg">
<div class="search-form">
				<form action="search.php" class="betw" method="get">
					<select data-trigger="" name="rent-at">
						<option placeholder="Where to rent?">Airport</option>
						<option>Local</option>
						<option>Railway</option>
					</select>
					<input type="checkbox" name="city" value="1">In Your City?<br>
					<input type="text" class="placeholder" placeholder=" Search anything to rent..." name="item">
					<input type="submit" value=" " >
				</form>
</div>

<div class="content-home">
<section id="features" class="features">
			<div class="container">
				<div class="row">
				
					<div class="sec-title text-center mb50 wow bounceInDown animated" data-wow-duration="500ms">
						<h2>About</h2>
						<div class="devider"><i class="fa fa-bolt fa-lg"></i></div>
					</div>

					<!-- service item -->
					<div class="col-md-4 wow fadeInLeft" data-wow-duration="500ms">
						<div class="service-item">
							<div class="service-icon">
								<i class="fa fa- fa-2x"></i>
							</div>
							
							<div class="service-desc">
								<h3>What is Rentway?</h3>
								<p>Rentway provides people a unique solution by allowing them to rent products on rental basis and can also upload their rarely used goods so that they can generate revenue without any hassel</p>
							</div>
						</div>
					</div>
					<!-- end service item -->
					
					<!-- service item -->
					<div class="col-md-4 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="500ms">
						<div class="service-item">
							<div class="service-icon">
								<i class="fa fa- fa-2x"></i>
							</div>
							
							<div class="service-desc">
								<h3>Why Rentway ?</h3>
								<p>Rentway provides us the online platform for the most common process of borrowing / renting we all used to follow but in a hassel free way which also generate revenues for the peoples. </p>
							</div>
						</div>
					</div>
					<!-- end service item -->
					
					<!-- service item -->
					<div class="col-md-4 wow fadeInRight" data-wow-duration="500ms"  data-wow-delay="900ms">
						<div class="service-item">
							<div class="service-icon">
								<i class="fa fa- fa-2x"></i>
							</div>
							
							<div class="service-desc">
								<h3>How it Helps ?</h3>
							<p>In this era every person is so much obsessed with the buying things sometimes which is not used for longer time, this is a collasal wastage of money at a national level. But when people can rent things easily without any hassel at low cost then it stops the wastage of money and goods.</p>
							</div>
						</div>
					</div>
					<!-- end service item -->
						
				</div>
				<div class="row">
				<div class="sec-title text-center mb50 wow bounceInDown animated" data-wow-duration="500ms">
						<h2>Why it is Important?</h2>
						<div class="devider"><i class="fa fa-bolt fa-lg"></i></div>
				</div>
				<div class="service-item">
				<center><p>Rentway solves the problem of unnecessary wastage of money by providing the easy hassel free solution of renting instead of buying. This platform will provide a unique solution to the different travel ministry such as railway and airport instead of selling the leftover things or seized custom products a way to provide visitors items on a rental basis within their visits and this will generate more revenue.
				<br>
				Rentway also provides local vendors an option to upload their products and provide them for rent in a city or a locality. This separates everything from delivery to renting on locality basis which makes everything easy.
				</center>
				</div>
				</div>
			</div>
		</section>
</div>
<br>
<?php include'footer.php'; ?>