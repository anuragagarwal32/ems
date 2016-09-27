<?php


namespace account;

use database\Delete;
use database\Insert;
use database\Database;
use PDO;
use Security;


require_once '/../database/Database.php';
require_once '/../database/Insert.php';
require_once '/../database/Delete.php';
require_once '/../config/dateFunction.php';
require_once '/../security/GeneratePassword.php';
require_once '/../security/validatePassById.php';

class Account
{
	private $_insert;
	private $_delete;
	private $_account;
	private $_db;
	
	public function __construct()
	{
		$this->setDb(Database::getInstance()->getConnect());
		$this->setInsert(new Insert());
		$this->setDelete(new Delete());
		global $account;
		$this->setAccount($account);
	}

	public function create(
		int $adminlevel,
		string $address,
		string $pass,
		int $active,
		string $username,
		int $maxsize,
		int $vacationmessageon,
		string $vacationmessage,
		string $vacationover,
		int $autovacationmessageon,
		string $autovacationmessage,
		string $vacationexpires,
		string $fname,
		string $sname,
		int $enablesignature,
		string $signatureplain,
		string $signaturehtml,
		int $parent,
		int $parentId
	):bool{

		$pass = GeneratePassword::generatePass($pass);
		
		if($this->getInsert()->insert_query(
			$this->getAccount(),
			$cols
		)){
			return true;
		}
		return false;
	}

	public function edit(
		int $id,
		string $category,
		bool $subcatenable = false,
		string $subcat = null,
		int $parentcat = null
	):bool{
		
		$subcatenable = ($subcatenable) ? 1 : 0;
		$stmt = $this->getDb()->prepare('UPDATE '.$this->getAccount().' SET category=:category, subcatenable=:subcatenable, subcat = :subcat, parentcat = :parentcat WHERE id=:id');
		$stmt->bindParam(':category', $category, PDO::PARAM_STR);
		$stmt->bindParam(':subcatenable', $subcatenable, PDO::PARAM_INT);
		$stmt->bindParam(':subcat', $subcat, PDO::PARAM_STR);
		$stmt->bindParam(':parentcat', $parentcat, PDO::PARAM_INT);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		if ($stmt->execute()) {
			return true;
		}
		return false;
	}

	public function delete(
		int $id
	):bool{
		if($this->getDelete()->delete_query(
			$this->getAccount(),
			array('id' => array($id, ''))
		)){
			return true;
		}
		return false;
	}

	public function get(
		int $id
	):array{
		$stmt = $this->getDb()->prepare('SELECT category, subcatenable, subcat, parentcat FROM '.$this->getAccount().' WHERE id=:id');
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		if($stmt->rowCount() > 0){
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
		return array();
	}

	public function getAll(){
		$stmt = $this->getDb()->prepare('SELECT category, subcatenable, subcat, parentcat FROM '.$this->getAccount());
		$stmt->execute();
		if($stmt->rowCount() > 0){
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		return array();
	}

	public function vacation(){

	}

	/**
	 * [addSignature adds or edits the signature of the user to be added at the end of each mail]
	 * @param string $text [signature in html or text]
	 * @param bool   $type [true: signauter in html, false: signature in plain text]
	 */
	public function signature(int $id, string $text, bool $type){
		try{
			if($type){
				$stmt = $this->getDb()->prepare('UPDATE '.$this->getAccount().' SET enablesignature=1, signaturehtml=:sig WHERE id=:id');
			}
			else{
				$stmt = $this->getDb()->prepare('UPDATE '.$this->getAccount().' SET enablesignature=1, signatureplaintext=:sig WHERE id=:id');
			}
			$stmt->bindParam(':sig', $text, PDO::PARAM_STR);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
			return true;
		}
		catch(\PDOException $e){
			echo 'Exception in Accounts.php '.$e->getMessage();
		}
		return false;
	}

	public function toggleActive(int $id, bool $toggle = true, bool $active = false):bool{
		try{
			if($toggle){
				$stmt = $this->getDb()->prepare('UPDATE '.$this->getAccount().' SET active = !active WHERE id=:id');
			}
			else{
				$stmt = $this->getDb()->prepare('UPDATE '.$this->getAccount().' SET active = :active WHERE id=:id');
				$active = ($active) ? 1 : 0;
				$stmt->bindParam(':active', $active, PDO::PARAM_INT);
			}
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
			return true;
		}
		catch(\PDOException $e){
			echo 'Exception in Accounts.php '.$e->getMessage();
		}
		return false;
	}

	public function autoVacation(){

	}
	
	public function changePassword(int $id, string $oldPass, string $newPass){
		try{
			if($this->validatePass($id, $oldPass) > 0){
				$stmt = $this->getDb()->prepare('UPDATE '.$this->getAccount().' SET pass=:pass WHERE id=:id');
				$newPass = GeneratePassword::generatePass($newPass);
				$stmt->bindParam(':id', $id, PDO::PARAM_INT);
				$stmt->bindParam(':pass', $newPass, PDO::PARAM_STR);
				$stmt->execute();
				return true;
			}
		}
		catch(\PDOException $e){
			// todo: Exception Handling
			echo 'Error in accounts.php '.$e->getMessage();
		}
		return false;
	}

	public function validatePass(int $id, string $pass){
		return validate($id, $pass);
	}

	public function addAssociatedMails(array $mid){
		
	}

	public function editAssociatedMails(){

	}

	public function deleteAssociatedMails(){

	}

	public function managerManagement(){
		// todo: Add managers who can view the mails, the manager can have access to mails which they can view at the fullest.
	}

	public function generateRandomPassword(){
		// todo: When a new employee is added, then a random password will be send to the user email address and they can change the password when they like.
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

	public function getAccount(){
		return $this->_account;
	}

	public function setAccount($account){
		$this->_account = $account;
	}
}