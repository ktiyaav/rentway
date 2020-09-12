<?php
session_start();
require('config.php');
$title = "VEndor LOgin";
include 'header.php';
include'navigation.php';
if (isset($_POST['vendor_email']) and isset($_POST['vendor_pass'])){
$vendor_email = $_POST['vendor_email'];
$vendor_pass = $_POST['vendor_pass'];
// Shakti Saurav
$query = "SELECT * FROM `vendors` WHERE vendor_email='$vendor_email'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$count = mysqli_num_rows($result);
$row=mysqli_fetch_array($result);
if ($count == 1 && $row['vendor_pass']==$vendor_pass){
$_SESSION['vendor_email'] = $vendor_email;
}else{
$error = "Invalid Login Credentials.";
}
}
if (isset($_SESSION['vendor_email'])) {
$vendor_email = $_SESSION['vendor_email'];
$a = "12"; //Batch Filter
$b = "16";
$c = "15";
$d = "14";

$result = mysqli_query($con,"SELECT * FROM vendors WHERE vendor_email='$vendor_email'");
$row = mysqli_fetch_array($result);
echo '<div class="abc3">
	<div class="main-inner">
	      				<h3>Hello, '. $row['vendor_name'] . '</h3>
						<td><img class="dpimg" src="/uploads/'. $row['vendor_image'] . '"></td><br>
	    
	</div>
    
</div>
';

include 'footer.php';

}else{
?>	<div class="banner-top">
	<div class="container">
		<h3>Vendor Login</h3>
		<h4><a href="index.html">Home</a><label>></label><a href="vendor-login.php">Account</a></h4>
		<div class="clearfix"> </div>
	</div>
	</div>
      <div class = "center">
         <div style = "width:350px;; border: solid 1px #333333; " class = "left">
            <div style = "background-color:#222; color:#fff; padding:3px;"><b>Login</b></div>
            <div style = "margin:30px">
			 <form action = "" method = "post">
			 <?php if(isset($error)){ ?><div class="alert alert-danger" role="alert"> <?php echo $error; ?> </div><?php } ?>
                  <label>vendor_email : &nbsp </label><input type = "text" name = "vendor_email" class = "box"/><br /><br />
                  <label>vendor_pass : &nbsp </label><input type = "vendor_pass" name = "vendor_pass" class = "box" /><br/><br /><center>
                  <input type = "submit" value = " Login "/><br></center>
               </form>	
            </div>
         </div>
      </div>
<?php include 'footer.php'; ?>
<?php } ?>