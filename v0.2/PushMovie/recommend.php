<?php
	include("./common/database_util.php");
	
	include("./common/connect.php");
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
	
	<?php
	
	$result = $db->query("SELECT type FROM choose_movie GROUP BY type ORDER BY count(type) DESC LIMIT 0,1");
	$row = $result->fetch_assoc();
	$type = $row['type'];
	
	$result = $db->query("SELECT location FROM choose_movie GROUP BY location ORDER BY count(location) DESC LIMIT 0,1");
	$row = $result->fetch_assoc();
	$location = $row['location'];
	
	$result = $db->query("SELECT language FROM choose_movie GROUP BY language ORDER BY count(language) DESC LIMIT 0,1");
	$row = $result->fetch_assoc();
	$language = $row['language'];


	$sql = "SELECT * FROM movie WHERE type=$type AND location=$location AND language=$language ORDER BY rate DESC LIMIT $_COOKIE[pushCount],1";
	$result = $db->query($sql);
	$row = $result->fetch_assoc();
	
	$resultAll = $db->query("SELECT * FROM movie WHERE type=$type AND location=$location AND language=$language");
	if($resultAll->num_rows > $_COOKIE['pushCount']+1){
		setcookie("pushCount", $_COOKIE['pushCount']+1);
	}
	
	echo "我们精心为您推荐的电影是&nbsp;<b>".$row['name']."</b>";
	
	echo "<br/>"."<image src='".$row["image"]."' width='300' height='400'/>";
	echo "<br/>"."导演： ".$row["director"];
	echo "<br/>"."男主角： : ".$row["male_actor"];
	echo "<br/>"."女主角： ".$row["female_actor"];
	echo "<br/>"."类型： ".typeToString($row['type']);
	echo "<br/>"."地区： ".locationToString($row["location"]);
	echo "<br/>"."语言： ".languageToString($row["language"]);
	echo "<br/>"."豆瓣评分： ".$row["rate"];
	

	
	
	$result->free();
	$db->close();

	?>
	
	
	<form action="./execute_rank.php" method="POST">
		<input type="hidden" name="useful" value=1>
		<input type="submit" value="有用">
	</form>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"> 
		<input type="submit" value="重新推荐"> 
	</form> 
		<form action="./execute_rank.php" method="POST">
		<input type="hidden" name="useful" value=0>
		<input type="submit" value="没用">
	</form>


</body>
</html>