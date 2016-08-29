<?php
/**
 * Created by PhpStorm.
 * User: raxor
 * Date: 7/13/2016
 * Time: 4:50 PM
 */

function checkVariableSetEmpty($var):bool{
	if(isset($var) && !empty($var)){
		return true;
		/*String will be done by htmlspecialchar in insert*/
	}
	return false;
}

function sanitize($var, string $type){
	if($type == 'int'){
		$var = filter_var($var, FILTER_SANITIZE_NUMBER_INT);
	}
	else if($type == 'string'){
		$var = filter_var($var, FILTER_SANITIZE_STRING);
	}
	else if($type == 'float'){
		$var = filter_var($var, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
	}
	else if($type == 'email'){
		$var = filter_var($var, FILTER_SANITIZE_EMAIL);
	}
	else if($type == 'url'){
		$var = filter_var($var, FILTER_SANITIZE_URL);
	}
	else if($type == 'date'){
		$var = preg_replace("(~^\d{2}/\d{2}/\d{4}$~)", "", $var);
	}
	return $var;
}