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
	string $uname,
	string $pass
) : int{
	$obj = new Select();
	global $users;
	$result = $obj->select_query(
			$users,
			array('uid', 'pass'),
			array('uname' => array($uname, '='), 'email1' => array($uname, '=')),
			'OR'
		);
	if(count($result) > 0){
		$result = $result[0];
		if(password_verify($pass, $result['pass'])){
			return $result['uid'];
		}
		else{
			return 0;
		}
	}
	else{
		return 0;
	}
}