<?php 
include('views/admin/share/header.php');
if(!isset($_POST['block_ip'])){header("location: /admin/share/servers/security/ip?webid=$webid");}
require_once ('models/ip.php');
$blacklist = new BlackList;
$site = $user;
$ip = $_POST['block_ip'];
$action = $_POST['action'];
if($action=='new')
{
	if(isExistBlackListIp($site,$ip))
	{
		$error = $ip." is already exist.";
		include('views/admin/share/servers/security/ip.php');
		die();
	}
	if(!$blacklist->addToBlacklist($domain,$ip))
	{
		$error = $ip." cannot insert to Database.";
		include('views/admin/share/servers/security/ip.php');
		die();
	}
}else{
	if(!$blacklist->deleteIp($_POST['act_id']))
	{
		$error = $ip." cannot delete to Database.";
		include('views/admin/share/servers/security/ip.php');
		die();
	}
}

Shell_Exec ('powershell.exe -executionpolicy bypass -NoProfile -File "E:\scripts/blockip/blockip.ps1" '. $site." ".$ip.' '.$action);
header("location: /admin/share/servers/security/ip?webid=$webid");
?>