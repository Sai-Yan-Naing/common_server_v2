<?php 
if(!isset($_POST['block_ip'])){header('location: /share/servers/security/ip');}
require_once ('config/all.php');
require_once ('models/common.php');
require_once ('common/common.php');
require_once ('models/ip.php');
$domain = $_COOKIE['domain'];
$getweball = new Common;
$getWeb = $getweball->getWebaccount($domain);
$blacklist = new BlackList;
$site = $getWeb['user'];
$ip = $_POST['block_ip'];
$action = $_POST['action'];
if($action=='new')
{
	if(isExistBlackListIp($site,$ip))
	{
		$error = $ip." is already exist.";
		include('views/share/security/ip.php');
		die();
	}
	if(!$blacklist->addToBlacklist($domain,$ip))
	{
		$error = $ip." cannot insert to Database.";
		include('views/share/security/ip.php');
		die();
	}
}else{
	if(!$blacklist->deleteIp($_POST['id']))
	{
		$error = $ip." cannot delete to Database.";
		include('views/share/security/ip.php');
		die();
	}
}

Shell_Exec ('powershell.exe -executionpolicy bypass -NoProfile -File "E:\scripts/blockip/blockip.ps1" '. $site." ".$ip.' '.$action);
header('location: /share/servers/security/ip');
?>