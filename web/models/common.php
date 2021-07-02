<?php

class Common{
		public $pdo;
		function __construct()
		{
			$this->pdo = new PDO(DSN, ROOT, ROOT_PASS);
		}
		function getWebaccount($domain){
				// 
				$stmt1 = $this->pdo->prepare("SELECT * FROM web_account WHERE `domain` = ?");
				$stmt1->execute(array($domain));
				$data1 = $stmt1->fetch(PDO::FETCH_ASSOC);
				return $data1;
		}

		function getWebaccountByadmin($admin){
				// 
				$stmt1 = $this->pdo->prepare("SELECT * FROM web_account WHERE `customer_id` = ?");
				$stmt1->execute(array($admin));
				$data1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
				return $data1;
		}

		function getWebaccountById($admin,$id){
				// 
				$stmt1 = $this->pdo->prepare("SELECT * FROM web_account WHERE `customer_id` = ? and `id`=?");
				$stmt1->execute(array($admin,$id));
				$data1 = $stmt1->fetch(PDO::FETCH_ASSOC);
				return $data1;
		}

		function alreadyExist($table,$column,$checker){
			// return $table.$column.$checker;
			try {
				// 
				$stmt1 = $this->pdo->prepare("SELECT $column FROM $table WHERE `$column` = ?");
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

		// function getAllData($domain,$table)
		// {
		// 	try {
		// 		$stmt = $this->pdo->prepare("SELECT * FROM $table WHERE `domain` = ?");
		// 		$stmt->execute(array($domain));
		// 		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
		// 		return $data;


		// 	} catch (PDOException $e) {
				
		// 		die();
		// 	}
		// }

		// function getDataById($id,$table)
		// {
		// 	$stmt1 = $this->pdo->prepare("SELECT * FROM $table WHERE `id` = ?");
		// 	$stmt1->execute(array($id));
		// 	$data1 = $stmt1->fetch(PDO::FETCH_ASSOC);
			
		// 	return $data1;
		// }

		function getRow($query)
		{
			// die($query);
			$stmt1 = $this->pdo->prepare($query);
			$stmt1->execute();
			$data = $stmt1->fetch(PDO::FETCH_ASSOC);
			return $data;
		}

		function getAllRow($query)
		{
			// die($query);
			$stmt1 = $this->pdo->prepare($query);
			$stmt1->execute();
			$data = $stmt1->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}

		function doThis($query)
		{
			// die($query);
			try{
				$stmt1 = $this->pdo->prepare($query);
				if(!$stmt1->execute())
				{
					return false;
				}
				return true;
			}catch(PDOException $e){
				// die('exe');
				echo $sql . "<br>" . $e->getMessage();
			}
			
		}

		// function getDNS($dns,$id)
		// {
		// 	// return $id;
		// 	$getData=$dns['dns'];
		// 	foreach (json_decode($getData) as $key=>$value) {
		// 		if((int)$key==(int)$id){
		// 			$temp['type']=$value->type;
		// 			$temp['sub']=$value->sub;
		// 			$temp['target']=$value->target;
		// 		}
		// 	}
		// 	return $temp;
		// }

		// function addDNS($dns,$type,$sub,$target)
		// {
		// 	// die($type.$sub.$target);
		// 	// return $id;
		// 	$getData=$dns['dns'];
		// 	$temp=json_decode($getData);
		// 	$dns1['type'] =  $type;
		// 	$dns1['sub'] =  $sub;
		// 	$dns1['target'] =  $target;
		// 	$temp[] = $dns1;
		// 	return json_encode($temp);
		// }

		// function editDNS($dns,$sub,$target,$id)
		// {
		// 	// print_r($dns);
		// 	// die($sub.$target.$id);
		// 	$getData=$dns['dns'];
		// 	foreach (json_decode($getData) as $key=>$value) {
		// 		if((int)$key==(int)$id){
		// 			$temp[$key]['type']=$value->type;
		// 			$temp[$key]['sub']=$sub;
		// 			$temp[$key]['target']=$target;
		// 		}else{
		// 			$temp[$key]['type']=$value->type;
		// 			$temp[$key]['sub']=$value->sub;
		// 			$temp[$key]['target']=$value->target;
		// 		}
		// 	}
		// 	return json_encode($temp);
		// }

		// function deleteDNS($dns,$id)
		// {
		// 	// print_r($dns);
		// 	// die($sub.$target.$id);
		// 	$getData=$dns['dns'];
		// 	foreach (json_decode($getData) as $key=>$value) {
		// 		if((int)$key!=(int)$id){
		// 			$temp[$key]['type']=$value->type;
		// 			$temp[$key]['sub']=$value->sub;
		// 			$temp[$key]['target']=$value->target;
		// 		}
		// 	}
		// 	return json_encode($temp);
		// }
		function mail_server($domain,$email,$password,$action,$isexist){
			// die('http://ssl8.ethical-sai.tech/index.php?domain='.$domain.'&'.'password='.$password.'&'.'email='.$email.'&'.'isexist='.$isexist.'&action='.$action);
			// return $email1=$email.'@'.$domain;
	
			// $domain="test.test";
			// $password="welcome";
			// $password = hash_hmac('sha256', $password, PASS_KEY);
				$result = $this->openURL(MAIL_SERVER.'/index.php?domain='.$domain.'&'.'password='.$password.'&'.'email='.$email.'&'.'isexist='.$isexist.'&action='.$action);
				$data = json_decode($result);
				// print_r($result);
				// echo $data->ok;
				// return $data;
				if($data->ok)
				{
					return 'ok';
				}
				return 'not ok';
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

	}

?>