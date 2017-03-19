<?php
include_once("inc/facebook.php"); //include facebook SDK
######### Facebook API Configuration ##########
$appId = '1803919576561038'; //Facebook App ID
$appSecret = '156a3be8dbbbb503c17f4cdb036d4eb3'; // Facebook App Secret
$homeurl = 'http://localhost/1/banshwali/login_from_fb/';  //return to home
$fbPermissions = 'email';  //Required facebook permissions

//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret
));
$fbuser = $facebook->getUser();
?>