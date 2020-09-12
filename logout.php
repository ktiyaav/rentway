<?php
session_start();
session_destroy();
include'header.php';
include'navigation.php';
echo'<br><br><br><div class="abc3"><br><br><br><br><center>You have been successfully logged out<br><br><br><a class="btn btn-success" href="login.php" title="Home"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></center><br><br><br><br></div>


	  

';
include'footer.php';

?>