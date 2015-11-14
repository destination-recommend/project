<?php
    $txt = $_GET['text'];
    
    $servername = "myEE542";
	$username = "EE542";
	$password = "1118";
	$dbname = "mydb";


	echo 'welecome to php';
   
//dbname = mydb; fields: place_id, place_name, visited
//	$conn = new mysqli($servername, $username, $password, $dbname);
//	if($conn->connect_error){
//		echo("Connect failed:" . $conn->connect_error);
//	}
	echo "Connected successfully";

//$Bdistance = $_POST['distance'];
//	$Bprice = $_POST['price'];
$Bdistance = 1;
$Bprice = 1;
	echo 'Bdistance'.$Bdistance;
	echo 'Bprice'.$Bprice;

class Place{
		function Place($name, $id, $rating, $distance, $hour, $price, $web, $visited){
			$this->name = $name;
			$this->id = $id;
			$this->rating = $rating;
			$this->distance = $distance;
			$this->hour = $hour;
			$this->price = $price;
			$this->web = $web;
			$this->visited = $visited;
			$this->op1 = 0.3 * $rate + 0.2 * $distance + 0.2 * $hour + 0.2 * $price +0.1 * $visited;
			$this->op2 = 0.3 * $rate + 0.3 * $distance + 0.3 * $hour + 0.1 * $visited;
			$this->op3 = 0.3 * $rate + 0.3 * $price + 0.3 * $hour + 0.1 * $visited;
			$this->op4 = 0.4 * $rate + 0.3 * $hour + 0.3 * $visited;
			$this->score = 0;

		}
	}

	echo 'place created\n';

$place_array = explode('^',$txt);

//echo $place_array[0]."<br>";
//	echo $place_array[1]."<br>";
	$arrlength = count($place_array);

//	echo $arrlength."<br>";

$places = array();

	$max_hour = 0;
	$min_hour = 1440;
	$max_visited = 1;

	for($i=0; $i<$arrlength; $i++){
		$fields = explode('|',$place_array[$i]);
		//function Place($name, $id, $rating, $price, $hour, $web)

		for ($j=0;$j<6;$j++){
			if(strcmp($fields[$j],'undefined')==0){
		if($j==4||$j==5){
			$fields[$j]=-1;
		} else{	
			$fields[$j]=0;
		}	
			}
		}

		$name = $fields[0];
		$id = $fields[1];
		$rating = $fields[2]/5;
		$price = $fields[3]/4;
		//$hour = $fields[4];

		$today =date('N');
		if($today<6){
			$close_time = $fields[5];
		}
		else{
			$close_time = $fields[4];
		}
		$hour = ((int)$close_time/100 - date('H'))*60+((int)$close_time%100 - date('i'));

		$web = $fields[6];

		$place = new Place($name, $id,0, $rating, $price, $hour, $web,0);
echo "<br>";
echo count($places);
echo "<br>";
		array_push($places,$place);
//print_r($places);	
	$max_hour = max($max_hour,$hour);
		$min_hour = min($min_hour,$hour);	

		/*跟数据库的place_id进行比较 如果存在 就把visit提出来
		$sql = "SELECT visited FROM mydb WHERE id = $place_id";
		$result = $conn -> query($sql);
		if ($result > 0){
			$visited = $result;
		}
		$max_visited = max($max_visited,$visited);
*/
	}

	echo "array get";

$pair = array();

echo count($places);
echo "<br>";
echo 1+10%3;
	for($i=0; $i<count($places); $i++){
echo 1+10%3;		
$place1 = $places[$i];
$place1->hour = ($place1->hour-$min_hour)/($max_hour-$min_hour+1);
		$place1->visited = $places[$i]->visited/$max_visited;
		

		if(empty($Bdistance) && empty($Bprice)){
			$place1->score = $place1->op4;

		}
		else if(empty($Bdistance) && !empty($Bprice)){
			$place1->score = $place1->op3;
		}
		else if (!empty($Bdistance) && empty($Bprice)){
			$place1->score = $place1->op2;
		}
		else{
			$place1->score = $place1->op1;
		}
		array_push($pair, $place1->score);
	}

echo 'pair getttt';

arsort($pair);

print_r($pair);

   $outcome=$places[0];


  //   zheng($outcome->website);

	echo $outcome->name."<br>";
	echo $outcome->id."<br>";
	echo $outcome->rating."<br>";
	echo $outcome->hour."<br>";
	echo $outcome->price."<br>";
	echo $outcome->web."<br>";
echo "end";
?>
