
<?php include('connect.php'); ?>

<?php 
    if (isset($_COOKIE['family_tree'])) {
      $_SESSION['user_login']=$_COOKIE['family_tree'];
    }

 ?>
<?php 
//redirect if already logged in
if (isset($_SESSION['user_login'])) {
  //header('location:family_tree.php');
}
 ?>

<?php
$msg="";
session_start();

if(!isset($_SESSION['user_login'])){
$user="";
}
else{
    $user=$_SESSION["user_login"];
}
 

   
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
   $em2=@$_POST['email2'];
   $pswd=@$_POST['password'];
   $pswd2=@$_POST['password2'];
   $d=date('Y-m-d');//Year-month-day

   if($reg){
    if($em==$em2){
        $e_check=mysql_query("SELECT email FROM users WHERE email='$em' ");
        $email_check=mysql_num_rows($e_check);
        if ($email_check==0) {
            # code...
        
        //check if user already exist
    // $u_check=mysql_query("SELECT username FROM users WHERE username='$un'");
    //count the amount of rows where username=$un
    $check=mysql_num_rows($u_check);
    if($check==0){
        //check all of the fields have been filed in
        if($fn&&$ln&&$em&&$em2&&$pswd&&$pswd2){
            //check that password match
        if($pswd=$pswd2){
            //check the maximum length of username/first name/last name does not exceed 25 character
            if(strlen($un)>25||strlen($fn)>25||strlen($ln)>25){
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
                    $query=mysql_query("INSERT INTO `college`.`users` (`id`,  `first_name`, `last_name`, `email`, `password`) VALUES (NULL,  '$fn', '$ln', '$em', '$pswd')");
                    //$query=mysql_query("INSERT INTO users/*users(id,username,first_name,last_name,email,password,sign_up_date)*/ VALUES ('','$un',$fn','$ln','$em','$pswd','$d')");
    //$run_pro=mysql_query($con, $query);

            //if($run_pro){
                //echo "ok";
            //}
                    if($query){
                    	header("index.php");
                    }

                    // die("<h2>Welcom to findfrends</h2>Login to your account to get started....");
                }
            }
        }
        else{
            echo "your password don't match";
        }
        }
        else{
            echo "please fill all the fields";
        }
    }
    
    }
        else{
        echo "sorry this email is already used...";
    }
   }
    
else{
    echo "Your email don't match";
   }
}

//User login
if((isset($_POST['user_login'])||isset($_POST['user_login']))&&isset($_POST['password_login'])){
  $psw=$_POST['password_login'];
// echo $psw;
// exit();

  
    // $user_login=preg_replace('#[^A-Za-z0-9]#i', '', $_POST['user_login']);//filtering everything but numbers and letter
    $password_login=preg_replace('#[^A-Za-z0-9]#i', '', $_POST['password_login']);//filtering everything but numbers and letter
    $password_login_md5=md5($password_login);
    $email= $_POST['user_login'];

$sql=mysql_query("SELECT id, last_name  FROM users WHERE email='$email' AND password='$password_login_md5'  AND closed='no'  LIMIT 1");//query
//check for their existance
$userCount=mysql_num_rows($sql);//count the number of rows return
if($userCount==1){

    while($row=mysql_fetch_array($sql)){
        $id=$row['id'];
        // $email5=$row['email'];
         $lname=$row['last_name'];
        

    }
   
    $_SESSION['user_login']=$id;
    $_SESSION['lname']=$lname;
    if ($_POST['checkbox']=='true') {
      setcookie("family_tree",$_SESSION['user_login'],time()+365*24*60*60,'/1/banshwali');
      
    }
   header("location:family_tree.php");
 exit();
  
}
else{
    // header('location:login.php');
     $msg= "Fill all the field,  with correct Email and password";
    // echo $msg;
    
     // exit();

// }
// else{
//     $msg="Enter username and password First";

 }
}




?>



<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from minetheme.com/Endless1.5.1/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 May 2016 08:50:54 GMT -->
<head>
    <meta charset="utf-8">
    <title>Login</title>
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

  <body style="background-color:#504F63">
	<div class="login-wrapper" >
		<div class="text-center">
                              <!-- <span><?php echo $msg; ?></span> -->

      
			<h2 class="fadeInUp animation-delay1" style="font-weight:bold">
				<span class="text-success">banshwali </span> <span style="color:#ccc; text-shadow:0 1px #fff"></span>

			</h2>
		</div>
		<div class="login-widget animation-delay1">	
			<div class="panel panel-default">
				<div class="panel-heading clearfix">
					<div class="pull-left">
						<i class="fa fa-lock fa-lg"></i><b> Login<b>
					</div>

          
          

					<div class="pull-right">
						<span style="font-size:11px;">Don't have any account?</span>
						<a class="btn btn-default btn-xs login-link" href="register.php" style="margin-top:-2px;"><i class="fa fa-plus-circle"></i> Sign up</a>
					</div>
				</div>
				<div class="panel-body">
					<form class="form-login" role="form" action="#" method="post">
			                    	  <?php if($msg) {
          echo "<div class='alert alert-danger' role='alert'>
          <span class='sr-only'>Error:</span>".$msg."

        </div>";
        } ?>

			                        <div class="form-group">
			                        	<label class="sr-only" for="form-email">Email</label>
			                        	<input type="email" name="user_login" placeholder="Email..." class="form-email form-control" id="form-email">
			                        </div>
			                         <div class="form-group">
			                        	<label class="sr-only" for="form-email">Password</label>
			                        	<input type="password" name="password_login" placeholder="Password..." class="form-email form-control" id="form-email">
			                        </div>
			                      
						<div class="form-group">
							<label class="label-checkbox inline">
                <input type="hidden" name="checkbox" value="false"  />

								<input type="checkbox" name="checkbox" value="true" class="regular-checkbox chk-delete" />
								<span class="custom-checkbox info bounceIn animation-delay4"></span>
							</label>
							Remember me		
						</div>
		
						<div class="seperator"></div>
						<div class="form-group">
						 
						 <a href="fu.php" class="primary-font login-link"><b>  Forgot</b></a> your password?
						</div>
						<div class="form-group">
							<div class="controls">
								Don't have an account? <a href="register.php" class="primary-font login-link"><b>Sign Up</b></a>
							</div>
						</div>

						<hr/>
			                        <!-- <button type="submit" class="btn"  name="login">Login</button> -->

			                        <button type="submit" class="btn btn-success btn-sm bounceIn animation-delay5  pull-right"   name="login"><i class="fa fa-sign-in"></i> Login</button>

							
						<!-- <a class="btn btn-success btn-sm bounceIn animation-delay5 login-link pull-right" href="dashboard.php"><i class="fa fa-sign-in"></i> Sign in</a> -->
        <!-- login from facebook <a href="login_from_fb/index.php" class="primary-font login-link" ><b>here</b></a> -->
					
          </form>
				</div>
			</div><!-- /panel -->
		</div><!-- /login-widget -->
    <div class="row">

    <div class="col-md-4"></div>
    <div class="col-md-4"></div>

     <!--  <div class="col-md-4">
                      <h4 class="headline">
               <center><a  href="report.php"  class="btn btn-danger">Any Report</br>Click Here</a></center>
            </h4> 
           
            </div> -->
            </div>
	</div><!-- /login-wrapper -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
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
	<script src="js/endless/endless.js"></script>
  </body>

<!-- Mirrored from minetheme.com/Endless1.5.1/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 May 2016 08:50:54 GMT -->
</html>
