











<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from minetheme.com/Endless1.5.1/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Jun 2016 04:13:51 GMT -->

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
<body class="overflow-hidden">
  <!-- Overlay Div -->
  <div id="overlay" class="transparent"></div>
  
  

  <div id="wrapper" class="preload">
<?php include( 'dashboard_menu.php') ?>



          <div id="main-container">
            <div id="breadcrumb">
                <ul class="breadcrumb">
                     <li><i class="fa fa-home"></i><a href="#"> Home</a></li>
                     <li class="active">Page</li>    
                     <li class="active">Search Result</li>   
                </ul>
            </div><!-- breadcrumb -->
            
            <div class="padding-md">
                <div class="search-filter">
                 
                    <center ><h4>Search Result</h4></center>
                </div><!-- /search-filter -->
                <div class="row">
                    <div class="col-md-8">

<?php 

if(isset($_POST['submit'])){
	$data=$_POST['data'];
// var_dump($data);
// die();


	$search_query=mysql_query("SELECT * FROM test WHERE name LIKE '%{$data}%' OR last_name LIKE '%{$data}%' OR birthday LIKE '%{data}%'  ");
	if($found_data=mysql_num_rows($search_query)){
	//if($found_data==1){

?>
<table class="table table-hover">
 	
	 	<tr text align="centre">
	 		
	 		<td>First Name</td>
	 		<td>Last Name</td>
	 		<!-- <td>Username</td> -->
	 		<td>Profile picture</td>
	 		<td>Birthday</td>
	 		


	 			</tr>



<?php
	while($search_data=mysql_fetch_assoc($search_query)){
	$fname=$search_data['name'];
	
	$lname=$search_data['last_name'];
	$bday5=$search_data['birthday'];
	$photo=$search_data['photo'];
	// $id=$search_data['id'];


	if($photo==""){
		$photo="img/default_pic.jpg";
	}
	else{
		$photo="userdata/profile_pics/".$photo;
	}
	// if($username==""&&$fname==""&&$lname==""){
	// 	die("Not found such type of data");
	// 	header("home.php");
	// 	echo "not found";
	// }


	
?>



	 		


	 	<tr>
	 		<td><?php echo $fname;?> </td>
	 		<td><?php echo $lname;?></td>
	 		<!-- <td><?php echo $username;?></td> -->
	 		<td><?php echo 


      "<img class='media-object' src='$photo'  height='60' alt='...''>";


	 		?></td>
	 		
	 		<td><?php echo $bday5;?></td>
	 		
	 		
	 	</tr><?php  }?>
	 	</table>



<?php




	

	
  


}
 else{
	echo "Not found such type of data...";
	//header("home.php");
}
}
  ?>



                        
                      
                       
                       
                    </div><!-- /.col -->
                    <div class="col-md-4">
                       
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.padding-sm -->
        </div>
</div>
<!-- /wrapper -->


        <!-- breadcrumb -->
    </div>
    <!-- /main-container -->
</div>
<!-- /wrapper -->



<a href="#" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>

<!-- Logout confirmation -->


<!-- Le javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

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

<!-- Mirrored from minetheme.com/Endless1.5.1/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Jun 2016 04:13:51 GMT -->

</html>