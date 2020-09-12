<?php
session_start();
require('config.php');
include '../header.php';
include'../navigation.php';
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

$result = mysqli_query($con,"SELECT * FROM vendors WHERE vendor_email=".$vendor_email."");
$row = mysqli_fetch_array($result);
echo '<div class="abc3">
	<div class="main-inner">
	      				<h3>Hello, '. $row['name'] . '</h3>
						<td><img class="dpimg" src="/uploads/'. $row['imgpath'] . '"></td><br>
<br><a class="btn btn-success" href="Check.php" title="Attendance"><i class="fa fa-area-chart" aria-hidden="true"></i> Check Attendance</a><br>
<br><a class="btn btn-success" href="/" title="Syllabus"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Syllabus</a><br>
<br><a class="btn btn-success" href="/" title="Calendar"><i class="fa fa-calendar-o" aria-hidden="true"></i> Acadamic Calendar</a><br>
<br><a class="btn btn-success" href="/" title="TestDates"><i class="fa fa-pencil" aria-hidden="true"></i> Test Schedules</a><br>
<br><a class="btn btn-success" href="logout.php" title="Logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>

	    
	</div>
    
</div>
';

include '../footer.php';

}else{
?>
      <div align = "center">
         <div style = "width:350px;; border: solid 1px #333333; " align = "left">
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
<?php include '../footer.php'; ?>
<?php } ?>