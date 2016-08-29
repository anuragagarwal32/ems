<?php
/**
 * Created by PhpStorm.
 * User: raxor
 * Date: 7/9/2016
 * Time: 9:46 AM
 */

namespace database\Database;
use DateTime;
use PDO;
require_once 'Database.php';

class Delete extends Database
{
	public function delete_query(
		string $table_name,
		array $where,
		string $method = 'AND'
	): bool{
		try{
			$whereList = $this->where($where, $method);
			$stmt = $this->getConnect()->prepare('DELETE FROM '.$table_name.' '.$whereList);
//			echo 'DELETE FROM '.$table_name.' '.$whereList;
			$stmt = $this->bind($stmt, $where);
			if($stmt->execute()){
				$stmt->closeCursor();
				$this->closeConnection();
				return true;
			}
			else{
				
			}
		}
		catch (\PDOException $e){
//			todo: Implement Exception Handling
			echo 'Exception in Delete.php : '.$e->getMessage();
		}
		return false;
	}
	
	public function where(array $where, string $method) : string{
		if(strtoupper($method) == 'OR'){
			$method = ' OR';
		}
		else{
			$method = ' AND';
		}
		$whereList = 'WHERE ';
		foreach ($where as $key => $value){
//					$value : array , [0]: value and [1] relop
			if(empty($value[1])){
				if(is_numeric($value[0]) || is_bool($value[0]))
					$whereList .= $key.' = :'.$key.$method.' ';
				else if(is_string($value[0]))
					$whereList .= $key.' like :'.$key.$method.' ';
				else if(is_null($value[0]))
					$whereList .= $key.' is null'.$method.' ';
			}
			else{
				$whereList .= $key.' '.$value[1].' :'.$key.$method.' ';
			}
		}
		$whereList = rtrim($whereList, $method.' ');
		return $whereList;
	}
	
	
	public function validateDate($date, $format = 'd-m-Y')
	{
		$d = DateTime::createFromFormat($format, $date);
		return $d && $d->format($format) == $date;
	}
	
	public function bind(\PDOStatement $stmt, array $column) : \PDOStatement{
		
		foreach ($column as $key => $val){
			if(is_int($val[0])){
				$stmt->bindValue(':'.$key, $val[0], PDO::PARAM_INT);
			}
			else if(is_bool($val[0])){
				$stmt->bindValue(':'.$key, $val[0], PDO::PARAM_BOOL);
			}
			else if(is_string($val[0])){
				
				$stmt->bindValue(':'.$key, htmlspecialchars($val[0]), PDO::PARAM_STR);
			}
			else if(is_null($val[0])){
				
				$stmt->bindValue(':'.$key, null, PDO::PARAM_NULL);
			}
		}
		return $stmt;
	}
}