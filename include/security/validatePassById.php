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
	int $uid,
	string $pass
) : int{
	$obj = new Select();
	global $users;
	$result = $obj->select_query(
		$users,
		array('pass'),
		array('uid' => array($uid, '='))
	);
	if(count($result) > 0){
		$result = $result[0];
		if(password_verify($pass, $result['pass'])){
			return true;
		}
	}
	else{
		return false;
	}
}