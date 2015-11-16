<?php
//$mysql_server_name="myeeb542.c2e3gz3tqbsa.us-west-1.rds.amazonaws.com" //mysql数据库服务器
//$mysql_username="myeeb542"; //mysql数据库用户名 
//$mysql_password="myeeb542"; //mysql数据库密码   
//$mysql_database="myeeb542"; //mysql数据库名 
$con = mysqli_connect($_SERVER['myeeb542.c2e3gz3tqbsa.us-west-1.rds.amazonaws.com'], $_SERVER['myeeb542'], $_SERVER['myeeb542'], $_SERVER['myeeb542'], $_SERVER['3306']);						


// Check connection
if (mysqli_connect_errno($con))
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
  
echo "sucess";
 
?>
