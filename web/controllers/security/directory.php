<?php
$domain = $_COOKIE['domain'];
if(!isset($domain)){ header('location: /login');}
if(!isset($_POST['action']) || !isset($_POST['ftp_user'])){ header('location: /share/servers/security/directory');}
require_once('config/all.php');
require_once('models/sub_ftp.php');
require_once ('models/common.php');
require_once ('common/common.php');

$getweball = new Common;
$getWeb = $getweball->getWebaccount($domain);

$addFtp = new SubFtp;

if(isset($_POST['action']) and $_POST['action']=='new')
{
	$ftp_user=$_POST['ftp_user'];
	$ftp_pass=$_POST['ftp_pass'];
	$dir_path=$_POST['dir_path'];
	if(!$addFtp->addSubFtp($domain,$ftp_user,$ftp_pass,$dir_path))
	{
		$error=$ftp_user." cannot insert to Database";
		require_once('views/share/security/directory.php');
		die();
	}
	if(!createDir($getWeb['user'].'/web/'.$dir_path))
	{
		$error=$ftp_user." cannot create directory.";
		require_once('views/share/security/directory.php');
		die();
	}
	Shell_Exec ('powershell.exe -executionpolicy bypass -NoProfile -File "E:\scripts/add_ftp.ps1" '. $ftp_user." ".$ftp_pass." ".$getWeb['user'].'/web/'.$dir_path." F"." new");
}else if(isset($_POST['action']) and $_POST['action']=='edit') {
	 $ftp_user=$_POST['ftp_user'];
	 $ftp_pass=$_POST['ftp_pass'];
	 $dir_path=$_POST['dir_path'];
	 $id=$_POST['id'];
	 if(!$addFtp->changePassword($ftp_pass,$id))
	 {
	 	$error=$ftp_user." cannot update password.";
		require_once('views/share/security/directory.php');
		die();
	 }
	 Shell_Exec ('powershell.exe -executionpolicy bypass -NoProfile -File "E:\scripts/add_ftp.ps1" '. $ftp_user." ".$ftp_pass." ".$getWeb['user'].'/web/'.$dir_path." F"." edit");	
}else{
	$id=$_POST['id'];
	$ftp_user=$_POST['ftp_user'];
	$dir_path=$_POST['dir_path'];
	if(!$addFtp->deleteSubFtp($id))
	{
		$error=$ftp_user." cannot delete.";
		require_once('views/share/security/directory.php');
		die();
	}
	Shell_Exec ('powershell.exe -executionpolicy bypass -NoProfile -File "E:\scripts/add_ftp.ps1" '. $ftp_user." "."noneed"." ".$getWeb['user'].'/web/'.$dir_path." "."noneed"." delete");
	$dirname = "E:\webroot\LocalUser/$getWeb[user]/web/$dir_path";
	echo delete_directory($dirname);
}

header("location: /share/servers/security/directory");

?>