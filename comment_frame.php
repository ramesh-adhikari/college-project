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
    
    <!-- Chosen -->
    <link href="css/chosen/chosen.min.css" rel="stylesheet"/>
    <!-- Datepicker -->
    <link href="css/datepicker.css" rel="stylesheet"/>
    
    <!-- Timepicker -->
    <link href="css/bootstrap-timepicker.css" rel="stylesheet"/>
    
    <!-- Slider -->
    <link href="css/slider.css" rel="stylesheet"/>
    
    <!-- Tag input -->
    <link href="css/jquery.tagsinput.css" rel="stylesheet"/>
    <!-- WYSIHTML5 -->
    <link href="css/bootstrap-wysihtml5.css" rel="stylesheet"/>
    
    <!-- Dropzone -->
    <link href='css/dropzone/dropzone.css' rel="stylesheet"/>
    
    <!-- Endless -->
    <link href="css/endless.min.css" rel="stylesheet">
    <link href="css/endless-skin.css" rel="stylesheet">
  </head>


<style >
	*{
		font-size: 12px;
		font-family: Arial,Helvetica,sans-serif;
	}

	hr{
	background-color: #DCE5EE;
	height: 1px;
	border:0px;
}


</style>




<?php 
include("connect.php");
$getid=$_GET['id'];

?>

<script language="javascript">
	
function toggle(){
	var ele=document.getElementById("toggleComment");
	var text=document.getElementById("displayComment");
	if(ele.style.display=="block"){
		ele.style.display="none";
		// text.innerHTML="show";

	}
	else{
		ele.style.display="block";
		// text.innerHTML="hide";


	}


}



</script>

<?php 
if(isset($_POST['postComment'.$getid.''])){
	

	$post_body=$_POST['post_body'];
	$posted_to="qqqqq";


	session_start();

if(!isset($_SESSION['user_login'])){
$user="";
}
else{
    $user=$_SESSION["user_login"];
}
   

	$insertPost=mysql_query("INSERT INTO post_comments VALUES('','$post_body','$user','$posted_to','0','$getid') ");

	// echo "your comment is posted!<p/>";
}

 ?>



<a href='javascript:;' onClick="javascript:toggle()"><div style='float:right; display:inline;'><b>Click here to Post comment<b></div></a>
<div id='toggleComment' style= 'display:none;'>
<form action="comment_frame.php?id=<?php echo $getid; ?>" method="POST" name="postComment<?php echo $getid;?>">
<!-- Enter your comment below:</p> -->
<textarea class="form-control " rows="5" cols="5" name="post_body" placeholder="Say something About this post"style="max-height:50px;     max-width: 439px;
    margin-top: 11px;"></textarea>
	<input  class="btn btn-xs btn-success "  type="submit" name="postComment<?php echo $getid; ?>" value="Post comment" style="    margin-left: 0px;
    margin-top: -39px
    margin-top: -40px;">







</form>
</div>
<?php


$get_comments=mysql_query("SELECT * FROM post_comments WHERE post_id='$getid' ORDER BY id DESC ");
$count=@mysql_num_rows($get_comments);
if($count!=0){

while($comments=mysql_fetch_assoc($get_comments)){



$comment_body=$comments['post_body'];
$posted_to=$comments['posted_to'];
$posted_by=$comments['posted_by'];
$remove=$comments['post_remove'];



    //echo $body;
$get_user_info=mysql_query("SELECT * FROM users WHERE id='$posted_by'");
$get_info=mysql_fetch_assoc($get_user_info);
$profilepic_info=$get_info['profile_pic'];
$name=$get_info['first_name'];

//echo $profilepic_info;
if($profilepic_info==""){
  $profilepic_info="img/default_pic.jpg";
}
else{}



echo' 
							














											


<div class="media">
									
											<a class="pull-left" href="#">
												<img class="img-circle" src="userdata/profile_pics/'.$profilepic_info.'" alt="User Avatar" style="width: 40px; height: 40px;">
											</a>
											<div class="media-body">
												<div class="media-heading">
													<a href="#">'.$name.' 
													</a><small class="pull-right text-muted"><i class="fa fa-clock-o"></i> 1m ago</small><p>' .$comment_body.'</p> 
          <hr class="right visible-lg">
													
												</div>
													
											</div>';




}
}
												
						else{
	echo "NO comment to this post";
}
					
 ?>
											<!-- echo"<b>$posted_by said:</b><br/>" .$comment_body."</hr></br>"; -->
  <script src="js/jquery-1.10.2.min.js"></script>
        
        <!-- Bootstrap -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        
        <!-- Chosen -->
        <script src='js/chosen.jquery.min.js'></script>
        <!-- Mask-input -->
        <script src='js/jquery.maskedinput.min.js'></script>
        <!-- Datepicker -->
        <script src='js/bootstrap-datepicker.min.js'></script>
        <!-- Timepicker -->
        <script src='js/bootstrap-timepicker.min.js'></script>
        
        <!-- Slider -->
        <script src='js/bootstrap-slider.min.js'></script>
        
        <!-- Tag input -->
        <script src='js/jquery.tagsinput.min.js'></script>
        <!-- WYSIHTML5 -->
        <script src='js/wysihtml5-0.3.0.min.js'></script>
        <script src='js/uncompressed/bootstrap-wysihtml5.js'></script>
        <!-- Dropzone -->
        <script src='js/dropzone.min.js'></script>
        
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
        <script src="js/endless/endless_form.js"></script>
        <script src="js/endless/endless.js"></script>
        
      </body>
      <!-- Mirrored from minetheme.com/Endless1.5.1/form_element.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Jun 2016 04:14:55 GMT -->
    </html>


  
												
												
											
												
																
											