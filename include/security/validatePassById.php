<?php
/**
 * Created by PhpStorm.
 * User: raxor
 * Date: 7/9/2016
 * Time: 9:53 AM
 */
namespace database\Database;

require_once 'GeneratePassword.php';
require_once '../database/Select.php';
function validate(
	int $id,
	string $pass
) : int{
	
	$db = Database::getInstance()->getConnect();
	global $account;
	
	$stmt = $db->prepare('SELECT id, pass, active FROM '.$this->getAccount().'WHERE id=:id');
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	if(count($result) > 0){
		if(password_verify($pass, $result['pass'])){
			if($result['active'] === 0){
				return -1;
			}
			return $result['id'];
		}
		else{
			return 0;
		}
	}
	else{
		return 0;
	}
}