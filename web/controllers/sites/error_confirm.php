<?php

require_once("config/all.php");
require_once('models/account.php');
require_once('models/common.php');

$domain = $_COOKIE['domain'];

$getweball = new Common;
$getWeb = $getweball->getWebaccount($domain);
$user = $getWeb['user'];

$account = new Account;

if(isset($_POST['action']))
{
	if($_POST['action']=="new")
	{
		// die('hello');
		$action= $_POST['action'];
		$status_code= $_POST['status_code'];
		$url_spec= $_POST['url_spec'];
		echo Shell_Exec ("E:/error_pages/error.bat ". $user." ". $status_code." ".$url_spec);
		$account->errorPages($domain, $action, $status_code, $url_spec);
		die('hello');
	}else if($_POST['action']=="edit"){
		$action= $_POST['action'];
		$status_code= $_POST['status_code'];
		$url_spec= $_POST['url_spec'];
		$key= $_POST['key'];
		$code= $_POST['code'];
		// echo Shell_Exec ("E:/error_pages/error/editerror.cmd ". $user." ". $status_code." ".$url_spec." ".$code);

		echo $account->editErrorPages($domain, $action,$status_code,$url_spec, $key);
	}else{
		$action= $_POST['action'];
		$key= $_POST['key'];
		$onoff= $_POST['onoff'];
		$status = 0;
    	if(isset($_POST['onoff']))
    	{
    		$status = 1;
    	}
		// echo Shell_Exec ("c:/laragon/www/app/error/onoff.cmd ". $domain." ". $status_code);
		echo $account->onoffErrorPages($domain, $action,$key,$status);
	}
	header('location : /share/servers/sites/basic');
}

?>