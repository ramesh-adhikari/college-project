
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from minetheme.com/Endless1.5.1/gallery.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 May 2016 08:46:10 GMT -->
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
	
	<!-- Color box -->
	<link href="css/colorbox/colorbox.css" rel="stylesheet">

	<!-- Endless -->
	<link href="css/endless.min.css" rel="stylesheet">
	<link href="css/endless-skin.css" rel="stylesheet">
	
  </head>

  <body class="overflow-hidden">
	<!-- Overlay Div -->
	<div id="overlay" class="transparent"></div>


	
	
<div id="wrapper" class="preload">

<?php include('dashboard_menu.php'); ?>
<?php

$sqli=mysql_query("SELECT * FROM gallery WHERE username='$user'");//query

//check for their existance
$count_pic=mysql_num_rows($sqli);//count the number of rows return


   ?>
<div id="main-container">
			<div id="breadcrumb">
				<ul class="breadcrumb">
					 <li><i class="fa fa-home"></i><a href="index-2.html"> Home</a></li>
					 <li class="active">Profile</li>	 
				</ul>
			</div><!--breadcrumb-->
<?php  while($row_pic=mysql_fetch_array($sqli)){
    //     echo "<img width='40px' height='40px' src='userdata/profile_pics/".$row_pic['image']."'>";
    //     echo substr($row_pic['created'],0,10);
    //     echo "<a href=change_profile_pic.php?new_user=".$user."&new_pic=".$row_pic['image'].">Use This</a>";
    // ;


echo"
			<div class='gallery-container'>

 <div class='gallery-item'>
					<a class='image-wrapper gallery-zoom' href='userdata/profile_pics/".$row_pic['image']."'>
						<img src='userdata/profile_pics/".$row_pic['image']."' alt='gallery1'>		

						<div class='image-overlay'>
							<div class='image-info'>
								<div class='h3'>Gallery1</div>
								<span>A beautiful template with clean design</span>
								<div class='image-time'>".substr($row_pic['created'],0,10).";</div>
								<div class='image-like'>
									<i class='fa fa-heart'></i>

									
								</div>

							</div>
						</div>	
					</a>
        <a href=change_profile_pic.php?new_user=".$user."&new_pic=".$row_pic['image'].">Use This</a>
					
				</div>

			
				";
     echo"  </div>";

    }
 ?>

	
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
   
	<!-- Colorbox -->
	<script src='js/jquery.colorbox.min.js'></script>	

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
	
	<script>
		$(function()	{
			//Colorbox 
			$('.gallery-zoom').colorbox({
				rel:'gallery',
				maxWidth:'90%',
				width:'800px'
			});
		});
	</script>
	
  </body>

<!-- Mirrored from minetheme.com/Endless1.5.1/gallery.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 May 2016 08:50:51 GMT -->
</html>
