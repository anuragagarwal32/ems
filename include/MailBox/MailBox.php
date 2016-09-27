<?php


namespace category;

use PDO;
use database\database\Delete;
use database\database\Insert;

require_once '/../database/Insert.php';
require_once '/../database/Database.php';
require_once '/../database/Delete.php';
require_once '/../config/dateFunction.php';
require_once '/../security/EmailPassword.php';
require_once 'GatherEmail.php';
class Category
{
	private $_insert;
	private $_delete;
	private $_mailBox;
	private $_db;
	
	public function __construct()
	{
		$this->setInsert(new Insert());
		$this->setDb(Database::getInstance()->getConnect());
		$this->setDelete(new Delete());
		global $mailBox;
		$this->setMailBox($mailBox);
	}

	public function create(
		int $aid,
		string $email,
		string $password,
		string $domain,
		int $port = 143
	):bool{
		
		if($this->getInsert()->insert_query(
			$this->getMailBox(),
			array(
				'aid' => $aid,
				'email' => $email,
				'pass' => encrypt($password),
				'domain' => $domain,
				'port' => $port
			)
		)){
			

			if($server = new Mailbox($domain, $email, $password, DIR_ATTACHMENT, $port)){
				$gather = new GatherEmail()->gather($aid);
			}
			else{
				// todo: Cannot connect to the server error. Let's check if this condition works.
				return false;
			}
			return true;
		}
		return false;
	}

	public function edit(
		int $id,
		string $email,
		string $password,
		string $domain,
		int $port,
		string $oldPass
	):bool{
		
		if($this->validatePass($id, $oldPass)){
			$stmt = $this->getDb()->prepare('UPDATE '.getMailBox().' SET email=:email, pass=:password, domain = :domain, port = :port WHERE mid=:id');
			$password = encrypt($password);
			$stmt->bindParam(':email', $category, POD::PARAM_STR);
			$stmt->bindParam(':password', $password, POD::PARAM_STR);
			$stmt->bindParam(':domain', $subcat, POD::PARAM_STR);
			$stmt->bindParam(':port', $port, POD::PARAM_INT);
			$stmt->bindParam(':id', $id, POD::PARAM_INT);
			if ($stmt->execute()) {
				return true;
			}
		}
		return false;
	}

	public function validatePass(int $id, string $pass){
		$stmt = $this->getDb()->prepare('SELECT id FROM '.$this->getMailBox().' WHERE pass=:pass AND email=:email');
		$pass = decrypt($pass);
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
		$stmt->execute();
		if($stmt->rowCount() > 0){
			return true;
		}
		return false;
	}

	public function changePassword(int $id, string $oldPass, string $newPass){
		if($this->validatePass($id, $oldPass)){
			$stmt = $this->getDb()->prepare('UPDATE '.getMailBox().' SET pass=:password WHERE mid=:id');
			$password = encrypt($password);
			$stmt->bindParam(':password', $password, POD::PARAM_STR);
			$stmt->bindParam(':id', $id, POD::PARAM_INT);
			if ($stmt->execute()) {
				return true;
			}
			return false;
		}
	}

	public function delete(
		int $id
	):bool{
		if($this->getDelete()->delete_query(
			$this->getMailBox(),
			array('mid' => array($id, ''))
		)){
			return true;
		}
		return false;
	}

	public function get(
		int $id
	):array{
		$stmt = $this->getDb()->prepare('SELECT email, domain, port FROM '.$this->getMailBox().' WHERE mid=:id');
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		if($stmt->rowCount() > 0){
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
		return array();
	}

	public function getAll(int $aid):array{
		$stmt = $this->getDb()->prepare('SELECT mid, email, domain, port FROM '.$this->getMailBox().' WHERE aid=:id');
		$stmt->bindParam(':aid', $aid, PDO::PARAM_INT);
		$stmt->execute();
		if($stmt->rowCount() > 0){
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
		return array();
	}

	
	/**
	 * @return mixed
	 */
	public function getInsert()
	{
		return $this->_insert;
	}

	/**
	 * @param mixed $insert
	 */
	public function setInsert($insert)
	{
		$this->_insert = $insert;
	}

	
	/**
	 * @return mixed
	 */
	public function getDb()
	{
		return $this->_db;
	}

	/**
	 * @param mixed $update
	 */
	public function setDb($db)
	{
		$this->_db = $db;
	}

	/**
	 * @return mixed
	 */
	public function getDelete()
	{
		return $this->_delete;
	}

	/**
	 * @param mixed $delete
	 */
	public function setDelete($delete)
	{
		$this->_delete = $delete;
	}

	public function getMailBox(){
		return $this->_notes;
	}

	public function setMailBox($mailBox){
		$this->_mailBox = $mailBox;
	}
}