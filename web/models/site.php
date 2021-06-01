<?php

	class Site{

		function siteSetting($app, $status, $domain){
			// $pass_encrypted = hash_hmac('sha256', $password, PASS_KEY);

			try {
				$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
				$dstmt = $pdo_account->prepare("SELECT * FROM web_account WHERE `domain` = ?");
				$dstmt->execute(array($domain));
				$ddata = $dstmt->fetch(PDO::FETCH_ASSOC);
				if(count($ddata)>0)
				{
					if($app=="site")
					{
						$stmt = $pdo_account->prepare("UPDATE web_account SET `stopped` = ? WHERE `domain` = ?");
						if($stmt->execute(array($status,$domain)))
						{
							// die($status.'execute');
							if($status==0)
							{
								$result = Shell_Exec("%windir%\system32\inetsrv\appcmd.exe start sites $ddata[user]");
							}else{
								$result = Shell_Exec("%windir%\system32\inetsrv\appcmd.exe stop sites $ddata[user]");
							}
							
						}
					}else{
						$stmt = $pdo_account->prepare("UPDATE web_account SET `appstopped` = ? WHERE `domain` = ?");
						if($stmt->execute(array($status,$domain)))
						{
							if($status==0)
							{
								$result = shell_Exec("%windir%\system32\inetsrv\appcmd.exe start apppool /apppool.name:$ddata[user]");
							}else{
								$result = Shell_Exec("%windir%\system32\inetsrv\appcmd.exe stop apppool /apppool.name:$ddata[user]");
							}
							
						}
					}
					return true;
				}else{
					return false;
				}

			} catch (PDOException $e) {;
				$pdo_account = NULL;
				die();
			}
		}
	}

?>