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
 <body class="overflow-hidden">
  <!-- Overlay Div -->
  <div id="overlay" class="transparent"></div>
  
  

  <div id="wrapper" class="preload">
<?php include( 'dashboard_menu.php') ?>

<div id="main-container">
    <div id="breadcrumb">

<?php 
if (isset($_POST['Submit'])) {


    
         
   $name=@$_POST['name'];
  
   $email=@$_POST['email'];
  $citizenship_number=@$_POST['citizenship_number'];
  $report=@$_POST['report'];
  $rtitle=@$_POST['rtitle'];


  
 if($name==""){
     $message="fill the field Full name";
    }
    else{
  if($email==""){
      $message="fill field email";
    }
else{
      if($rtitle==""){
      $message="fill field Report Title";
    }
    else{
        
            

 
    if($citizenship_number==""){
      $message="fill field citizenship_number";
    }
    else{
         if($report==""){
      $message="fill field Report";
    }
    else{
                    $query=mysql_query("INSERT INTO `college`.`report` (`id`, `full_name`, `email`,`citizenship_number`,`report_title`, `report_content`) VALUES (NULL, '$name', '$email',  '$citizenship_number','$rtitle','$report')");
    

    if( $query){
  // $message1="your report is send";
  // echo "<alert>Hello</alert>";
  // echo "<script>window.location='report.php';</script>";
   echo "<script>alert('Your Report has been send');</script>";
    echo "<script>window.location='report.php';</script>";

  
    }
    else{
      echo "wrong";
    }
}
}
}
}
}
}
?>

     <div class="padding-md">
              
               
                <div class="panel panel-default">
                  <!--  -->
                    <div class="panel-body">
                        <form id="formToggleLine" class="form-horizontal no-margin form-border" method="post">
                       <div class="panel panel-default">
                          <center> <div class="panel-heading">Report your problem To <span>Admin</span></div></center> 
                           <?php if (isset($message)) {
          echo "<div class='alert alert-danger' role='alert'>
          <span class='sr-only'>Error:</span>".$message."

        </div>";
        } ?>
        
                            <div class="panel-body">
                                <!-- <form class="form-horizontal"> -->
                                    <div class="form-group">
                                        <label for="inputEmail1"  class="col-lg-2 control-label">Your full name</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="name" class="form-control input-sm" id="inputEmail1" placeholder="Full name"  value="<?php if(isset($_POST['name'])){echo $_POST['name']; } ?>">
                                        </div><!-- /.col -->
                                    </div><!-- /form-group -->
                                      <div class="form-group">
                                        <label for="inputEmail1"  class="col-lg-2 control-label">Your Email</label>
                                        <div class="col-lg-10">
                                            <input type="email" name="email" class="form-control input-sm" id="inputEmail1" placeholder="Email"  value="<?php if(isset($_POST['email'])){echo $_POST['email']; } ?>">
                                        </div><!-- /.col -->
                                    </div><!-- /form-group -->
                                    <div class="form-group">
                                        <label for="inputPassword1" class="col-lg-2 control-label">Your Citizenship Number</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="citizenship_number" class="form-control input-sm" id="inputPassword1" placeholder="Citizenship Number"  value="<?php if(isset($_POST['citizenship_number'])){echo $_POST['citizenship_number']; } ?>">
                                        </div><!-- /.col -->
                                    </div><!-- /form-group -->
                                     <div class="form-group">
                                        <label for="inputEmail1"  class="col-lg-2 control-label">Report Title</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="rtitle" class="form-control input-sm" id="inputEmail1" placeholder="Report Title"  value="<?php if(isset($_POST['rtitle'])){echo $_POST['rtitle']; } ?>">
                                        </div><!-- /.col -->
                                    </div>

                                     <div class="form-group">
                                <label class="col-lg-2 control-label">Detail About Report</label>
                                <div class="col-lg-10">
                                    <textarea id="wysihtml5-textarea" name="report" value=""  placeholder="Enter your Report Here ..." class="form-control" rows="6" ><?php if(isset($_POST['report'])){echo $_POST['report']; } ?></textarea>                   
                                </div><!-- /.col -->
                            </div><!-- /form-group -->
                          
                                  
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                    <button  type="submit" value="Submit" name="Submit" class="btn btn-success btn-sm">Send</button>
                                    <?php 
                                   if (isset($message1)) {
                                    echo $message1; }?>
                                           
                                        </div><!-- /.col -->

                                    </div><!-- /form-group -->

                                <!-- </form> -->
                            </div>

                        </div><!-- /panel -->
                            
                            <center>Your Report will be Response as soon as possible in your Email so check your email after 24 hour</center>
                           
                        </form>
                    </div>
                </div><!-- /panel -->
               
               
            </div><!-- /.padding-md -->
        <!-- breadcrumb -->
    </div>
    <!-- /main-container -->
</div>
<!-- /wrapper -->



<a href="#" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>

<!-- Logout confirmation -->


<!-- Le javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<!-- Jquery -->
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
