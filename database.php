<?php
$mysql_server_name="myeeb542.c2e3gz3tqbsa.us-west-1.rds.amazonaws.com:3306" ;
$mysql_username="myeeb542"; 
$mysql_password="myeeb542";
$mysql_database="myeeb542";

$con = mysql_connect($mysql_server_name,$mysql_username,$mysql_password); // connect to database
   
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
 echo "success";
 echo "<br />";
 
if (mysql_query("CREATE DATABASE my_rds ",$con))
  {
  echo "Database created";
  echo "<br />";
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


 
$fn = "Peter";
$ln = "Green";
$age =3;
$query = "INSERT INTO Persons "."(FirstName,LastName, Age) ". "VALUES "."('$fn','$ln','$age')";
mysql_select_db('my_rds');
$retval = mysql_query( $query, $con);
/*if(!$retval )
{
  die('Could not enter data: ' . mysql_error());
}
echo "Entered data successfully";
*/
 
mysql_select_db("my_rds", $con);
$qu= "SELECT * FROM Persons where FirstName ='Peter' and LastName ='Green'";
$result= mysql_query($qu, $con);
while($row = mysql_fetch_array($result))
  {
  echo $row['Age'];
  echo "<br />";
 
 }
 
 
 
 
 
 

?>
