<?php
	session_start();
	
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
    <style type="text/css">
	img{
		border:1px solid #FFF;
	}
	#left_1{
		position:absolute;
		width:330px;
		color:#CCC;
		font-weight:bold;
		text-align:center;
	}
	#right_1{
		position:absolute;
		margin-left:420px;
		width:330px;
		color:#CCC;
		font-weight:bold;
		text-align:center;
	}
	#none_left{
		display:none;
	}
	#none_right{
		display:none;
	}
	</style>
</head>

<body> 

	<?php
		
		if (isset($_COOKIE['chooseCount']) && $_COOKIE['chooseCount']>=5){
			//Header("Location: ./recommend.php"); 
		}
		if (isset($_COOKIE['chooseCount']) )  setcookie("chooseCount", $_COOKIE['chooseCount']+1);
		
	
		//随机选2条数据
		$sql = 'SELECT * FROM movie ORDER BY rand() LIMIT 0,2';
		$result = $db->query($sql);
		$num_results = $result->num_rows;
		
		for($i=0; $i<$num_results; ++$i){
			$row = $result->fetch_assoc();			
			if($i == 1){
				setcookie("choose_left",$row['_id']);
				$firstMovie['_id'] = $row['_id'];
				$firstMovie['name'] = $row['name'];
				$firstMovie['director'] = $row['director'];
				$firstMovie['male_actor'] = $row['male_actor'];
				$firstMovie['female_actor'] = $row['female_actor'];
				$firstMovie['type'] = $row['type'];
				$firstMovie['location'] = $row['location'];
				$firstMovie['language'] = $row['language'];
				$firstMovie['year'] = $row['year'];
				$firstMovie['rate'] = $row['rate'];
				$firstMovie['image'] = $row['image'];
			}else{
				setcookie("choose_right",$row['_id']);
				$secondMovie['_id'] = $row['_id'];
				$secondMovie['name'] = $row['name'];
				$secondMovie['director'] = $row['director'];
				$secondMovie['male_actor'] = $row['male_actor'];
				$secondMovie['female_actor'] = $row['female_actor'];
				$secondMovie['type'] = $row['type'];
				$secondMovie['location'] = $row['location'];
				$secondMovie['language'] = $row['language'];
				$secondMovie['year'] = $row['year'];
				$secondMovie['rate'] = $row['rate'];
				$secondMovie['image'] = $row['image'];
			}
		}
		echo "<div id='left_1'>";
		echo "<br/>"."<image src='".$firstMovie["image"]."' width='150' height='200'/>";
		echo "<br/>电影名 : ".$firstMovie['name'];
		echo "<br/>导演 : ".$firstMovie['director'];
		echo "<br/>男主角 : ".$firstMovie['male_actor'];
		echo "<br/>女主角 : ".$firstMovie['female_actor'];
		echo "<br/>类型 : ".typeToString($firstMovie['type']);
		echo "<br/>地区 : ".locationToString($firstMovie['location']);
		echo "<br/>语言 : ".languageToString($firstMovie['language']);
		echo "<br/>年份 : ".$firstMovie['year'];
		echo "<br/>豆瓣评分 : ".$firstMovie['rate'];
		echo "</div>";
		
		echo "<div id='right_1'>";
		echo "<br/>"."<image src='".$secondMovie["image"]."' width='150' height='200'/>";
		echo "<br/>电影名 : ".$secondMovie['name'];
		echo "<br/>导演 : ".$secondMovie['director'];
		echo "<br/>男主角 : ".$secondMovie['male_actor'];
		echo "<br/>女主角 : ".$secondMovie['female_actor'];
		echo "<br/>类型 : ".typeToString($secondMovie['type']);
		echo "<br/>地区 : ".locationToString($secondMovie['location']);
		echo "<br/>语言 : ".languageToString($secondMovie['language']);
		echo "<br/>年份 : ".$secondMovie['year'];
		echo "<br/>豆瓣评分 : ".$secondMovie['rate'];
		echo "</div>";
		
		$result->free();
		$db->close();

	?>
	

	<div id="none_left"><?php echo $firstMovie['_id'];?>></div>
    <div id="none_right"><?php echo $secondMovie['_id'];?></div>
	<!--<form action="./execute_choose.php" method="POST">
		<input type="hidden" name="movie_id" value=<?php //echo $firstMovie['_id'];?>>
		<input type="submit" value="前一个">
	</form>
	<form action="<?php //echo $_SERVER['PHP_SELF']; ?>" method="POST"> 
		<input type="submit" value="都不喜欢"> 
	</form> 
		<form action="./execute_choose.php" method="POST">
		<input type="hidden" name="movie_id" value=<?php //echo $secondMovie['_id'];?>>
		<input type="submit" value="后一个">
	</form>-->
	<!--left<?php //echo $_COOKIE['choose_left']?>  
    <br/>  
    right<?php //echo $_COOKIE['choose_right']?> -->
	<!--<br/>选择了<?php //echo $_COOKIE['chooseCount']?>次了
	<br/><a href="./recommend.php">马上推荐></a>-->

</body>
</html>