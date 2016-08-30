<?php
/**
 * Created by PhpStorm.
 * User: raxor
 * Date: 7/9/2016
 * Time: 9:53 AM
 */
namespace database\Database;

require_once 'GeneratePassword.php';
require_once '../database/Database.php';
function validate(
	string $uname,
	string $pass
) : int{
	
	$obj = new Select();
	global $account;
	
	$stmt = $this->getDb()->prepare('SELECT id, password FROM '.$this->getAccount().'WHERE uname=:uname');
	$stmt->bindParam(':uname', $uname, PDO::PARAM_STR);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	if(count($result) > 0){
		$result = $result[0];
		if(password_verify($pass, $result['password'])){
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