<?php


namespace tag;

use PDO;
use database\database\Delete;
use database\database\Insert;

require_once '/../database/Insert.php';
require_once '/../database/Database.php';
require_once '/../database/Delete.php';
require_once '/../config/dateFunction.php';
class Tags
{
	private $_insert;
	private $_delete;
	private $_predefined_tags;
	private $_db;
	private $_message_tags;
	
	public function __construct()
	{
		$this->setInsert(new Insert());
		$this->setDb(Database::getInstance()->getConnect());
		$this->setDelete(new Delete());
		global $predefined_tags;
		global $predefined_tags;
		$this->setPredefinedTags($predefined_tags);
		$this->setMessageTags($predefined_tags);
	}

	public function createPrefined(
		string $tagname,
		string $color,
		int $aid
	):bool{
		if($this->getInsert()->insert_query(
			$this->getPredefinedTags(),
			array(
				'tagname' => $tagname,
				'color' => $color,
				'aid' => $aid
			)
		)){
			return true;
		}
		return false;
	}

	public function createMessageTag(string $tag,int $message_id, bool isEntryInPredefined = false, string $color = null, int $aid = 0){

		if($isEntryInPredefined){
			$this->getInsert()->insert_query(
				$this->getPredefinedTags(),
				array(
					'tagname' => $tagname,
					'color' => $color,
					'aid' => $aid
				)
			);
			$id = $this->getInsert()->getInsertId();
			if($this->getInsert()->insert_query(
				$this->getMessageTags(),
				array(
					'preTag' => $id,
					'message_id' => $message_id
				)
			)){
				return true;
			}
		}
		else{
			if($this->getInsert()->insert_query(
				$this->getMessageTags(),
				array(
					'tag' => $tag,
					'message_id' => $message_id
				)
			)){
				return true;
			}
		}
		return false;
	}

	public function editPredefined(
		int $id,
		string $tagname,
		string $color
	):bool{
		
		$stmt = $this->getDb()->prepare('UPDATE '.getPredefinedTags().' SET tagname=:tagname, color=:color WHERE id=:id');
		$stmt->bindParam(':tagname', $tagname, POD::PARAM_STR);
		$stmt->bindParam(':color', $color, POD::PARAM_STR);
		$stmt->bindParam(':id', $id, POD::PARAM_INT);
		if ($stmt->execute()) {
			return true;
		}
		return false;
	}

	public function editMessageTag(
		int $id,
		string $tagname
	):bool{
		
		$stmt = $this->getDb()->prepare('UPDATE '.getMessageTags().' SET tag=:tagname WHERE id=:id');
		$stmt->bindParam(':tagname', $tagname, POD::PARAM_STR);
		$stmt->bindParam(':id', $id, POD::PARAM_INT);
		if ($stmt->execute()) {
			return true;
		}
		return false;
	}

	public function deletePrefined(
		int $id
	):bool{
		if($this->getDelete()->delete_query(
			$this->getPredefinedTags(),
			array('id' => array($id, ''))
		)){
			return true;
		}
		return false;
	}

	public function deleteMessageTag(
		int $id
	):bool{
		if($this->getDelete()->delete_query(
			$this->getMessageTags(),
			array('id' => array($id, ''))
		)){
			return true;
		}
		return false;
	}

	public function getAllPredefined(int $uid):array{

		global $messages, $mailBox, $account;
		$stmt = $this->getDb()->prepare('SELECT SQL_CALC_FOUND_ROWS id, tagname, color FROM '.$this->getPredefinedTags().' WHERE aid = :aid ORDER BY id DESC');
		$stmt->bindParam(':aid', $uid, PDO::PARAM_INT);
		$stmt->execute();
		if($stmt->rowCount() > 0){
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		return array();
		
		return array();
	}

	public function getPredefined(
		int $id
	):array{
		$stmt = $this->getDb()->prepare('SELECT tagname, color FROM '.$this->getPredefinedTags().' WHERE id=:id');
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		if($stmt->rowCount() > 0){
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
		return array();
	}

	public function getMessageTag(
		int $id
	):array{
		$stmt = $this->getDb()->prepare('SELECT tag, message_id FROM '.$this->getMessageTags().' WHERE id=:id');
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		if($stmt->rowCount() > 0){
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
		return array();
	}

	public function getAllMessageTags(
		int $message_id
	):array{
		$stmt = $this->getDb()->prepare('SELECT id, tag FROM '.$this->getMessageTags().' WHERE message_id=:id');
		$stmt->bindParam(':id', $message_id, PDO::PARAM_INT);
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

	/**
	 * @return mixed
	 */
	public function getPredefinedTags()
	{
		return $this->_predefined_tags;
	}

	/**
	 * @param mixed $billable
	 */
	public function setPredefinedTags($tags)
	{
		$this->_predefined_tags = $tags;
	}

	public function getMessageTags(){
		return $this->_message_tags;
	}

	public function setMessageTags($tags){
		$this->_message_tags = $tags;
	}
}