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
                <ul class="breadcrumb">
                     <li><i class="fa fa-home"></i><a href="index-2.html"> Home</a></li>
                     <li class="active">Page</li>    
                     <li class="active">Search Result</li>   
                </ul>
            </div><!-- breadcrumb -->
            
            <div class="padding-md">
                <div class="search-filter">
                 
                    <center ><h4>Report From user</h4></center>
                </div><!-- /search-filter -->
                <div class="row">
                    <div class="col-md-8">


                    <?php 
// $sql=mysql_query("SELECT * from report where 1");
// $fetch1=mysql_fetch_assoc($sql);
// $report=$fetch1['report_content'];
// $id=$fetch1['id'];

// var_dump($id);
                   

$get_user_info=mysql_query("SELECT * FROM report where open='0' ");
// $get_info=mysql_fetch_assoc($get_user_info);
while($comments=mysql_fetch_assoc($get_user_info)){
// $profilepic_info=$comments['id'];
 $name=$comments['full_name'];
 $email=$comments['email'];
 $cn=$comments['citizenship_number'];
 $rtitle=$comments['report_title'];

 $report=$comments['report_content'];
 $id=$comments['id'];


 // var_dump($report);



// var_dump($profilepic_info,$name);}
// die();





                    
                       
                      
                      echo'  
                        <div class="search-container">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="search-header">
                                        <a href="#" class="h4 inline-block">'.$rtitle.'</a>
                                        <div class="text-muted">'.$email.'
                                        <div class="text-muted pull-right">citizenship number:'.$cn.'</div> </div>

                                    </div>
                                    
                                    <p class="m-top-sm">
                                    '.$report.'
                                    </p>
                        <form  method="post">
                                    
                                    <div class="text-right">
                                    <button  type="submit"  name="Submit" class="btn btn-success"><i class="fa fa-check fa-lg"></i> Done</button>
                                    <button  type="submit"  name="Submit2" class="btn btn-danger"><i class="fa fa-star"></i>On Maintain</button>

                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>';

}


 // if (isset($_POST['Submit'])) {

 //     $profile_pic_query=mysql_query("UPDATE `report` SET open='1' where id='$id'");

 //                    }
 ?>    



                        
                      
                       
                       
                    </div><!-- /.col -->
                    <div class="col-md-4">
                       
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.padding-sm -->
        </div>
</div>
<!-- /wrapper -->


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

<!-- Mirrored from minetheme.com/Endless1.5.1/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Jun 2016 04:13:51 GMT -->

</html>