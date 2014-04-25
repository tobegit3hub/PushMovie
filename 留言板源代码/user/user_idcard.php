<?php
session_start();
include "../conn/connect.php";
include "../include/class/page.class.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="../css/user.css" />
<title>用户空间</title>
</head>

<body>
<div id="wrap">
   <div id="header">
	 <?php
      include "../include/subpage/top.php";
      ?>
   </div>
   <div id="content">
     <div id="left">
	 <?php
      include "../include/subpage/left.php";
     ?>
     </div>
     <div id="right">
       <div class="idcard">
         <?php 
		   $query = $db->select('user',"where username='$_SESSION[name]'");
		   while($rows = $db->fetch_array($query)){
	     ?>
         <h3><?php echo $rows['username'] ?>的个人资料</h3>
         <div class="idcard_con">
		                 身&nbsp;&nbsp;&nbsp;&nbsp;份：<?php echo $rows['username'] ?><br /><br /><br />
		                 官&nbsp;&nbsp;&nbsp;&nbsp;职：<?php echo $rows['grade'] ?><br /><br /><br />
		                 贡&nbsp;&nbsp;&nbsp;&nbsp;献：<?php echo $rows['point'] ?><br /><br /><br />
		                 声&nbsp;&nbsp;&nbsp;&nbsp;望：<?php echo $rows['popularity'] ?><br /><br /><br />
		                 联系邮箱：<?php echo $rows['email'] ?><br /><br /><br />
         </div>
         <?php
		   }
		   ?>
       </div>
     </div>
   </div>
   <div id="footer">
	  <?php
       include "../include/subpage/bottom.php";
      ?>
   </div>
</div>
</body>
</html>