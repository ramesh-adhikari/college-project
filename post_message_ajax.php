<?php

	$con = mysqli_connect("localhost","root","","college");

	//post message
	if(isset($_POST['message'])){
		$message = mysqli_real_escape_string($con, $_POST['message']);
		$conversation_id = mysqli_real_escape_string($con, $_POST['conversation_id']);
		$user_form = mysqli_real_escape_string($con, $_POST['user_form']);
		$user_to = mysqli_real_escape_string($con, $_POST['user_to']);
		?>
  <script>
  $("body, .sajan1").animate({ scrollTop: $(document).height()+1800 }, 1000);
  </script>
<?php
		//decrypt the conversation_id,user_from,user_to
		$conversation_id = base64_decode($conversation_id);
		$user_form = base64_decode($user_form);
		$user_to = base64_decode($user_to);
$date=date("Y-m-d");
	 			$opened="no";
	 			$deleted="no";
		//insert into `messages`
		$q = mysqli_query($con, "INSERT INTO `messages` VALUES ('','$conversation_id','$user_form','$user_to','$message','$date','$opened','$deleted')");
		if($q){
			echo "Sent";
		}else{
			echo "Error";
		}
	}
?>