<?php
 
header("Content-type: text/html; charset=utf-8");
 
require_once("db_connect.php");
$mysqli = db_connect();
 
if(empty($_POST)) {
	echo "<a href='index.php'>管理画面へ</a>";
	exit();
}else{
		//プリペアドステートメント
		$stmt = $mysqli->prepare("UPDATE user SET name=?, gender=?, date=?, pref=?  WHERE id=?");
		if ($stmt) {
			//プレースホルダへ実際の値を設定する
			$stmt->bind_param('ssssi', $name,$gender,$date,$pref,$id);
			$name = $_POST['name'];
			$gender = $_POST['gender'];
			$date = $_POST['date'];
			$pref = $_POST['pref'];
			$id = $_POST['id'];
			
			//クエリ実行
			$stmt->execute();
			//ステートメント切断
			$stmt->close();
		}else{
			echo $mysqli->errno . $mysqli->error;
		}
	}
 
// データベース切断
$mysqli->close();
		
?>
 
<!DOCTYPE html>
<html>
<head>
<title>変更完了画面</title>
</head>
<body>
<h1>変更完了画面</h1> 
 

<p>変更完了しました。</p><br><br>
<a href=index.php>管理画面へ</a>

</body>
</html>