<?php
 require_once('config/all.php');
 require_once('models/common.php');
 require_once('common/common.php');
if(!isset($_POST['confirm']) || $_POST['confirm'] !='post'){ header("location: /admin/vps");}
$commons = new Common;
$act_id=$_POST["act_id"];
$action = $_POST['action'];
$getvps = $commons->getRow("SELECT * FROM vps_account WHERE id='$act_id'");
$vm_name = $getvps['instance'];
$today = date("Y-m-d H:i:s");
if($action=='delete')
{
	$update_q = "UPDATE vps_account SET removal='$today' WHERE id='$act_id'";
	if(!$commons->doThis($update_q))
	{
	$error="cannot update delete";
	require_once('views/admin/vps.php');
	die();
	}
}else{
$onoff=$_POST["onoff"];
// die('hello');
$status =0;
$action = 'turnoff';
if(isset($onoff))
{
	$status=1;
	$action = 'turnon';
}

$update_q = "UPDATE vps_account SET active='$status' WHERE id='$act_id'";
if(!$commons->doThis($update_q))
{
$error="cannot update vps";
require_once('views/admin/vps.php');
die();
}
}
// echo $action;
// die();
Shell_Exec ('powershell.exe -executionpolicy bypass -NoProfile -File "E:\scripts/manage_vm/vm.ps1" '. $vm_name." ".$action);
header("location: /admin/vps");

?>