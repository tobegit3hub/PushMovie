<div class="logo_bg">
  <h1>
  <?php
    echo "<font color='#00FF33'>".$_SESSION['name']."</font>的个人空间";
  ?>
  </h1>
  <div class="logo">
   <?php
     if($_SESSION[name] != ""){
         echo "当前用户：<a href='user.php'>".$_SESSION[name]."</a>&nbsp;|&nbsp;<a href='../logout.php'>退出</a>";
     }
     else {
         echo "<strong><a href='../login.php'>登陆</a>&nbsp;|&nbsp;<a href='../register.php'>注册</a></strong>";   
     }
   ?>
</div>
</div>
<div class="blue">
<div id="slatenav">
<ul>
<li><a href="user.php" title="css menus" class="current">首页</a></li>
<li><a href="user_idcard.php" title="css menus">个人资料</a></li>
<li><a href="user_message.php" title="css menus">我的留言</a></li>
<?php
  if($_SESSION['name'] == $suppername){
	  echo '<li><a href="user_supper.php" title="css menus">管理留言</a></li>';
  }
?>
<li><a href="../index.php" title="css menus">去写留言</a></li>
<li><a href="../show.php" title="css menus">去看留言</a></li>
</ul>
</div>
</div>