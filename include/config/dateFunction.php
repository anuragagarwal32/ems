<?php
/**
 * Created by PhpStorm.
 * User: raxor
 * Date: 7/9/2016
 * Time: 6:26 PM
 */

function getCurrentDateTime(){
	return date('y-m-d H:i:s');
}

function getIncrementDate($param){
	return date('y-m-d', strtotime($param));
}

function getIncrementDateTime($param){
	return date('y-m-d H:i:s', strtotime($param));
}

function getCurrentTimestamp(){
	$date = new DateTime();
	$date->format('y-m-d H:i:U');
	return $date->getTimestamp();
}

function getCurrentDate(){
	return date('y-m-d');
}

function getMySqlDate($date){
	return date('y-m-d', strtotime($date));
}

function getMySqlDateTime($date){
	return date('y-m-d H:i:U', strtotime($date));
}

function getMySqlIncrementDate($date, $param){
	$date = strtotime($param, strtotime($date));
	return date("y-m-d", $date);
}