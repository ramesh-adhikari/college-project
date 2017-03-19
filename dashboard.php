<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from minetheme.com/Endless1.5.1/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 May 2016 08:55:33 GMT -->
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

<?php include('dashboard_menu.php'); ?>

    <div id="main-container">
      <!-- <div id="breadcrumb">
        <ul class="breadcrumb">
           <li><i class="fa fa-home"></i><a href="dashboard.php"> Home</a></li>
           <li class="active">Blank page</li>  
        </ul>
      </div> --><!-- breadcrumb -->
        <h3 class="headline" style="text:centre">
              <center>Enter your family data</center>
            </h3>
    
  <div class="row">
  
          <div class="col-lg-12">
            <div class="panel panel-default">
            
              <?php


//  if($parent_id=@$_GET['parent1']){
// var_dump($parent_id);

//    // $getname="SELECT * FROM test name='$_POST[name]' and birthday='$_POST[date]' and citizenship_number='$_POST[citizenship_number]'";
//    //  $getnameresult=mysql_query($getname);
//    //  $setname=mysql_fetch_array($getnameresult);
//    //  $id5=$setname['id']; 
//    //  $unk=$setname['citizenship_number'];
//    //  $id1='1';
//    //  $id2=$id+$id1;
//    //    $name=$_POST['name'];
//     $child=$_POST['child'];
//    //  $date=$_POST['date'];
//    //  $citizenship_number=$_POST['citizenship_number'];
// // $getname="UPDATE test set child='$child' where id='$parent_id'"
//     $update=mysql_query("UPDATE test SET child='$child' WHERE id='$parent_id'");

// if($update){
//   echo "ok";
//   die();
// }

















$parent=@$_GET['parent'];
if(isset($_POST['Submit']))
  {
// if(isset($_POST['name']))




    $getname="SELECT * FROM test ORDER BY id DESC LIMIT 1";
    $getnameresult=mysql_query($getname);
    $setname=mysql_fetch_array($getnameresult);
    $id=$setname['id']; 
    $unk=$setname['citizenship_number'];
    $id1='1';
    $id2=$id+$id1;
      $name=$_POST['name'];
    $child=$_POST['child'];
    $date=$_POST['date'];
    $citizenship_number=$_POST['citizenship_number'];

    if($name==""){
     $message="fill the field Full name";
    }
    else{
  if($date==""){
      $message="fill field Birthday";
    }
else{

  if($child==""){
      $message="fill field How many child";
    }
    else{
    if($citizenship_number==""){
      $message="fill field citizenship_number";
    }
    else{
     


 //     $getname1="SELECT * FROM test Where name='$name' And birthday='$date' and citizenship_number='$citizenship_number' ";
 // $getnameresult1=mysql_query($getname1);
 //     $setname1=mysql_fetch_array($getnameresult1);
 //     if($setname1){
 //     $exit_id=$setname['parent']; 
    


 // if($exist_id==''){
 //   $exit_id=0;
 // }


  if(isset($_FILES['image'])){
    if(($_FILES["image"]["type"]=="image/jpeg")||(@$_FILES["image"]["type"]=="image/gif")&&(@$_FILES["image"]["size"]<1048576)){//1 megabyte{


  $chars="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRST0123456789";
  $rand_dir_name=substr(str_shuffle($chars),0,15);
  mkdir("images/$rand_dir_name");


   if(file_exists("images/$rand_dir_name/".@$_FILES["image"]["name"]))
  { 
    echo @$_FILES["image"]["name"]."Already exists";

  }
  else{
    move_uploaded_file(@$_FILES["image"]["tmp_name"],"images/$rand_dir_name/".$_FILES["image"]["name"]);
    //echo "Uploaded and stored in: images/$rand_dir_name/ ".@$_FILES["image"]["name"];

    $profile_pic_name=@$_FILES['image']["name"];
}}
}

      
// move_uploaded_file($_FILES['image']['tmp_name'],'./images/'.$_FILES['image']['name']);




  # code...
// if the parent is already exist the the turning point is parent='$id' so for this check the user father name mother name date of birth and so on
    $addCat="insert into test set 
    name='$_POST[name]',
    last_name='$ln',
    parent='0', 
    birthday='$_POST[date]',
    citizenship_number='$_POST[citizenship_number]',
    photo='$rand_dir_name/$profile_pic_name',
    child='$_POST[child]'";
    mysql_query($addCat);
    echo "<script>window.location='dashboard.php?parent=$id2';</script>";
    }
/*else{
  //for adding the child
*/

    // echo "<script>window.location='dashboard.php?parent=$$parent_id';</script>";
  // }

// }
  
  }
}

}
unset($parent_id);
 }

  if(isset($_POST['Submit1']))
  {
    $getname="SELECT * FROM test where id='$parent'";
    $getnameresult=mysql_query($getname);
    $setname=mysql_fetch_array($getnameresult);
    $id=$setname['id']; 
    // $unk1=$setname['citizenship_number'];
    // $v=$id;
    $id1='1';
    $id2=$id+$id1;

  $namea=$_POST['name'][0];
  $childa=$_POST['child'][0];
  $date=$_POST['date'][0];
  $citizenship_number=$_POST['citizenship_number'][0];
 if($namea==""){
     $message="fill All the field";
    }
    else{
  if($date==""){
      $message="fill All the field";
    }
else{

  if($childa==""){
      $message="fill All the field";
    }
    else{
    if($citizenship_number==""){
      $message="fill All the field";
    }
    else{
//  if($unk1==$citizenship_number){
//       $message="Citizenship number you enter is incorrect this is already taken Try again with correct data";
//     }
// else{


// move_uploaded_file($_FILES['image1']['tmp_name']'../images/'.$_FILES['image1']['name']);
// move_uploaded_file($_FILES['image']['tmp_name'],'./images/'.$_FILES['image']['name']);

// @move_uploaded_file($_FILES['image']['tmp_name'],'./images/'.$_FILES['image']['name']);


  $parent=$_POST['parent'];
     for ($w=0; $w < count($_POST['name']); $w++ )
{

  $name = $_POST['name'][$w];
  $child = $_POST['child'][$w];
   $date=$_POST['date'][$w];
  $citizenship_number=$_POST['citizenship_number'][$w];
  $image1=$_FILES['image']['name'][$w];












move_uploaded_file($_FILES['image']['tmp_name'][$w],'./images/'.$image1);

    // move_uploaded_file(@$_FILES["image"]["tmp_name"],"images/$rand_dir_name/".$_FILES["image"]["name"]);


   //  mysql_query("INSERT INTO test (name,child,parent,birthday,photo,citizenship_number) VALUES ('$name','$child', '$parent','$date', ' 
   // '$image1' ,'$citizenship_number')") or die(mysql_error());

$edit="insert into test  set
name='". $_POST['name'][$w]."',
child='".$_POST['child'][$w]."',
parent='".$parent."',
 last_name='".$ln."',
birthday='".$_POST['date'][$w]."',
photo='".$image1."',
citizenship_number='".$_POST['citizenship_number'][$w]."'";
 mysql_query($edit);

}
    echo "<script>window.location='dashboard.php?parent=$id2';</script>";
  }
  }
}
}
}
// }
?>
<?php
if(@$_GET['parent']=='')
{
$result = mysql_query("SELECT * FROM test");
$num_rows = mysql_num_rows($result);
 $ln=$_SESSION["lname"];

  ?>


            <div class="row">


 <div class="col-md-4">
                         </div>
              <div class="col-md-4">
                   <center>    <div class="panel panel-default">
                            <div class="panel-heading" style="background-color:#78E3E9;">Fill with Detail information About your family</div>
                            <div class="panel-body">
                              <form method="post"  enctype="multipart/form-data">
<?php if (isset($message)) {
          echo "<div class='alert alert-primary' role='alert'>
          <span class='sr-only'>Error:</span>".$message."

        </div>";
        } ?>
        
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Full Base Name</label>
                                        <input type="text" name="name" class="form-control input-sm" id="exampleInputEmail1" placeholder="Enter First Name" >
                                    </div><!-- /form-group -->
                                    
                                     <div class ="form-group">
                                  <label>Date of Birth</label>
                                  <input  type="text" name="date"class="form-control" id="exampleInputDOB1" placeholder="Eg.  2052-02-11">
                                </div>
                                   <div class="form-group">
                                        <label for="exampleInputEmail1">Citizenship number</label>
                                        <input type="text" name="citizenship_number" class="form-control input-sm" id="exampleInputEmail1" placeholder="Enter Citizenship number" >
                                    </div><!-- /form-group -->
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">How many child do you have?</label>
              
               
                  <select  name="child" id="optschild" class="form-control input-sm" >
                    <option value="0">0</option>
                <option value="1" selected="selected">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                  </select>
               
              </div><!-- /form-group -->
             

              <div class="form-group">
                                        <label for="exampleInputEmail1">Image</label>
               
                
                  <input  class="form-control input-sm" name="image" id="image" type="file">
                
              </div><!-- /form-group -->
                                   
                                    <button  type="submit" value="Submit" name="Submit" class="btn btn-success btn-sm">Submit</button>
                                </form>
                            </div>
                        </div><!-- /panel -->

                        </center> 
                    </div><!-- /.col -->
                     <div class="col-md-4">
                         </div>

</div>













<!--  -->
<?php
}
?>

<?php
if(@$_GET['parent']!='')
{
  ?>

<!-- <br /> -->
                            <!-- <div class="panel-heading">Fill with Detail information About your parent</div> -->
            <div class="row">

<centre><div class="panel-heading">Add child of <?php 
      $prodName="select * from test where id=".$_GET['parent'];
      $prodNameRes=mysql_query($prodName);
      $setName=mysql_fetch_array($prodNameRes);
      echo $setName['name'];
      $child=$setName['child'];
       ?>
        </div></centre>
        </div>
        
        
        <?php
        if($child==0)
        {
          $getname1="SELECT * FROM test ORDER BY id DESC LIMIT 1";
    $getnameresult1=mysql_query($getname1);
    $setname1=mysql_fetch_array($getnameresult1);
      $cc=$id=$setname1['id']; 
      
    
        $c=$_GET['parent'];
        
        
        if($cc==$c)
        {
          // $v=$v-1;
        
     echo "<script>window.location='family_tree.php';</script>";
     }
     else
     {
        
  
        $d='1';
        $d=$c+$d;
        
         
        echo "<script>window.location='dashboard.php?parent=$d';</script>";
       
        }
        }
        else
        {
        ?>




            <div class="row">


<div class="col-md-4">
                         </div>
              <div class="col-md-4">
                   <center> 
  <form method="post" enctype="multipart/form-data">

                      <div class="panel panel-default">
                            <div class="panel-heading" style="background-color:#78E3E9;">Add first child information</div>
                            <div class="panel-body">
                            
                              <?php
  
  for ($i=1; $i <= $child; $i++ )
 {
 ?>

<?php if (isset($message)) {
          echo "<div class='alert alert-primary' role='alert'>
          <span class='sr-only'>Error:</span>".$message."

        </div>";
        } ?>


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Full  Name</label>
                                        <input type="text" name="name[]" class="form-control input-sm" id="exampleInputEmail1" placeholder="Enter First Name"><input name="parent" value="<?php echo $_GET['parent'];?>" type="hidden">
                                    </div><!-- /form-group -->
                                    
                                     <div class ="form-group">
                                  <label>Date of Birth</label>
                                  <input  type="text" name="date[]"class="form-control" id="exampleInputDOB1" placeholder="Eg.  2052-02-11">
                                </div>
                                   <div class="form-group">
                                        <label for="exampleInputEmail1">Citizenship number</label>
                                        <input type="text"  name="citizenship_number[]"  class="form-control input-sm" id="exampleInputEmail1" placeholder="Enter Citizenship number">
                                    </div><!-- /form-group -->
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">How many child do you have?</label>
              
               
                  <select name="child[]" class="form-control input-sm">
                    <option value="0">0</option>
                <option value="1" selected="selected">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                  </select>
               
              </div><!-- /form-group -->
             

              <div class="form-group">
                                        <label for="exampleInputEmail1">Image</label>
               
                
                  <input  class="form-control input-sm" type="file" name="image[]" id="image">
                
              </div><!-- /form-group -->
<?php 
    if ($i<$child) {
      // echo "<hr> Add Another child";
                            echo'<div class="panel-heading" style="background-color:#78E3E9;">Add next child information</div>';

    }

 ?>
           
 <!-- <h4 class="headline">
           
              <span class="line"> next Child</span>
             <hr style="width:5px;">
              </hr >
            </h4> -->

               <?php
  $getname1="SELECT * FROM test ORDER BY id DESC LIMIT 1";
    $getnameresult1=@mysql_query($getname);
    $setname1=@mysql_fetch_array($getnameresult);
    echo $lastid=$setname1['id']; 
    ?>
  <?php
  }
  ?>
                                   
                                    <button  type="submit" value="Submit" name="Submit1"class="btn btn-success btn-sm">Submit</button>
                                </form>
                                                            <?php
}
}
?>
                            
                            </div>
                           



                       


                        </center> 
                   
                   <!--  </br>
                     </br>
                      </br> -->

                     <div class="col-md-4">
                         </div>

</div>



<script language="javascript">
  
function toggle(id){
  var ele=document.getElementById("toggleComment-"+id);
  var text=document.getElementById("displayComment");
  if(ele.style.display=="block"){
    ele.style.display="none";
    // text.innerHTML="show";

  }
  else{
    ele.style.display="block";
    // text.innerHTML="hide";


  }


}



</script>


<?php 












?>

          </div><!-- /main-container -->
  </div><!-- /wrapper -->

  

  <a href="#" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>
  
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

<!-- Mirrored from minetheme.com/Endless1.5.1/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 May 2016 08:55:33 GMT -->
</html>
