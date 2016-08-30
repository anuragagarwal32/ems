<?php

namespace database\Database;

use PDO;
require_once '/../config/tables.php';
class Database
{
	private $_dbName;
	private $_host;
	private $_uname;
	private $_pass;
	public $_connect;
	public $_primaryKey;
	private static $instance;
	
	function __construct()
	{
		$this->setUname('root');
		$this->setHost('localhost');
		$this->setPass('');
		$this->setDbName('auction');
		try{
			$this->setConnect(new PDO('mysql:host='.$this->getHost().';dbname='.$this->getDbName(), $this->getUname(), $this->getPass()));
			$this->getConnect()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->getConnect()->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		}
		catch (\PDOException $e){
//            todo: flush for errors in database
			echo 'Error : '.$e->getMessage();
		}
	}
	
	public static function getInstance(){
		if (null === static::$instance) {
			static::$instance = new static();
		}
		
		return static::$instance;
	}


	public function closeConnection(){
		$this->setConnect(null);
	}

	/**
	 * @return string
	 */
	public function getDbName()
	{
		return $this->_dbName;
	}

	/**
	 * @param string $dbName
	 */
	public function setDbName($dbName)
	{
		$this->_dbName = $dbName;
	}

	/**
	 * @return string
	 */
	public function getHost()
	{
		return $this->_host;
	}

	/**
	 * @param string $host
	 */
	public function setHost($host)
	{
		$this->_host = $host;
	}

	/**
	 * @return string
	 */
	public function getUname()
	{
		return $this->_uname;
	}

	/**
	 * @param string $uname
	 */
	public function setUname($uname)
	{
		$this->_uname = $uname;
	}

	/**
	 * @return string
	 */
	public function getPass()
	{
		return $this->_pass;
	}

	/**
	 * @param string $pass
	 */
	public function setPass($pass)
	{
		$this->_pass = $pass;
	}

	/**
	 * @return mixed
	 */
	public function getConnect()
	{
		return $this->_connect;
	}

	/**
	 * @param mixed $connect
	 */
	public function setConnect($connect)
	{
		$this->_connect = $connect;
	}

	/**
	 * @return mixed
	 */
	public function getPrimaryKey()
	{
		return $this->_primaryKey;
	}

	/**
	 * @param mixed $primaryKey
	 */
	public function setPrimaryKey($primaryKey)
	{
		$this->_primaryKey = $primaryKey;
	}

}