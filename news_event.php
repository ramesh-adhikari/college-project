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
      <ul class="breadcrumb">
        <li><i class="fa fa-home"></i><a href="dashboard.php"> Home</a></li>
        <li class="active">News & events</li>
      </ul>
      </div><!-- breadcrumb -->
      
      <div class="row">
        
       
        <div class="col-lg-8" style="margin-left: 30px;
    margin-top: 25px;">
          <div class="panel panel-default">
            <!-- <div class="panel-body padding-xs">
              <textarea class="form-control no-border no-shadow" rows="2" placeholder="Post news and events"></textarea>
            </div>
            <div class="panel-footer clearfix">
              <a class="btn btn-xs btn-success pull-right">Post</a>
            </div>
          </div> -->
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
          // echo "Hello," .$user;
          // echo "<br>Would you like to Logout?<a href='logout.php'>Logout</a>";
          if(!isset($_SESSION['user_login'])){
          // echo"<meta http-equiv=\"refresh\" content=\"0; url=http://findfriend.index.php";
          header('location:index.php');
          }
          else{
          
          //if the user is logged in
          //echo "Hello," .$user;
          //echo "<br>Would you like to Logout?<a href='logout.php'>Logout</a>";
          ?>
          <div class="panel-body padding-xs">
            <form action=" " method="post">
              <textarea class="form-control no-border no-shadow" id="post" name="post" rows="2" placeholder="Post news and events" style="    padding: 21px;"></textarea>
              
              <div class="panel-footer clearfix">
                <input class="btn btn-xs btn-success pull-right" type="submit" name="send"  value="Post" >
                <!-- <a class="btn btn-xs btn-success pull-right">Post</a> -->
              </div>
            </div>
          </form>
        </div>
        <!-- <div class="profilePosts"> -->
       
        
        <?php
        if(isset($_POST['send'])&& isset($_POST['post'])){
        $post=@$_POST['post'];
        if($post=="")
        {

        }
        else{
        $date_added="";//date("Y-m-d");
        $added_by=$user;
        $user_posted_to=$user;
        $query="INSERT INTO `college`.`posts` (`id`, `body`, `date_added`, `added_by`, `user_posted_to`) VALUES (NULL, '$post', '$date_added', '$added_by', '$user_posted_to')";
        $que=mysql_query($query) or die (mysql_error());
        echo "<script>window.location='news_event.php';</script>";
        unset($_POST['post']);
        unset($_POST['send']);
        }
      }
        unset($_POST['post']);
        unset($_POST['send']);
        
        // else{
        //   echo "You must entre something in the post field before you can send it...";
        // }
        
        $check=mysql_query("SELECT * FROM posts ORDER BY id DESC LIMIT 10");
        while($row=mysql_fetch_array($check)){
        //$id=$get['id'];
        $id=$row['id'];
        $body=$row['body'];
        $date_added=$row['date_added'];
        $added_by=$row['added_by'];
        $user_posted_to=$row['user_posted_to'];
        // echo $body;
        ?>
        <?php
        $get_unread_query=mysql_query("SELECT * FROM post_comments WHERE post_id='$id' ");
        $get_unread=mysql_fetch_assoc($get_unread_query);
        $unread_numrows=mysql_num_rows($get_unread_query);
        
        $unread_numrows="(".$unread_numrows.")";
        ?>
        <?php
        //echo $body;
        $get_user_info=mysql_query("SELECT * FROM users WHERE first_name='$added_by' and last_name='$ln'");
        $get_info=mysql_fetch_assoc($get_user_info);
        $profilepic_info=$get_info['profile_pic'];
        //echo $profilepic_info;
        $fm=$get_info['first_name'];
        $lm=$get_info['last_name'];
        if($profilepic_info==""){
        $profilepic_info="img/default_pic.jpg";
        }
        else{

    $profilepic_info=$profilepic_info;


        }
        //echo "$body";


        ?>


  <div class="panel panel-default">
            <div class="panel-body">
              <div class="clearfix">
                <a href="#" class="pull-left m-right-sm">
                  <img src='userdata/profile_pics/<?= $profilepic_info ?>' class="img-circle" style="width:60px;" alt="<?php echo $fm ?>">
                </a>
                <!-- <span class="label label-success pull-right">Friend</span> -->
                <strong class="block"><?php echo $fm.'&nbsp; &nbsp;'.$lm ?></strong>
                <small class="text-muted">

                <?php    echo substr($row['post_time'],0,10); ?>


                </small>
              </div>
              <div class="seperator"></div>
              <p>
                <?= $body ?>

                
              </p>
             
            </div>
            <div class="panel-footer">
              <div class='newsfeedOptions'>
               <!-- <a class="btn btn-default btn-xs"><i class="fa fa-thumbs-up"></i> Like</a> -->
              <!-- <a class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</a> -->
                <a href='javascript:;' onClick="toggle('<?= $id?>')"> comment<?php echo $unread_numrows ?></a>
                <div id='toggleComment-<?= $id?>' style= 'display:none;'>
                  </br>
                  <iframe src='comment_frame.php?id=<?= $id ?>'  frameborder='0' style='height:auto; max-height150px; width:100%; min-height:10px;'> </iframe>
                </div>
                
                
              </div>
            </div>
        
          </div>











      
          <?php
          //Get Revalent Comments
          }
          }
          ?>
           <div class="col-lg-4">
         
        </div>
        </diV>

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