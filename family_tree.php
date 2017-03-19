<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from minetheme.com/Endless1.5.1/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 May 2016 08:46:02 GMT -->
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


  

<?php 
$parent_id=@$_GET['id'];


 ?>

        <div class="padding-md">
            <div class="row">
            
                <?php
    $check_userdata=mysql_query("SELECT * FROM test WHERE name='$fm' and birthday='$bday' and citizenship_number='$citizenship_number' ");
  $data_row=mysql_fetch_assoc($check_userdata);
  $id=$data_row['id'];
  $name=$data_row['name'];
  $pid=$data_row['parent'];
  $bday=$data_row['birthday'];
  $gp=$data_row['geant_parent'];
 


if($data_row){
//       $check_userdata1=mysql_query("SELECT * FROM test WHERE id='$pid' or id='$gp' ");
//   $data_row1=mysql_fetch_assoc($check_userdata1);
//   $idp=$data_row1['id'];
 


// while($idp <= $parent_id) {
//     // echo "The number is: $x <br>";
//     $idp++;
// } 






                   echo'


<h3 class="headline" style="text:centre">
                            <center>Moving forward to Show Your Photo Family Tree</center>
                             
 <div class="col-md-4">
                    
                </div>


                <div class="col-md-4">

                    <h4 class="headline">
                        <center> <a href="d.php?child_id='.$id.'" class="btn btn-success">click Here To </br>Show your family tree</a></center>
                        </h4>
                        </div>

                         <div class="col-md-4">
                    <h4 class="headline">
                             <center><a  href="parent.php"  class="btn btn-primary">find your parent</a></center>
                        </h4>
                   </br>
                    <h4 class="headline">
                             <center><a  href="add_child.php?parent1='.$id.'"  class="btn btn-primary">click here to add your child</a></center>
                        </h4>
                </div>';
                    }
                   
                   else{echo'
                    <h3 class="headline" style="text:centre">
                            <center>Moving forward to create Your Photo Family Tree</center>
                             


<div class="col-md-4">
</div>
               
 <div class="col-md-4">
                    <h4 class="headline">
                             <center><a  href="dashboard.php"  class="btn btn-primary">Start with you</a></center>
                        </h4>
                    
                </div>'

               ;


                   }


                  


  ?>
                </div>
               
            </div>

        </div>

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