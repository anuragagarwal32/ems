<?php


namespace email;

use PDO;
use database\database\Delete;
use database\database\Insert;

require_once '/../database/Insert.php';
require_once '/../database/Database.php';
require_once '/../database/Delete.php';
require_once '/../config/dateFunction.php';
class Notes
{
	private $_insert;
	private $_delete;
	private $_notes;
	private $_db;
	
	public function __construct()
	{
		$this->setInsert(new Insert());
		$this->setDb(Database::getInstance()->getConnect());
		$this->setDelete(new Delete());
		global $notes;
		$this->setNotes($notes);
	}

	public function create(
		string $message,
		int $messageId,
		int $aid
	):bool{
		if($this->getInsert()->insert_query(
			$this->getNotes(),
			array(
				'message' => $message,
				'message_id' => $messageId,
				'date' => getCurrentDate(),
				'userid' => $aid
			)
		)){
			return true;
		}
		return false;
	}

	

	public function edit(
		int $id,
		string $message,
		int $messageId
	):bool{
		
		$stmt = $this->getDb()->prepare('UPDATE '.getNotes().' SET message=:message, message_id=:messageId WHERE id=:id');
		$stmt->bindParam(':message', $message, POD::PARAM_STR);
		$stmt->bindParam(':messageId', $messageId, POD::PARAM_STR);
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
			$this->getNotes(),
			array('id' => array($id, ''))
		)){
			return true;
		}
		return false;
	}

	public function get(
		int $id
	):array{
		$stmt = $this->getDb()->prepare('SELECT message_id, message FROM '.$this->getNotes().' WHERE id=:id');
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
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

	public function getNotes(){
		return $this->_notes;
	}

	public function setNotes($notes){
		$this->_notes = $notes;
	}
}