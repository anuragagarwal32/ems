<?php
namespace email;


use database\Insert;
use database\Database;
use PDO;
require_once '/../database/Database.php';
require_once '/../database/Insert.php';
require_once '/../imap/imap_connect.php';
require_once '/../client/getSessionId.php';
require_once '/../security/EmailPassword.php';
require_once '/../config/dateFunction.php';
class GatherEmail
{
	private $_insert;
	private $_db;
	private $_mailbox;
	private $_folder;
	public function __construct(){
		$this->setInsert(new Insert());
		$this->setDb(Database::getInstance()->getConnect());
		global $mailBox, $folders;
		$this->setMailbox($mailBox);
		$this->setFolder($folders);
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
		// todo: Insert Folders for first time.

		$stmt = $this->getDb()->prepare('SELECT mid, email, domain, pass FROM '.$this->getMailbox().' WHERE aid=:id');

		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		$emails = $stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach ($emails as $email) {

			$pass = decrypt($email['pass']);
			$imap = imapConnect($email['domain'], $email['email'], $pass, 'Inbox');
			$folders = getAllFolders($imap, 'localhost');
			echo '<br> Email Address : '.$email['email'];
			
			foreach ($folders as $folder) {
				echo '<br> Folder :  '.$folder;

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

				$imap = imapConnect($email['domain'], $email['email'], $pass, $folder);
				$numMessages = imap_num_msg($imap);
				$lastMessageId = 0;
				$lastIdChanged = false;
				for ($i = $numMessages; $i > $lastMsgBuffer; $i--) {
					$lastIdChanged = true;
				    $header = imap_header($imap, $i);
				    
				    $Xheader = imap_fetchheader($imap, $i);
				    preg_match_all('/([^: ]+): (.+?(?:\r\n\s(?:.+?))*)\r\n/m', 
				        $Xheader, $matches);
					$Xheader = array_combine($matches[1], $matches[2]);
					
				    // print_r($Xheader);
				    // echo '<br>';
				    // print_r($folders($header);
				    // Combined Header is Xheader and $header attributes
				    
				    $fromInfo = $header->from[0];
				    $replyInfo = $header->reply_to[0];
				    // Status Information
				   	$status = '';
				    if($header->Unseen == 'U'){
				    	$status = 'U';
				    }
				    else if($header->Flagged == 'F'){
				    	$status = 'F';
				    }
				    else if($header->Answered == 'A'){
				    	$status = 'A';
				    }
				    else if($header->Deleted == 'D'){
				    	$status = 'D';
				    }

				    $cc = array();
			    	$ccName = array();
				    
				    if(isset($header->cc)){
				    	
				    	foreach ($header->cc as $ccVal) {
				    		array_push($cc, (isset($ccVal->mailbox) && isset($ccVal->host)) ? $ccVal->mailbox . "@" . $ccVal->host : "");
				    		array_push($ccName, (isset($ccVal->personal) ? $ccVal->personal : ''));
				    	}
				    }

				    $bcc = array();
			    	$bccName = array();

				    if(isset($header->bcc)){
				    	
				    	foreach ($header->bcc as $bccVal) {
				    		array_push($bcc, (isset($bccVal->mailbox) && isset($bccVal->host)) ? $bccVal->mailbox . "@" . $bccVal->host : "");
				    		array_push($bccName, (isset($bccVal->personal) ? $bccVal->personal : ''));
				    	}
				    }

				    $messageId = $this->removeBrackets(isset($header->message_id) ? $header->message_id : null);
				    
				    $reply = false;
				    $replyForMessageId = '';
				    if(isset($header->in_reply_to)){
				    	$reply = true;
				    	$replyForMessageId = $this->removeBrackets($header->in_reply_to);
				    }

				    $details = array(
				        "fromAddr" => (isset($fromInfo->mailbox) && isset($fromInfo->host))
				            ? $fromInfo->mailbox . "@" . $fromInfo->host : "",
				        "fromName" => (isset($fromInfo->personal))
				            ? $fromInfo->personal : "",
				        "replyAddr" => (isset($replyInfo->mailbox) && isset($replyInfo->host))
				            ? $replyInfo->mailbox . "@" . $replyInfo->host : "",
				        "replyName" => (isset($replyInfo->personal))
				            ? $replyInfo->personal : "",
				        "subject" => (isset($header->subject))
				            ? $header->subject : "",
				        "udate" => (isset($header->udate))
				            ? $header->udate : "",
				    );

				    $uid = imap_uid($imap, $i);

				    if($i == $numMessages){
				    	$lastMessageId = $uid;
				    }

				    global $messages;
				    // if($this->getInsert()
				    // 	->insert_query(
				    // 		$messages,
				    // 		array(
				    // 			'accountid' => $id,
				    // 			'folderId' => $folderId,
				    // 			'subject' => $details['subject'],
				    // 			'message' => $message,
				    // 			''

			    	// 		)
			    	// 	)){
				    // 		
				    // }
				    // else{

				    // }

				    echo "<ul>";
				    echo "<li><strong>From:</strong>" . $details["fromName"];
				    echo " " . $details["fromAddr"] . "</li>";
				    echo "<li><strong>Subject:</strong> " . $details["subject"] . "</li>";
				    echo '<li><a href="mail.php?folder='  . '&uid=' . $uid . '&func=read">Read</a>';
				    echo " | ";
				    echo '<a href="mail.php?folder='  . '&uid=' . $uid . '&func=delete">Delete</a></li>';
				    echo "</ul>";
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

	public function insertMessage(){

	}

	public function removeBrackets($str){
		$str = ltrim($str, '<');
	    $str = rtrim($str, '>');
	    return $str;
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
}

$obj = new GatherEmail();
$obj->gather(1);
?>