<?php
if(!isset($_POST['db_user']) || !isset($_POST['type'])){header('location: /share/servers/database');}
// die('errir');
require_once("config/all.php");
require_once('models/mysql.php');
require_once('models/mariadb.php');
require_once('models/mssql.php');
$domain = $_COOKIE['domain'];
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
			require_once("views/share/database/index.php");
			die("");
		}

		if(!$mysql->addList($db_name, $db_user, $db_pass, $domain)){
			$error = "Something errors";
				require_once("views/share/database/index.php");
				die("");
			}
		
	}elseif ($action=="edit") {
		if(!$mysql->changePassword($db_user,$db_pass))
		{
			$error = "Something errors";
				require_once("views/share/database/index.php");
				die("");
		}
	}else{
		$id=$_POST['id'];
		$db_name = $_POST['db_name'];
		if(!$mysql->deleteDB($id,$db_user,$db_name))
		{
			$error = "Something errors";
				require_once("views/share/database/index.php");
				die("");
		}
	}
	header("Location: /share/servers/database");

}elseif ($type=="MSSQL") {
	$mssql = new MsSQL;
	if($action=="new")
	{
		$db_name = $_POST["db_name"];
		if (!$mssql->addList("2016", $db_name, $db_user, $db_pass,$domain)) {
			$error = "Something errors";
			require_once("views/share/database/mssql.php");
			die("");
		}
		if(!$mssql->addUserAndDB("2016",$db_name, $db_user, $db_pass))
		{
			$error = "Something errors";
			require_once("views/share/database/mssql.php");
			die("");

		}
	}elseif ($action=="edit") {
		if(!$mssql->changePassword($db_user,$db_pass))
		{
			$error = "Something errors";
			require_once("views/share/database/mssql.php");
			die("");
		}
	}else{
		$id=$_POST['id'];
		$db_name = $_POST['db_name'];
		if(!$mssql->deleteDB($id,$db_user,$db_name))
		{
			$error = "Something errors";
			require_once("views/share/database/mssql.php");
			die("");
		}
	}
	
	header("Location: /share/servers/database/mssql");
}else{
	$mariadb = new MariaDB;
	if($action=="new")
	{
		
		$db_name = $_POST["db_name"];
		if(!$mariadb->addList($db_name, $db_user, $db_pass, $domain)){
			$error = "Something errors";
			require_once("views/share/database/mariadb.php");
			die("mariadb error");
		}

		if(!$mariadb->addUserAndDB($db_name, $db_user, $db_pass))
		{
			$error = "Something errors";
			require_once("views/share/database/mariadb.php");
			die("mariadb error");
		}
	}elseif ($action=="edit") {
		if(!$mariadb->changePassword($db_user,$db_pass))
		{
			$error = "Something errors";
			require_once("views/share/database/mariadb.php");
			die("mariadb error");
		}
	}else{
		$id=$_POST['id'];
		$db_name = $_POST['db_name'];
		if(!$mariadb->deleteDB($id,$db_user,$db_name))
		{
			$error = "Something errors";
			require_once("views/share/database/mariadb.php");
			die("mariadb error");
		}
	}
	
	header("Location: /share/servers/database/mariadb");
}

	
?>