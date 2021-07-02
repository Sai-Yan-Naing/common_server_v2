<?php
class Email{
	function addEmail($domain,$email,$password){
		// $email1=$email.'@'.$domain;

		// $domain="test.test";
		// $password="welcome";
		// $password = hash_hmac('sha256', $password, PASS_KEY);

	try {
			$result = $this->openURL('http://ssl8.ethical-sai.tech/index.php?domain='.$domain.'&'.'password='.$password.'&'.'email='.$email.'&'.'isexist='.$isexist.'&action=new');
			$data = json_decode($result);
			// print_r($result);
			// echo $data->ok;
			if($data->ok)
			{
				return true;
			}
			return false;


		} catch (PDOException $e) {
			//print('Error ' . $e->getMessage());
			$error_message = "データベースへの接続エラーです。";
			// require_once("views/allerror.php");
			$pdo_account = NULL;
			die();
		}
	}

	function openURL($url) {
 
	  // Create a new cURL resource
	  $ch = curl_init();
	 
	  // Set the file URL to fetch through cURL
	  curl_setopt($ch, CURLOPT_URL, $url);
	 
	  // Do not check the SSL certificates
	  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	 
	  // Return the actual result of the curl result instead of success code
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	  curl_setopt($ch, CURLOPT_HEADER, 0);
	  $data = curl_exec($ch);
	  curl_close($ch);
	  return $data;
	}

	function getAll($domain)
	{
		try {
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);

			$stmt = $pdo_account->prepare("SELECT * FROM add_email WHERE `domain` = ?");
			$stmt->execute(array($domain));
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $data;


		} catch (PDOException $e) {
			$pdo_account = NULL;
			die();
		}
	}

	function changePassword($email,$password,$eid,$domain){
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			$stmt = $pdo_account->prepare("UPDATE add_email SET `password` = ? WHERE `id` = ?");
			$isexist='noexist';
			if(count($this->getAll($domain)) > 0 )
			{
				$isexist='exist';
			}
			if($stmt->execute(array($password,$eid)))
			{
				echo $this->openURL('http://ssl8.ethical-sai.tech/index.php?domain='.$domain.'&'.'password='.$password.'&'.'email='.$email.'&'.'isexist='.$isexist.'&action=edit');
			}
			return true;
	}

	function deleteEmail($email,$eid,$domain)
	{
			$isexist='noexist';
			if(count($this->getAll($domain)) > 0 )
			{
				$isexist='exist';
			}
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			$dstmt = $pdo_account->prepare("DELETE FROM `add_email` WHERE id = ?");
			if(!$dstmt->execute(array($eid)))
			{
				return false;
			}
			echo $this->openURL('http://ssl8.ethical-sai.tech/index.php?domain='.$domain.'&email='.$email.'&isexist='.$isexist.'&action=delete');
			return true;
			
	}
	function getData($id)
	{
		$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			// 
		$stmt1 = $pdo_account->prepare("SELECT * FROM add_email WHERE `id` = ?");
		$stmt1->execute(array($id));
		$data1 = $stmt1->fetch(PDO::FETCH_ASSOC);
		$pdo_account = NULL;
		return $data1;
	}

}