<?php


namespace category;

use database\Delete;
use database\Insert;
use database\Database;
use PDO;



require_once '/../database/Database.php';
require_once '/../database/Insert.php';
require_once '/../database/Delete.php';
require_once '/../config/dateFunction.php';
class Category
{
	private $_insert;
	private $_delete;
	private $_cat;
	private $_db;
	
	public function __construct()
	{
		$this->setDb(Database::getInstance()->getConnect());
		$this->setInsert(new Insert());
		$this->setDelete(new Delete());
		global $category;
		$this->setCat($category);
	}

	public function create(
		int $aid,
		string $category,
		bool $subcatenable = false,
		string $subcat = null,
		int $parentcat = null
	):bool{
		$cols = array();
		$cols['aid'] = $aid;
		$cols['category'] = $category;
		if($subcatenable){
			$cols['subcatenable'] = 1;
			$cols['subcat'] = $subcat;
		}
		if(!is_null($parentcat)){
			$cols['parentcat'] = $parentcat;
		}
		if($this->getInsert()->insert_query(
			$this->getCat(),
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
		$stmt = $this->getDb()->prepare('UPDATE '.$this->getCat().' SET category=:category, subcatenable=:subcatenable, subcat = :subcat, parentcat = :parentcat WHERE id=:id');
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
			$this->getCat(),
			array('id' => array($id, ''))
		)){
			return true;
		}
		return false;
	}

	public function get(
		int $id
	):array{
		$stmt = $this->getDb()->prepare('SELECT category, subcatenable, subcat, parentcat FROM '.$this->getCat().' WHERE id=:id');
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		if($stmt->rowCount() > 0){
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
		return array();
	}

	public function getAll(){
		$stmt = $this->getDb()->prepare('SELECT category, subcatenable, subcat, parentcat FROM '.$this->getCat());
		$stmt->execute();
		if($stmt->rowCount() > 0){
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

	public function getCat(){
		return $this->_cat;
	}

	public function setCat($cat){
		$this->_cat = $cat;
	}
}