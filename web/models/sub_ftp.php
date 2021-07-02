<?php 

class SubFtp
{
	public $pdo;
	function __construct()
	{
		$this->pdo = new PDO(DSN,ROOT,ROOT_PASS);
	}

	function addSubFtp($domain, $ftp_user, $ftp_pass, $path)
	{
		$stmt = $this->pdo->prepare('INSERT INTO sub_ftp (`domain`, `ftp_user`, `ftp_pass`, `path`) VALUES (?, ?, ?, ?)');
		if(!$stmt->execute(array($domain, $ftp_user, $ftp_pass, $path)))
		{
			$this->pdo =null;
			return false;
		}
		$this->pdo =null;
			
		return true;
	}
	function changePassword($ftp_pass,$id)
	{
		// die($ftp_pass.$id);
		$stmt = $this->pdo->prepare("UPDATE sub_ftp SET `ftp_pass` = ? WHERE `id` = ?");
			if(!$stmt->execute(array($ftp_pass,$id))){
				die('error');
				return false;
			}
			return true;
	}

	function deleteSubFtp($id)
	{
		$dstmt = $this->pdo->prepare("DELETE FROM `sub_ftp` WHERE id = ?");
		// $ddata = $dstmt->fetchAll(PDO::FETCH_ASSOC);
		if(!$dstmt->execute(array($id)))
		{
			return false;
		}
		return true;
	}
}

?>