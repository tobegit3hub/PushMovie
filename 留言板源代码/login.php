<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="css/login.css" />
<script src="js/jquery-1.4.4.min.js" type="text/javascript"></script>
<title>登陆页面</title>
<script type="text/javascript" src="js/login.js"></script>
</head>

<body>
   <div id="lo_title">
     <img src="images/login_title.gif" />
   </div>
   <div id="login">
     <form action="login_do.php" method="post" name="form1" onsubmit="return check_login(this);">
        <table>
          <tr>
            <td>
              <label for="username">用户名称：</label>
              <input type="text" name="username" id="username" />
            </td>
          </tr>
          <tr>
            <td>
              <label for="pass">用户密码：</label>
              <input type="password" name="pass" id="pass" />
            </td>
          </tr>
          <tr>
            <td>
              <input type="submit" class="submit" value="登陆"/>
              <a class="register" href="register.php">注册</a>
              <a class="fopass" href="">忘记密码</a>
            </td>
          </tr>
        </table>
     </form>
   </div>
</body>
</html>