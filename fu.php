<?php 
$message="";
$valid='true';
    $con = mysqli_connect("localhost","root","","college");

session_start();
/*if(!isset($_SESSION['login_user'])) {
    $login_status="true";
}*/

if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $email_reg=mysqli_real_escape_string($con, $_POST['email_reg']);
        $details=mysqli_query($con, "SELECT first_name,email FROM users WHERE email='$email_reg'");
        
        if ( mysqli_num_rows($details)>0) {
          $message_success=" Please check your email and follow the steps";
          //generating the key
          $key=md5(time()+123456789);
          //insert key into database
          // $sql_insert=mysqli_query($dbconfig,"INSERT INTO forgot_password(email,temp_key) VALUES('$email_reg','$key')");
          //sending email
              $to      = $email_reg;
              $subject = 'Changing password- banshwali';
             $msg = "Please copy the link and paste in your browser address bar". "\r\n"."localhost/project/resetfu.php?key=".$key."&email=".$email_reg;
              $headers = 'From:banshwali' . "\r\n";
              mail($to, $subject, $msg, $headers);
        }
        else{
          $message="Sorry! no account associated with this email";
        }
     } 
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>banshwali | Forgot Password</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
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

  
  <body class="hold-transition register-page" >
  <div class="row" style="margin-left:115px; margin-top:50px; margin-right:115px; ">
    <div class="register-box" style="margin:auto;">
      <div class="register-logo">
        <a href="#"><b>banshwali</b></a>
      </div>

      <div class="register-box-body" >
        <!-- <p class="login-box-msg" style="color:red;"><?php echo $message; ?></p> -->

  
        <form action="" method="post" enctype="multipart/form-data">
         
          <label>Please enter your email to recover your password</label><br><br>
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" value="<?php echo isset($_POST['email_reg']) ? $_POST['email_reg'] : ''; ?>" name="email_reg">
            <!-- <span class="glyphicon glyphicon-envelope form-control-feedback"></span> -->
          </div>
        <?php if ($message<>"") {
  echo"<div class='alert alert-danger' role='alert'>
  <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
  <span class='sr-only'>Error:</span>".$message."</div>";
} ?>
<?php if (isset($message_success)) {
  echo"<div class='alert alert-success' role='alert'>
  <span class='glyphicon glyphicon-ok' aria-hidden='true'></span>
  <span class='sr-only'>Error:</span>".$message_success."</div>";
} ?>
          <div class="row">
           
            <div class="col-xs-4 pull-right">
              <button type="submit" class="btn btn-primary btn-block btn-flat ">Send</button>
            </div><!-- /.col -->
          </div>
        </form>

       <!--  <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using Google+</a>
        </div> -->
<hr style="border-width: 3px;">
        <a href="index.php" class="text-center" >Go to Login</a>
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->
    </div>
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
</html>