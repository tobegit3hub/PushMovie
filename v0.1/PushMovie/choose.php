<?php
	session_start();
	
	include("./common/connect.php")
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link type="text/css" rel="stylesheet" href="./css/style.css" />
	<script type="text/javascript"></script>
	<title>Push Movie</title>
</head>

<body>
	<h1>Time To Choose...</h1>

	<?php
	
		//随机选2条数据
		$sql = 'SELECT * FROM movie_table ORDER BY rand() LIMIT 2';
		$result = $db->query($sql);
		$num_results = $result->num_rows;
		
		for($i=0; $i<$num_results; ++$i){
			$row = $result->fetch_assoc();

			echo "<br/>"."<image src='".$row["image"]."' width='150' height='200'/>";
		}
		
		
		$result->free();
		$db->close();

	?>
	
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"> 
		<input type="submit" name="submit" value="First One" onclick=""> 
		<input type="submit" name="submit" value="Nope"> 
		<input type="submit" name="submit" value="Second One" onclick=""> 
	</form> 
	
	<?php 
// 用不了，不知道为什么
// 		function chooseOne(){
// 			$insert_sql = "INSERT INTO favourite_table VALUES(NULL,'tobe',2,2,2)";
// 			$db->query($insert_sql);
// 		}		
// 		function chooseTwo(){
// 			echo "I choose two";
// 		}
	?>
	
	<br/><br/><a href="./recommend.php">Recommend</a>

</body>
</html>