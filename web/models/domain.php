<?php 
require_once('common.php');
class Domain
{
	public $pdo;
	function __construct()
	{
		$this->pdo = new PDO(DSN, ROOT, ROOT_PASS);
	}

	function addDomain($domain, $web_dir, $ftp_user, $password, $token, $admin)
	{
		try{
			$common = new Common;
			if(strpos($common->alreadyExist("web_account",'domain',$domain), "not available"))
			{
				 return false;
			}
			if(strpos($common->alreadyExist("db_ftp",'ftp_user',$ftp_user), "not available"))
			{
				return false;
			}
			// die('no error');
			$plan = 4;
			$pass_encrypted = hash_hmac('sha256', $password, PASS_KEY);
			$stmt = $this->pdo->prepare("INSERT INTO web_account (`domain`, `password`, `user`, `plan`, `customer_id`) VALUES (?, ?, ?, ?, ?)");
			
			if(!$stmt->execute(array($domain, $pass_encrypted, $ftp_user, $plan, $admin)))
			{
				return false;
			}

			$stmt1 = $this->pdo->prepare("INSERT INTO db_ftp (`ftp_user`, `ftp_pass`, `domain`, `permission`) VALUES (?, ?, ?, ?)");
			if(!$stmt1->execute(array($ftp_user, $password, $domain, "F,R,W")))
			{
				// die('error');
				return false;
			}

			$stmt1 = $this->pdo->prepare("INSERT INTO waf (`domain`, `usage`, `display`) VALUES (?, ?, ?)");
			if(!$stmt1->execute(array($domain, 0, 0)))
			{
				return false;
			}

			$this->pdo = NULL;

			$ip=IP;
			echo system('powershell.exe -executionpolicy bypass -NoProfile -File "E:\scripts/test.ps1" '.$domain.' '.$ftp_user.' '.$password.' '.$ip);

			return true;

		} catch (PDOException $e) {
			print('Error ' . $e->getMessage());
			$this->pdo = NULL;
			return false;
		}
	}

	function dns($id, $action,$sub,$ip)
	{

		try {

			// for domain
			$stmt = $this->pdo->prepare("SELECT * FROM web_account WHERE `id` = ?");
			$stmt->execute(array($id));
			$data = $stmt->fetch(PDO::FETCH_ASSOC);

				if(count($data)>0)
				{
					if($action=="new")
					{
						$temp=json_decode($data['dns']);
						$dns['statuscode'] = $statuscode;
						$dns['url'] =  $url_spec;
						$dns['stopped'] =  1;
						$temp[]=$dns;
					}
					
					$dns=json_encode($temp);
					$upstmt = $this->pdo->prepare("UPDATE web_account SET `dns` = ? WHERE `id` = ?");
					if($upstmt->execute(array($dns,$id)))
					{
						return false;
					}
				}else{
					return false;
				}
				return true;
			} catch (PDOException $e) {
				return false;
			$this->pdo = NULL;
			die();
		}
	}
}
?>