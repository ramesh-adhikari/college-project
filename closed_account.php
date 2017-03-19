<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from minetheme.com/Endless1.5.1/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 May 2016 08:55:33 GMT -->
<head>
    <meta charset="utf-8">
    <title>banshwali</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Font Awesome -->
	<link href="css/font-awesome.min.css" rel="stylesheet">

	<!-- Pace -->
	<link href="css/pace.css" rel="stylesheet">	
	
	<!-- Endless -->
	<link href="css/endless.min.css" rel="stylesheet">
	<link href="css/endless-skin.css" rel="stylesheet">
	
  </head>
		<?php include( 'dashboard_menu.php') ?>


  <body class="overflow-hidden">
	<!-- Overlay Div -->
	<div id="overlay" class="transparent"></div>


	
<div id="wrapper" class="preload">


		<div id="main-container">

			<?php 


include('connect.php');

// session_start();

// if(!isset($_SESSION['user_login'])){
// $user="";
// }
// else{
//     $user=$_SESSION["user_login"];
// }
 ?>



 <?php 
if($user){

if(isset($_POST['no'])){
	// header("location:profile.php");
	 echo "<script>alert('Don't Close My Account');</script>";
    echo "<script>window.location='profile.php';</script>";
          
}
if(isset($_POST['yes'])){

$close_account=mysql_query("UPDATE users SET closed='yes' WHERE username='$user'");

if($close_account){
	 echo "<script>alert('Your Account has been cloded');</script>";
    echo "<script>window.location='index.php';</script>";
session_destroy();
}

}


}
else{
	die("You must be logged in to view this page");
}


  ?>

 <br/>
 
<center>

 	<form action="closed_account.php" method="post">
 	Are You sure you want to close your Account<br/>
 	<input type="submit" name="no" value="No">
 	<input type="submit" name="yes" value="Yes">
 		
 	</form>

</center>
					</div><!-- /main-container -->
	</div><!-- /wrapper -->


	<a href="#" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>
	
	
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	
	<!-- Jquery -->
	<script src="js/jquery-1.10.2.min.js"></script>
	
	<!-- Bootstrap -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
   
	<!-- Modernizr -->
	<script src='js/modernizr.min.js'></script>
   
    <!-- Pace -->
	<script src='js/pace.min.js'></script>
	
	<!-- Popup Overlay -->
	<script src='js/jquery.popupoverlay.min.js'></script>
   
    <!-- Slimscroll -->
	<script src='js/jquery.slimscroll.min.js'></script>
    
	<!-- Cookie -->
	<script src='js/jquery.cookie.min.js'></script>

	<!-- Endless -->
	<script src="js/endless/endless.js"></script>
	
  </body>

<!-- Mirrored from minetheme.com/Endless1.5.1/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 May 2016 08:55:33 GMT -->
</html>
