<?php 

	include("./common/database_util.php");
	include("./common/connect.php");

	setcookie("chooseCount", 0);
	setcookie("pushCount", 0);
	
	$sql = 'DELETE FROM choose_movie'; // 清空数据表
	$result = $db->query($sql);
	
// 	$ip = $_SERVER["REMOTE_ADDR"]; // 用ip创建新表
// 	echo ip;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link type="text/css" rel="stylesheet" href="./css/style.css" />
	<script type="text/javascript"></script>
	<title>推电影</title>
</head>

<body>

	<h1>推电影</h1>
	<h3>检测您的电影基因，给你最贴心的电影推荐...</h6>
	
	<br/><br/><a href="./choose.php">马上体验</a>
	<br/><a href="./show_database.php">访问数据库</a>

</body>
</html>