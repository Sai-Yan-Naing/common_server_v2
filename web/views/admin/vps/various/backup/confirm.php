<?php
 require_once("views/admin/vps/header.php");
// if(!isset($_POST['action'])){ header("location: /admin/share/various/backup?webid=$webid");}
// require_once('models/backup.php');
$date = date('d-m-Y-his');
$backupname = $date.'-'.$webip;
$dirname = "C:/Hyper-V/Backup/$backupname/";
// die($dirname);
$action = $_POST['action'];
// $getvps = $commons->getRow("SELECT * FROM vps_account WHERE ip='$webip'");
// $vm_name = $getvps['instance'];
// if (!$webuser) {
// 	die('error');
// }
// die($_POST['user']);
        $getvpsbackup = $commons->getRow("SELECT * FROM vps_backup WHERE ip='$webip'");
	if(isset($_POST['action']) and $_POST['action']=="delete"){
        // die('delete');
        $act_id=$_POST['act_id'];
        $delete_q = "DELETE FROM vps_backup WHERE id='$act_id'";
        if(!$commons->doThis($delete_q))
        {
            echo $error="Cannot delete vps backup";
            // require_once('views/admin/share/servers/ftp/index.php');
            die();
        }
        // $backup_vmname = $_POST['backup_vmname'];
        echo $dirname = "C:/Hyper-V/Backup/$getvpsbackup[name]/";
        delete_directory($dirname);
    }else if(isset($_POST['action']) and $_POST['action']=="backup"){
        $dirname = "C:/Hyper-V/Backup/$getvpsbackup[name]/";
        delete_directory($dirname);
        if($getvpsbackup['id']!=null){
            $insert_q = "UPDATE vps_backup SET name='$backupname'WHERE ip='$webip'";
            // die('alread exit');
        }else{
            echo  $insert_q = "INSERT INTO vps_backup (ip, name, scheduler) VALUES ('$webip', '$backupname', 0)";
            // die('to instert');
        }
       
        if(!$commons->doThis($insert_q))
        {
            echo $error="cannot create vps backup";
            die();
        }
        $dirname = "C:/Hyper-V/Backup/$backupname/";
        // echo $webvm_name;
        // die('powershell.exe -executionpolicy bypass -NoProfile -File "E:\scripts/manage_vm/vm.ps1" '. $webvm_name." ".$action." ".$dirname);
        Shell_Exec ('powershell.exe -executionpolicy bypass -NoProfile -File "E:\scripts/manage_vm/vm.ps1" '. $webvm_name." ".$action." ".$dirname);
    }else if(isset($_POST['action']) and $_POST['action']=="restore"){
        $act_id=$_POST['act_id'];
        $dirname = "C://Hyper-V//Backup//$getvpsbackup[name]//$webvm_name";
        $temp = "C://Hyper-V//Backup//$getvpsbackup[name]//$webvm_name//Virtual Machines";
        $directories = array();
        $files_list  = array();
        $backupfile = '';
        $files = scandir($temp);
        foreach($files as $file){
           if(($file != '.') && ($file != '..')){
              if(is_dir($temp.'\\'.$file)){
                 $directories[]  = $file;

              }else{
                $ext = pathinfo($file, PATHINFO_EXTENSION);
                if($ext=="vmcx")
                {
                    $backupfile = $file;
                }
              }
           }
        }
        // $insert_q = "UPDATE vps_backup SET active=0 WHERE ip='$webip'";
        // $commons->doThis($insert_q);
        // $ext = pathinfo($files_list, PATHINFO_EXTENSION);
        // die("D:\\$webvm_name.vhdx");
        unlink("D:\\$webvm_name.vhdx");
        // die();
        // $dirname = "C:/Hyper-V/Backup/12-08-2021-010001-127.0.0.11/202189wind2019/Virtual Machines/41EE1485-F007-4668-81DD-D0F3AD95A830.vmcx";
        // print_r($dirname."\\".$backupfile);
        // $dirname
        // die('powershell.exe -executionpolicy bypass -NoProfile -File "E:\scripts/manage_vm/vm.ps1" '. $webvm_name." ".$action." ".$dirname." ".$backupfile);
        $getvps = $commons->getRow("SELECT * FROM vps_account WHERE ip='$webip'");
        $active = $getvps['active'];
        // die($active);
        echo Shell_Exec ('powershell.exe -executionpolicy bypass -NoProfile -File "E:\scripts/manage_vm/vm.ps1" '. $webvm_name." ".$action." ".$dirname." ".$backupfile." ".$active);
        // die('restore');
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