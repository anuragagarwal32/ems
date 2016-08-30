<?php

namespace database\Insert;
namespace database\Database;
require_once '/../database/Insert.php';
require_once '/../imap/imap_connect.php';
class GatherEmail
{
	
	private $_insert;
	private $_db;
	private $_email;
	public function __construct(){
		$this->setInsert(new Insert());
		$this->setDb(Database::getInstance());
	}

	/**
	 * [gather description]
	 * @param  int         $id            [id of the user, whose mails are needed to be traversed]
	 * @param  string      $folder        [folder which is needed to be opened]
	 * @param  int|integer $lastMsgBuffer [last buffer to be 0 if all the mails to be scanned, else the last message which is their in the mailbox]
	 * @return [bool]                     [description]
	 */
	public function gather(int $id, string $folder, int $lastMsgBuffer = 0):bool{
		// todo: Get the email address of the user, from the id mentioned
		
		// todo: Get the emails from demo address, unread only, not read.
		// For unread emails only: for new ones
		// https://davidwalsh.name/gmail-php-imap
		
		$imap = imapConnect('localhost', 'anurag@anurag.com', 'anurag', 'Inbox');
		$numMessages = imap_num_msg($imap);
		
		for ($i = $numMessages; $i > $lastMsgBuffer; $i--) {
		    $header = imap_header($imap, $i);
		    
		    $Xheader = imap_fetchheader($imap, $i);
		    preg_match_all('/([^: ]+): (.+?(?:\r\n\s(?:.+?))*)\r\n/m', 
		        $Xheader, $matches);
			$Xheader = array_combine($matches[1], $matches[2]);
			
		    print_r($Xheader);
		    echo '<br>';
		    print_r($header);
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

		    echo "<ul>";
		    echo "<li><strong>From:</strong>" . $details["fromName"];
		    echo " " . $details["fromAddr"] . "</li>";
		    echo "<li><strong>Subject:</strong> " . $details["subject"] . "</li>";
		    echo '<li><a href="mail.php?folder='  . '&uid=' . $uid . '&func=read">Read</a>';
		    echo " | ";
		    echo '<a href="mail.php?folder='  . '&uid=' . $uid . '&func=delete">Delete</a></li>';
		    echo "</ul>";
		}
		return true;
	}

	public function initial(int $id){
		// Function for initial, during signup
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
}

$obj = new GatherEmail();
$obj->gather(1, 'INBOX');
?>