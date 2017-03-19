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
			
			
			
			<?php include('dashboard_menu.php') ?>
			<?php
			session_start();
			if(!isset($_SESSION['user_login'])){
			$id="";
			header('location:index.php');
			}
			elseif(isset($_GET['id'])){
			$id=$_GET["id"];
			}
			?>
			<div id="main-container">
				
				<?php
				
				//first name last name and about the user query
				$get_info=mysql_query("SELECT * FROM test WHERE id='$id'");
				$get_row=mysql_fetch_assoc($get_info);
				$name=$get_row['name'];
				$bday=$get_row['birthday'];
				$child=$get_row['child'];
				$pid=$get_row['parent'];
				
				// $pho=$get_row['phon'];
				// $adds=$get_row['address'];
				// $user=$get_row['username'];
				// $email=$get_row['email'];
				$profile_pic_db=$get_row['photo'];
				
				if($profile_pic_db==""){
				$profile_pic="img/default_pic.png";
				}
				else{
				$profile_pic="userdata/profile_pics/".$profile_pic_db;
				// $gal=mysql_query("INSERT INTO usere ('gallery'='$gallery' where username='$user'");
				}
				$get_info=mysql_query("SELECT * FROM test WHERE id='$pid'");
				$get_row=mysql_fetch_assoc($get_info);
				$pname=$get_row['name'];
				$pbday=$get_row['birthday'];
				$pchild=$get_row['child'];
				if ($pname=='') {
				$pname='We donot have your parent Name';
				}
				if ($pbday=='') {
				$pbday='We donot have your parent Birthday';
				}
				?>
				
				
				<div class="padding-md">
					<div class="row">
						<div class="col-md-2 col-sm-2">
						</div>
						<div class="col-md-8 col-sm-8">
							<div class="tab-content">
								
								<!-- <div class="tab-pane fade" id="edit"> -->
								
								
								
								<div class="panel panel-default">
									<form  class="form-horizontal form-border" action="profile.php" method="post">
										<!-- <form class="form-horizontal form-border"> -->
										<div class="panel-heading">
											<center><h4>	Basic Information of <b> <?php echo $name; ?>  </b></h4></center>
										</div>
										<div class="panel-body">
											
											
											<div class="form-group">
												<label class="control-label col-md-2">Full Name</label>
												<div class="col-md-10">
													<input type="text"  name="fname" class="form-control" id="fname"value="<?php echo $name; ?>">
												</div>
											</div>
											
											
											
											<!-- <div class="form-group">
													<label class="control-label col-md-2">Address</label>
													<div class="col-md-10">
													<textarea class="form-control" name="address"  rows="2"><?php
													// echo $adds; ?></textarea>
													</div> --><!-- /.col -->
													<!-- </div>/form-group -->
													<div class="form-group">
														<label class="control-label col-md-2"> Birthday</label>
														<div class="col-md-10">
															<input type="text"  name="fname" class="form-control" id="fname"value="<?php echo $bday; ?>">
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-2">No of child</label>
														<div class="col-md-10">
															<input type="text" name="phon" value="<?php
															echo $child; ?>" class="form-control input-sm">
															</div><!-- /.col -->
															</div><!-- /form-group -->
															<div class="form-group">
																<label class="control-label col-md-2">About </label>
																<div class="col-md-10">
																	<textarea name="bio" class="form-control" rows="3"> <?php
																	// echo $db_bio; ?></textarea>
																	</div><!-- /.col -->
																	</div><!-- /form-group -->
																	<div class="form-group">
																		<label class="control-label col-md-2">Parent Name</label>
																		<div class="col-md-10">
																			<input type="text"  name="fname" class="form-control" id="fname"value="<?php echo $pname; ?>">
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="control-label col-md-2">Parent Birthday</label>
																		<div class="col-md-10">
																			<input type="text"  name="fname" class="form-control" id="fname"value="<?php echo $pbday; ?>">
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="control-label col-md-2">No of child</label>
																		<div class="col-md-10">
																			<input type="text"  name="fname" class="form-control" id="fname"value="<?php echo $pchild; ?>">
																		</div>
																	</div>
																	
																	
																</form>
																
																
																</div><!-- /panel -->
																
																
																</div><!-- /tab-content -->
																</div><!-- /.col -->
																<div class="col-md-2 col-sm-2">
																</div>
																</div><!-- /.row -->
																</div><!-- /.padding-md -->
																</div><!-- /main-container -->
																</div><!-- /wrapper -->
																<a href="#" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>
																
																<!-- Logout confirmation -->
																
																
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