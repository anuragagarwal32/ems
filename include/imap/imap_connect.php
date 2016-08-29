<?php
	function imapConnect($mailId, $uname, $password, $folder){
		
		$mailPath = getMailPath($mailId).$folder;
		$imap = imap_open($mailPath, $uname, $password);
		if($imap == null){
			echo 'Error Connecting in Mail';
			return false;
		}
		else{
			return $imap;
		}
	}

	function getMailPath(string $mailId){
		switch ($mailId) {
			case 'gmail':
				$mailPath = '{imap.gmail.com:993/imap/ssl}';
				break;
			case 'yahoo': 
				$mailPath = '{imap.mail.yahoo.com:993/imap/ssl}INBOX';
			case 'aol':
				$mailPath = '{imap.aol.com:993/imap/ssl}INBOX';
			case 'localhost':
				$mailPaht = '{localhost:993/imap/ssl/novalidate-cert}';
			default:
				// todo: Cannot Find the URL of the same, kindly tell us the url
				break;
		}
	}

	function getAllFolders(string $imap){
		$mailPath =  getMailPath($mailId);
		$folders = imap_list($imap, $mailPath, '*');
		return $folders;
	}
?>