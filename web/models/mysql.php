<?php
class MySQL{

	function addUserAndDB($db, $db_user, $db_pass){
		try {

			$dsn2 = 'mysql:host=localhost:3306';
			$pdo = new PDO($dsn2, ROOT, ROOT_PASS);
			$db = trim($pdo->quote($db), "'\"");
			$stmt = $pdo->prepare("USE $db");
			if($stmt->execute())
			{
				die("db already exist");
			}
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
			$stmt->execute();
		} catch (PDOException $e) {
			//print('Error ' . $e->getMessage());
			$error_message = "データベースへの接続エラーです。";
			$pdo_account = NULL;
			die();
		}
		$pdo = NULL;
		return true;
	}

		function changePassword($db_user,$db_pass){
			$pdo = new PDO(DSN, ROOT, ROOT_PASS);
			$stmt = $pdo->prepare("ALTER USER '$db_user'@'%' IDENTIFIED BY '$db_pass';");
			if(!$stmt->execute())
				return false;
			$stmt1 = $pdo->prepare("UPDATE db_account SET `db_pass` = ? WHERE `db_user` = ?");
			if(!$stmt1->execute(array($db_pass,$db_user)))
				return false;
				return true;
	}

	function deleteDB($dbid,$dbuser,$db){
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			$stmt = $pdo_account->prepare("DROP USER '$dbuser'@'%'");
			if(!$stmt->execute())
				return false;
			$stmt1 = $pdo_account->prepare("DROP DATABASE $db");
			if(!$stmt1->execute())
				return false;
			$dstmt = $pdo_account->prepare("DELETE FROM `db_account` WHERE id = ?");
			if(!$dstmt->execute(array($dbid)))
				return false;
				return true;
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
