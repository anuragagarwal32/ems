<?php
/**
 * Created by PhpStorm.
 * User: raxor
 * Date: 7/9/2016
 * Time: 9:54 AM
 */

namespace Security;

class GeneratePassword
{
	public static function generatePass(
		string $pass
	) : string{
		$options = array('cost'=> 12);
		$pass = password_hash($pass,PASSWORD_BCRYPT,$options);
		return $pass;
	}
}