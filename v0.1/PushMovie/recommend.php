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

	<h1>Time to recommend...</h1>
	
	<?php

	$sql = 'SELECT * FROM movie_table';
	$result = $db->query($sql);
	
	$row = $result->fetch_assoc();
	
	echo "<br/>"."<image src='".$row["image"]."' width='300' height='400'/>";
	echo "<br/>"."name: ".$row["name"];
	echo "<br/>"."director: ".$row["director"];
	echo "<br/>"."male_actor: ".$row["male_actor"];
	echo "<br/>"."female_actor: ".$row["female_actor"];
	echo "<br/>"."location: ".$row["location"];
	echo "<br/>"."language: ".$row["language"];
	echo "<br/>"."rate: ".$row["rate"];
	

	
	
	$result->free();
	$db->close();

	?>
	
	<br/><br/><a href="./index.php">Good</a>
	&nbsp;&nbsp;<a href="./index.php">Agagin</a>
	&nbsp;&nbsp;<a href="./index.php">Bad</a>


</body>
</html>