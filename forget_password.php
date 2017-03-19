

<!DOCTYPE html>
<html>
<head>
	<title>Password Recovery</title>
</head>
<body>
<form method="post" action="forget_password.php">
	<p>Enter your email here. If we found your email in our database,we will send some instructions to this Email.</p>
	Email: <input type="email" name="email">
	<input type="submit" name="hello" value="OK">
</form>
			
</body>
</html>


<?php 
				include 'connect.php';
				if(!isset($_POST['hello'])) {
					// exit();
				}
				else{

					$email=@$_POST['email'];
					echo $email;




$check=mysql_query("SELECT * FROM users where email='$email'");

  while($row=mysql_fetch_array($check)){
    //$id=$get['id'];
    $id=$row['id'];
    $body=$row['username'];
    $date_added=$row['email'];
    // $added_by=$row['added_by'];
    // $user_posted_to=$row['user_posted_to'];
 // echo $body;



					// $sql=@mysqli_query("SELECT * FROM users Where email='$email'");
					// $query = mysqli_query($sql);
					// if($row){
						

						// echo $row['email'];
					 // 	$from='ramesh_adhikari95@yahoo.com';
						// $to=$$row['email'];
					// }
					
					// else{
					// 	echo "something is wrong";
					// }
    if($row){
    	  $encrypt = md5(1290*3+$row['id']);
            $message = "Your password reset link send to your e-mail address.";
            $to=$email;
            $subject="Forget Password";
            $from = 'ramesh_adhikari95.com';
            $body='Hi, <br/> <br/>Your Membership ID is '.$row['id'].' <br><br>Click here to reset your password http://demo.phpgang.com/login-signup-in-php/reset.php?encrypt='.$encrypt.'&action=reset   <br/> <br/>--<br>PHPGang.com<br>Solve your problems.';
            $headers = "From: " . strip_tags($from) . "\r\n";
            $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
 
            mail($to,$subject,$body,$headers);
       }
        else
        {
            $message = "Account not found please signup now!!";
        }
    
    
				}
			}
		 ?>

		
