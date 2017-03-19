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
<?php include( 'dashboard_menu.php') ?>
<?php include('connect.php') ?>


   



<div id="main-container">
   <div class="panel panel-default timeline-panel" style="margin-top: 18px;
    margin-left: 13px;
    margin-right: 13px;">

    <?php  $get_user_info=mysql_query("SELECT `id`, `full_name`, `email`, `citizenship_number`, `report_content` FROM `report` WHERE 1");
        $get_info=mysql_fetch_assoc($get_user_info);
        // var_dump($get_info);
        if($get_info){
        // $profilepic_info=$get_info['profile_pic'];
        //echo $profilepic_info;
        $fm=$get_info['full_name'];
        $email=$get_info['email'];
        $citizn=$get_info['citizenship_number'];
        $content=$get_info['report_content'];

        // if($profilepic_info==""){
        // $profilepic_info="img/default_pic.jpg";
        // }
        // else{}
        echo "$content";
        echo "$email";
        echo "$fm";
        echo " $citizn";
    }
    else{
        echo "wrong";
         }
        
 ?>
                            <div class="panel-heading">
                                John Doe created a new article
                                <small class="pull-right text-muted">
                                    <i class="fa fa-clock-o"></i> 5m ago
                                </small>
                            </div>
                            <div class="panel-body">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor suscipit lobortis. Sed quis ipsum risus. Mauris vitae justo non felis pulvinar rhoncus. In quis massa ut risus sagittis luctus.
                                </p>
                                <a class="btn btn-xs btn-default">Read more</a>
                                <a class="btn btn-xs btn-default"><i class="fa fa-reply"></i> Reply</a>
                            </div>
                        </div>
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
