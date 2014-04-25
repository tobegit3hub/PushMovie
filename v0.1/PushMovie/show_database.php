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

	<h1>It's the database...</h1>
	

	<?php

		$sql = 'SELECT * FROM movie_table';
		$result = $db->query($sql);
		$num_results = $result->num_rows;
	
		echo "<table border='1'>
				<tr>
					<th>name</th>
					<th>director</th>
					<th>male_actor</th>
					<th>female_actor</th>
					<th>location</th>
					<th>language</th>
					<th>rate</th>
				</tr>";
		
		for($i=0; $i<$num_results; ++$i){
			$row = $result->fetch_assoc();
			echo "<tr>";
			echo "<td>".$row['name']."</td>";
			echo "<td>".$row['director']."</td>";
			echo "<td>".$row['male_actor']."</td>";
			echo "<td>".$row['female_actor']."</td>";
			echo "<td>".$row['location']."</td>";
			echo "<td>".$row['language']."</td>";
			echo "<td>".$row['rate']."</td>";
			echo '<tr/>';
		}
		
		echo "</table>";
	
		$result->free();
		$db->close();
	

	?>	
	
	<br/><br/><a href="./index.php">Back</a>

</body>
</html>