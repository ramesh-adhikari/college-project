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



        <div class="padding-md">
            <div class="row">
            <h3 class="headline" style="text:centre">
							<center>To find your parent if exist fill the following form</center>
						</h3>
                         <div class="col-md-4">
                          <h4 class="headline">
               <center><a  href="connect_with_parent.php"  class="btn btn-success">Click here To</br>Connect With Your parent</a></center>
            </h4>
                    
                         </div>
              <div class="col-md-4">
                   <center>    <div class="panel panel-default">

                            <div class="panel-heading">Fill with Detail information About your parent</div>
                            <div class="panel-body">
                                <form method="post">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Parent Full Name</label>
                                        <input type="text" name="name" class="form-control input-sm" id="exampleInputEmail1" placeholder="Enter Full Name">
                                    </div><!-- /form-group -->
                                    <!--  <div class="form-group">
                                        <label for="exampleInputEmail1">Last Name</label>
                                        <input type="email" class="form-control input-sm" id="exampleInputEmail1" placeholder="Enter Last Name">
                                    </div><!/form-group --> 
                                     <div class ="form-group">
                                  <label>Parent Date of Birth</label>
                                  <input type="text" name='date'class="form-control" id="exampleInputDOB1" placeholder="Eg.  2052-02-11">
                                </div>
                                   <div class="form-group">
                                        <label for="exampleInputEmail1">Parent Citizenship number</label>
                                        <input type="text" name="citizenship_number" class="form-control input-sm" id="exampleInputEmail1" placeholder="Enter Citizenship number">
                                    </div><!-- /form-group -->
                                   
                                    <button  type="submit" value="Submit" name="Submit" class="btn btn-success btn-sm">Search</button>
                                    
                                </form>
                            </div>
                        </div><!-- /panel -->
                        </center> 
                    </div><!-- /.col -->
                     <div class="col-md-4">
                     <?php
 
if (isset($_POST['Submit'])) {


           
   $name=@$_POST['name'];
  
   $bday=@$_POST['date'];
   $cnumber=@$_POST['citizenship_number'];


 $getname="SELECT * FROM test where name='$name' and citizenship_number='$cnumber' And birthday='$bday'";
    $getnameresult=mysql_query($getname);
    $setname=mysql_fetch_array($getnameresult);
    if( $setname){
    $id=$setname['id']; 
    $unk1=$setname['citizenship_number'];
    $name=$setname['name'];



echo'
<table class="table">
    <thead>
      <tr>
        <th>ID</th>

        <th>Full Name</th>
        <th>Citizenship Number</th>
       
      </tr>
    </thead>
    <tbody>
      <tr>';?>
      <!-- <td> <a href=d.php?id='.$id.'"11</a></td> -->
            <td><a href="d.php?id=<?php echo $id?>"><?php echo $id; ?></a></td>

      <?php 
      echo '
        <td>'. $name.'</td>
        <td>'.$unk1.'</td>
        
      </tr>
      
    </tbody>
  </table>';
}
else{
    echo "not found such type of data";
}

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