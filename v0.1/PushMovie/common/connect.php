<?php		
		include("./config.php");
		
		@ $db = new mysqli('127.0.0.1', 'root', '561801src', 'push_movie_db');
		mysqli_query($db, "SET NAMES 'UTF8'");
		
		
		if(mysqli_connect_error()){
			echo 'Error';
			exit();
		}
?>