<?php
$domain = $_COOKIE['domain'];
if(!isset($domain)){ header('location: /login');}
if(!isset($_POST['type']) || !isset($_POST['ftp_user'])){ header('location: /share/servers/ftp');}
require_once('config/all.php');
require_once('models/ftp.php');

$addFtp = new Ftp;

if(isset($_POST['type']) and $_POST['type']=='add_new')
{
	$ftp_user=$_POST['ftp_user'];
	$permission=$_POST['permission'];
	$ftp_pass=$_POST['ftp_pass'];
	if(!$addFtp->addFtp($domain,$ftp_user,$ftp_pass,$permission))
	{
		$error="Something error";
		require_once('views/share/ftp/index.php');
		die();
	}
}else if(isset($_POST['type']) and $_POST['type']=='edit') {
	 $ftp_user=$_POST['ftp_user'];
	 $ftp_pass=$_POST['ftp_pass'];
	 $id=$_POST['id'];
	 $permission=$_POST['permission'];
	 if(!$addFtp->changePassword($domain,$ftp_user,$ftp_pass,$id,$permission))
	 {
	 	$error="Something error";
		require_once('views/share/ftp/index.php');
		die();
	 }
}else{
	$id=$_POST['id'];
	$ftp_user=$_POST['ftp_user'];
	if(!$addFtp->deleteFtp($domain,$ftp_user,$id))
	{
		$error="Something error";
		require_once('views/share/ftp/index.php');
		die();
	}
}

header("location: /share/servers/ftp");

?>