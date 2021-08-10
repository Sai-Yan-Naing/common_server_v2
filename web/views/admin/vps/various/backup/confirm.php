<?php
 require_once("views/admin/vps/header.php");
// if(!isset($_POST['action'])){ header("location: /admin/share/various/backup?webid=$webid");}
// require_once('models/backup.php');
$date = date('d-m-Y-his');
$backupname = $date.'-'.$webip;
$dirname = "G:/vps_backup/$backupname/";
// die($$webvm_name);
$action = $_POST['action'];
// $getvps = $commons->getRow("SELECT * FROM vps_account WHERE ip='$webip'");
// $vm_name = $getvps['instance'];
// if (!$webuser) {
// 	die('error');
// }
// die($_POST['user']);
	if(isset($_POST['action']) and $_POST['action']=="delete"){
    
        $act_id=$_POST['act_id'];
        $delete_q = "DELETE FROM vps_backup WHERE id='$act_id'";
        if(!$commons->doThis($delete_q))
        {
            echo $error="Cannot delete vps backup";
            // require_once('views/admin/share/servers/ftp/index.php');
            die();
        }
        $backup_vmname = $_POST['backup_vmname'];
        echo $dirname = "G:/vps_backup/$backup_vmname";
        delete_directory($dirname);
    }else if(isset($_POST['action']) and $_POST['action']=="backup"){
       echo  $insert_q = "INSERT INTO vps_backup (ip, name, scheduler) VALUES ('$webip', '$backupname', 0)";
        if(!$commons->doThis($insert_q))
        {
            echo $error="cannot create vps backup";
            die();
        }
        // echo $webvm_name;
        // die('powershell.exe -executionpolicy bypass -NoProfile -File "E:\scripts/manage_vm/vm.ps1" '. $webvm_name." ".$action." ".$dirname);
        Shell_Exec ('powershell.exe -executionpolicy bypass -NoProfile -File "E:\scripts/manage_vm/vm.ps1" '. $webvm_name." ".$action." ".$dirname);
    }else if(isset($_POST['action']) and $_POST['action']=="restore"){

    }else if(isset($_POST['action']) and $_POST['action']=="auto_backup")
    {
    	// $onoff = 0;
    	// if(isset($_POST['data']))
    	// {
    	// 	$onoff = 1;
    	// }
    	// $backup = new Backup;

		// $backup->addAutoBackup($webdomain,$webuser,$onoff);
    }
    header("location: /admin/vps/panel?server=vps&setting=various&tab=backup&webid=$webid");

?>