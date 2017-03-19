<?php include("connect.php"); ?>


<?php 
session_start();

if(!isset($_SESSION['user_login'])){
$user="";
}
else{
    $user=$_SESSION["user_login"];
}
	

	if($user)
	{

	}
	else{
		die("you must be login to vied page");
	}


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
	//first name last name and about the user query
	$get_info=mysql_query("SELECT first_name, last_name, bio FROM users WHERE username='$user'");
	$get_row=mysql_fetch_assoc($get_info);
	$firstname=$get_row['first_name'];
	$last_name=$get_row['last_name'];
	$db_bio=$get_row['bio'];



	//submit what the user types into database
	$updateinfo=@$_POST['updateinfo'];

	if($updateinfo){

		//if the form is submitted

	$firstname=strip_tags(@$_POST['fname']);
	$lastname=strip_tags(@$_POST['lname']);
	$bio=@$_POST['bio'];

	if(strlen($firstname)<3){
		echo "your first name must be greater than 3 character";

	}
	else



	if(strlen($lastname)<3){
		echo "your last name must be greater than 3 character";

	}
	else{

	$info_submit_query=mysql_query("UPDATE users SET first_name='$firstname',last_name='$lastname',bio='$bio' WHERE username='$user'");
	echo "Your profile information has been Updated";

	}


	}
	else{
		//do nothing
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
	}
	//profile image upload script
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
		$profile_pic_query=mysql_query("UPDATE users SET profile_pic='$rand_dir_name/$profile_pic_name' WHERE username='$user'");
		header("location:account_seeting.php");
	}
	}
	else{
		echo "Invalid file! your image must be no larger then 1MB and it must be .jpg or .png or .jpeg or .jif ";



	}
	}

	  ?>

 <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">

<div class="row">
  <div class="col-md-6 col-md-offset-3">
	 <h2>Edit your Account Seetings below</h2>
  	
<hr/>
	 <p>Upload your profile photo:</p>


<div class="form-group">
    <form action="" method="post" enctype="multipart/form-data">
	 <img src="<?php echo $profile_pic; ?>" width="70">
	 <input type="file" name="profilepic"/><br/>
	 <input type="submit" name="uploadpic" value="Upload image">
	 	
	 </form>
  </div>

  <div class="form-group">
<hr/>
	<form action="account_seeting.php" method="post">
	 <p><b>change your password:</b></p>
	
  <!-- <form action="account_seeting.php" method="post"> -->
  <div class="form-group">
    <label for="exampleInputEmail1"> Your old password</label>
    <input type="password"  name="oldpassword" class="form-control" id="oldpassword" placeholder="Enter oldpassword">
  </div>

<div class="form-group">
    <label for="exampleInputEmail1"> Your new password</label>
    <input type="password"  name="newpassword" class="form-control" id="oldpassword" placeholder="Enter newpassword">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"> Repeat password</label>
    <input type="password"  name="newpassword2" class="form-control" id="oldpassword" placeholder="Repeat password">
  </div>
	<input type="submit" name="senddata" id="senddata" value="Update information" >
  </form>
  


<form action="account_seeting.php" method="post">
	 <p><b>change your Profile information:</b></p>
	
  <!-- <form action="account_seeting.php" method="post"> -->
  <div class="form-group">
    <label for="exampleInputEmail1">First Name</label>
    <input type="text"  name="fname" class="form-control" id="fname" placeholder="<?php echo $firstname; ?>">
  </div>

<div class="form-group">
    <label for="exampleInputEmail1"> Last Name</label>
    <input type="text"  name="lname" class="form-control" id="lname" placeholder="<?php echo $last_name; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">About you</label>
    <textarea   name="bio" class="form-control" id="bio" cols="60" rows="4"><?php echo $db_bio; ?></textarea>
  </div>
	<input type="submit" "updateinfo" id="updateinfo" value="Update information" >

  </form>


  </hr>
	 <form action="close_account.php" method="post">
	 <p><b>Closed Account</b></p>
	
	<input type="submit" name="closeaccount" id="closeaccount" value="Closed MY Account" 
	 ></form>
</hr>




  </div>
</div>