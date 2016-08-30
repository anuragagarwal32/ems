<?php

namespace users\Client;

use database\Database;

require_once '/../database/Database.php';
require_once '/../security/validatePass.php';
class Login
{
	private $_db;
	private $_account;
	public function login(string $uname, string $password){
		$this->getDb(Database::getInstance()->getConnect());
		global $account;
		$this->getAccount($account);
	}

	public function login(string $uname, string $password):int{
		$validated = validate($uname, $password);
		if($validated !== 0 || $validated !== -1){
			global $sessionName;
			$_SESSION[$sessionName] = $validated;
			return $validated;
		}
		else{
			return $validated;
		}
		
	}
	
	public function getDb(){
		return $this->_db;
	}

	public function setDb($db){
		$this->_db = $db;
	}

	public function getAccount(){
		return $this->_account;
	}
	
	public function setAccount($account){
		$this->_account = $account;
	}
}