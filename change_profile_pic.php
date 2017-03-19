<?php
include 'connect.php';

if (isset($_GET['new_pic'])) {
	$new_pic=$_GET['new_pic'];
	$user_to_change=$_GET['new_user'];
$profile_pic_query=mysql_query("UPDATE users SET profile_pic='$new_pic' WHERE username='$user_to_change'");
	header("location:dashboard.php");
	/*echo $sss;exit;
	if ($profile_pic_query=mysql_query("UPDATE users SET profile_pic='$new_pic' WHERE username='$user_to_change'")) {
		echo $profile_pic_query;exit;
	}
	else
		echo "Failed to change";*/
		
}



 ?>

