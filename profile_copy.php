<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from minetheme.com/Endless1.5.1/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 May 2016 08:46:02 GMT -->
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


		<?php include('dashboard_menu.php'); ?>


		<?php

	//profile image upload script
		if(isset($_POST['uploadpic'])){
	if(isset($_FILES['profilepic'])){
		if(($_FILES["profilepic"]["type"]=="image/jpeg")||(@$_FILES["profilepic"]["type"]=="image/gif")&&(@$_FILES["profilepic"]["size"]<1048576)){//1 megabyte{


	$chars="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRST0123456789";
	$rand_dir_name=substr(str_shuffle($chars),0,15);
	mkdir("userdata/profile_pics/$rand_dir_name");


	 if(file_exists("userdata/profile_pics/$rand_dir_name/".@$_FILES["profilepic"]["name"]))
	{
		echo @$_FILES["profilepic"]["name"]."Already exists";

	}
	else{
		move_uploaded_file(@$_FILES["profilepic"]["tmp_name"],"userdata/profile_pics/$rand_dir_name/".$_FILES["profilepic"]["name"]);
		//echo "Uploaded and stored in: userdata/profile_pics/$rand_dir_name/ ".@$_FILES["profilepic"]["name"];

		$profile_pic_name=@$_FILES['profilepic']["name"];
		// $gallery=mysql_query("INSERT INTO gallery('username','image') values ('$user','$rand_dir_name/$profile_pic_name')");
		$gallery=mysql_query("INSERT INTO `gallery`(`username`, `image`) VALUES ('$user','$rand_dir_name/$profile_pic_name')");
		$profile_pic_query=mysql_query("UPDATE users SET profile_pic='$rand_dir_name/$profile_pic_name' WHERE username='$user'");
  echo "<script>window.location='profile.php';</script>";

		if($profile_pic_query){
	

	
		}
		else{
			echo "wrong";
		}
	}
	}
	else{
		echo " Select Image First or Invalid file! your image must be no larger then 1MB and it must be .jpg or .png or .jpeg or .jif ";



	}
	
	}
	unset($_FILES['uploadpic']);
}


			//check whether the user has uploaded a profile pic  or not
	$check_pic=mysql_query("SELECT profile_pic FROM users WHERE username='$user'");
	$get_pic_row=mysql_fetch_assoc($check_pic);
	$profile_pic_db=$get_pic_row['profile_pic'];
	if($profile_pic_db==""){
		$profile_pic="img/default_pic.png";
	}
	else{
		$profile_pic="userdata/profile_pics/".$profile_pic_db;
// $gal=mysql_query("INSERT INTO usere ('gallery'='$gallery' where username='$user'");
}

	  ?>

		<div id="main-container">
			<div id="breadcrumb">
				<ul class="breadcrumb">
					 <li><i class="fa fa-home"></i><a href="index-2.html"> Home</a></li>
					 <li class="active">Profile</li>	 
				</ul>
			</div><!--breadcrumb-->
			<ul class="tab-bar grey-tab">
				<li class="active">
					<a href="#overview" data-toggle="tab">
						<span class="block text-center">
							<i class="fa fa-home fa-2x"></i> 
						</span>
						Overview
					</a>
				</li>
				<li>
					<a href="#edit" data-toggle="tab">
						<span class="block text-center">
							<i class="fa fa-edit fa-2x"></i> 
						</span>
						Edit Profile
					</a>
				</li>
			</ul>
			
			<div class="padding-md">
				<div class="row">
					<div class="col-md-3 col-sm-3">
						<div class="row">
							<div class="col-xs-6 col-sm-12 col-md-6 text-center">
								<a href="#">
									<img src="<?php echo $profile_pic; ?>" alt="User Avatar" class="img-thumbnail">

									<div class="form-group">
    <form action="" method="post" action="" enctype="multipart/form-data">
	&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; <input type="file"  name="profilepic"/>
	 <div> <input type="submit" name="uploadpic" value="Upload image"></div>
	 <!-- <input type="submit" value="Done" href="profile.php"> -->
	 	
	 </form>
  </div>
 


								</a>
								<div class="seperator"></div>
								<div class="seperator"></div>
							</div><!-- /.col -->
							<div class="col-xs-6 col-sm-12 col-md-6">
								<strong class="font-14"><?php echo $user ?></strong>
								<small class="block text-muted">
									<?php echo $email ?>
								</small> 
								<div class="seperator"></div>
								<a class="btn btn-success btn-xs m-bottom-sm">Follow</a>
								<div class="seperator"></div>
								<a href="#" class="social-connect tooltip-test facebook-hover pull-left m-right-xs" data-toggle="tooltip" data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
								<a href="#" class="social-connect tooltip-test twitter-hover pull-left m-right-xs" data-toggle="tooltip" data-original-title="Twitter"><i class="fa fa-twitter"></i></a>
								<a href="#" class="social-connect tooltip-test google-plus-hover pull-left" data-toggle="tooltip" data-original-title="Google Plus"><i class="fa fa-google-plus"></i></a>
								<div class="seperator"></div>
								<div class="seperator"></div>
							</div><!-- /.col -->
						</div><!-- /.row -->
						<div class="panel m-top-md">
							<div class="panel-body">
								<div class="row">
									<div class="col-xs-4 text-center">
										<span class="block font-14">301</span>
										<small class="text-muted">Follower</small>
									</div><!-- /.col -->
									<div class="col-xs-4 text-center">
										<span class="block font-14">129</span>
										<small class="text-muted">Items</small>
									</div><!-- /.col -->
									<div class="col-xs-4 text-center">
										<span class="block font-14">2731</span>
										<small class="text-muted">Sales</small>
									</div><!-- /.col -->
								</div><!-- /.row -->
							</div>
						</div><!-- /panel -->
						
						<!-- <h5 class="headline">
							My Skill
							<span class="line"></span>
						</h5>
						<dl>
							<dt>HTML5 <span class="pull-right">90%</span></dt>
							<dd>
								<div class="progress progress-striped">
									<div class="progress-bar progress-bar-success animated-bar" style="width:90%"></div>
								</div>
							</dd>
							<dt>CSS <span class="pull-right">75%</span></dt>
							<dd>
								<div class="progress progress-striped">
									<div class="progress-bar progress-bar-info animated-bar" style="width:75%"></div>
								</div>
							</dd>
							<dt>jQuery <span class="pull-right">65%</span></dt>
							<dd>
								<div class="progress progress-striped">
									<div class="progress-bar progress-bar-warning animated-bar" style="width:65%"></div>
								</div>
							</dd>
							<dt>PHP <span class="pull-right">50%</span></dt>
							<dd>
								<div class="progress progress-striped">
									<div class="progress-bar progress-bar-danger animated-bar" style="width:50%"></div>
								</div>
							</dd>
						</dl> -->
					</div><!-- /.col -->
					<div class="col-md-9 col-sm-9">
						<div class="tab-content">
							<div class="tab-pane fade in active" id="overview">
								<div class="row">
									<div class="col-md-6">
										<div class="panel panel-default">
									<div class="panel-body padding-xs">
										<textarea class="form-control no-border no-shadow" rows="2" placeholder="What's on your mind?"></textarea>
									</div>
									<div class="panel-footer clearfix">
										<a class="btn btn-xs btn-success pull-right">Post</a>
									</div>
								</div>
										<div class="panel panel-default fadeInDown animation-delay2">
											<div class="panel-heading">
												About Me
											</div>
											<div class="panel-body">
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eros nibh, viverra a dui a, gravida varius velit. Nunc vel tempor nisi. Aenean id pellentesque mi, non placerat mi. Integer luctus accumsan tellus. Vivamus quis elit sit amet nibh lacinia suscipit eu quis purus. Vivamus tristique est non ipsum dapibus lacinia sed nec metus.</p>
											</div>
										</div><!-- /panel -->
											
										<div class="panel panel-default fadeInDown animation-delay3">
											<div class="panel-heading">
												<i class="fa fa-twitter"></i> Latest Tweets
											</div>
											<ul class="list-group"> 
												<li class="list-group-item"> 
													<p>Welcome <a href="#" class="text-info">@John Doe</a> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> 
													<small class="block text-muted">
														<i class="fa fa-clock-o"></i> 6 minutes ago
													</small>
												</li> 
												<li class="list-group-item"> 
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <a href="#" class="text-info">@Jand Doe</a></p> 
													<small class="block text-muted">
														<i class="fa fa-clock-o"></i> 41 minutes ago
													</small> 
												</li> 
												<li class="list-group-item"> <p><a href="#" class="text-info">@Bill Doe</a> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eros nibh, viverra a dui a, gravida varius velit.</p> 
													<small class="block text-muted">
														<i class="fa fa-clock-o"></i> 1 hour ago
													</small> 
												</li> 
												<li class="list-group-item"> <p><a href="#" class="text-info">@John Doe</a> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> 
													<small class="block text-muted">
														<i class="fa fa-clock-o"></i> 2 hours ago
													</small> 
												</li> 
											</ul><!-- /list-group -->
										</div><!-- /panel -->
									</div><!-- /.col -->
									<div class="col-md-6">
										<div class="panel panel-default fadeInUp animation-delay4">
											<div class="panel-heading">
												Last Orders <span class="badge badge-primary">8</span>
											</div>
											
										</div><!-- /panel -->
										<!--/ panel -->
										
									</div><!-- /.col -->
								</div><!-- /.row -->
								
							</div><!-- /tab1 -->
							
	<a href="#" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>
							
							<div class="tab-pane fade" id="edit">
								
								<div class="row">








<?php

if(!isset($_SESSION['user_login'])){
$username="";
}
else{
	$user=$_SESSION["user_login"];
}





	 ?>
	 <?php 

	$senddata=@$_POST['senddata'];
	//variables
	$old_password=@$_POST['oldpassword'];
	$new_password=@$_POST['newpassword'];
	$repeat_password=@$_POST['newpassword2'];
	if($senddata){

		$password_query=mysql_query("SELECT * FROM users WHERE username='$user'");
		while ($row=mysql_fetch_assoc($password_query)) {
			$db_password=$row['password'];
			//md5 the old password before we check if it match
			$old_password_md5=md5($old_password);

			//check whether old password equals $db_password
			if($old_password_md5==$db_password){
				//echo $db_password;
				//echo $old_password_md5;
				//echo "match";
				if($new_password==$repeat_password){


					if(strlen($new_password)<=4){
						echo "Sorry! But your password must be more than 4 character";
					}
					else{
					//echo "awesome your password is match";
					//greate update the user password
					//md5  the new password before we add it to database
					$new_password_md5=md5($new_password);
					$password_updata_query=mysql_query("UPDATE users SET password='$new_password_md5' WHERE username='$user' ");

					echo "success Your password has been update";

						}

				}
				else{
					echo "your two new password doesn't match";
				}

			}
			else{
				echo "The old password does not match";
			}
		}

	}
	else{
		echo "";
	}
	

	//submit what the user types into database
	$updateinfo=@$_POST['updateinfo'];

	if($updateinfo){

		//if the form is submitted

	$firstname=strip_tags(@$_POST['fname']);
	// $username1=strip_tags(@$_POST['uname']);

	$lastname=strip_tags(@$_POST['lname']);
	$bio=@$_POST['bio'];
		$em=@$_POST['email'];
			$phone=@$_POST['phon'];
				$ad=@$_POST['address'];
					$gd=@$_POST['gender'];


	if(strlen($firstname)<3){
		echo "your first name must be greater than 3 character";

	}
	else



	if(strlen($lastname)<3){
		echo "your last name must be greater than 3 character";

	}
	else{

	$info_submit_query=mysql_query("UPDATE users SET  email='$em', phon='$phone', address='$ad',first_name='$firstname',last_name='$lastname',bio='$bio',gender='$gd' WHERE username='$user'");
	echo "Your profile information has been Updated";
	// $user=$username1;
	// header('location:dashboard.php');
	}


	}
	else{
		//do nothing
	}
	//first name last name and about the user query
	$get_info=mysql_query("SELECT first_name, last_name, bio,email,phon,address,gender FROM users WHERE username='$user'");
	$get_row=mysql_fetch_assoc($get_info);
	$firstname=$get_row['first_name'];
	$last_name=$get_row['last_name'];
	$db_bio=$get_row['bio'];
    // $uname=$get_row['username'];
    $eml=$get_row['email'];
    $pho=$get_row['phon'];
    $adds=$get_row['address'];
$gndr=$get_row['gender'];
?>


 <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
















									<div class="panel panel-info pull-right">
										<div class="panel-body">
											Last Update on 12 Oct,2013
										</div>
									</div><!-- /panel -->
								</div><!-- /.row -->
								
								<div class="panel panel-default">
									<form class="form-horizontal form-border" action="profile.php" method="post">

										<div class="panel-heading">
											Basic Information
										</div>

										<div class="panel-body">
											
											 <div class="form-group">

     <label class="control-label col-md-2">First Name</label>	
												<div class="col-md-10">

    <input type="text"  name="fname" class="form-control" id="fname"value="<?php echo $firstname; ?>">
  </div>
</div>
					
					<div class="form-group">
  <label class="control-label col-md-2">Last Name</label>												
												<div class="col-md-10">
    <input type="text"  name="lname" class="form-control" id="lname"value="<?php echo $last_name; ?>">
  </div>
</div>
<div class="form-group">
												<label class="control-label col-md-2">Email</label>
												<div class="col-md-10">
													<input type="text" class="form-control input-sm" name="email" value="<?php echo $eml; ?>">
												</div><!-- /.col -->
											</div><!-- /form-group -->
											<div class="form-group">
												<label class="control-label col-md-2">Gender</label>
												<div class="col-md-10">
													<label class="label-radio inline">
														<input type="radio" name="inline-radio" name="gender" checked>
														<span class="custom-radio"></span>
														Male
													</label>
													<label class="label-radio inline">
														<input type="radio" name="inline-radio">
														<span class="custom-radio"></span>
														Female
													</label>
												</div><!-- /.col -->
											</div><!-- /form-group -->
											<div class="form-group">
												<label class="control-label col-md-2">Address</label>
												<div class="col-md-10">
													<textarea class="form-control" name="address" value="<?php echo $adds; ?>" rows="3"></textarea>
												</div><!-- /.col -->
											</div><!-- /form-group -->
											<div class="form-group">
												<label class="control-label col-md-2">Phone</label>
												<div class="col-md-10">
													<input type="text" name="phon" value="<?php echo $pho; ?>" class="form-control input-sm">
												</div><!-- /.col -->
											</div><!-- /form-group -->


  						<div class="form-group">
												<label class="control-label col-md-2">About Me</label>
												<div class="col-md-10">
													<textarea name="bio" class="form-control" value="<?php echo $db_bio; ?>" rows="3"></textarea>
												</div><!-- /.col -->
											</div><!-- /form-group -->
	<input type="submit" name="updateinfo" class="btn btn-sm btn-success" id="updateinfo"  value="Update information" >

  </form>										

  												<form action="profile.php" method="post">
	 <p><b>change your password:</b></p>
	
  <!-- <form action="account_seeting.php" method="post"> -->
  <div class="form-group">
												<label class="control-label col-md-2">Your old password</label>
												<div class="col-md-10">

    <input type="password"  name="oldpassword"  class="form-control input-sm" id="oldpassword" placeholder="Enter oldpassword">
  </div>
</div>
<div class="form-group">
   <label class="control-label col-md-2">Your new password</label>
												<div class="col-md-10">

    <input type="password"  name="newpassword" class="form-control input-sm" id="oldpassword" placeholder="Enter newpassword">
  </div>
</div>
  <div class="form-group">
    <label class="control-label col-md-2">Repeat password</label>
												<div class="col-md-10">
    <input type="password"  name="newpassword2" class="form-control input-sm" id="oldpassword" placeholder="Repeat password">
  </div>
</div>
	<input type="submit"  class="btn btn-sm btn-success" name="senddata" id="senddata" value="Update information" >
  </form>
  
										 </hr>
	 <form action="closed_account.php" method="post">


	 	<div class="panel-footer">
											<div class="text-right">
												<button class="btn btn-sm btn-success" type="submit" name="closeaccount" id="closeaccount"><h4>Closed My Account</h4></button>
											</div>
										</div>
	
	 </form>
</hr>

		
											
											
										</div>
									
								</div><!-- /panel -->
							
								
								
								
							</div><!-- /tab2 -->
							
						</div><!-- /tab-content -->
					</div><!-- /.col -->
				</div><!-- /.row -->			
			</div><!-- /.padding-md -->
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
   
	<!-- holder -->
	<script src='js/uncompressed/holder.js'></script>
	
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

<!-- Mirrored from minetheme.com/Endless1.5.1/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 May 2016 08:46:10 GMT -->
</html>
