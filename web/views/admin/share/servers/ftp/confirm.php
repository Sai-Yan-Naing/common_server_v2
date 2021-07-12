<?php
include('views/admin/share/header.php');
if(!isset($_POST['action']) || !isset($_POST['ftp_user'])){ header("location: /admin/share/servers/ftp?webid=$webid");}
	$permission=$_POST['permission'];
    $action = $_POST['action'];
    // die($action);
    $per = "";
    if (in_array("F", $permission))
    {
        $per = "F";
    }else if(in_array("W", $permission))
    {
        $per = "W";
    }else{
        $per = "R";
    }

if($action=='new')
{
    
	$ftp_user=$_POST['ftp_user'];
	
	$ftp_pass=$_POST['ftp_pass'];
    $permission = implode(",",$permission);
    $insert_q = "INSERT INTO db_ftp (ftp_user, ftp_pass, domain, permission) VALUES ('$ftp_user', '$ftp_pass', '$webdomain', '$permission')";
	if(!$commons->doThis($insert_q))
	{
		$error="cannot add ftp user";
		require_once('views/admin/share/servers/ftp/index.php');
		die();
	}
}else if($action=='edit') {
	 $ftp_user=$_POST['ftp_user'];
	 $ftp_pass=$_POST['ftp_pass'];
	 $act_id=$_POST['act_id'];
	 
	 $permission = implode(",",$permission);
     $update_q = "UPDATE db_ftp SET ftp_pass='$ftp_pass', permission='$permission' WHERE id='$act_id' and domain='$webdomain'";
	 if(!$commons->doThis($update_q))
	 {
	 	$error="cannot update ftp";
		require_once('views/admin/share/servers/ftp/index.php');
		die();
	 }
}else{
	$act_id=$_POST['act_id'];
	$ftp_user=$_POST['ftp_user'];
	$ftp_pass = "noneed";
	$per = "noneed";
    $delete_q = "DELETE FROM db_ftp WHERE id='$act_id'";
	if(!$commons->doThis($delete_q))
	{
		$error="Cannot delete FTP";
		require_once('views/admin/share/servers/ftp/index.php');
		die();
	}
}
Shell_Exec ('powershell.exe -executionpolicy bypass -NoProfile -File "E:\scripts/add_ftp.ps1" '. $ftp_user." ".$ftp_pass." ".$webuser." ".$per." ".$action);
header("location: /admin/share/servers/ftp?webid=$webid");

?>