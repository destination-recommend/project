<?php
/*$mysql_server_name="myeeb542.c2e3gz3tqbsa.us-west-1.rds.amazonaws.com:3306" //mysql数据库服务器
$mysql_username="myeeb542"; //mysql数据库用户名 
$mysql_password="myeeb542"; //mysql数据库密码   
$mysql_database="myeeb542'; //mysql数据库名 
$con = mysql_connect($mysql_server_name,$mysql_username,$mysql_password); // connect to database
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
 */
$con = mysqli_connect('myeeb542.c2e3gz3tqbsa.us-west-1.rds.amazonaws.com', 'myeeb542', 'myeeb542', 'myeeb542', 3306);	
if (mysqli_connect_errno($con))
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
} 
 echo "sucess";
?>
