//The Document for login.php
//判断用户登录输入信息
 function check_login(form){
	  if(form.username.value == ""){
		alert("用户名不能为空！");
		form.username.select();
		return false;  
	  }
	  
	  if(form.pass.value == ""){
		alert("密码不能为空！");
		form.pass.select();
		return false; 
	  }
	  
	  return true;   
   }