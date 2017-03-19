<?php 
include('connect.php');

session_start();

if(!isset($_SESSION['user_login'])){
$id="";
header('location:index.php');
}
else{
    $id=$_SESSION["user_login"];
    $ln=$_SESSION["lname"];
}
 ?>




<?php 


$check_pic=mysql_query("SELECT * FROM users WHERE id='$id'");
  $get_pic_row=mysql_fetch_assoc($check_pic);
  $profile_pic_db=$get_pic_row['profile_pic'];
  $email=$get_pic_row['email'];
  $user=$get_pic_row['first_name'];
  $fm=$get_pic_row['first_name'];
  $bday=$get_pic_row['birthday'];

    // $lm=$get_pic_row['last_name'];
    $citizenship_number=$get_pic_row['citizenship_number'];
  if($profile_pic_db==""){
    $profile_pic="img/default_pic.jpg";
  }
  else{
    $profile_pic="userdata/profile_pics/".$profile_pic_db;
  }



 ?>


 <?php 

$get_unread_query=mysql_query("SELECT opened FROM messages WHERE user_to='$id' && opened='no' ");
$get_unread=mysql_fetch_assoc($get_unread_query);
$unread_numrows=mysql_num_rows($get_unread_query);
 

$unread_numrows="(".$unread_numrows.")";


  ?>









          <?php 

          // if(!$user){
          //   die('you have to login first to visit this page');
          //   header('index.php');
          // }
          // else{

           ?>


<div id="top-nav" class="fixed skin-6">
			<a href="dashboard.php" class="brand">
				<span>banshwali</span>
				
			</a><!-- /brand -->					
			<button type="button" class="navbar-toggle pull-left" id="sidebarToggle">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<button type="button" class="navbar-toggle pull-left hide-menu" id="menuToggle">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>





			<ul class="nav-notification clearfix">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-envelope fa-lg"></i>
						<span class="notification-label bounceIn animation-delay4"><?php echo $unread_numrows;  ?></span>
					</a>
					<ul class="dropdown-menu message dropdown-1">
						<li><a>You have<?php echo $unread_numrows;  ?> new unread messages</a></li>					  
						
						
						
						
						<li><a href="inbox.php">View all messages</a></li>				
					</ul>
				</li>
				
				<li class="profile dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<strong><?php echo $user; ?></strong>
						<span><i class="fa fa-chevron-down"></i></span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a class="clearfix" href="profile.php">
								<img src="<?php echo $profile_pic; ?>" alt="User Avatar">
								<div class="detail">
									<strong><?php echo $fm?></strong>
									<p class="grey"><?php echo $email ?></p> 
								</div>
							</a>
						</li>
						<li><a tabindex="-1" href="profile.php" class="main-link"><i class="fa fa-edit fa-lg"></i> Profile</a></li>
						<li><a tabindex="-1" href="gallery.php" class="main-link"><i class="fa fa-picture-o fa-lg"></i> Photo Gallery</a></li>
						<!-- <li><a tabindex="-1" href="#" class="theme-setting"><i class="fa fa-cog fa-lg"></i> Setting</a></li> -->
					
						<li><a tabindex="-1" href="inbox.php" class="theme-setting"><i class="fa fa-envelope fa-lg"></i> Message</a></li>

						<li class="divider"></li>
						<li><a tabindex="-1" class="main-link logoutConfirm_open" href="logout.php"><i class="fa fa-lock fa-lg"></i> Log out</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /top-nav-->


		<aside class="fixed skin-6">
			<div class="sidebar-inner scrollable-sidebar">
				<div class="size-toggle">
					<a class="btn btn-sm" id="sizeToggle">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					
				</div><!-- /size-toggle -->	
				<div class="user-block clearfix">
					<a href="profile.php">
					<img src="<?php echo $profile_pic; ?>" alt="User Avatar"></a>
					<div class="detail">
						<strong><?php echo $fm ?></strong>
						<!-- <span class="badge badge-danger m-left-xs bounceIn animation-delay4"><?php echo $unread_numrows;  ?></span> -->
						<ul class="list-inline">
							<li><a href="profile.php">Profile </a></li>
							<!-- <li><a href="inbox.php" class="no-margin">Inbox</a></li> -->
						</ul>
					</div>
				</div><!-- /user-block -->
				<div class="search-block">
	 <form  action="search.php" method="POST">

					<div class="input-group">
						<input type="text" name="data" class="form-control input-sm" placeholder="search here...">
						<span class="input-group-btn">
							<button class="btn btn-default btn-sm" name="submit" type="submit"><i class="fa fa-search"></i></button>
        <!-- <button type="submit" class="btn btn-default" name="submit">Submit</button> -->
						
						</span>
					</div><!-- /input-group -->
					</form>
				</div><!-- /search-block -->
				<div class="main-menu">
					<ul>
					<li >
							<a href="news_event.php">
								<span class="menu-icon">
									<i class="fa  fa-home fa-lg"></i> 
								</span>
								<span class="text">
									News & Events
								</span>
								<span class="menu-hover"></span>
							</a>
						</li>
					<li >
							<a href="family_tree.php">
								<span class="menu-icon">
									<i class="fa fa-group fa-lg"></i> 
								</span>
								<span class="text">
									Family Tree
								</span>
								<span class="menu-hover"></span>
							</a>
						</li>
					<!-- 	<li >
							<a href="dashboard.php">
								<span class="menu-icon">
									<i class="fa fa-desktop fa-lg"></i> 
								</span>
								<span class="text">
									Dashboard
								</span>
								<span class="menu-hover"></span>
							</a>
						</li> -->
						<li >
							<a href="profile.php">
								<span class="menu-icon">
									<i class="fa fa-edit fa-lg"></i> 
								</span>
								<span class="text">
									Profile
								</span>
								<span class="menu-hover"></span>
							</a>
						</li>
						
						<li>
							<a href="gallery.php">
								<span class="menu-icon">
									<i class="fa fa-picture-o fa-lg"></i> 
								</span>
								<span class="text">
									Gallery
								</span>
								<span class="menu-hover"></span>
							</a>
						</li>
						<li>
							<a href="inbox.php">
								<span class="menu-icon">
									<i class="fa fa-envelope fa-lg"></i> 
								</span>
								<span class="text">
									Inbox
								</span>
								<span class="badge badge-danger bounceIn animation-delay6"><?php echo $unread_numrows;  ?></span>
								<span class="menu-hover"></span>
							</a>
						</li>
							<li>
							<a href="report.php">
								<span class="menu-icon">
									<i class="fa fa-reply fa-lg"></i> 
								</span>
								<span class="text">
									Report to Admin
								</span>
								<span class="menu-hover"></span>
							</a>
						</li>
						
						<li class="openable">
							
							<ul class="submenu">
								<li class="openable">
								
				</div><!-- /main-menu -->
			</div><!-- /sidebar-inner -->
		</aside>
