<?php
require_once("config/all.php");
require_once('models/common.php');
require_once('common/common.php');
require_once('models/backup.php');
$domain = $_COOKIE['domain'];
$date = date("Y-m-d");
$getweball = new Common;
$getWeb = $getweball->getWebaccount($domain);
$user = $getWeb['user'];
$dirname = "G:/backup/$user/";



if (!$user) {
	die('error');
}
// die($_POST['user']);
	if(isset($_POST['action']) and $_POST['action']=="delete"){
    	
        deleteBackup($dirname);
        
    }else if(isset($_POST['action']) and $_POST['action']=="backup"){
    	
        $src = "E:/webroot/LocalUser/$user";
        $directory = "G:/backup/$user";
        $dst = "$directory/$user-$date";
        if(is_dir($directory)){
            deleteBackup($directory);
        }
        copy_paste($src, $dst);
    }else if(isset($_POST['action']) and $_POST['action']=="restore"){
    	
    	$file = showFolder($dirname);
    	$src = "G:/backup/$user/$file/";
        $dst = "E:/webroot/LocalUser/$user";
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

		$backup->addAutoBackup($domain,$user,$onoff);
    }
    header('location: /share/various/backup');

?>