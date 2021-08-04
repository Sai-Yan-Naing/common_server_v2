<?php
include('views/admin/share/header.php');
if(!isset($_POST['action']) || !isset($_POST['ftp_user'])){ header("location: /admin/share/servers/security/directory?webid=$webid"); die();}

if(isset($_POST['action']) and $_POST['action']=='new')
{
	$ftp_user=$_POST['ftp_user'];
	$ftp_pass=$_POST['ftp_pass'];
	$dir_path=$_POST['dir_path'];
    $insert_q = "INSERT INTO sub_ftp (domain, ftp_user, ftp_pass, path) VALUES ('$webdomain', '$ftp_user', '$ftp_pass', '$dir_path')";
	if(!$commons->doThis($insert_q))
	{
		$error=$ftp_user." cannot insert to Database";
		require_once('views/admin/share/servers/security/directory.php');
		die();
	}
	if(!createDir($webrootuser.'/'.$webuser.'/web/'.$dir_path))
	{
		$error=$ftp_user." cannot create directory.";
		require_once('views/admin/share/servers/security/directory.php');
		die();
	}
	Shell_Exec ('powershell.exe -executionpolicy bypass -NoProfile -File "E:\scripts/add_ftp.ps1" '. $ftp_user." ".$ftp_pass." ".$webuser.'/web/'.$dir_path." F"." new");
}else if(isset($_POST['action']) and $_POST['action']=='edit') {
	 $ftp_user=$_POST['ftp_user'];
	 $ftp_pass=$_POST['ftp_pass'];
	 $dir_path=$_POST['dir_path'];
	 $act_id=$_POST['act_id'];
     $update_q = "UPDATE sub_ftp SET ftp_pass='$ftp_pass' WHERE id='$act_id' and domain='$webdomain'";
	 if(!$commons->doThis($update_q))
	 {
	 	$error=$ftp_user." cannot update password.";
		require_once('views/admin/share/servers/security/directory.php');
		die();
	 }
	 Shell_Exec ('powershell.exe -executionpolicy bypass -NoProfile -File "E:\scripts/add_ftp.ps1" '. $ftp_user." ".$ftp_pass." ".$webuser.'/web/'.$dir_path." F"." edit");	
}else{
	$act_id=$_POST['act_id'];
	$ftp_user=$_POST['ftp_user'];
	$dir_path=$_POST['dir_path'];
    $delete_q = "DELETE FROM sub_ftp WHERE id='$act_id'";
	if(!$commons->doThis($delete_q))
	{
		$error=$ftp_user." cannot delete.";
		require_once('views/admin/share/servers/security/directory.php');
		die();
	}
	Shell_Exec ('powershell.exe -executionpolicy bypass -NoProfile -File "E:\scripts/add_ftp.ps1" '. $ftp_user." "."noneed"." ".$webuser.'/web/'.$dir_path." "."noneed"." delete");
	$dirname = "E:\webroot\LocalUser/$webrootuser/$webuser/web/$dir_path";
	if(is_dir($dirname)){
          //Directory does not exist, so lets create it.
          // @mkdir($path, 0755, true);
		delete_directory($dirname);
      }
}

header("location: /admin/share/servers/security/directory?webid=$webid");

?>