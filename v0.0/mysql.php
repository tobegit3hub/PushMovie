<html>
<head>
	<title>Book</title>
</head>

<body>
	<h1>Book of MySQL</h1>

	<?php
		echo 'php go ~~~~~';
		
		@ $db = new mysqli('127.0.0.1', 'root', '561801src', 'push_movie_db');
		mysqli_query($db, "SET NAMES 'UTF8'");
		
		if(mysqli_connect_error()){
			echo 'Error';
			exit();
		}

		$sql = 'SELECT * FROM movie_table';
		$result = $db->query($sql);
		$num_results = $result->num_rows;
		echo '<p>Number found:'.$result->num_rows.'</p>';

		
		for($i=0; $i<$num_results; $i++){
			$row = $result->fetch_assoc();
			echo htmlspecialchars(stripslashes($row['name']));
			echo $row['rate'];
			echo '<br/>';
		}

		$result->free();
		$db->close();


		echo 'close mysql';
	?>

</body>
</html>
