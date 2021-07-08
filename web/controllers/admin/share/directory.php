<?php
include('views/admin/share/header.php');
if(!isset($_POST['action']) || !isset($_POST['ftp_user'])){ header("location: /admin/share/servers/security/directory?webid=$webid"); die();}
require_once('models/sub_ftp.php');
$addFtp = new SubFtp;

if(isset($_POST['action']) and $_POST['action']=='new')
{
	$ftp_user=$_POST['ftp_user'];
	$ftp_pass=$_POST['ftp_pass'];
	$dir_path=$_POST['dir_path'];
	if(!$addFtp->addSubFtp($domain,$ftp_user,$ftp_pass,$dir_path))
	{
		$error=$ftp_user." cannot insert to Database";
		require_once('views/admin/share/servers/security/directory.php');
		die();
	}
	if(!createDir($getWeb['user'].'/web/'.$dir_path))
	{
		$error=$ftp_user." cannot create directory.";
		require_once('views/admin/share/servers/security/directory.php');
		die();
	}
	Shell_Exec ('powershell.exe -executionpolicy bypass -NoProfile -File "E:\scripts/add_ftp.ps1" '. $ftp_user." ".$ftp_pass." ".$user.'/web/'.$dir_path." F"." new");
}else if(isset($_POST['action']) and $_POST['action']=='edit') {
	 $ftp_user=$_POST['ftp_user'];
	 $ftp_pass=$_POST['ftp_pass'];
	 $dir_path=$_POST['dir_path'];
	 $act_id=$_POST['act_id'];
	 if(!$addFtp->changePassword($ftp_pass,$act_id))
	 {
	 	$error=$ftp_user." cannot update password.";
		require_once('views/admin/share/servers/security/directory.php');
		die();
	 }
	 Shell_Exec ('powershell.exe -executionpolicy bypass -NoProfile -File "E:\scripts/add_ftp.ps1" '. $ftp_user." ".$ftp_pass." ".$getWeb['user'].'/web/'.$dir_path." F"." edit");	
}else{
	$act_id=$_POST['act_id'];
	$ftp_user=$_POST['ftp_user'];
	$dir_path=$_POST['dir_path'];
	if(!$addFtp->deleteSubFtp($act_id))
	{
		$error=$ftp_user." cannot delete.";
		require_once('views/admin/share/servers/security/directory.php');
		die();
	}
	Shell_Exec ('powershell.exe -executionpolicy bypass -NoProfile -File "E:\scripts/add_ftp.ps1" '. $ftp_user." "."noneed"." ".$getWeb['user'].'/web/'.$dir_path." "."noneed"." delete");
	$dirname = "E:\webroot\LocalUser/$getWeb[user]/web/$dir_path";
	if(is_dir($dirname)){
          //Directory does not exist, so lets create it.
          // @mkdir($path, 0755, true);
		delete_directory($dirname);
      }
}

header("location: /admin/share/servers/security/directory?webid=$webid");

?>