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

	echo '<li>
        <a href="member_profile.php?id='.$array['id'].'" class="m" rel="content" data-indi="06541">
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