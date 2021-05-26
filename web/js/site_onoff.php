<?php
require_once("config/all.php");
require_once('models/account.php');
require_once('models/common.php');
$site_onoff=$_GET["site_onoff"];
$onoff=$_GET["onoff"];
$app=$_GET['app'];
$account = new Account;

$getweball = new Common;
$getWeb = $getweball->getWebaccount($_COOKIE['d']);
$user = $getWeb['user'];
if(isset($site_onoff))
{
	if($onoff=="on")
	{
		if($app=="site"){
			echo Shell_Exec ("%windir%\system32\inetsrv\appcmd.exe start sites $site_onoff");
			// echo $stopsite=$account->Site('site',1,$site_onoff);
			$stopsite=$account->Site('site',1,$site_onoff);
		}else{
			echo Shell_Exec ('%windir%\system32\inetsrv\appcmd.exe start apppool /apppool.name:'.$site_onoff);
			// echo $stopsite=$account->Site('app',1,$site_onoff);
			$stopsite=$account->Site('app',1,$site_onoff);
		}
		
	}else{
		if($app=="site"){
			echo Shell_Exec ("%windir%\system32\inetsrv\appcmd.exe stop sites $site_onoff");
			// echo $stopsite=$account->Site('site',0,$site_onoff);
			$stopsite=$account->Site('site',0,$site_onoff);
		}else{
			echo Shell_Exec ('%windir%\system32\inetsrv\appcmd.exe stop apppool /apppool.name:'.$site_onoff);
			// echo $stopsite=$account->Site('app',0,$site_onoff);
			$stopsite=$account->Site('app',0,$site_onoff);
		}
	}
	// echo $onoff;
}

if(isset($_GET['error']))
{
	if($_GET['error']=="new_error")
	{
		$new_error= $_GET['error'];
		$status_code= $_GET['status_code'];
		$url_spec= $_GET['url_spec'];
		echo Shell_Exec ("c:/laragon/www/app/error.cmd ". $user." ". $status_code." ".$url_spec);
		echo $account->errorPages($_COOKIE['d'], $new_error,$status_code,$url_spec);
	}else if($_GET['error']=="edit_error"){
		$error= $_GET['error'];
		$status_code= $_GET['status_code'];
		$url_spec= $_GET['url_spec'];
		$key= $_GET['key'];
		$code= $_GET['code'];
		echo Shell_Exec ("c:/laragon/www/app/error/editerror.cmd ". $user." ". $status_code." ".$url_spec." ".$code);

		echo $account->editErrorPages($_COOKIE['d'], $error,$status_code,$url_spec, $key);
	}else{
		$error= $_GET['error'];
		$status_code= $_GET['status_code'];
		$onoff= $_GET['onoff'];
		// echo $onoff;
		// die();
		// echo Shell_Exec ("c:/laragon/www/app/error/onoff.cmd ". $_COOKIE['d']." ". $status_code);
		echo $account->onoffErrorPages($_COOKIE['d'], $error,$status_code,$onoff);
	}
	

}


?>