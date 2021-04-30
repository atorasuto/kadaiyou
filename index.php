<?php
 
	header("Content-type: text/html; charset=utf-8");
 
	//データベース接続
	$server = "sv5.php.xdomain.ne.jp";  
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
	
$sql = "SELECT * FROM user";
 
$result = $mysqli -> query($sql);
 
//クエリー失敗
if(!$result) {
	echo $mysqli->error;
	exit();
}
 
//レコード件数
$row_count = $result->num_rows;
 
//連想配列で取得
while($row = $result->fetch_array(MYSQLI_ASSOC)){
	$rows[] = $row;
}
 
//結果セットを解放
$result->free();
 
// データベース切断
$mysqli->close();
 
?>
 
<!DOCTYPE html>
<html>
<head>
<title>管理画面</title>
<meta charset="utf-8">
</head>
<body>
<h1>管理画面</h1> 
 
情報件数：<?php echo $row_count; ?>件
 
<table border='1'>
<tr><th>id</th><th>氏名</th><th>性別</th><th>生年月日</th><th>地域</th></tr>
 
<?php 
foreach($rows as $row){
?> 
	<tr> 
		<td><?php echo $row['id']; ?></td> 
		<td><?php echo htmlspecialchars($row['name'],ENT_QUOTES,'UTF-8'); ?></td> 
		<td><?php echo htmlspecialchars($row['gender'],ENT_QUOTES,'UTF-8'); ?></td> 
		<td><?php echo htmlspecialchars($row['date'],ENT_QUOTES,'UTF-8'); ?></td> 
		<td><?php echo htmlspecialchars($row['pref'],ENT_QUOTES,'UTF-8'); ?></td> 
		<td>
			<form action="edit.php" method="post">
			<input type="submit" value="変更する">
			<input type="hidden" name="id" value="<?=$row['id']?>">
			</form>
		</td>
		<td>
			<form action="delete.php" method="post">
			<input type="submit" value="削除する">
			<input type="hidden" name="id" value="<?=$row['id']?>">
			</form>
		</td>
	</tr> 
<?php 
} 
?>
 
</table><br>
 <a href='addform.html'>ユーザ登録画面へ</a>
</body>
</html>
