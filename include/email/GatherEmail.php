<?php

use database/Insert;
require_once '../database/Insert.php';
require_once '../imap/imap_connect.php';
class GatherEmail
{
	
	private $_insert;
	private $_db;
	private $_email;
	public function __construct(){
		$this->setInsert(new Insert());
		$this->setDb(Database::getInstance());
	}

	public function gather(int $id){
		// todo: Get the email address of the user, from the id mentioned
		
		// todo: Get the emails from demo address, unread only, not read.
		$imap = imapConnect('localhost', 'anurag@anurag.com', 'anurag', 'INBOX');
		$numOfMsgs = imap_num_msg($imap);
		for($i = $numOfMsgs; $i > ($numOfMsgs - 20); $i--){
			$header = imap_header($imap, $i);
			$fromInfo = $header->from[0];
			$replyInfo = $header->reply_to[0];
			$details = array(
					"fromAddr" => (isset($fromInfo->mailbox) && isset($fromInfo->host)) ? $fromInfo->mailbox."@".$fromInfo->host : "",
					"fromName" => (isset($fromInfo->personal)) ? $fromInfo->personal : "",
					"replyAddr" => (isset($replyInfo->mailbox) && isset($replyInfo->host)) ? $replyInfo->mailbox."@".$replyInfo->host : "",
					"replyName" => (isset($replyInfo->personal)) ? $replyInfo->personal : "",
					"subject" => (isset($header->subject)) ? $header->subject : "",
					"udate" => (isset($header->udate)) ? $header->udate : ""
				);
			$uid = imap_uid($imap, $i);
			
		}
	}

	// For First Time, only to gather all the emails, from the mailbox.
	public function getAll(int $id){

	}

	public function setInsert($insert){
		$this->_insert = $insert;
	}

	public function getInsert(){
		return $this->_insert;
	}

	public function setDb($db){
		$this->_db = $db;
	}

	public function getDb(){
		return $this->_db;
	}

	public function setEmail($email){
		$this->_email = $email;
	}

	public function getEmail(){
		return $this->_email;
	}
}
?>