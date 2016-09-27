<?php

namespace email;

use database\Insert;
use database\Delete;
use database\Database;
use PDO;
use contact;

require_once '/../database/Database.php';
require_once '/../database/Insert.php';
require_once '/../database/Delete.php';
require_once '/../Tags/Tags.php';
require_once '/../Contact/Contact.php';
class Email
{
	private $_db;
	private $_insert;
	private $_delete;
	private $_accounts;
	private $_messages;

	public function __construct(){
		$this->setInsert(new Insert());
		$this->setDelete(new Delete());
		$this->setDb(Database::getInstance()->getConnect());
		global $accounts, $messages;
		$this->setAccounts($accounts);
		$this->setMessages($messages);
	}

	public function toggleStarred(int $mid):bool{
        try{
            $stmt = $this->getDb()->prepare('UPDATE '.$this->getMessages().' starred = !starred WHERE id = :id');
            $stmt->bindParam(':id', $mid, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        }
        catch(\PDOException $e){
            // todo: Error Handling
            echo 'Error in Email.php '.$e->getMessage();
        }
        return false;
	}

	public function addTag(int $id, string $tag, bool $isEntryInPredefined = false, string $color = null, int $aid = null){
        try{
            $tag = new Tags();
            return $tag->createMessageTag($tag, $id, $isEntryInPredefined, $color, $aid);
        }
        catch(\PDOException $e){
            // todo: Error Handling
            echo 'Error in Email.php '.$e->getMessage();
        }
        return false;
	}

	public function removeTag(int $id):bool{
        try{
            $tag = new Tags();
            return $tag->deleteMessageTag($id);
        }
        catch(\PDOException $e){
            // todo: Error Handling
            echo 'Error in Email.php '.$e->getMessage();
        }
        return false;
	}

	public function unread(int $messageId):bool{
        try{
            $stmt = $this->getDb()->prepare('UPDATE '.$this->getMessages().' type = "U" WHERE id = :id');
            $stmt->bindParam(':id', $mid, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        }
        catch(\PDOException $e){
            // todo: Error Handling
            echo 'Error in Email.php '.$e->getMessage();
        }
        return false;
	}

	public function read(int $messageId):bool{
        try{
            $stmt = $this->getDb()->prepare('UPDATE '.$this->getMessages().' type = "R" WHERE id = :id');
            $stmt->bindParam(':id', $mid, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        }
        catch(\PDOException $e){
            // todo: Error Handling
            echo 'Error in Email.php '.$e->getMessage();
        }
        return false;
	}

	public function delete(int $messageId):bool{
        try{
            if($this->getDelete()->delete_query(
                $this->getMessages(),
                array('id' => $messageId)
            )){
                return true;
            }
        }
        catch(\PDOException $e){
            // todo: Error Handling
            echo 'Error in Email.php '.$e->getMessage();
        }
        return false;
	}

	public function changeStatus(int $messageId, string $status){
        try{
            $stmt = $this->getDb()->prepare('UPDATE '.$this->getMessages().' type = :status WHERE id = :id');
            $status = strtoupper($status);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':id', $messageId, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        }
        catch(\PDOException $e){
            // todo: Error Handling
            echo 'Error in Email.php '.$e->getMessage();
        }
	}

	public function forward(){

	}

	public function reply(){
		
	}

    public function changeFolder(int $id, int $folder){
        try{
            $stmt = $this->getDb()->prepare('UPDATE '.$this->changeFolder().' SET folderid=:folder WHERE id=:id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':folder', $folder, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        }
        catch(\PDOException $e){
            // todo: Error Handling
            echo 'Exception in Email.php '.$e->getMessage();
        }
        return false;
    }

    public function associateContact(int $id, string $email){
        try{
            $contact = new Contact();
            $cid = $contact->getContactId($email);
            $stmt = $this->getDb()->prepare('UPDATE '.$this->getMessages().' cid = :cid WHERE id = :id');
            $stmt->bindParam(':cid', $cid, PDO::PARAM_INT);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        }
        catch(\PDOException $e){
            // todo: Error Handling
            echo 'Error in Email.php '.$e->getMessage();
        }
    }

    public function associateNewContact(int $mid, string $name, string $mobile, string $work, string $landline, string $email, string $address){
        try{
            $contact = new Contact();
            $id = $contact->create($name, $mobile, $work, $landline, $email, $address);
            $stmt = $this->getDb()->prepare('UPDATE '.$this->getMessages().' cid = :cid WHERE id = :id');
            $stmt->bindParam(':cid', $id, PDO::PARAM_INT);
            $stmt->bindParam(':id', $mid, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        }
        catch(\PDOException $e){
            // todo: Error Handling
            echo 'Error in Email.php '.$e->getMessage();
        }
    }

    /**
     * Gets the value of _db.
     *
     * @return mixed
     */
    public function getDb()
    {
        return $this->_db;
    }

    /**
     * Sets the value of _db.
     *
     * @param mixed $_db the db
     *
     * @return self
     */
    private function setDb($db)
    {
        $this->_db = $db;
    }

    /**
     * Gets the value of _insert.
     *
     * @return mixed
     */
    public function getInsert()
    {
        return $this->_insert;
    }

    /**
     * Sets the value of _insert.
     *
     * @param mixed $_insert the insert
     *
     * @return self
     */
    private function setInsert($insert)
    {
        $this->_insert = $insert;
    }

    /**
     * Gets the value of _delete.
     *
     * @return mixed
     */
    public function getDelete()
    {
        return $this->_delete;
    }

    /**
     * Sets the value of _delete.
     *
     * @param mixed $_delete the delete
     *
     * @return self
     */
    private function setDelete($delete)
    {
        $this->_delete = $delete;
    }

    /**
     * Gets the value of _accounts.
     *
     * @return mixed
     */
    public function getAccounts()
    {
        return $this->_accounts;
    }

    /**
     * Sets the value of _accounts.
     *
     * @param mixed $_accounts the accounts
     *
     * @return self
     */
    private function setAccounts($accounts)
    {
        $this->_accounts = $accounts;
    }

    /**
     * Gets the value of _messages.
     *
     * @return mixed
     */
    public function getMessages()
    {
        return $this->_messages;
    }

    /**
     * Sets the value of _messages.
     *
     * @param mixed $_messages the messages
     *
     * @return self
     */
    private function setMessages($messages)
    {
        $this->_messages = $messages;
    }
}