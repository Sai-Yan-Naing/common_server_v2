<?php 
include('views/admin/share/header.php');
if(!isset($_POST['block_ip'])){header("location: /admin/share/servers/security/ip?webid=$webid");}
$site = $webuser;
$ip = $_POST['block_ip'];
$action = $_POST['action'];
$temp = json_decode($webblacklist,true);
if($action=='new')
{
	if(isExistBlackListIp($site,$ip))
	{
		$error = $ip." is already exist.";
		include('views/admin/share/servers/security/ip.php');
		die();
	}
	$temp["BID-".time()] = ['ip'=>$ip,'mask'=>'255.255.255.255','status'=>'BLOCKED'];
	$result = json_encode($temp);
	// print_r($result);
	// die();
	$qry = "UPDATE web_account SET `blacklist` = '$result' WHERE `id` = $webid[id]";
	if(!$commons->doThis($qry))
	{
		$error = $ip." cannot insert to Database.";
		include('views/admin/share/servers/security/ip.php');
	  die();
	}
}else{
	$act_id = $_POST['act_id'];
	unset($temp[$act_id]);
	$result = json_encode($temp);
	// print_r($result);
	// die();
	$qry = "UPDATE web_account SET `blacklist` = '$result' WHERE `id` = $webid[id]";
	if(!$commons->doThis($qry))
	{
		$error = $ip." cannot delete to Database.";
		include('views/admin/share/servers/security/ip.php');
	  die();
	}
}

Shell_Exec ('powershell.exe -executionpolicy bypass -NoProfile -File "E:\scripts/blockip/blockip.ps1" '. $site." ".$ip.' '.$action);
header("location: /admin/share/servers/security/ip?webid=$webid");
?>