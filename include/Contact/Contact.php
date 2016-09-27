<?php
// todo: Not at all completed
namespace contact;

use PDO;
use database\database\Delete;
use database\database\Insert;

require_once '/../database/Insert.php';
require_once '/../database/Database.php';
require_once '/../database/Delete.php';
require_once '/../config/dateFunction.php';
class Contact
{
	private $_insert;
	private $_delete;
	private $_contacts;
	private $_db;
	
	public function __construct()
	{
		$this->setInsert(new Insert());
		$this->setDb(Database::getInstance()->getConnect());
		$this->setDelete(new Delete());
		global $contacts;
		$this->setContact($contacts);
	}

	public function create(
		int $aid,
		string $name,
		string $mobile,
		string $work,
		string $home,
		string $landline, 
		string $email,
		string $address
	):int{
		if($this->getInsert()->insert_query(
			$this->getContact(),
			array(
				'name' => $name,
				'mobile' => $mobile,
				'work' => $work,
				'home' => $home,
				'landline' => $landline,
				'email' => $email,
				'address' => $address,
				'aid' => $aid
			)
		)){
			return $this->getInsert()->getInsertId();
		}
		return 0;
	}

	public function getContactId(string $email){
		try{
			$stmt = $this->getDb()->prepare('SELECT id FROM '.$this->getContact().' WHERE email=:email');
			$stmt->bindParam(':email', $email, PDO::PARAM_STR);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				return $stmt->fetch(PDO::FETCH_NUM)[0];
			}
		}
		catch(\PDOException $e){
			// todo: Error Handling
			echo 'Error in Contact.php '.$e->getMessage();
		}
		return null;
	}	

	public function edit(
		int $id,
		string $name,
		string $mobile,
		string $work,
		string $home,
		string $landline, 
		string $email,
		string $address
	):bool{
		
		$stmt = $this->getDb()->prepare('UPDATE '.getContact().' SET name=:name, mobile=:mobile, work=:work, home=:home, landline=:landline, email=:email, address=:address WHERE id=:id');
		$stmt->bindParam(':name', $name, POD::PARAM_STR);
		$stmt->bindParam(':mobile', $mobile, POD::PARAM_STR);
		$stmt->bindParam(':work', $work, POD::PARAM_STR);
		$stmt->bindParam(':home', $home, POD::PARAM_STR);
		$stmt->bindParam(':landline', $landline, POD::PARAM_STR);
		$stmt->bindParam(':email', $email, POD::PARAM_STR);
		$stmt->bindParam(':address', $address, POD::PARAM_STR);
		$stmt->bindParam(':id', $id, POD::PARAM_INT);
		if ($stmt->execute()) {
			return true;
		}
		return false;
	}

	

	public function delete(
		int $id
	):bool{
		if($this->getDelete()->delete_query(
			$this->getContact(),
			array('id' => array($id, ''))
		)){
			return true;
		}
		return false;
	}

	public function get(
		int $id
	):array{
		$stmt = $this->getDb()->prepare('SELECT name, email, mobile, work, home, landline, address FROM '.$this->getContact().' WHERE id=:id');
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		if($stmt->rowCount() > 0){
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
		return array();
	}

	public function getAll(
		
	):array{
		// todo: GetAll function to get All the contacts in the aid associated.
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

	public function getContact(){
		return $this->_contacts;
	}

	public function setContact($contacts){
		$this->_contacts = $contacts;
	}
}