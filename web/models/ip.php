<?php 

class BlackList
{
	public $pdo;
	function __construct()
	{
		$this->pdo=new PDO(DSN,ROOT,ROOT_PASS);
	}
	function addToBlacklist($domain,$ip,$mask='255.255.255.255',$status='BLOCKED')
	{
		try{
			$stmt = $this->pdo->prepare('INSERT INTO blacklist (`domain`, `ip`, `mask`, `status`) VALUES (?, ?, ?, ?)');
			if(!$stmt->execute(array($domain, $ip, $mask, $status)))
			{
				$this->pdo =null;
				return false;
			}
			$this->pdo =null;
			return true;
		}catch (PDOException $e) {
			print('Error ' . $e->getMessage());;
			$this->pdo = NULL;
			die('error');
		}
		
	}

	function getAllIp($domain)
	{
		try {
			$stmt = $this->pdo->prepare("SELECT * FROM blacklist WHERE `domain` = ?");
			$stmt->execute(array($domain));
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$this->pdo = NULL;
			return $data;


		} catch (PDOException $e) {
			$this->pdo = NULL;
			die();
		}
	}

	function getIp($id)
	{
		$stmt1 = $this->pdo->prepare("SELECT * FROM blacklist WHERE `id` = ?");
		$stmt1->execute(array($id));
		$data1 = $stmt1->fetch(PDO::FETCH_ASSOC);
		$pdo_account = NULL;
		return $data1;
	}

	function deleteIp($id)
	{
		// die('hello'.$id);
		$stmt = $this->pdo->prepare("DELETE FROM `blacklist` WHERE id = ?");
		if(!$stmt->execute(array($id)))
		{
			return false;
		}
		return true;
	}
}

?>