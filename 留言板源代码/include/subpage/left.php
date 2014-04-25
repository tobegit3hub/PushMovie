<div id="calendar">
<?php
include WEB."include/class/calendar.class.php";

$cal = new Calendar();
$cal -> display();
?>
</div>

<div id="new_words">
 <div class="words_title">
   <h5>最新留言</h5>
   <h6><a href="user_message.php">更多...</a></h6>
 </div>
 <?php
     $query = $db->select('web_star',"where username='$_SESSION[name]' limit 0,8");
     while($rows = $db->fetch_array($query)){
 ?>
 <ul>
   <li><a href="user_show.php?id=<?php echo $rows['id'] ?>">
    <?php
	 echo mb_substr($rows['title'],0,28,'utf-8');
	 if(strlen($rows['title'])>28){
	   echo "....";	 
	 }
	?>
   </a></li>
 </ul>
 <?php
   }
 ?>
</div>