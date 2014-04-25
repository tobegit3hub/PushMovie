<?php
//引入数据库链接文件
include "conn/connect.php";
//接收相关信息
$username1 = trim($_POST['username']);
$password1 = trim($_POST['password']);
$repass1 = trim($_POST['repass']);
$email1 = trim($_POST['email']);
$checkCode1 = trim($_POST['validatorCode']);

//判断用户名函数
function check_username($username){
$Max_strLen_userName = 16;//用户名最大长度
$Min_strLen_userName = 4;//用户名最小长度
$userNameChars = "/^\\w+$/";//字符串检测的正则表达式
$userNameGood = "用户名检测正确";//定义返回的字符串变量

  if($username == ""){
	  $userNameGood = "用户名不能为空！";
	  return $userNameGood;
  }
  
  if(strlen($username) < $Min_strLen_userName || strlen($username) > $Max_strLen_userName){
	  $userNameGood = "用户名长度检测不正确！";
	  return $userNameGood;
  }
  
  if(!preg_match($userNameChars,$username)){
	  $userNameGood = "用户名格式不正确！";
	  return $userNameGood;	
  }
return $userNameGood;	
}

//判断密码函数
function check_password($password){
$Max_strLen_password = 16;//密码最大长度
$Min_strLen_password = 6;//密码最小长度
$passwordChars = "/^[a-z]+$/";//密码字符串检测正则表达式
$passwordGood = "密码检测正确";//定义返回的字符产变量

  if($password == ""){
	  $passwordGood = "密码不能为空！";
	  return $passwordGood;
  }
  
  if(strlen($password) < $Min_strLen_password || strlen($password) > $Max_strLen_password){
	  $passwordGood = "密码长度检测不正确！";
	  return $passwordGood;
  }
  
  if(!preg_match($passwordChars,$password)){
	  $passwordGood = "密码格式不正确！";
	  return $passwordGood;
  }
return $passwordGood;
}

//判断邮箱函数
function check_email($email){
$emialChars = "/^\\w+((-\\w+)|(\\.\\w+))*\\@[A-Za-z0-9]+((\\.|-)[A-Za-z0-9]+)*\\.[A-Za-z0-9]+$/";//正则表达式判断邮箱地址是否合法
$emialGood = "邮箱地址检测正确";

  if($email == ""){
	  $emialGood = "邮箱地址不能为空！";
	  return $emialGood;
  }	
  
  if(!preg_match($emialChars,$emial)){
	  $emailGood = "邮箱格式不正确！";
	  return $emialGood;
  }
return $emialGood;
}

//判断验证码函数
function check_checkCode($checkCode){
$checkGood = "验证码输入正确";
   if(strtoupper($_SESSION[code]) != strtoupper($checkCode)){
	   $checkGood = "验证码输入有误！";
	   return $checkGood;
   }
return $checkGood;	
}

//判断两次输入密码是否一致
function check_confirmPassword($password,$repass){
$confirmPasswordGood = "两次密码输入一致";
  if($password <> $repass){
	  $confirmPasswordGood = "两次密码输入不一致！";
	  return $confirmPasswordGood;
  }
return $confirmPasswordGood;
}

//调用函数，检测用户输入数据
$usernameGood = check_username($username1);
$passwordGood = check_password($password1);
$emailGood = check_email($email1);
$checkGood = check_checkCode($checkCode1);
$confirmPasswordGood = check_confirmPassword($password1,$repass1);
$error = false;//定义变量判断注册数据是否出现错误
  if($usernameGood != "用户名检测正确"){
	  $error = true;//改变error的值表示出现了错误
	  echo "<script type='text/javascript'>alert('{$usernameGood}');history.back();</script>";
  }
  
  if($passwordGood != "密码检测正确"){
	  $error = true;
	  echo "<script type='text/javascript'>alert('{$passwordGood}');history.back();</script>"; 
  }
  
  if($emailGood != "邮箱地址检测正确"){
	  $error = true;
      echo "<script type='text/javascript'>alert('{$emailGood}');history.back();</script>";
  }
  
  if($checkGood != "验证码输入正确"){
	  $error = true;
      echo "<script type='text/javascript'>alert('{$checkGood}');history.back();</script>";	  
  }
  
  if($confirmPasswordGood != "两次密码输入一致"){
	  $error = true;
	  echo "<script type='text/javascript'>alert('{$confirmPasswordGood}');history.back();</script>";
  }
  
//判断数据库中用户名和邮箱地址是否已经存在
$q = $db->select("user","where username='$username1' or email='$email1'");
while(@$rows = $db->fetch_array($q)){
	if($rows['username'] == $username1){
		$error = true;
		echo "<script type='text/javascript'>alert('用户名已被注册！请重新填写。');history.back();</script>";
	}
	
	if($rows['email'] == $email1){
		$error = true;
		echo "<script type='text/javascript'>alert('邮箱地址已被注册！请重新填写。');history.back();</script>";
	}
}

//如果数据都合法，就将数据写入数据库
if($error == false){
	$addtime = date("Y-m-d H:i");
	$password2 = md5($password1);
	$query = $db->insert("user","username,password,email,time","'$username1','$password2','$email1','$addtime'");
	    if($query){
		    $_SESSION['name'] = $username1;
		    header("location:skip/skip_register_good.php");
	    }
}
?>