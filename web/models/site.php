<?php

	class Site{

		function siteSetting($app, $status, $domain){
			// $pass_encrypted = hash_hmac('sha256', $password, PASS_KEY);
			if($status=='on')
			{
				// die($status);
				$status=0;
			}else{
				$status=1;
			}

			try {

				$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
				$dstmt = $pdo_account->prepare("SELECT COUNT(domain) as cnt FROM web_account WHERE `domain` = ?");
				$dstmt->execute(array($domain));
				$ddata = $dstmt->fetch(PDO::FETCH_ASSOC);
				if($ddata['cnt'] ==1)
				{
					if($app=="site")
					{
						$stmt = $pdo_account->prepare("UPDATE web_account SET `stopped` = ? WHERE `domain` = ?");
						if($stmt->execute(array($status,$domain)))
						{
							if($status==0)
							{
								$result = Shell_Exec("%windir%\system32\inetsrv\appcmd.exe start sites $domain");
							}else{
								$result = Shell_Exec("%windir%\system32\inetsrv\appcmd.exe stop sites $domain");
							}
							
						}
						return $result.$app;
					}else{
						$stmt = $pdo_account->prepare("UPDATE web_account SET `appstopped` = ? WHERE `domain` = ?");
						if($stmt->execute(array($status,$domain)))
						{
							if($status==0)
							{
								$result = shell_Exec("%windir%\system32\inetsrv\appcmd.exe start apppool /apppool.name:$domain");
							}else{
								$result = Shell_Exec("%windir%\system32\inetsrv\appcmd.exe stop apppool /apppool.name:$domain");
							}
							
						}
						return $result.$app;
					}
				}else{
					return false;
				}

			} catch (PDOException $e) {
				print('Error ' . $e->getMessage());
				$error_message = "データベースへの接続エラーです。";
				$pdo_account = NULL;
				die();
			}
		}
	}

?>