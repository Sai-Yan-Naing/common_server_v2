<?php
 require_once("views/admin/vps/header.php");
 $cmd = "firewall";
$host_ip = $webvmhost_ip;
$host_user = $webvmhost_user;
$host_password = $webvmhost_password;
$vm_name = $webvm_name;
$vm_user = JAPANSYS;
$vm_pass = JAPANSYS_PASS;
$vm_action = $_GET['action'];
// $vm_change_action  = WINSERVERROOT;
 if($vm_action=="change_rdp"){
    $vm_fw = $webrdp;
    $insert_q = "UPDATE vps_account SET rdp='exist' WHERE ip='$webip'";
    $vm_change_action = $_POST['port'];
 }else if($vm_action=="change_rdip"){
    $vm_fw = $webrdp;
    $insert_q = "UPDATE vps_account SET rdp='exist' WHERE ip='$webip'";
    $vm_change_action = $_POST['ip'];
}else if($vm_action=="default_rdp"){
    $vm_fw = $webrdp;
    $insert_q = "UPDATE vps_account SET rdp='exist' WHERE ip='$webip'";
    $vm_change_action = 3389;
}else if($vm_action=="change_httprdp"){
    $vm_fw = $webhttp_rdp;
    $insert_q = "UPDATE vps_account SET http_rdp='exist' WHERE ip='$webip'";
    $vm_change_action = $_POST['port'];
}else if($vm_action=="change_httprdip"){
    $vm_fw = $webhttp_rdp;
    $insert_q = "UPDATE vps_account SET http_rdp='exist' WHERE ip='$webip'";
    $vm_change_action = $_POST['ip'];
}else if($vm_action=="default_httprdp"){
    $vm_fw = $webhttp_rdp;
    $insert_q = "UPDATE vps_account SET http_rdp='exist' WHERE ip='$webip'";
    $vm_change_action = 80;
}

if(!$commons->doThis($insert_q))
        {
            echo $error="cannot update vps";
            die();
        }
echo shell_exec('powershell.exe -executionpolicy bypass -NoProfile -File "E:\scripts\firewall\change_fw.ps1" '.$cmd.' '.$host_ip.' '.$host_user.' '.$host_password.' '.$vm_name.' '.$vm_user.' '.$vm_pass.' '.$vm_action.' '.$vm_change_action.' '.$vm_fw);
//  die('ok');
header("location: /admin/vps/panel?server=vps&setting=various&tab=firewall&webid=$webid");

?>