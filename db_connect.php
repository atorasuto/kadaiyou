<?php
 
function db_connect(){
	//データベース接続
	$host = "sv5.php.xdomain.ne.jp";  
	$username = "acrovision_002"; 
	$passwd = "AcroXpass2021"; 
	$dbname = "acrovision_002";
 
	$mysqli = mysqli_connect($host,$username,$passwd,$dbname);
 
	if ($mysqli->connect_error){
		echo $mysqli->connect_error;
		exit();
	}else{
		$mysqli->set_charset("utf-8");
	}
	return $mysqli;
}
 
?>
