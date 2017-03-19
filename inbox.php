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
		<div id="main-container">
			<div class="chat-wrapper">
				<div class="chat-sidebar border-right bg-white">
					<div class="border-bottom padding-sm" style="height: 4
					60px;">
					
						Member
						<!-- <div class="form-group"> -->
										<!-- <div class="input-group">
											<input type="text" class="form-control input-sm" placeholder="Search In List...">
											<span class="input-group-btn">
												<button class="btn btn-default btn-sm" type="button"><i class="fa fa-search"></i></button>
											</span>
										</div> --><!-- /input-group -->
									<!-- </div> -->
					</div>




					<ul class="friend-list">


						<?php




	$con = mysqli_connect("localhost","root","","college");
	   $user_id=$_SESSION["user_login"];


					//show all the users expect me
					$q = mysqli_query($con, "SELECT * FROM `users` WHERE id!='$user_id' and last_name='$ln'");
					//display all the results
					while($row = mysqli_fetch_assoc($q)){
						// echo "<a href='message.php?id={$row['id']}'><li><img src='{$row['img']}'> {$row['username']}</li></a>";
					// }
			
            $profile_pic_db=$row['profile_pic'];
            // $fn=$row['first_name'];





            if($profile_pic_db==""){
		$profile_pic="img/default_pic.png";
	}
	else{
		$profile_pic="userdata/profile_pics/".$profile_pic_db;
}





				echo"



						<li >
							<a href='inbox.php?id={$row['id']}' class='clearfix'>
								<img src='{$profile_pic}' alt='' class='img-circle'>
								<div class='friend-name'>	
									<strong>{$row['first_name']} {$row['last_name']}</strong>
								</div>
								<div class='last-message text-muted'>Click here to see message</div>
								
							
						</li>

						</a>
						";
						}?>

						
					</ul>
				</div>



			
				<div class="chat-inner scrollable-div">
					<div class="chat-header bg-white">
						<button type="button" class="navbar-toggle" id="friendListToggle">
							<i class="fa fa-comment fa-lg"></i>
							<span class="notification-label bounceIn animation-delay4">7</span>
						</button>
						<!-- <div class="pull-right">
							<a class="btn btn-xs btn-default" >Add Friend</a>
							<!-<a class="btn btn-xs btn-default">Create Group</a>
						</div> --> 
					</div>
					
						
			<div class="sajan1" style="overflow-y: scroll;
  overflow-x: scroll; width: 95%; height:84%;  ">
 
					
					<div class="chat-message">
				

						<div class="display-message">
			
		










		<!-- <div class="message-right"> -->
			<!-- display message -->
			<!-- <div class="display-message"> -->
			<?php
				//check $_GET['id'] is set
				if(isset($_GET['id'])){
					$user_two = trim(mysqli_real_escape_string($con, $_GET['id']));
					//check $user_two is valid
					$q = mysqli_query($con, "SELECT `id` FROM `users` WHERE id='$user_two' AND id!='$user_id'");
					//valid $user_two
					if(mysqli_num_rows($q) == 1){
						//check $user_id and $user_two has conversation or not if no start one
						$conver = mysqli_query($con, "SELECT * FROM `conversation` WHERE (user_one='$user_id' AND user_two='$user_two') OR (user_one='$user_two' AND user_two='$user_id')");

						//they have a conversation
						if(mysqli_num_rows($conver) == 1){
							//fetch the converstaion id
							$fetch = mysqli_fetch_assoc($conver);
							$conversation_id = $fetch['id'];
							
						}else{ //they do not have a conversation
							//start a new converstaion and fetch its id
							$q = mysqli_query($con, "INSERT INTO `conversation` VALUES ('','$user_id',$user_two)");
							$conversation_id = mysqli_insert_id($con);
						}
					}else{
						echo"Invalid id";
					}
				}else {
					// die("Click On the Person to start Chating.");
					echo "Click on the Person to start Chating";
				}
				  // $conversation_id = base64_decode(@$_GET['c_id']);
				global $conversation_id;

        $setopened_query=mysql_query("UPDATE `messages` SET opened='yes' WHERE conversation_id='$conversation_id'");

			?>
			<!-- </div> -->
			<!-- /display message -->

			
			<!-- / send message -->
		<!-- </div> -->


						
					 <!-- </div>		 -->
					 </div>		
				<!-- </div> -->
				</br>
				</br>
				</br>
				</br>
				</br>
				</br>
						<!-- <div class="input-group">-->
						<input type="hidden" id="conversation_id" value="<?php echo base64_encode($conversation_id); ?>">
				<input type="hidden" id="user_form" value="<?php echo base64_encode($user_id); ?>">
				<input type="hidden" id="user_to" value="<?php echo base64_encode($user_two); ?>">
				
				




						
						<div class="chat-box bg-white">
						<div class="input-group">
							<input class="form-control border no-shadow no-rounded"id="message"  placeholder="Type your message here">
							<span class="input-group-btn">
								<button class="btn btn-success no-rounded"id="reply" type="button">Send</button>
							</span>
						</div><!-- /input-group -->	

	</div>
						
					</div>
					</div>
</div>
				</div>
				

			</div><!-- /chat-wrapper -->
		</div><!-- /main-container -->
		</div><!-- /main-container -->
		
	
	</div><!-- /wrapper -->

	<a href="#" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>
	
	<!-- Logout confirmation -->


	
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
 <script type="text/javascript" src="js/jquery.min.js"> </script>
	<script type="text/javascript" src="js/script.js"></script>	
	
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
	<script src="js/endless/endless.js">
	</script>

// <script>	$(function()	{
			$('#friendListToggle').click(function()	{
				$('.chat-wrapper').toggleClass('sidebar-display');
			});
			
			$('.scrollable-div').slimScroll({
				height: '100%',
				size: '3px'
			});
			
			document.ontouchmove = function(e){
			   if(disableScroll){
				 e.preventDefault();
			   } 
			}
		});

	$(window).load(function() {
  $("body, .sajan1").animate({ scrollTop: $(document).height()+1800 }, 1000);
});

             // window.scrollTo(0,document.hello.scrollHeight);

// 	</script>
	
	<script type="text/javascript">
	// $(".sajan1").animate({ scrollTop: $(".sajan1")[0].scrollHeight}, 700);


	
	</script>
	
  </body>


<!-- Mirrored from minetheme.com/Endless1.5.1/inbox.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 May 2016 08:50:54 GMT -->
</html>
