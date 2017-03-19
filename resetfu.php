
<?php
    $con = mysqli_connect("localhost","root","","college");


if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $password1=mysqli_real_escape_string($con, $_POST['password1']);
        $password2=mysqli_real_escape_string($con, $_POST['password2']);
        if ($password2==$password1) {
          $message_success="New password has been set".$email;
          $password=md5($password1);
          mysqli_query($dbconfig,"UPDATE users set password='$password' where email='$email'");
          //destroy the key from table
          // mysqli_query($dbconfig,"DELETE FROM forgot_password where email='$email' and temp_key='$key'");
        }
        else{
          $message="Verify your password";
        }
        
        
        }