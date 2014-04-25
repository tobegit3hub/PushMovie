<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="./css/style.css" />
<title>Web Star留言板v3.0正式版</title>
<script type="text/javascript" src="js/index.js"></script>
</head>
<body>
      <div id="login">
         <div class="lo">
	         <?php
			     if($_SESSION['name'] != ""){
				     echo "当前用户：<a href='user/user.php'>".$_SESSION['name']."</a>&nbsp;|&nbsp;<a href='logout.php'>退出</a>";
			     }
			     else {
				     echo "<strong><a href='login.php'>登陆</a>&nbsp;|&nbsp;<a href='register.php'>注册</a></strong>";   
			     }
			 ?>
          </div>
      </div>
      <div id="wrap">
         <form action="do.php" method="post" onsubmit="return checkInput(this);" >
             <table>
                <caption class="caption">Web Star</caption>
                <tr>
                     <td class="notice" colspan="2">发&nbsp;布&nbsp;留&nbsp;言</td>
                </tr>
                <tr>
                     <td><label for="title">标题：</label></td>
                     <td><input type="text" name="title" id="title" /></td>
                </tr>
                <tr>
                     <td><label for="content">内&nbsp;&nbsp;容：</label></td>
                     <td><textarea name="content" id="content"></textarea>&nbsp;</td>
                </tr>
                <tr>
                   <td colspan="2">
                       <input class="submit" type="submit" value="提交留言"  />
                       <input type="reset"  value="重置想法" name="reset" id="reset" />
                       <input class="see" type="button" value="查看留言" onclick="window.location.href='show.php'" />
                   </td>
               </tr>
             </table>
         </form>
         <div id="footer">
            <span>Copyright&nbsp;(C)&nbsp;2012-08-03&nbsp;&nbsp;<a href="http://www.web527.com">web我爱去</a></span>
         </div>
      </div>
</body>
</html>