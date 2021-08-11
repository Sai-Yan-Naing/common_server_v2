<?php
include('views/share/header.php');
if(!isset($_POST['db_user']) || !isset($_POST['type'])){header("location: /share/servers/database?webid=$webid&db=mariadb");}
require_once('models/mariadb.php');
$type = $_POST["type"];
$action = $_POST["action"];

$db_user = $_POST["db_user"];
$db_pass = $_POST["db_pass"];

if($type=="MARIADB"){
	$mariadb = new MARIADB;
	if($action=="new")
	{
		$db_name = $_POST["db_name"];
		
		if(!$mariadb->addUserAndDB($db_name, $db_user, $db_pass))
		{
			$error = "Something errors";
			require_once("views/share/servers/database/mariadb/index.php");
			die("");
		}
        $insert_q = "INSERT INTO db_account_for_mariadb (`domain`, `db_name`, `db_user`, `db_count`, `db_pass`) VALUES ('$webdomain', '$db_name', '$db_user', 1, '$db_pass')";

		if(!$commons->doThis($insert_q)){
			$error = "cannot add db account";
				require_once("views/share/servers/database/mariadb/index.php");
				die("");
			}
	}elseif ($action=="edit") {
		if(!$mariadb->changePassword($db_user,$db_pass))
		{
			$error = "Something errors";
				require_once("views/share/servers/database/mariadb/index.php");
				die("");
		}
	}else{
		$act_id = $_POST['act_id'];
		$db_name = $_POST['db_name'];
		if(!$mariadb->deleteDB($act_id,$db_user,$db_name))
		{
			$error = "Something errors";
				require_once("views/share/servers/database/mariadb/index.php");
				die("");
		}
	}
	header("Location: /share/servers/database?webid=$webid&db=mariadb");
	die("");

}
	
?>