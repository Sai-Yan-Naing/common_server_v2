<?php
include('views/admin/share/header.php');
if(!isset($_POST['db_user']) || !isset($_POST['type'])){header("location: /admin/share/servers/database?webid=$webid&db=mysql");}
require_once('models/mysql.php');
$type = $_POST["type"];
$action = $_POST["action"];

$db_user = $_POST["db_user"];
$db_pass = $_POST["db_pass"];

if($type=="MYSQL"){
	$mysql = new MySQL;
	if($action=="new")
	{
		$db_name = $_POST["db_name"];
		
		if(!$mysql->addUserAndDB($db_name, $db_user, $db_pass))
		{
			$error = "Something errors";
			require_once("views/admin/share/servers/database/mysql/index.php");
			die("");
		}
        $insert_q = "INSERT INTO db_account (`domain`, `db_name`, `db_user`, `db_count`, `db_pass`) VALUES ('$webdomain', '$db_name', '$db_user', 1, '$db_pass')";

		if(!$commons->doThis($insert_q)){
			$error = "cannot add db account";
				require_once("views/admin/share/servers/database/mysql/index.php");
				die("");
			}
		
	}elseif ($action=="edit") {
		if(!$mysql->changePassword($db_user,$db_pass))
		{
			$error = "Something errors";
				require_once("views/admin/share/servers/database/mysql/index.php");
				die("");
		}
	}else{
		$act_id = $_POST['act_id'];
		$db_name = $_POST['db_name'];
		if(!$mysql->deleteDB($act_id,$db_user,$db_name))
		{
			$error = "Something errors";
				require_once("views/admin/share/servers/database/mysql/index.php");
				die("");
		}
	}
	header("Location: /admin/share/servers/database?webid=$webid&db=mysql");
	die("");

}
	
?>