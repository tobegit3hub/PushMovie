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
       <div class="message">
         <h1>留言列表</h1>
         <?php
          $sql = $db->select('web_star');
          $total = $db->num_rows($sql);
          $pagesize = 10;
          
          $page = new page($total,$pagesize);
         
          $result = $db->select('web_star',"order by id desc {$page->limit}");
          while($rows = $db->fetch_array($result)){
         ?>
         <ul>
           <li><a href="user_show.php?id=<?php echo $rows['id'] ?>"><?=$rows['title'] ?></a>&nbsp;&nbsp;<span class="date">作者：<?=$rows['username'] ?>&nbsp;&nbsp;时间：<?=date("Y-m-d H:i:s",$rows['time']) ?></span></li>
         </ul>
         <?php
		  }
		  ?>
       </div>
       <div class="page">
        <?php echo $page->fpage() ?>
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