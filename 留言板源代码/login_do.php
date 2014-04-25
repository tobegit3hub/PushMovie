<?php
include "conn/connect.php";

$username = trim($_POST[username]);
$pass = md5(trim($_POST[pass]));

//判断用户名是否为空
if($username == ""){
	echo "<script type='text/javascript'>alert('用户名不能为空！');history.go(-1);</script>";
}

//判断密码是否为空
if($pass == ""){
	echo "<script type='text/javascript'>alert('密码不能为空！');history.go(-1);</script>";
}

//访问数据库
$query = $db->select('user',"where username='$username'");
	if($db->num_rows($query) == 0 ){
	    echo "<script type='text/javascript'>alert('该用户不存在！');history.go(-1);</script>";	
	}
	else{
		while($row = $db->fetch_array($query)){
		if($row['password'] != $pass){
			echo "<script type='text/javascript'>alert('密码输入错误！');history.go(-1);</script>";
		}
		else{
			$_SESSION['name'] = $username;
			header("location:skip/skip_login_good.php");	
		}
	}
}
?>