<?php
	include("./common/connect.php");

	$isUseful = $_POST[useful];
	
	
	$querySql = "UPDATE rank SET count = count+1 WHERE useful=$isUseful";
	$db->query($querySql);


	$db->close();
	
	
	Header("Location: ./index.php");

?>
