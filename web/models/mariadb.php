<?php
class MariaDB{
	function addList($db, $db_user, $db_pass, $domain){

		try {
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			$stmt = $pdo_account->prepare("SELECT COUNT(id) as cnt FROM db_account_for_mariadb WHERE `db_name` = :db OR `db_user` = :db_user");
			$stmt->bindParam(":db", $db, PDO::PARAM_STR);
			$stmt->bindParam(":db_user", $db_user, PDO::PARAM_STR);
			if(!$stmt->execute())
			{
				return false;
			}
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
			if ($data['cnt'] > 0) {
				$pdo_account = NULL;
				return false;
			}


		} catch (PDOException $e) {
			$pdo_account = NULL;
			return false;
			die();
		}
		$stmt = $pdo_account->prepare("INSERT INTO db_account_for_mariadb (`domain`, `db_name`, `db_user`, `db_count`, `db_pass`) VALUES (:domain, :db, :db_user, 1, :db_pass)") or die("insert error <br />". print_r($pdo_account->errorInfo(), true));
		$stmt->bindParam(":domain", $domain, PDO::PARAM_STR);
		$stmt->bindParam(":db", $db, PDO::PARAM_STR);
		$stmt->bindParam(":db_user", $db_user, PDO::PARAM_STR);
		$stmt->bindParam(":db_pass", $db_pass, PDO::PARAM_STR);
		if(!$stmt->execute())
		{
			return false;
		}
		$pdo_account = NULL;
		return true;
	}

	function addUserAndDB($db, $db_user, $db_pass){
		try {
			// $dsn2 = 'mysql:host=localhost:3307';
			$pdo = new PDO(MADSN, MAROOT, MAROOT_PASS);
			$db = trim($pdo->quote($db), "'\"");
			$stmt = $pdo->prepare("CREATE DATABASE `$db`;");
			if(!$stmt->execute())
			{
				return false;
			}
			$stmt = $pdo->prepare("CREATE USER :db_user@'%' IDENTIFIED BY :db_pass;");
			$stmt->bindParam(":db_user", $db_user, PDO::PARAM_STR);
			$stmt->bindParam(":db_pass", $db_pass, PDO::PARAM_STR);
			if(!$stmt->execute())
			{
				$stmt = $pdo->prepare("DROP DATABASE `$db`;");
				$stmt->execute();
				return false;
			}
			$stmt = $pdo->prepare("GRANT ALL ON `$db`.* TO :db_user@'%';");
			$stmt->bindParam(":db_user", $db_user, PDO::PARAM_STR);
			if(!$stmt->execute())
			{
				return false;
			}
		} catch (PDOException $e) {
			$pdo_account = NULL;
			return false;
		}
		$pdo = NULL;
		return true;
	}

		function changePassword($dbuser,$dbpass){
			// $dsn2 = 'mysql:host=localhost:3307';
			$mapdo = new PDO(MADSN, MAROOT, MAROOT_PASS);
			$stmt = $mapdo->prepare("ALTER USER '$dbuser'@'%' IDENTIFIED BY '$dbpass';");
			if(!$stmt->execute())
			{
				return false;
			}
			$mapdo = NULL;

			try {
			  $conn = new PDO(DSN, ROOT, ROOT_PASS);
				  // set the PDO error mode to exception
				  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				  $sql = "UPDATE db_account_for_mariadb SET db_pass='$dbpass' WHERE db_user='$dbuser'";

				  // Prepare statement
				  $stmt = $conn->prepare($sql);

				  // execute the query
				  if(!$stmt->execute())
				  {
				  	return false;
				  }
				} catch(PDOException $e) {
				  return false;
				}

				$conn = null;
			return true;
	}

	function deleteDB($dbid,$dbuser,$db){
		// return $dbid.$dbuser.$db;
			// $dsn2 = 'mysql:host=localhost:3307';
			$mapdo = new PDO(MADSN, MAROOT, MAROOT_PASS);
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			$stmt = $mapdo->prepare("DROP USER '$dbuser'@'%'");
			if(!$stmt->execute())
			{
				return false;
			}
			$stmt1 = $mapdo->prepare("DROP DATABASE $db");
			if(!$stmt1->execute())
			{
				return false;
			}
			$dstmt = $pdo_account->prepare("DELETE FROM `db_account_for_mariadb` WHERE id = ?");
			// $ddata = $dstmt->fetchAll(PDO::FETCH_ASSOC);
			if(!$dstmt->execute(array($dbid)))
			{
				return false;
			}
			return true;
	}

	function getAll($domain)
	{
		try {
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);

			$stmt = $pdo_account->prepare("SELECT * FROM db_account_for_mariadb WHERE `domain` = ?");
			$stmt->execute(array($domain));
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $data;


		} catch (PDOException $e) {
			print('Error ' . $e->getMessage());
			$error_message = "データベースへの接続エラーです。";
			require("views/allerror.php");
			$pdo_account = NULL;
			die();
		}
	}

	function getDB($id)
	{
		$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			// 
		$stmt1 = $pdo_account->prepare("SELECT * FROM db_account_for_mariadb WHERE `id` = ?");
		$stmt1->execute(array($id));
		$data1 = $stmt1->fetch(PDO::FETCH_ASSOC);
		$pdo_account = NULL;
		return $data1;
	}

	function domain_check($domain){
		try {
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			$stmt = $pdo_account->prepare("SELECT * FROM db_account WHERE `domain` = :domain;");
			$stmt->bindParam(":domain", $domain, PDO::PARAM_STR);
			$stmt->execute();
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
			if ($data['domain'] != "") {
				return $data;
			}

		} catch (PDOException $e) {
			//print('Error ' . $e->getMessage());
			$pdo_account = NULL;
			return false;
		}
		$pdo_account = NULL;
		return false;
	}


	function importWP($sql,$db_name,$db_username,$pass){
		try {
			$pdo_account = new PDO('mysql:host=localhost;dbname='.$db_name, $db_username, $pass);
			// echo $pdo_account->exec($sql);
			if($pdo_account->exec($sql)==0){
				return true;
			}else{
				return false;
			}


		} catch (PDOException $e) {
			//print('Error ' . $e->getMessage());
			$pdo_account = NULL;
			return false;
		}
		$pdo_account = NULL;
		return false;
	}


}
