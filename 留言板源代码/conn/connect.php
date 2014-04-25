<?php
//引入配置文件
include "config.php";

//引入数据库操作类
include WEB."include/class/mysql_db_class.php";

//实例化数据库操作类
$db = new mysql("localhost","root","yu","web_star","conn","UTF8");

//设定时区
date_default_timezone_set('PRC');

//设定输出编码格式、
header('Content-Type:text/html;charset:utf-8');

//开启session
session_start();