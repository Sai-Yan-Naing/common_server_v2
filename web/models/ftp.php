<?php
class Ftp{
	function addFtp($domain,$ftp_user,$ftp_pass,$permission){
		// $email=$email.'@'.$domain;
		// $ftp_pass = hash_hmac('sha256', $ftp_pass, PASS_KEY);

	try {
		$per = "";
		if (in_array("F", $permission))
		{
			$per = "F";
		}else if(in_array("W", $permission))
		{
			$per = "W";
		}else{
			$per = "R";
		}

		$permission = implode(",",$permission);
		// die($domain.$ftp_user.$ftp_pass.$permission);
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			// 
			$stmt1 = $pdo_account->prepare("SELECT user FROM web_account WHERE `domain` = ?");
			$stmt1->execute(array($domain));
			$data1 = $stmt1->fetch(PDO::FETCH_ASSOC);
			$ftp_folder=$data1['user'];
			// for domain
			$stmt = $pdo_account->prepare("SELECT COUNT(ftp_user) as cnt FROM db_ftp WHERE `ftp_user` = ? and `ftp_pass` = ?");
			$stmt->execute(array($ftp_user, $ftp_pass));
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
			// return $data['cnt'];
				if ($data['cnt'] <= 0) {
					$stmt_create = $pdo_account->prepare("INSERT INTO db_ftp (`ftp_user`, `ftp_pass`, `domain`, `permission`) VALUES (:ftp_user, :ftp_pass, :domain, :permission)") or die("insert error <br />". print_r($pdo_account->errorInfo(), true));
					$stmt_create->bindParam(":ftp_user", $ftp_user, PDO::PARAM_STR);
					$stmt_create->bindParam(":ftp_pass", $ftp_pass, PDO::PARAM_STR);
					$stmt_create->bindParam(":domain", $domain, PDO::PARAM_STR);
					$stmt_create->bindParam(":permission", $permission, PDO::PARAM_STR);
					if($stmt_create->execute()){
					 Shell_Exec ('powershell.exe -executionpolicy bypass -NoProfile -File "E:\scripts/add_ftp.ps1" '. $ftp_user." ".$ftp_pass." ".$ftp_folder." ".$per." new");	
					}else{
						// die('error');
						return false;
					}
					
					$pdo_account = NULL;
					return true;

				}else{
					// die('error');
					return false;
				}

			} catch (PDOException $e) {
			$pdo_account = NULL;
				return false;
		}
	}

	function getWebaccount($domain){
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			// 
			$stmt1 = $pdo_account->prepare("SELECT user FROM web_account WHERE `domain` = ?");
			$stmt1->execute(array($domain));
			$data1 = $stmt1->fetch(PDO::FETCH_ASSOC);
			return $data1;
	}

	function getAll($domain)
	{
		try {
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);

			$stmt = $pdo_account->prepare("SELECT * FROM db_ftp WHERE `domain` = ?");
			$stmt->execute(array($domain));
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $data;


		} catch (PDOException $e) {
			print('Error ' . $e->getMessage());
			$error_message = "データベースへの接続エラーです。";
			// require("views/allerror.php");
			$pdo_account = NULL;
			die();
		}
	}
	function getFtp($id)
	{
		$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			// 
		$stmt1 = $pdo_account->prepare("SELECT * FROM db_ftp WHERE `id` = ?");
		$stmt1->execute(array($id));
		$data1 = $stmt1->fetch(PDO::FETCH_ASSOC);
		$pdo_account = NULL;
		return $data1;
	}

	function changePassword($ftp_user,$ftp_pass,$id,$permission){
			$per = "";
			if (in_array("F", $permission))
			{
				$per = "F";
			}else if(in_array("W", $permission))
			{
				$per = "W";
			}else{
				$per = "R";
			}

			$webacc = $this->getWebaccount($_COOKIE['d']);
			$ftp_folder= $webacc['user'];
			$permission = implode(",",$permission);
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			$stmt = $pdo_account->prepare("UPDATE db_ftp SET `ftp_pass` = ?, `permission`=? WHERE `id` = ?");
			if($stmt->execute(array($ftp_pass,$permission,$id))){
				// die($ftp_user.$ftp_pass.$ftp_folder.$per);
				Shell_Exec ('powershell.exe -executionpolicy bypass -NoProfile -File "E:\scripts/add_ftp.ps1" '. $ftp_user." ".$ftp_pass." ".$ftp_folder." ".$per." edit");	
			}else{
				die("error");
			}
			return true;
	}

	function deleteFtp($ftp_user,$id)
	{
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);

			$webacc = $this->getWebaccount($_COOKIE['d']);
			$ftp_folder= $webacc['user'];

			$dstmt = $pdo_account->prepare("DELETE FROM `db_ftp` WHERE id = ?");
			// $ddata = $dstmt->fetchAll(PDO::FETCH_ASSOC);
			$dstmt->execute(array($id));
			echo Shell_Exec ('powershell.exe -executionpolicy bypass -NoProfile -File "E:\scripts/add_ftp.ps1" '. $ftp_user." "."noneed"." ".$ftp_folder." "."noneed"." delete");
			// die();
			return true;
	}

}