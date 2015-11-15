<?php
$mysql_server_name='yeeb542.c2e3gz3tqbsa.us-west-1.rds.amazonaws.com' //mysql数据库服务器
$mysql_username='myeeb542'; //mysql数据库用户名 
$mysql_password='myeeb542'; //mysql数据库密码   
$mysql_database='myeeb542'; //mysql数据库名 
$con = mysql_connect($mysql_server_name,$mysql_username,$mysql_password); // connect to database
echo "sucess";
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
?>
