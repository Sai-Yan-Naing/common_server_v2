<?php
include('views/share/header.php');
if(!isset($_POST['db_user']) || !isset($_POST['type'])){header("location: /share/servers/database?webid=$webid&db=mssql");}
require_once('models/mssql.php');
$type = $_POST["type"];
$action = $_POST["action"];

$db_user = $_POST["db_user"];
$db_pass = $_POST["db_pass"];

if($type=="MSSQL"){
	$mssql = new MSSQL;
	if($action=="new")
	{
		$db_name = $_POST["db_name"];
		
		if(!$mssql->addUserAndDB("2016",$db_name, $db_user, $db_pass))
		{
			$error = "Something errors";
			require_once("views/share/servers/database/mssql/index.php");
			die("");
		}
		$hostname = SQLSERVER_2016_HOST_NAME;
		$hostip = SQLSERVER_2016_HOST_IP;
        $insert_q = "INSERT INTO db_account_for_mssql(`domain`, `host_name`, `host_ip`, `db_name`, `db_user`, `db_count`, `db_pass`) VALUES ('$webdomain', '$hostname', '$hostip', '$db_name', '$db_user', 1, '$db_pass')";

		if(!$commons->doThis($insert_q)){
			$error = "cannot add db account";
				require_once("views/share/servers/database/mssql/index.php");
				die("");
			}
	}elseif ($action=="edit") {
		if(!$mssql->changePassword($db_user,$db_pass))
		{
			$error = "Something errors";
				require_once("views/share/servers/database/mssql/index.php");
				die("");
		}
	}else{
		$act_id = $_POST['act_id'];
		$db_name = $_POST['db_name'];
		if(!$mssql->deleteDB($act_id,$db_user,$db_name))
		{
			$error = "Something errors";
				require_once("views/share/servers/database/mssql/index.php");
				die("");
		}
	}
	header("Location: /share/servers/database?webid=$webid&db=mssql");
	die("");

}
	
?>