<?php

	include("./common/connect.php");


	function languageToString($language){		

//		$sql = "SELECT * FROM language WHERE _id=1";
// 		$result = $db->query($sql);
// 		$row = $result->fetch_assoc();
// 		$result->free();
//		return $row[value];

		if($language==1){
			return "普通话";
		}else if($language==2){
			return "英语";
		}else if($language==3){
			return "粤语";
		}else if($language==5){
			return "泰语";
		}else if($language==6){
			return "印度语";
		}
	}
	
	function locationToString($location){
		if($location==1){
			return "大陆";
		}else if($location==2){
			return "美国";
		}else if($location==3){
			return "香港";
		}else if($location==4){
			return "台湾";
		}else if($location==5){
			return "泰国";
		}else if($location==6){
			return "印度";
		}
	}
	
	function typeToString($type){
		if($type==0){
			return "未归类";
		}else if($type==1){
			return "动作";
		}else if($type==2){
			return "爱情";
		}else if($type==3){
			return "爱情，动作";
		}else if($type==4){
			return "喜剧";
		}else if($type==5){
			return "喜剧，动作";
		}else if($type==6){
			return "喜剧，爱情";
		}else if($type==7){
			return "喜剧，爱情，动作";
		}
	}
	
?>