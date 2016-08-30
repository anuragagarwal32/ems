<?php
/**
 * Created by PhpStorm.
 * User: raxor
 * Date: 7/9/2016
 * Time: 9:37 AM
 */

namespace database;
use PDO;
require_once 'Database.php';
class Insert extends Database
{
	private $_insertId;

	public function insert_query(
		string $table_name,
		array $column
	):bool{
		try{
			$columnList = '';
			$bindList = '';
			foreach ($column as $key => $value){
				$columnList .= $key.',';
				$bindList .= ':'.$key.',';
			}
			$columnList = rtrim($columnList, ',');
			$bindList = rtrim($bindList, ',');
			// echo 'INSERT INTO '.$table_name.' ('.$columnList.') VALUES ('.$bindList.')';
			$stmt =$this->getConnect()->prepare('INSERT INTO '.$table_name.' ('.$columnList.') VALUES ('.$bindList.')');
			$stmt = $this->bind($stmt, $column);
			if($stmt->execute()){
				$this->setInsertId($this->getConnect()->lastInsertId());
				$stmt->closeCursor();
				return true;
			}
		}
		catch (\PDOException $e){
//			todo: Implement Exception Handling
			echo 'Exception in Insert.php : '.$e->getMessage();
		}
		return false;
	}

	public function bind(\PDOStatement $stmt, array $column) : \PDOStatement{
		foreach ($column as $key => $val){
			if(is_int($val)){
				$stmt->bindValue(':'.$key, $val, PDO::PARAM_INT);
			}
			else if(is_float($val)){
				$stmt->bindValue(':'.$key, $val);
			}
			else if(is_bool($val)){
				$stmt->bindValue(':'.$key, $val, PDO::PARAM_BOOL);
			}
			else if(is_string($val)){
				$stmt->bindValue(':'.$key, htmlspecialchars($val), PDO::PARAM_STR);
			}
			else if(is_null($val)){
				$stmt->bindValue(':'.$key, null, PDO::PARAM_NULL);
			}
		}
		return $stmt;
	}

	/**
	 * @return mixed
	 */
	public function getInsertId()
	{
		return $this->_insertId;
	}

	/**
	 * @param mixed $insertId
	 */
	public function setInsertId($insertId)
	{
		$this->_insertId = $insertId;
	}


}