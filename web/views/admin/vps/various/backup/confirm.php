<?php
 require_once("views/admin/vps/header.php");
// if(!isset($_POST['action'])){ header("location: /admin/share/various/backup?webid=$webid");}
// require_once('models/backup.php');
$date = date('d-m-Y-his');
$backupname = $date.'-'.$webip;
$dirname = "C:/Hyper-V/Backup/$backupname/";

$host_ip = $webvmhost_ip;
$host_user = $webvmhost_user;
$host_password = $webvmhost_password;
$vm_name = $webvm_name;

        $getvpsbackup = $commons->getRow("SELECT * FROM vps_backup WHERE ip='$webip'");
	if(isset($_POST['action']) and $_POST['action']=="delete"){
        // die('delete');
        $action = "delete_dir";
        $act_id=$_POST['act_id'];
        $delete_q = "DELETE FROM vps_backup WHERE id='$act_id'";
        if(!$commons->doThis($delete_q))
        {
            echo $error="Cannot delete vps backup";
            // require_once('views/admin/share/servers/ftp/index.php');
            die();
        }
        // $backup_vmname = $_POST['backup_vmname'];
        echo $del_dir = "C:/Hyper-V/Backup/$getvpsbackup[name]/";
        echo  Shell_Exec('powershell.exe -executionpolicy bypass -NoProfile -File "E:\scripts\vm_manager\hyper-v_init.ps1" '.$action." ".$host_ip." ".$host_user." ".$host_password." ". $vm_name." ". $dirname." ". $del_dir);
    }else if(isset($_POST['action']) and $_POST['action']=="backup"){
        
        $del_dir = "C:/Hyper-V/Backup/$getvpsbackup[name]/";
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
        // Shell_Exec ('powershell.exe -executionpolicy bypass -NoProfile -File "E:\scripts/manage_vm/vm.ps1" '. $webvm_name." ".$action." ".$dirname);
        $action = 'export_vm';
        echo Shell_Exec ('powershell.exe -executionpolicy bypass -NoProfile -File "E:\scripts\vm_manager\hyper-v_init.ps1" '.$action." ".$host_ip." ".$host_user." ".$host_password." ". $vm_name." ". $dirname." ". $del_dir);
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
        // unlink("D:\\$webvm_name.vhdx");
        // die();
        // $dirname = "C:/Hyper-V/Backup/12-08-2021-010001-127.0.0.11/202189wind2019/Virtual Machines/41EE1485-F007-4668-81DD-D0F3AD95A830.vmcx";
        // print_r($dirname."\\".$backupfile);
        // $dirname
        // die('powershell.exe -executionpolicy bypass -NoProfile -File "E:\scripts/manage_vm/vm.ps1" '. $webvm_name." ".$action." ".$dirname." ".$backupfile);
        $getvps = $commons->getRow("SELECT * FROM vps_account WHERE ip='$webip'");
        $active = $getvps['active'];
        // die($active);
        // echo Shell_Exec ('powershell.exe -executionpolicy bypass -NoProfile -File "E:\scripts/manage_vm/vm.ps1" '. $webvm_name." ".$action." ".$dirname." ".$backupfile." ".$active);
        $action = 'restore_backup';
        echo Shell_Exec ('powershell.exe -executionpolicy bypass -NoProfile -File "E:\scripts\vm_manager\hyper-v_init.ps1" '.$action." ".$host_ip." ".$host_user." ".$host_password." ". $vm_name." ". $dirname." ". $del_dir." ".$backupfile);
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