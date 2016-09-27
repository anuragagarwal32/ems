<?php
	require_once '../database/Database.php';
	function getParentId(int $id):int{
		$db = Database::getInstance()->getConnect();
		global $accounts;
		// todo: if parent, then parent id, else return account id
		$stmt = $db->prepare('SELECT parentid, parent FROM '.$accounts.' WHERE id=:id');
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		$result = $stmt->fetch(PDO::PARAM_ASSOC);
		if($result['parent'] == 1){
			return $result['parentid'];
		}
		return $id;
	}
?>