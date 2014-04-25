<?php
	include("./common/connect.php");

	$movieId = $_POST[movie_id];
	
	
	$querySql = "SELECT * FROM movie WHERE _id=$_POST[movie_id]";
	$result = $db->query($querySql);
	$row = $result->fetch_assoc();
	
	$insertSql = "INSERT INTO choose_movie VALUES(NULL, '$row[name]', '$row[type]', '$row[location]', '$row[language]')";
	$db->query($insertSql);

	
	$result->free();
	$db->close();
	
	
	Header("Location: ./choose.php");

?>
