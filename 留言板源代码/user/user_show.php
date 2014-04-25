<?php
include "../conn/connect.php";
include WEB."include/class/page.class.php";

//删除留言
if($_GET['web'] == "del"){
	$id = $_GET['id'];
	$re = $db->delete('web_star',"id='$id'");
	//删除成功后页面跳转刷新
	if($re){
		echo "<meta http-equiv=refresh content='0; url=user.php'>";
	}
}
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
      include WEB."include/subpage/top.php";
      ?>
   </div>
   <div id="content">
     <div id="left">
	 <?php
      include WEB."include/subpage/left.php";
     ?>
     </div>
     <div id="right">
         <div class="show">
           <?php
		   $id = $_GET['id'];
		   $query = $db->select('web_star',"where id='$id'");
		   while($row = $db->fetch_array($query)){
		   ?>
            <h2><?php echo $row['title'] ?></h2>
            <div class="show_article">
             <div class="show_article_con">
              <?php
			    echo $row['content'];
				?>
              </div>
             <div class="show_article_show">
                <a href="user_show.php?web=del&id=<?php echo $row['id'] ?>">删除</a>
             </div>
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