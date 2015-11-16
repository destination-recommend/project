<?php
$mysql_server_name="myeeb542.c2e3gz3tqbsa.us-west-1.rds.amazonaws.com:3306" ;
$mysql_username="myeeb542"; 
$mysql_password="myeeb542";
$mysql_database="myeeb542";

$con = mysql_connect($mysql_server_name,$mysql_username,$mysql_password); // connect to database
echo "connect\n";    
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  
/*$con = mysqli_connect('myeeb542.c2e3gz3tqbsa.us-west-1.rds.amazonaws.com', 'myeeb542', 'myeeb542', 'myeeb542', 3306);	
if (mysqli_connect_errno($con))
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 } 
 */
 echo "sucess";
 
if (mysql_query("CREATE DATABASE my_rds ",$con))
  {
  echo "Database created";
  }
else
  {
  echo "Error creating database: " . mysql_error();
  }

// Create table in database
mysql_select_db("my_rds", $con);
$sql = "CREATE TABLE Persons 
(
FirstName varchar(15),
LastName varchar(15),
Age int
)";
mysql_query($sql,$con);


 
/*mysql_select_db("myeeb542"，$con);
mysql_query("INSERT INTO information (FirstName,LastName,Age) 
VALUES ('Peter', 'Green', '3')");
 */
 
 
 
 
 
 
 
 
 
 

?>
