<?php
include('views/admin/share/header.php');
if(!isset($_POST['action'])){ header("location: /admin/share/various/backup?webid=$webid");}
require_once('models/backup.php');
$date = date("Y-m-d");
$dirname = "G:/backup/$webuser/";


if (!$webuser) {
	die('error');
}
// die($_POST['user']);
	if(isset($_POST['action']) and $_POST['action']=="delete"){
    	
        deleteBackup($dirname);
        
    }else if(isset($_POST['action']) and $_POST['action']=="backup"){
    	// die(ROOT_PATH."$webuser");
        $src = ROOT_PATH."$webuser";
        $directory = "G:/backup/$webuser";
        $dst = "$directory/$webuser-$date";
        if(is_dir($directory)){
            deleteBackup($directory);
        }
        copy_paste($src, $dst);
    }else if(isset($_POST['action']) and $_POST['action']=="restore"){
    	
    	$file = showFolder($dirname);
    	$src = "G:/backup/$webuser/$file/";
        $dst = ROOT_PATH."$webuser";
        if(is_dir($dst)){
            deleteBackup($dst);
        }
        copy_paste($src, $dst);
        
    }else if(isset($_POST['action']) and $_POST['action']=="auto_backup")
    {
    	$onoff = 0;
    	if(isset($_POST['data']))
    	{
    		$onoff = 1;
    	}
    	$backup = new Backup;

		$backup->addAutoBackup($webdomain,$webuser,$onoff);
    }
    header("location: /admin/share/various/backup?webid=$webid");

?>