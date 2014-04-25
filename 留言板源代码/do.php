<?php

//引入数据库链接文件
include "conn/connect.php";


//如果php设置的自动转义函数未开启，就转义这些值
if(!get_magic_quotes_gpc()){
	foreach($_POST as &$filter){
	  	$filter = addslashes($filter);
	}
}

//用户名判断
$name = (isset($_SESSION['name'])) ? $_SESSION['name'] : "平民";

//接收相关信息
$user = trim($name);
$title = trim($_POST['title']);
$content = trim($_POST['content']);
$time = time();

//判断用户名和内容是否存在
if(empty($content) && empty($title)){
	echo '<meta http-equiv="refresh" content="0 url=./skip_bad.php" />';	
}
//判断用户是否已登录
else if($user == "平民"){
	$query = $db->insert("web_star","username,title,content,time","'$user','$title','$content','$time'");

	if($query){
	    echo '<meta http-equiv="refresh" content="0 url=./skip_well.php" />';
	}
}
else{
	$result = $db->select("user","where username='$user'");
	$grades = array("太师","少师","太子少师","内阁学士","大理寺卿","光禄寺卿","大理寺少卿","国子监祭酒","光禄寺少卿","翰林院侍读","内阁侍读","光禄寺署正","国子监监丞","国子监博士","国子监学正","国子监典簿","钦天监监候","钦天监司晨","书生");
	while($row = $db->fetch_array($result)){
		$point = $row['point'];
		//判断用户积分，改变其等级
		switch($point){
			case $point > 10;
			$grade = $grades[17];
			break;
			case $point > 20;
			$grade = $grades[16];
			break;
			case $point > 30;
			$grade = $grades[15];
			break;
			case $point > 40;
			$grade = $grades[14];
			break; 
			case $point > 50;
			$grade = $grades[13];
			break;
			case $point > 60;
			$grade = $grades[12];
			break;
			case $point > 70;
			$grade = $grades[11];
			break; 
			case $point > 80;
			$grade = $grades[10];
			break;
			case $point > 90;
			$grade = $grades[9];
			break;
			case $point > 100;
			$grade = $grades[8];
			break;
			case $point > 110;
			$grade = $grades[7];
			break;
			case $point > 120;
			$grade = $grades[6];
			break;
			case $point > 130;
			$grade = $grades[5];
			break;
			case $point > 140;
			$grade = $grades[4];
			break;
			case $point > 150;
			$grade = $grades[3];
			break;
			case $point > 160;
			$grade = $grades[2];
			break;
			case $point > 170;
			$grade = $grades[1];
			break;
			case $point > 180;
			$grade = $grades[0];
			break;
		    default:
			$grade = $grades[18];
		}   
	}
	$q1 = $db->insert("web_star","username,title,content,time","'$user','$title','$content','$time'");
	$q2 = $db->update("user","point=point+1,grade='$grade'","username='$user'");

	if($q1 && $q2){
	    header("location:skip/skip_well.php");
	}
}

?>