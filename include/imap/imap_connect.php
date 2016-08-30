<?php
	// https://returnpath.com/partners/mailbox-providers/
	function imapConnect(string $mailId, string $uname, string $password, string $folder = NULL){
		
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
				$mailPath = '{imap.mail.yahoo.com:993/imap/ssl}';
				break;
			case 'aol':
				$mailPath = '{imap.aol.com:993/imap/ssl}';
				break;
			case 'localhost':
				$mailPath = '{127.0.0.1:143}';
				break;
			case 'comcast':
				$mailPath = '{imap.comcast.net:993/imap/ssl}';
				break;
			case 'fastmail':
				$mailPath = '{imap.fastmail.com:993/imap/ssl}';
				break;
			default:
				$mailPath = $mailId;
				// todo: Cannot Find the URL of the same, kindly tell us the url
				break;
		}
		return $mailPath;
	}

	/**
	 * [getAllFolders description]
	 * @param  [type] $imap   [Imap Connection to the SMTP Server]
	 * @param  [type] $mailId [mail id regarding the smtp servers]
	 * @return [Array]         [List of Folders]
	 */
	function getAllFolders($imap, $mailId){
		$mailPath =  getMailPath($mailId);
		$folders = imap_list($imap, $mailPath, '*');
		// print_r($folders);
		// foreach ($folders as $folder) {
		//     $folder = str_replace($mailPath, "", imap_utf7_decode($folder));
		//     echo '<li><a href="mail.php?folder=' . $folder . '&func=view">' . $folder . '</a></li>';
		// }
		// echo "</ul>";
		// return $folders;
	}
	
	// getAllFolders(imapConnect('localhost', 'anurag@anurag.com', 'anurag', 'INBOX'), 'localhost');
	


?>