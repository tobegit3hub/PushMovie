<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/skip.css" />
<title>跳转页面</title>
</head>

<body>
      <div id="skip">
          <div id="link">
             <div class="con">恭喜！</div>
             <h1>留言发表成功啦！！！( ^_^ )</h1>
             <p>页面将在<font color="red">1</font>秒后跳转到留言展示页面......</p>
             <?php
             echo '<meta http-equiv="refresh" content="1; url=../show.php" />' ;
			 ?>
          </div>
      </div>
</body>
</html>