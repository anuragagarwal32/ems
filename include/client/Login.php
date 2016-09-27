<?php

namespace client;

use database\Database;

require_once '/../database/Database.php';
require_once '/../security/validatePass.php';
require_once '/../config/dateFunction.php';
class Login
{
	private $_db;
	private $_account;
	
	public function __construct(){
		$this->setDb(Database::getInstance()->getConnect());
		global $account;
		$this->setAccount($account);
	}

	public function login(string $uname, string $password):int{
		$validated = validate($uname, $password);
		if($validated !== 0 || $validated !== -1){
			
			$this->updateLastLogon($validated);

			global $sessionName;
			$_SESSION[$sessionName] = $validated;
			return $validated;
		}
		else{
			return $validated;
		}
		
	}

	public function updateLastLogon(int $id){
		try{
			$stmt = $this->getDb()->prepare('UPDATE '.$this->getAccount().' SET lastlogontime=:last WHERE id=:id');
			$date = getCurrentDate();
			$stmt->bindParam(':last', $date, PDO::PARAM_STR);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
			return true;
		}
		catch(\PDOException $e){
			// todo: Exception Handling
			echo 'Exception in Login.php '.$e->getMessage();
		}
		return false;
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