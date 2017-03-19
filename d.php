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
			<div id="breadcrumb">
				<ul class="breadcrumb">
					 <li><i class="fa fa-home"></i><a href="index-2.html"> Home</a></li>
					 <li class="active">Welcom To Your banshwali</li>	 
				</ul>
			</div><!-- breadcrumb -->
		
	<div class="row">
	<div class="sajan1" style="
  overflow-x: scroll; width: 95%; ">
					<!-- <div class="col-lg-12"> -->
						<!-- <div class="panel panel-default"> -->





<?php

include 'medoo.php';
$luck = array();
$main_id = @$_GET['id'];

$child_id = @$_GET['child_id'];

if($main_id){

	$master = recursiveChilds($main_id);

	include "show.php";	
}

if($child_id){
	$main_id = getMaster($child_id);
	
	$master = recursiveChilds($main_id);

	include "show.php";	
}

function recursiveChilds($id){

	$data = getById($id);
	if(hasChilds($id)){
		foreach( getChilds($id) as $child){
			$data['childs'][] = recursiveChilds($child['id']) ;
		}
	}

	return $data;
}

function hasChilds($id){
	global $database;

	return $database->has('test',['parent'=>$id]);
}

function getById($id){
	global $database;

	return $database->get('test','*',['id'=>$id]);
}

function getChilds($id){
	global $database;

	return $database->select('test','*',['parent'=>$id]);
}

function getParent($id){
	global $database;

	$child = $database->get('test','*',['id'=>$id]);

	return $database->get('test','*',['parent'=>$child['parent']]);
}




function getMaster($id){
	$current = getById($id); 
	if($id = $current['parent']){
		return getMaster($id);
	}else{
		return $current['id'];
	}
}

function viewHelper($array){
	$profile_pic_db=$array['photo'];
if($profile_pic_db==""){
		$profile_pic="img/default_pic.png";
	 }
	else{

		// userdata/profile_pics/
	 	$profile_pic="images/".$profile_pic_db;
// $gal=mysql_query("INSERT INTO usere ('gallery'='$gallery' where username='$user'");
}
	echo '<li>

        <a href="member_profile.php?id='.$array['id'].'" class="m" rel="content" data-indi="06541"><img src='.$profile_pic.' style="height:50px;width:50px;">
           <div class="tree-detail">Name:'.$array['name'].'<span>Birthday'.$array['birthday'].'</span>your id:'.$array['id'].'</br>parent id:'.$array['parent'].' </div>
        </a>';

        if(isset($array['childs']) && $array['childs'] ){
        	echo '<ul class="c">';
        	foreach ($array['childs'] as $a) {
				viewHelper($a);        		
        	}
        	echo '</ul>';
        }

        echo '</li>';
		
}
echo'<a class="btn btn-success hidden-print pull-right" id="invoicePrint"><i class="fa fa-print"></i> Print</a>';

?> 

<button class="btn btn-success hidden-print pull-right" id="btn_ZoomIn"><i class="fa fa-plus"></i></button>
<button class="btn btn-success hidden-print pull-right" id="btn_ZoomOut"><i class="fa fa-minus"></i></button>
</div>

					</div><!-- /main-container -->
					
	</div><!-- /wrapper -->

	
	<a href="#" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>
	

    <!-- ================================================== --> -->
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
	<script>

	var currentZoom = 1.0;

    $(document).ready(function () {
        $('#btn_ZoomIn').click(
            function () {
                $('.tree').animate({ 'zoom': currentZoom += .1 }, 'slow');
            })
        $('#btn_ZoomOut').click(
            function () {
                $('.tree').animate({ 'zoom': currentZoom -= .1 }, 'slow');
            })
        $('#btn_ZoomReset').click(
            function () {
                currentZoom = 1.0
                $('.tree').animate({ 'zoom': 1 }, 'slow');
            })
    });


		$(function()	{
			$('#invoicePrint').click(function()	{
				window.print();

			});
		});


	// 		$(".tree")
	// usedown(function(e){
	// $(this).on("mousemove",function(e){
	// var p1 = { x: e.pageX, y: e.pageY };
	// var p0 = $(this).data("p0") || p1;
	// console.log("dragging from x:" + p0.x + " y:" + p0.y + "to x:" + p1.x + " y:" + p1.y);
	// $(this).data("p0", p1);
	// });
	// })
	// .mouseup(function(){
	// $(this).off("mousemove");
	// });

	</script>
	
  </body>

<!-- Mirrored from minetheme.com/Endless1.5.1/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 May 2016 08:55:33 GMT -->
</html>
