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
<?php include( 'dashboard_menu.php') ?>



<div id="main-container">
    <div id="breadcrumb">
<?php 
if (isset($_POST['Submit'])) {


     $id=@$_POST['pid'];
         
   $name=@$_POST['name'];
  
   $date=@$_POST['date'];
  $citizenship_number=@$_POST['citizenship_number'];

    if($id==""){
      $message="fill parent ID";
    }
    else{
 if($name==""){
     $message="fill the field Full name";
    }
    else{
  if($date==""){
      $message="fill field Birthday";
    }
else{

 
    if($citizenship_number==""){
      $message="fill field citizenship_number";
    }
    else{
     $profile_pic_query=mysql_query("UPDATE `test` SET parent='$id' where name='$name' and birthday='$date' and citizenship_number='$citizenship_number'");

    if($profile_pic_query){
  
  echo "<script>window.location='family_tree.php?id=$id';</script>";

  
    }
    else{
      echo "wrong";
    }
}
}
}
}
}
?>

        <div class="padding-md">
            <div class="row">
            <h3 class="headline" style="text:centre">
							<center>To Connect your parent fill the following form</center>
						</h3>
                         <div class="col-md-4">
                         <!--  <h4 class="headline">
               <center><a  href="connect_with_parent.php"  class="btn btn-success">Click here To</br>Connect With Your parent</a></center>
            </h4> -->
                    
                         </div>
              <div class="col-md-4">
                   <center>    <div class="panel panel-default">

                            <div class="panel-heading">Fill with Detail information About your parent</div>
                              <?php if (isset($message)) {
          echo "<div class='alert alert-danger' role='alert'>
          <span class='sr-only'>Error:</span>".$message."

        </div>";
        } ?>
                            <div class="panel-body">
                                <form method="post">
                                 <div class="form-group">
                                        <label for="exampleInputEmail1">Parent ID</label>
                                        <input type="text" name="pid" class="form-control input-sm" id="exampleInputEmail1" placeholder="Parent ID">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Your Full Name</label>
                                        <input type="text" name="name" class="form-control input-sm" id="exampleInputEmail1" placeholder="Enter Full Name">
                                    </div><!-- /form-group -->
                                    <!--  <div class="form-group">
                                        <label for="exampleInputEmail1">Last Name</label>
                                        <input type="email" class="form-control input-sm" id="exampleInputEmail1" placeholder="Enter Last Name">
                                    </div><!/form-group --> 
                                     <div class ="form-group">
                                  <label>Your Date of Birth</label>
                                  <input type="text" name='date'class="form-control" id="exampleInputDOB1" placeholder="Eg.  2052-02-11">
                                </div>
                                   <div class="form-group">
                                        <label for="exampleInputEmail1">Your Citizenship number</label>
                                        <input type="text" name="citizenship_number" class="form-control input-sm" id="exampleInputEmail1" placeholder="Enter Citizenship number">
                                    </div><!-- /form-group -->
                                   
                                    <button  type="submit" value="Submit" name="Submit" class="btn btn-success btn-sm">Submit</button>
                                    
                                </form>
                            </div>
                        </div><!-- /panel -->
                        </center> 
                    </div><!-- /.col -->
                     <div class="col-md-4">
                      <h4 class="headline">
               <center><a  href="parent.php"  class="btn btn-danger">Don't Have parent ID</br>Click Here</a></center>
            </h4> 
                         </div>
            </div>

       
        <!-- breadcrumb -->
   
    <div class="col-md-5"></div>
    <div class="col-md-5"></div>

      <div class="col-md-2">
                      <h4 class="headline">
               <!-- <center><a  href="report.php"  class="btn btn-danger">Any Report</br>Click Here</a></center> -->
            </h4> 
            </div>
             </div>
              </div>
    <!-- /main-cont
    ainer -->
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