<?php
 
function db_connect(){
	//データベース接続
	$server = "localhost";  
	$userName = "root"; 
	$password = ""; 
	$dbName = "kadai";
 
	$mysqli = new mysqli($server, $userName, $password,$dbName);
 
	if ($mysqli->connect_error){
		echo $mysqli->connect_error;
		exit();
	}else{
		$mysqli->set_charset("utf-8");
	}
	return $mysqli;
}
 
?>