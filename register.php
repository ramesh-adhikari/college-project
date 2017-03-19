<?php include("connect.php"); ?>

<?php 
session_start();

if(!isset($_SESSION['user_login'])){
$user="";
}
else{
    $user=$_SESSION["user_login"];
}
 
if (isset($_POST['reg'])) {
$chk=@$_POST['check_agreement'];
	if ($chk!="true") {
	echo "<script> alert('You must accept our terms and conditions first');</script>";
	}
	else{
			global $con;
   $reg=@$_POST['reg'];
   //declaring variable to prevent errors
   $fn="";
   $ln="";
   $un="";
   $em="";
   $em2="";
   $pswd="";
   $pswd2="";
   $d="";



//registation form
   $fn=@$_POST['fname'];
    $ln=@$_POST['lname'];
   // $un=@$_POST['username'];
   $em=@$_POST['email'];
   // $em2=@$_POST['email2'];
   $pswd=@$_POST['password'];
   $pswd2=@$_POST['password2'];
   $citizenship_number=@$_POST['citizenship_number'];

   $gender=@$_POST['gender'];
   

   $d=@$_POST['date'];//Year-month-day

   if($reg){
  
        $e_check=mysql_query("SELECT email FROM users WHERE email='$em' ");
        $email_check=mysql_num_rows($e_check);
        if ($email_check==0) {
            # code...
        
        //check if user already exist
    // $u_check=mysql_query("SELECT username FROM users WHERE username='$un'");
    //count the amount of rows where username=$un
    $check=mysql_num_rows($u_check);
    if($check==0){
    	 $c_check=mysql_query("SELECT citizenship_number FROM users WHERE citizenship_number='$citizenship_number'");
    //count the amount of rows where username=$un
    $check=mysql_num_rows($c_check);
    if($check==0){
        //check all of the fields have been filed in
        if($fn&&$em&&$pswd&&$pswd2){
            //check that password match
        if($pswd=$pswd2){
            //check the maximum length of username/first name/last name does not exceed 25 character
            if(strlen($ln)>25||strlen($fn)>25){
                echo "the maximum limit for username/first name/last name is 25 characters";
            }
            else{
                //check the maximum length of password does not exceed 25 characters and is not less than 5 characters
                if(strlen($pswd)>30||strlen($pswd)<5){
                    echo "your password must be between 5 and 30 characters long";
                }
                else{
                    //encrypt password and password 2 using md5 before sending to database
                    $pswd=md5($pswd);
                    $pswd2=md5($pswd2);
                    //global $con;
                    $query=mysql_query("INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`,`gender`, `password`,  `citizenship_number`,`birthday`,`closed`) VALUES (NULL,  '$fn', '$ln', '$em','$gender', '$pswd','$citizenship_number','$d','no' )");
                    //$query=mysql_query("INSERT INTO users/*users(id,username,first_name,last_name,email,password,sign_up_date)*/ VALUES ('','$un',$fn','$ln','$em','$pswd','$d')");
    //$run_pro=mysql_query($con, $query);
  if($query){
    // $message_success="You are Registered. click <a href='login.php'>here</a> to login";
    echo "<script>alert('signUp  successfully');</script>";
    echo "<script>window.location='login.php';</script>";
                   	
                   }

                  // die("<h2>Welcom to findfrends</h2>Login to your account to get started....");
                }
            }
        }
        else{
            $message= "your password don't match";
        }
        }
        else{
            $message= "please fill all the fields";
        }
    }
    else{
       $message= "Citizenship number already taken...";

    }
}
//     else{
//        $message= "Username already taken...";
//     }
    }
        else{
         $message= "sorry this email is already used...";
    }
   }
    
// else{
//    $message="Your email don't match";
//    }
// }






	}

}
   
?>













<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Font Awesome -->
	<link href="css/font-awesome.min.css" rel="stylesheet">
	
	<!-- Endless -->
	<link href="css/endless.min.css" rel="stylesheet">
	
  </head>

  <body style="background-color:#504F63 ">
	<div class="login-wrapper" >

		<div class="text-center">
			<h2 class="fadeInUp animation-delay1" style="font-weight:bold;   ">
				<span class="text-success">banshwali</span> <span style="color:#ccc; text-shadow:0 1px #fff"></span>
				
			</h2>
	    </div>
		<div class="login-widget animation-delay1" style=" max-width: 541px;">	
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-plus-circle fa-lg"></i> Sign up
				</div>
				<div class="panel-body">
					<form class="form-login"  role="form" action="#" method="POST">
						<?php if (isset($message)) {
					echo "<div class='alert alert-danger' role='alert'>
					<span class='sr-only'>Error:</span>".$message."

				</div>";
				} ?>
				<?php if (isset($message_success)) {
					echo "<div class='alert alert-primary' role='alert'>
					<span class='sr-only'>Error:</span>".$message_success."

				</div>";
				} ?>

							 <div  class="row">
                            <div class="col-xs-12 col-sm-6">
                            <!-- <div class="col_full"> -->

						<div class="form-group">
			                    		<label class="sr-only" for="form-first-name">First name</label>
			                        	<input type="text" name="fname" placeholder="First name..." class="form-first-name form-control" id="form-first-name" value="<?php if(isset($_POST['fname'])){echo $_POST['fname']; } ?>">
			                        </div>
			                        </div>
			                        <!-- </div> -->
			                         <div class="col-xs-12 col-sm-6">
                            <!-- <div class="col_full"> -->
			                    	  <div class="form-group">
			                        	<label class="sr-only" for="form-last-name">Last name</label>
			                        	<input type="text" name="lname" placeholder="Last name..." class="form-last-name form-control" id="form-last-name"value="<?php if(isset($_POST['lname'])){echo $_POST['lname']; } ?>">
			                        </div>
			                        </div>
			                        <!-- </div> -->
			                      
			                        </div>
			                         <div  class="row">
                            <div class="col-xs-12 col-sm-6">
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-email">Email</label>
			                        	<input type="email" name="email" placeholder="Email..." class="form-email form-control" id="form-email"value="<?php if(isset($_POST['email'])){echo $_POST['email']; } ?>">
			                        </div>
			                        </div>
			                       <!--  <div class="form-group">
			                    		<label class="sr-only" for="form-first-name">Re-Enter Email</label>
			                        	<input type="email" name="email2" placeholder="Re-Enter Email..." class="form-first-name form-control" id="form-first-name">
			                        </div>
			                         -->
			                 <div class="col-xs-12 col-sm-6">
			                         <div class="form-group">
			                        	<label class="sr-only" for="form-email">Password</label>
			                        	<input type="password" name="password" placeholder="Password..." class="form-email form-control" id="form-email"value="<?php if(isset($_POST['password'])){echo $_POST['password']; } ?>">
			                        </div>
			                        </div>
			                        </div>

			                          <div  class="row">
                            <div class="col-xs-12 col-sm-6">
			                         <div class="form-group">
			                        	<label class="sr-only" for="form-email">Re-Enter Password</label>
			                        	<input type="password" name="password2" placeholder="Re-Enter Password..." class="form-email form-control" id="form-email"value="<?php if(isset($_POST['password2'])){echo $_POST['password2']; } ?>">
			                        </div>
			                        </div>
                            <div class="col-xs-12 col-sm-6">

			                         <div class="form-group">
			                        	<label class="sr-only" for="form-email">Citizenship number</label>
			                        	<input type="text" name="citizenship_number" placeholder="Enter your Citizenship number..." class="form-email form-control" id="form-email"value="<?php if(isset($_POST['citizenship_number'])){echo $_POST['citizenship_number']; } ?>">
			                        </div>
			                        </div>
			                        </div>
			                        <!-- <div class="well">  -->
     						 <!-- <div class="form-group"> -->
     						   <div  class="row">
                            <div class="col-xs-12 col-sm-6">
     						 <div class ="form-group">
							      <label>Date of Birth</label>
							      <input type="text" name='date'class="form-control" id="exampleInputDOB1" placeholder="Eg.  2052-02-11" value="<?php if(isset($_POST['date'])){echo $_POST['date']; } ?>">
							    </div>
							    </div>
                            <div class="col-xs-12 col-sm-6">

							  <div class="form-group">
        <div class="col-xs-9">
        <label class="col-xs-3 control-label">Gender</label>

            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-default">
                    <input type="radio" name="gender" value="male" /> Male
                </label>
                <label class="btn btn-default">
                    <input type="radio" name="gender" value="female" /> Female
                </label>
              <!--   <label class="btn btn-default">
                    <input type="radio" name="gender" value="other" /> Other
                </label> -->
            </div>
        </div>
        </div>
        </div>
    </div>
							
			                        <!-- <button type="submit" class="btn" name="reg">Sign me up!</button> -->

			               
						<div class="form-group">
							<label class="label-checkbox">
								 <input type="checkbox" name="check_agreement" value="true"/>
								 <span class="custom-checkbox info bounceIn animation-delay6"></span>
								 I accept the agreement.
							</label>
						</div><!-- /form-group -->

						<div class="seperator"></div>
						<div class="form-group">
							<div class="controls">
								Already have an account? <a href="login.php" class="primary-font login-link">Sign In</a>
							</div>
						</div><!-- /form-group -->
							
						<hr/>
						<div class="form-group">
							<div class="controls text-right">
 <input type="submit"  name="reg" class="btn btn-success btn-sm bounceIn animation"  value="Sign Up">

								<!-- <a class="btn btn-success btn-sm bounceIn animation-delay7 login-link" href="login.php"><i class="fa fa-plus-circle"></i> Sign up</a> -->
							</div>
						</div><!-- /form-group -->
 </div>

					</form>
				</div>
				

				 
			</div><!-- /panel -->
			<div class="row">

		<div class="col-md-4"></div>
    <div class="col-md-4"></div>

     <!--  <div class="col-md-4">
                      <h4 class="headline">
               <center><a  href="report.php"  class="btn btn-danger">Any Report</br>Click Here</a></center>
            </h4> 
           
            </div> -->
            </div>

		</div><!-- /login-widget -->
		
	</div><!-- /login-wrapper -->
	
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <!-- Jquery -->
	<script src="js/jquery-1.10.2.min.js"></script>
    
    <!--Bootstrap-->
    <script src="bootstrap/js/bootstrap.min.js"></script>
   
	<!-- Modernizr -->
	<script src='js/modernizr.min.js'></script>
	
	<!-- Pace -->
	<script src='js/pace.min.js'></script>
	
	<!-- Popup Overlay -->
	<script src='js/jquery.popupoverlay.min.js'></script>
	
	<!-- Slimscroll -->
	<script src='js/jquery.slimscroll.min.js'></script>
	
	<!--Cookie-->
	<script src='js/jquery.cookie.min.js'></script>

	<!--Endless-->
	<script src="js/endless/endless.js"></script>
  </body>

<!-- Mirrored from minetheme.com/Endless1.5.1/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 May 2016 08:50:54 GMT -->
</html>



