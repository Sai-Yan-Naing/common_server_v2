<?php

class Common{
	function __construct() {
		require_once("config/all.php");
	}
		function getWebaccount($domain){
				$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
				// 
				$stmt1 = $pdo_account->prepare("SELECT user FROM web_account WHERE `domain` = ?");
				$stmt1->execute(array($domain));
				$data1 = $stmt1->fetch(PDO::FETCH_ASSOC);
				return $data1;
		}

		function alreadyExist($table,$column,$checker){
			// return $table.$column.$checker;
			try {
				$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
				// 
				$stmt1 = $pdo_account->prepare("SELECT $column FROM $table WHERE `$column` = ?");
				$stmt1->execute(array($checker));
				$data1 = $stmt1->fetch(PDO::FETCH_ASSOC);
				if ($data1[$column]) {
					return $checker." is not available.";
				}else
				{
					return "ok";
				}
			} catch (Exception $e) {
				return "error";
			}
				
		}

	}

?>