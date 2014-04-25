<?php

	include("./common/connect.php");
	include("./common/database_util.php");
	
?>
	
	
	
	<form action="./show_database.php" method="POST">
		<select name="location">
			<option value=1>大陆</option>
			<option value=2>美国</option>
			<option value=3>香港</option>
		</select>
		<select name="language">
			<option value=1>普通话</option>
			<option value=2>英语</option>
			<option value=3>粤语</option>
		</select>	
		<input type="checkbox" name="type[]" value=4>喜剧&nbsp;
		<input type="checkbox" name="type[]" value=2>爱情&nbsp;
		<input type="checkbox" name="type[]" value=1>动作&nbsp;
		豆瓣评分<select name="rate">
			<option value=6.0>6.0</option>
			<option value=7.5>7.5</option>
			<option value=9.0>9.0</option>
		</select>以上
		<input type="submit" name="query" value="查询">
	</form>
	<form action="./show_database.php" method="POST">
		<input type="submit" name="show_all" value="显示全部">
	</form>
	<br/><br/>
	

	<?php
	
		$sql = 'SELECT * FROM movie';
	 
		if(isset($_POST['query']) ){
			foreach($_POST['type'] as $typeValue){
				$type += $typeValue;
			}
			$sql = "SELECT * FROM movie WHERE type=$type AND location=$_POST[location] AND language=$_POST[language] AND rate>$_POST[rate]";
		}else if(isset($_POST['show_all'] ) ){
			$sql = 'SELECT * FROM movie';
		}


		$result = $db->query($sql);
		$num_results = $result->num_rows;
	
		echo "<table border='1'>
				<tr>
					<th>电影名</th>
					<th>导演</th>
					<th>男主角</th>
					<th>女主角</th>
					<th>类型</th>
					<th>地区</th>
					<th>语言</th>
					<th>豆瓣评分</th>
				</tr>";
		
		for($i=0; $i<$num_results; ++$i){
			$row = $result->fetch_assoc();
			echo "<tr>";
			echo "<td>".$row['name']."</td>";
			echo "<td>".$row['director']."</td>";
			echo "<td>".$row['male_actor']."</td>";
			echo "<td>".$row['female_actor']."</td>";
			echo "<td>".typeToString($row['type'])."</td>";
			echo "<td>".locationToString($row['location'])."</td>";
			echo "<td>".languageToString($row['language'])."</td>";
			echo "<td>".$row['rate']."</td>";
			echo '<tr/>';
		}
		
		echo "</table>";
	
		$result->free();
		$db->close();
	

	?>	

