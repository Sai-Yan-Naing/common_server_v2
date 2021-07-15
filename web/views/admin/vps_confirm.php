<?php
 require_once('config/all.php');
 require_once('models/common.php');
 require_once('common/common.php');
if(!isset($_POST['confirm']) || $_POST['confirm'] !='post'){ header("location: /admin/vps");}
$commons = new Common;
$onoff=$_POST["onoff"];
$act_id=$_POST["act_id"];
// die('hello');
$status =0;
if(isset($onoff))
{
	$status=1;
}

$update_q = "UPDATE vps_account SET active='$status' WHERE id='$act_id'";
if(!$commons->doThis($update_q))
{
$error="cannot update vps";
require_once('views/admin/vps.php');
die();
}

header("location: /admin/vps");

?>