<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="css/register.css" />
<script src="js/jquery-1.4.4.min.js" type="text/javascript"></script>
<link type="text/css" rel="stylesheet" href="css/validator.css"></link>
<script src="js/formValidator-4.0.1.js" type="text/javascript" charset="UTF-8"></script>
<script src="js/formValidatorRegex.js" type="text/javascript" charset="UTF-8"></script>
<title>用户注册</title>
<script type="text/javascript">
$(document).ready(function(){
	$.formValidator.initConfig({formID:"form1",onError:function(){alert("校验没有通过，具体错误请看错误提示")}});
	$("#username").formValidator({onShow:"请输入您的用户名",onfocus:"配由数字、26个英文字母或者下划线组成的字符串",onCorrect:"输入正确"}).inputValidator({min:4,max:16,onError:"用户名不能为空"});
	$("#password").formValidator({onShow:"请输入密码",onFocus:"6到16个小写英文字符",onCorrect:"密码合法"}).inputValidator({min:6,max:16,empty:{leftEmpty:false,rightEmpty:false,emptyError:"密码两边不能有空符号"},onError:"密码必须为6到16个小写英文字符"}).regexValidator({regExp:"letter_l",dataType:"enum",onError:"您输入的密码格式有误！"});
	$("#repass").formValidator({onShow:"输再次输入密码",onFocus:"请再次输入密码",onCorrect:"密码一致"}).inputValidator({min:1,empty:{leftEmpty:false,rightEmpty:false,emptyError:"重复密码两边不能有空符号"},onError:"重复密码不能为空,请确认"}).compareValidator({desID:"password",operateor:"=",onError:"2次密码不一致,请确认"});
	$("#email").formValidator({onShow:"请输入您的电子邮箱地址",onFocus:"请输入正确的邮箱地址",onCorrect:"邮箱地址正确"}).regexValidator({regExp:"email",dataType:"enum",onError:"您输入的邮箱地址格式不正确"});
	$("#validatorCode").formValidator({onShow:"请输入图片中的字符",onFocus:"看不清可以点击图片换一张",onCorrect:"填写正确"}).inputValidator({min:4,max:4,onError:"验证码长度不正确！"});
})
</script>
</head>

<body>
<div id="re_title">
<img src="images/register_title.gif" />
</div>
<div id="re_form">
<form action="register_do.php" method="post" name="form1" id="form1">
    <table>
       <tr>
         <td>
           <label for="username">用户名称：</label>
           <input type="text" name="username" id="username" />
         </td>
         <td>
           <div id="usernameTip"></div>
         </td>
       </tr>
       <tr>
         <td>
           <label for="password">用户密码：</label>
           <input type="password" name="password" id="password" />
         </td>
         <td>
           <div id="passwordTip"></div>
         </td>
       </tr>
       <tr>
         <td>
           <label for="repass">确认密码：</label>
           <input type="password" name="repass" id="repass" />
         </td>
         <td>
           <div id="repassTip"></div>
         </td>
       </tr>
       <tr>
         <td>
           <label for="email">邮箱地址：</label>
           <input type="text" name="email" id="email" />
         </td>
         <td>
           <div id="emailTip"></div>
         </td>
       </tr>
         <td>
           <label for="validatorCode">&nbsp;&nbsp;验证码：</label>
           <input type="text" name="validatorCode" id="validatorCode" />
           <img class="va_img" src="code.php" onclick="this.src='code.php?'+Math.random()" />
         </td>
         <td>
           <div id="validatorCodeTip"></div>
         </td>
       <tr>
         <td>
           <input type="submit" id="submit" value="提交" />
           <input type="reset" id="reset" />
         </td>
       </tr>
    </table>
</form>
</div>
</body>
</html>
