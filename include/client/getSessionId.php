<?php
	require_once '../config/config.php';
	function getSessionId(){
		return (isset($_SESSION[$sessionName]) ? $_SESSION[$sessionName] : 0);
	}
?>