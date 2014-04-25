<?
//设定输出编码格式、
header('Content-Type:text/html;charset:utf-8');
include "conn/connect.php";
include "include/class/page.class.php";

//删除留言
if($_GET['web'] == "del"){
	$id = $_GET['id'];
	$rsdel = $db->delete("web_star","id='$id'");
	
	//删除成功后页面跳转刷新
	if($redel){
		echo "<meta http-equiv=refresh content='0; url = show.php'>";
	}
}

//送鲜花，扔鸡蛋
$id = $_GET['id'];//获取id
$qu = $db->select("web_star","where id='$id'");//查询该id相关资料
while($row = $db->fetch_array($qu)){
	$user = $row['username'];
}
if($_GET['comment'] == "good"){
	$q = $db->update("web_star","good=good+1","id='$id'");
	if($q){
		$db->update("user","popularity=popularity+1","username='$user'");
	}
 }
else if($_GET['comment'] == "bad"){
	$q = $db->update("web_star","bad=bad+1","id='$id'");
	if($q){
		$db->update("user","popularity=popularity-1","username='$user'");
	}
 }


//查询数据表，获得数据总条数
$sql = $db->select("web_star");
$total = $db->num_rows($sql);
$pagesize = 2;

$page = new page($total,$pagesize);
$result = $db->select("web_star","order by id desc {$page->limit}");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="./css/show.css" />
<title>查看留言</title>
</head>

<body>
<div id="logo">
   <?php
     if($_SESSION[name] != ""){
         echo "当前用户：<a href='user/user.php'>".$_SESSION[name]."</a>&nbsp;|&nbsp;<a href='logout.php'>退出</a>";
     }
     else {
         echo "<strong><a href='login.php'>登陆</a>&nbsp;|&nbsp;<a href='register.php'>注册</a></strong>";   
     }
   ?>
</div>
<div id="wrap">
      <h1>Wed Star</h1>
      <h6>留言列表 <span class="want_m"><a href="./index.php">我要留言</a></span></h6>
	  <?php
      if($result){
             while($rows = $db->fetch_array($result)){
      ?>
      <div class="message">
           <div class="user_con">
            <table cellpadding="0" cellspacing="0" border="0">
               <tr>
                  <td valign="middle" height="200">
                   身份：<?=$rows['username'] ?><br /><br />
                   <?php
				   $sql2 = $db->select("user","where username='$rows[username]'");
				   while($rows2 = $db->fetch_array($sql2)){
				   ?>
                   官职：<?=$rows2['grade'] ?><br /><br />
                   贡献：<?=$rows2['point'] ?><br /><br />
                   声望：<?=$rows2['popularity'] ?>
                   <?php
				   }
				   ?>
                  </td>
               </tr>
            </table>
           </div>
           <div class="message_con">
            <table cellpadding="0" cellspacing="0" border="0">
              <tr>
                 <td class="title"><?=$rows['title'] ?></td>
              </tr>
              <tr>
                 <td>
                   <table cellpadding="0" cellspacing="0" border="0">
                       <tr>
                          <td class="content"><?=$rows['content'] ?></td>
                       </tr>
                       <tr>
                          <td class="time">
                            <span class="date"><?=date("Y-m-d H:i:s",$rows['time']) ?></span>

                            <span class="good_comment"><a href="show.php?page=<?=$_GET[page] ?>&comment=good&id=<?=$rows['id'] ?>">送鲜花(+<?=$rows['good'] ?>)</a></span>
                            <span class="good_comment"><a href="show.php?page=<?=$_GET[page] ?>&comment=bad&id=<?=$rows['id'] ?>">扔鸡蛋(+<?=$rows['bad'] ?>)</a></span>
                            <?php
							if($_SESSION[name] == $rows[username] || $_SESSION[name] == $suppername){
							?>
                            <span class="del"><a href="?web=del&id=<?=$rows['id'] ?>">删除留言</a></span>
                            <?php
							}
                            ?>
                          </td>
                       </tr>
                   </table>
                 </td>
              </tr>
            </table>
          </div>
      </div>
	  <?php
          }
      }
      else 
      {
      echo '<script type="text/javascript">alert("您还未发表任何留言！");</script>';	
      }
      ?>

    <div id="page">
     <?php echo $page->fpage() ?>
    </div>
    <div id="footer">
        Copyright&nbsp;(C)&nbsp;2012-08-03&nbsp;&nbsp;<a href="http://www.web527.com">web我爱去</a>
    </div>
</div>
</body>
</html>