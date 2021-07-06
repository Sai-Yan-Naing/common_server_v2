<?php
include('views/admin/share/header.php');
if(!isset($_POST['action']) || !isset($_POST['ftp_user'])){ header("location: /admin/share/servers/ftp?webid=$webid");}
require_once('models/ftp.php');

$addFtp = new Ftp;
$action = $_POST['action'];
// die($action);
if(isset($_POST['action']) and $_POST['action']=='new')
{
	$ftp_user=$_POST['ftp_user'];
	$permission=$_POST['permission'];
	$ftp_pass=$_POST['ftp_pass'];
	if(!$addFtp->addFtp($domain,$ftp_user,$ftp_pass,$permission))
	{
		$error="Something error";
		require_once('views/admin/share/servers/ftp/index.php');
		die();
	}
}else if(isset($_POST['action']) and $_POST['action']=='edit') {
	 $ftp_user=$_POST['ftp_user'];
	 $ftp_pass=$_POST['ftp_pass'];
	 $act_id=$_POST['act_id'];
	 $permission=$_POST['permission'];
	 if(!$addFtp->changePassword($domain,$ftp_user,$ftp_pass,$act_id,$permission))
	 {
	 	$error="Something error";
		require_once('views/admin/share/servers/ftp/index.php');
		die();
	 }
}else{
	$act_id=$_POST['act_id'];
	$ftp_user=$_POST['ftp_user'];
	if(!$addFtp->deleteFtp($domain,$ftp_user,$act_id))
	{
		$error="Something error";
		require_once('views/admin/share/servers/ftp/index.php');
		die();
	}
}

header("location: /admin/share/servers/ftp?webid=$webid");

?>