<?php
class MsSQL{

	function addUserAndDB($version, $db, $db_user, $db_pass){
		$version="2016";
		$dsn = constant("SQLSERVER_" . $version . "_DSN");
		$user = constant("SQLSERVER_" . $version . "_USER");
		$pass = constant("SQLSERVER_" . $version . "_PASS");
	
		try {
			
			$pdo = new PDO(SQLSERVER_2016_DSN, SQLSERVER_2016_USER, SQLSERVER_2016_PASS);
			$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

			$db = trim($pdo->quote($db), "'\"");

			# データベースを作成
			$stmt = $pdo->prepare("CREATE DATABASE [$db];");
			$result = $stmt->execute();
			$stmt->closeCursor();
			if (!$result) { return false; }
			
			# データベースのファイルサイズを10GBに設定
			$stmt = $pdo->prepare("ALTER DATABASE [$db] MODIFY FILE ( NAME = N'$db', MAXSIZE = 10485760KB , FILEGROWTH = 1024KB );");
			$result = $stmt->execute();
			// $error_message = $stmt->errorInfo()[2];
			$stmt->closeCursor();
			if (!$result) {
				# トランザクションでロールバックできないため削除
				$stmt = $pdo->prepare("DROP DATABASE [$db];");
				$stmt->execute();
				return false;
			}
			
			# ユーザを作成
			$stmt = $pdo->prepare("CREATE LOGIN [$db_user] WITH PASSWORD=N'$db_pass', DEFAULT_DATABASE=[$db], CHECK_POLICY=ON, CHECK_EXPIRATION=OFF; DENY VIEW ANY DATABASE TO [$db_user]");
			$result = $stmt->execute();
			// $error_message = $stmt->errorInfo()[2];
			$stmt->closeCursor();
			if (!$result) {
				# トランザクションでロールバックできないため削除
				$stmt = $pdo->prepare("DROP DATABASE [$db];");
				$stmt->execute();
				return false;
			}
			
			# データベースの所有者を設定
			$stmt = $pdo->prepare("ALTER AUTHORIZATION ON DATABASE::[$db] TO [$db_user];");
			$result = $stmt->execute();
			// $error_message = $stmt->errorInfo()[2];
			$stmt->closeCursor();
			if (!$result) {
				# トランザクションでロールバックできないため削除
				$stmt = $pdo->prepare("DROP DATABASE [$db];");
				$stmt->execute();
				$stmt = $pdo->prepare("DROP LOGIN [$db_user];");
				$stmt->execute();
				return false;
			}
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			die("test");
			// require("views/allerror.php");
			if (!is_null($stmt)) { $stmt->closeCursor(); }
			$pdo = NULL;
			return false;
		}
		$pdo = NULL;
		return true;
	}

	function addList($version, $db, $db_user, $db_pass, $domain){
		try {
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			$stmt = $pdo_account->prepare("SELECT COUNT(id) as cnt FROM db_account_for_mssql WHERE `db_name` = ? OR `db_user` = ?");
			$stmt->execute(array($db, $db_user));
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
			$stmt->closeCursor();
			if ($data['cnt'] > 0) { return false; }
		} catch (PDOException $e) {
			$pdo_account = NULL;
			return false;
		}
		// die('hello');
		// $version="2016";
		$host_name = constant("SQLSERVER_" . $version . "_HOST_NAME");
		$host_ip = constant("SQLSERVER_" . $version . "_HOST_IP");

		$stmt = $pdo_account->prepare("INSERT INTO db_account_for_mssql (`domain`, `host_name`, `host_ip`, `db_name`, `db_user`, `db_count`, `db_pass`) VALUES (?, ?, ?, ?, ?, 1, ?)") or die("insert error <br />". print_r($pdo_account->errorInfo(), true));
		$result = $stmt->execute(array($domain, $host_name, $host_ip, $db, $db_user, $db_pass));
		$stmt->closeCursor();
		if(!$result){
			$pdo_account = NULL;
			return false;
		}
		$pdo_account = NULL;
		return true;
	}

	function changePassword($dbuser,$dbpass){
			$pdo = new PDO(SQLSERVER_2016_DSN, SQLSERVER_2016_USER, SQLSERVER_2016_PASS);
			$stmt = $pdo->prepare("ALTER LOGIN $dbuser WITH PASSWORD = '$dbpass';");
			if(!$stmt->execute())
			return false;
			

			try {
			  $conn = new PDO(DSN, ROOT, ROOT_PASS);
				  // set the PDO error mode to exception
				  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				  $sql = "UPDATE db_account_for_mssql SET db_pass='$dbpass' WHERE db_user='$dbuser'";

				  // Prepare statement
				  $stmt = $conn->prepare($sql);

				  // execute the query
				  if(!$stmt->execute())
				  {
				  	return false;
				  }
				} catch(PDOException $e) {
					$conn = null;
				  echo $sql . "<br>" . $e->getMessage();
				  return false;
				}

				$conn = null;
			return true;
	}

	function getAll($domain)
	{
		try {
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);

			$stmt = $pdo_account->prepare("SELECT * FROM db_account_for_mssql WHERE `domain` = ?");
			if(!$stmt->execute(array($domain)))
			return false;
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $data;


		} catch (PDOException $e) {
			return false;
			$pdo_account = NULL;
			die();
		}
	}

	function deleteDB($dbid,$dbuser,$db){
		// return $dbid.$dbuser.$db;
			// $dsn2 = 'mysql:host=localhost:3307';
			$mspdo = new PDO(SQLSERVER_2016_DSN, SQLSERVER_2016_USER, SQLSERVER_2016_PASS);
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			$stmt1 = $mspdo->prepare("DROP DATABASE $db");
			if(!$stmt1->execute()) return false;
			
			$stmt = $mspdo->prepare("DROP LOGIN $dbuser");
			if(!$stmt->execute()) return false;
			
			$dstmt = $pdo_account->prepare("DELETE FROM `db_account_for_mssql` WHERE id = ?");
			// $ddata = $dstmt->fetchAll(PDO::FETCH_ASSOC);
			if(!$dstmt->execute(array($dbid))) return false;
			return true;
	}

	function getDB($id)
	{
		$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			// 
		$stmt1 = $pdo_account->prepare("SELECT * FROM db_account_for_mssql WHERE `id` = ?");
		$stmt1->execute(array($id));
		$data1 = $stmt1->fetch(PDO::FETCH_ASSOC);
		$pdo_account = NULL;
		return $data1;
	}

	function checkDomain($domain){
		try {
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			$stmt = $pdo_account->prepare("SELECT * FROM db_account_for_mssql WHERE `domain` = ?");
			$stmt->execute(array($domain));
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
			if ($data['domain'] != "") {
				return $data;
			}
			$stmt->closeCursor();
		} catch (PDOException $e) {
			$pdo_account = NULL;
			return false;
		}
		$pdo_account = NULL;
		return false;
	}
}
