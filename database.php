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
$query2 = "INSERT INTO Persons "."(FirstName,LastName, Age) ". "VALUES "."('Jim','Brown','78')";
$query3 = "INSERT INTO Persons "."(FirstName,LastName, Age) ". "VALUES "."('Neal','Black','89')";
$query4 = "INSERT INTO Persons "."(FirstName,LastName, Age) ". "VALUES "."('Alice','White','67')";
$query5 = "INSERT INTO Persons "."(FirstName,LastName, Age) ". "VALUES "."('Kim','Bin','23')";
$query6 = "INSERT INTO Persons "."(FirstName,LastName, Age) ". "VALUES "."('Join','Tou','12')";
mysql_select_db('my_rds');
$retval = mysql_query( $query, $con);
mysql_query( $query2, $con);
mysql_query( $query3, $con);
mysql_query( $query4, $con);
mysql_query( $query5, $con);
mysql_query( $query6, $con);
/*if(!$retval )
{
  die('Could not enter data: ' . mysql_error());
}
echo "Entered data successfully";
*/
 //select
mysql_select_db("my_rds", $con);
$qu= "SELECT * FROM Persons where FirstName ='$fn' and LastName ='$ln'";
$result= mysql_query($qu, $con);
while($row = mysql_fetch_array($result))
  {
  echo $row['Age'];
  echo "<br />";
 
 }
 //update
mysql_select_db("my_db", $con);
mysql_query("UPDATE Persons SET Age = '36'
WHERE FirstName = '$fn' AND LastName = '$ln'");
 
 
 
 
 
 
 

?>
