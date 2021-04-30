<?php
 
header("Content-type: text/html; charset=utf-8");
 
//データベース接続
$server = "acrovision.php.xdomain.jp";  
$userName = "acrovision_002"; 
$password = "AcroXpass2021"; 
$dbName = "acrovision_002";
 
$mysqli = new mysqli($server, $userName, $password, $dbName);
 
if ($mysqli->connect_error){
	echo $mysqli->connect_error;
	exit();
}else{
	$mysqli->set_charset("utf-8");
}
 
if(empty($_POST)) {
	echo "<a href='addform.html'>入力フォーム</a>";
}else{
	//名前入力判定
	if (!isset($_POST['yourname'])  || $_POST['yourname'] === "" ){
		echo "名前が入力されていません。";
	}else{
		//プリペアドステートメント
		$stmt = $mysqli->prepare("INSERT INTO user (name,gender,date,pref) VALUES (?,?,?,?)");
		
		if($stmt){
			//プレースホルダへ実際の値を設定する
			$stmt->bind_param('ssss', $yourname,$gender,$date,$pref);
			$yourname = $_POST['yourname'];
			$gender = $_POST['gender'];
			$date = $_POST['date'];
			$pref = $_POST['pref'];
					
			if($stmt->execute()){
				echo htmlspecialchars($yourname, ENT_QUOTES, 'UTF-8')."さん<br>
				性別：$gender<br>
				生年月日：$date<br>
				地域：$pref で登録いたしました。<br><br>
				
				<a href=","index.php",">管理画面へ</a>";
			}else{
				echo $stmt->errno . $stmt->error;
			}
		
			//ステートメント切断
			$stmt->close();
		}else{
			echo $mysqli->errno . $mysqli->error;
		}
	}
}
 
// データベース切断
$mysqli->close();
 
?>

<!DOCTYPE html>
<html>
<head>
<title>登録完了画面</title>
<meta charset="utf-8">
</head>
</html>
