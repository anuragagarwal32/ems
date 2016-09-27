<?php
namespace PhpImap;

/*
	Dealing with inline/embedded attachments 
	http://www.electrictoolbox.com/php-imap-message-body-attachments/
	http://www.electrictoolbox.com/php-email-extract-inline-image-attachments/

	https://www.daniweb.com/programming/web-development/threads/404586/how-to-extract-images-embedded-in-an-email-message

	http://stackoverflow.com/questions/15024290/how-to-extract-inline-imagesnot-attachment-from-an-email-using-imap-in-php

 */
use database\Insert;
use database\Database;
use PDO;
use DOMDocument;
require_once '/../database/Database.php';
require_once '/../database/Insert.php';
require_once '/../client/getSessionId.php';
require_once '/../security/EmailPassword.php';
require_once '/../config/dateFunction.php';
require_once 'Mailbox.php';
require_once 'getParentId.php';
require_once '/../Contact/Contact.php';

class GatherEmail
{
	private $_insert;
	private $_db;
	private $_mailbox;
	private $_folder;
	private $_attachment;

	public function __construct(){
		$this->setInsert(new Insert());
		$this->setDb(Database::getInstance()->getConnect());
		global $mailBox, $folders, $attachments;
		$this->setMailbox($mailBox);
		$this->setFolder($folders);
		$this->setAttachmentTable($attachments);
	}

	/**
	 * [gather description]
	 * @param  int         $id            [id of the user, whose mails are needed to be traversed]
	 * @param  string      $folder        [folder which is needed to be opened]
	 * @param  int|integer $lastMsgBuffer [last buffer to be 0 if all the mails to be scanned, else the last message which is their in the mailbox]
	 * @return [bool]                     [description]
	 */
	public function gather(int $id, bool $lastBufferCache = true):bool{
		
		// todo: Get the email address of the user, from the id mentioned
		
		// todo: Get the emails from demo address, unread only, not read.
		// For unread emails only: for new ones
		// https://davidwalsh.name/gmail-php-imap
		
		// todo: to get the last buffer for each folder from imap_folder table of database ($lastBufferCache)
		// 
		// todo: Batch Processing for uninterrupted
		// 
		// todo: Add Uid round_robin algo for processing the emails to all the users equally
		// 
		// todo: For cron job, the aid=:id has to be removed because all the emails are needed to be traversed time to time.

		// Get the parent id, if exists else give the id for the same
		// $id = getParentId($id);
		
		
		$stmt = $this->getDb()->prepare('SELECT mid, email, domain, pass, port FROM '.$this->getMailbox().' WHERE aid=:id');

		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		$emails = $stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach ($emails as $email) {

			$pass = decrypt($email['pass']);
			
			$server = new Mailbox($email['domain'], $email['email'], $pass, DIR_ATTACHMENT, $email['port']);
			
			$folders = $server->getListingFolders();
			// Folder has Domain with it

			echo '<br> Email Address : '.$email['email'];
			
			foreach ($folders as $folder) {
				
				
				// $trimFolder = ltrim($folder, $server->getServerString());
				// echo '<br> Folder :  '.$folder;
				

				if(!$lastBufferCache){
					$lastMsgBuffer = 0;
				}
				else{
					$stmt = $this->getDb()->prepare('SELECT id, name, lastMessageId FROM '.$this->getFolder().' WHERE mailboxid=:id and name=:folder');

					$stmt->bindParam(':id', $email['mid'], PDO::PARAM_INT);
					$stmt->bindParam(':folder', $folder, PDO::PARAM_STR);
					$stmt->execute();
					if($stmt->rowCount() > 0){
						
						$folderFromDb = $stmt->fetch(PDO::FETCH_ASSOC);
						$lastMsgBuffer = (int) $folderFromDb['lastMessageId'];
						$folderId = (int) $folderFromDb['id'];	
					}
					else{
						$folderId = $this->insertFolder($email['mid'], $folder);
						$lastMsgBuffer = 0;
					}
				}

				$server->switchMailbox($folder);
				echo $server->getImapPath();
				// // $imap = imapConnect($email['domain'], $email['email'], $pass, $folder);
				$numMessages = $server->countMails();
				$lastMessageId = 0;
				$lastIdChanged = false;
				
				for ($i = $numMessages; $i > $lastMsgBuffer; $i--) {

					$lastIdChanged = true;
					
					echo '<br><br><br>';
				    $mailArr = $server->getMail($i);

				    // Mail Id
				    $messageId = $this->removeBrackets(isset($mailArr->headers->message_id) ? $mailArr->headers->message_id : null);
				    
				    // Mail Unique identifier (uid)
				    $uid = $mailArr->id;
				    
				    // Reply for Mail Id
				    $replyMid = null;
				    $replyCond = 0;
				    if(isset($mailArr->headers->in_reply_to)){
				    	$replyCond = 1;
				    	$replyMid = $this->removeBrackets(isset($mailArr->headers->in_reply_to) ? $mailArr->headers->in_reply_to : null);
				    }


				    if(!empty($mailArr->textHtml) || !is_null($mailArr->textHtml)){
				    	
				    	if(count($mailArr->getAttachments()) > 0){
				    		$message = $mailArr->textHtml;
				    		$doc = new DOMDocument();
							$doc->loadHTML($message);
							$tags = $doc->getElementsByTagName('img');
							$counter = 0;
				    		foreach ($mailArr->getAttachments() as $key => $value) {
					   
					    		if($value->disposition == 'inline'){
					    			
	    							if (count($tags) > 0) {
								        $tag = $tags->item($counter);
								        $old_src = $tag->getAttribute('src');
								        
								        // todo: Change the attachment folder location depth to 0 because for testing it is done at a height from this folder of 3

								        $filename = ltrim($value->filePath, DIR_ATTACHMENT);

								        $new_src_url = HOST_ATTACHMENT.$filename;
								        $tag->setAttribute('src', $new_src_url);
								        
								        
								    }
					    		}
					    		$counter++;
					    	}
					    	
					    	$message = $doc->saveHTML();
				    	}
				    	
				    }
				    else{
				    	$message = $mailArr->textPlain;
				    }
				    $attachmentCond = 0;
				    if(count($mailArr->getAttachments()) > 0){
				    	$attachments = array();
				    	$attachmentCond = 1;
				    	foreach ($mailArr->getAttachments() as $key => $value) {
				    		if($value->disposition == 'attachment'){
				    			
				    			 array_push($attachments, array('actual' => $value->name, 'save' => ltrim($value->filePath, DIR_ATTACHMENT)));
				    			
				    		}
				    	}

				    }

				    // echo $message;
				   	$status = '';
				    if($mailArr->unseen == 'U'){
				    	$status = 'U';
				    }
				    else if($mailArr->flagged == 'F'){
				    	$status = 'F';
				    }
				    else if($mailArr->answered == 'A'){
				    	$status = 'A';
				    }
				    else if($mailArr->deleted == 'D'){
				    	$status = 'D';
				    }

			    	$ccEnable = false;
				    if(isset($mailArr->cc) && count($mailArr->cc) > 0){
				    	$ccEnable = true;
				    }
				    
				    
			    	$bccEnable = false;
				    if(isset($mailArr->bcc) && count($mailArr->bcc) > 0){
				    	$bccEnable = true;
				    }

				    if($i == $numMessages){
				    	$lastMessageId = $uid;
				    }

				    if(isset($mailArr->headers->reply_toaddress) && !empty($mailArr->headers->reply_toaddress)){
				    	$replyAddr = $mailArr->headers->reply_toaddress;
				    }
				    else{
				    	$replyAddr = null;
				    }
					global $messages, $message_metadata, $message_recipient;
					// todo: Add table for cc and bcc, calculate the size of the mail
				    $uid = (int) $uid;
				    $replyToAddress = null;
				    if(isset($mailArr->headers->reply_toaddress) && !empty($mailArr->headers->reply_toaddress)){
				    	$replyToAddress = $mailArr->headers->reply_toaddress;
				    }
				    else{
				    	$replyToAddress = null;
				    }

				    if(is_null($message)){
				    	$message = '';
				    }
				    echo $message;

				    $cid = $this->getContactId($mailArr->toString);

				    if($this->getInsert()
				    	->insert_query(
				    		$messages,
				    		array(
								'uid' => $uid,
				    			'messageId' => $messageId,
				    			'mailboxid' => (int) $email['mid'],
				    			'folderId' => (int) $folderId,
				    			'subject' => $mailArr->subject,
				    			'message' => $message,
				    			'type' => $status,
				    			'fromname' => $mailArr->fromName,
				    			'fromaddr' => $mailArr->fromAddress,
				    			'toemail' => $mailArr->toString,
				    			'createtime' => $mailArr->date,
				    			'reply_toaddress' => $mailArr->headers->reply_toaddress,
				    			'replyon' => $replyCond,
				    			'replymid' => $replyMid,
				    			'attatchmnetenable' => $attachmentCond,
				    			'xheader' => $mailArr->headersRaw,
				    			'cid' => $cid
			    			)
			    		)){
				    		$insertId = $this->getInsert()->getInsertId();
				    		// todo: Insert Message Meta Data
				    		
				    		if($ccEnable){
				    			
				    			foreach ($mailArr->cc as $key => $value) {
				    				$this->getInsert()->insert_query($message_recipient,
				    					array(
				    						'messageId' => $messageId,
				    						'uid' => $uid,
				    						'type' => 0,
				    						'email' => $key,
				    						'name' => $value
			    						));
				    			}
				    		}
				    		if($bccEnable){
				    			foreach ($mailArr->bcc as $key => $value) {
				    				$this->getInsert()->insert_query($message_recipient,
				    					array(
				    						'messageId' => $messageId,
				    						'uid' => $uid,
				    						'type' => 1,
				    						'email' => $key,
				    						'name' => $value
			    						));
				    			}
				    		}
				    		// Attachments are inserted
				    		if($attachmentCond == 1){
				    			foreach ($attachments as $key => $value) {
					    			$this->getInsert()->insert_query($this->getAttachmentTable(), array('message_id' => $insertId, 'actualfilelocation' => $value['save'], 'correctfilename' => $value['actual'], 'fileextension' => pathinfo($value['actual'], PATHINFO_EXTENSION)));
					    		}
				    		}
				    }
				    else{
				    	echo 'Error in inserting the message';
				    }

				}

				if($lastIdChanged){
					$this->updateLastMessageId($folderId, $lastMessageId);
				}
					
			}
		}
		
		return true;
	}

	public function initial(int $id){
		// Function for initial, during signup
		$this->gather(1, false);
	}

	public function insertFolder(int $id, string $folder, int $default = 0):int{
		echo getCurrentDateTime();
		$this->getInsert()->insert_query(
			$this->getFolder(),
			array(
				'mailboxid' => $id,
				'name' => $folder,
				'creationtime' => getCurrentDateTime(),
				'def' => $default
			)
		);
		if(true){
			echo 'Inserted';
			return $this->getInsert()->getInsertId();
		}
		return 0;
	}

	public function updateLastMessageId(int $folderId, int $lastMessageId):bool{
		$stmt = $this->getDb()->prepare('UPDATE '.$this->getFolder().' SET lastMessageId=:lastMessageId WHERE id=:id');
		$stmt->bindParam(':id', $folderId, PDO::PARAM_INT);
		$stmt->bindParam(':lastMessageId', $lastMessageId, PDO::PARAM_INT);
		if($stmt->execute()){
			return true;
		}
		return false;
	}

	public function getContactId(string $email){
		try{
			$contact = new Contact();
			return $contact->getContactId($email);
		}
		catch(\PDOException $e){
			// todo: Error Handling
			echo 'Exception in GatherEmail '.$e->getMessage();
		}
		return null;
	}

	public function removeBrackets($str){
		$str = ltrim($str, '<');
	    $str = rtrim($str, '>');
	    return $str;
	}

	public function queueManagement(int $mid){
		// todo: Manage mails for current mail id and view in associated mail id for the user who are associated to that mail id and then send the mails to them.
		// 
		// A queue number is added in mailbox table for getting the last queue number of the user, the queue number should not be used for sent folder because they are the emails which are send by us not came from them.
		// 
		// Initially the folder should take the emails in send but when the project starts the send emails are not necessarily be taken from the email box of gmail etc or it can be taken into consideration but they will create a confustion as, to whom the reply will be associated.
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

	public function getMailbox(){
		return $this->_mailbox;
	}

	public function setMailbox($mailBox){
		$this->_mailbox = $mailBox;
	}

	public function getFolder(){
		return $this->_folder;
	}

	public function setFolder($folder){
		$this->_folder = $folder;
	}

	public function getAttachmentTable(){
		return $this->_attachment;
	}

	public function setAttachmentTable($attachment){
		$this->_attachment = $attachment;
	}
}

$obj = new GatherEmail();
$obj->gather(1);
?>