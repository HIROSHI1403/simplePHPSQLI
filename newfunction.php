<?php
ini_set('display_errors', 'Off');

$rootURL='localhost';
$SQLADD='localhost';
$SQLUSER='root';
$SQLPASS='';
$SQL_DB_NAME='test01';

function NULLER($val){
	$val = NULL;
}
// オブジェクト型接続
function LOGIN_SQLI($SQL_add,$SQL_user,$SQL_pass,$SQL_dbname){
	if (!isset($SQL_add) or !isset($SQL_user) or !isset($SQL_pass)){
		global $rootURL,$SQLADD,$SQLUSER,$SQLPASS,$SQL_DB_NAME;
		
		$mysqli = new mysqli($SQLADD,$SQLUSER,$SQLPASS,$SQL_DB_NAME);
		if ($mysqli->connect_error){
			return NULL;
			exit();
		}else {
			return $mysqli;
		}
	}else {
		$mysqli = new mysqli($SQL_add,$SQL_user,$SQL_pass,$SQL_dbname);
		if ($mysqli->connect_error){
			return NULL;
			exit();
		}else {
			return $mysqli;
		}
	}
}

function RUN_SQLI_DEFAULTLOGIN($SQL_STR){
	if (!isset($SQL_STR)){
		return NULL;
	}
	global $rootURL,$SQLADD,$SQLUSER,$SQLPASS,$SQL_DB_NAME;
	$mysqli = LOGIN_SQLI();
	return $mysqli->query($SQL_STR);
}