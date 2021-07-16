<?php
require_once("config/all.php");
require_once('models/common.php');
$commons = new Common;
$today = date("Y-m-d H:i:s");
if($_POST['action']=='delete')
{
	$act_id = $_GET['act_id'];
	echo $del_query = "UPDATE web_account SET removal='$today' WHERE id='$act_id'";
	if(!$commons->doThis($del_query))
	{
		$error = "Cannot delete site";
		require_once('views/admin/index.php');
		die();
	}
	header('Location: /admin');
	die();
}
$domain = $_POST['domain'];
$web_dir = $_POST['web_dir'];
$ftp_user = $_POST['ftp_user'];
$password = $_POST['password'];
$token = $_POST['token'];
$error = "";

if(!isset($_POST['domain']) || !isset($_POST['ftp_user']))
{
	header('Location: /admin');
}
$query_origin = "SELECT * FROM web_account WHERE `customer_id` = '$_COOKIE[admin]' and `origin`='true'";
$origin= $commons->getRow($query_origin);
$origin_user= $origin['user'];
$plan = 4;
$pass_encrypted = hash_hmac('sha256', $password, PASS_KEY);
$temp["ID1-".time()] = ['type'=>'A','sub'=>'mail','target'=>IP];
$temp["ID2-".time()] = ['type'=>'A','sub'=>'www','target'=>IP];
$temp["ID3-".time()] = ['type'=>'A','sub'=>'','target'=>IP];
$temp["ID4-".time()] = ['type'=>'MX','sub'=>'','target'=>'mail.'.$domain];

$temp1["app"] = ['php'=>DEFAULT_PHP,'dotnet'=>DEFAULT_DOTNET];
$dns = json_encode($temp);
$app_version = json_encode($temp1);

$insert_q = "INSERT INTO web_account (`domain`, `password`, `user`, `plan`, `customer_id`,`dns`,`app_version`,`origin`) VALUES ('$domain', '$pass_encrypted', '$ftp_user', '$plan', '$_COOKIE[admin]', '$dns' , '$app_version', false)";
$insert_ftp = "INSERT INTO db_ftp (`ftp_user`, `ftp_pass`, `domain`, `permission`) VALUES ('$ftp_user', '$password', '$domain', 'F,R,W')";
$insert_waf = "INSERT INTO waf (`domain`, `usage`, `display`) VALUES ('$domain', 0, 0)";
if(!$commons->doThis($insert_q) || !$commons->doThis($insert_ftp) || !$commons->doThis($insert_waf))
{
	$error = "Cannot add site";
	require_once('views/admin/index.php');
	die();
}else{
	$ip=IP;
	echo system('powershell.exe -executionpolicy bypass -NoProfile -File "E:\scripts/addsite.ps1" '.$domain.' '.$ftp_user.' '.$password.' '.$ip. ' '.$origin_user);
	header('Location: /admin');
}


?>