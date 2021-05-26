<?php
// die('ok');
require_once('config/all.php');
require_once('models/common.php');
require_once('models/site.php');

$site_onoff=$_GET["site_onoff"];
$onoff=$_GET["onoff"];
$app=$_GET['app'];

$site = new Site;
$getweball = new Common;
$getWeb = $getweball->getWebaccount($_COOKIE['customer']);
$user = $getWeb['user'];
if(isset($site_onoff))
{
	echo $site->siteSetting($app,$onoff,$site_onoff);
}

// if(isset($_GET['error']))
// {
// 	if($_GET['error']=="new_error")
// 	{
// 		$new_error= $_GET['error'];
// 		$status_code= $_GET['status_code'];
// 		$url_spec= $_GET['url_spec'];
// 		echo Shell_Exec ("c:/laragon/www/app/error.cmd ". $user." ". $status_code." ".$url_spec);
// 		echo $site->errorPages($_COOKIE['d'], $new_error,$status_code,$url_spec);
// 	}else if($_GET['error']=="edit_error"){
// 		$error= $_GET['error'];
// 		$status_code= $_GET['status_code'];
// 		$url_spec= $_GET['url_spec'];
// 		$key= $_GET['key'];
// 		$code= $_GET['code'];
// 		echo Shell_Exec ("c:/laragon/www/app/error/editerror.cmd ". $user." ". $status_code." ".$url_spec." ".$code);

// 		echo $site->editErrorPages($_COOKIE['d'], $error,$status_code,$url_spec, $key);
// 	}else{
// 		$error= $_GET['error'];
// 		$status_code= $_GET['status_code'];
// 		$onoff= $_GET['onoff'];
// 		// echo $onoff;
// 		// die();
// 		// echo Shell_Exec ("c:/laragon/www/app/error/onoff.cmd ". $_COOKIE['d']." ". $status_code);
// 		echo $site->onoffErrorPages($_COOKIE['d'], $error,$status_code,$onoff);
// 	}
	

// }


?>