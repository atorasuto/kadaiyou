<?php
 
function db_connect(){
	//データベース接続
	$server = "sv5.php.xdomain.ne.jp";  
	$userName = "acrovision_002"; 
	$password = "AcroXpass2021"; 
	$dbName = "acrovision_002";
 
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
