<?php
	$mysql_server_name='myeeb542' //mysql数据库服务器
	$mysql_username='myeeb542'; //mysql数据库用户名 
	$mysql_password='myeeb542'; //mysql数据库密码   
	$mysql_database='myeeb542'; //mysql数据库名 
	$con = mysql_connect("myeeb542","myeeb542","myeeb542'); // connect to database
	echo "sucess";
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
?>
