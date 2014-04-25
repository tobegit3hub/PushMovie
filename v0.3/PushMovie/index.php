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



	
	


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<link type="text/css" rel="stylesheet" href="./css/style.css" />
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/pmjs.js"></script>
<script type="text/javascript"></script>
<title>推电影</title>
</head>

<body>

<div id="content">

<div id="main_1">
    <div id="div_choose">
    <p>Your Option is：</p>
    <a href="#" id="choose_left">left one is better </a>
    <a href="#" id="choose_right">right one is better</a>
    <a href="#" id="choose_none">neither of it is my taste</a>
    <a href="#" id="push_me">Push me a movie!!</a>
    </div>
	<div id="title"><h2>推电影</h2><h5>检测您的电影基因，给你最贴心的电影推荐...</h5></div> 
    <div id="push_movie_font">Push Movie</div>
</div>

<div id="main_2">
	<div id="logo"></div>
</div>

<div id="main_3">
	<div id="push_result"></div>
	<!--<div id='push_result' style='position:absolute;filter:alpha(opacity=62);-moz-opacity:0.62;opacity: 0.62;background:#000;width:750px; height:500px; display:none;z-index:11'>
    
    </div> -->
	<div id="db">
    	<a id="db_a" href="#">Database enterance</a>
   		<div id="db_content"></div>
    </div> <!--./show_database.php--> 
    <div id="index_brief">movie message for you by pushing gene</div> 
</div>

<div id="main_4">  
	<div id="in_now"><a id="in_now_a" href="#">GO now</a></div><!--choose.php-->
</div>

<div id="main_5">
	<div>
	<div id="push_left"></div>  
    <div id="push_right"></div>
    </div>
</div>

<div id="main_6"></div>

</div>


</body>
</html>
