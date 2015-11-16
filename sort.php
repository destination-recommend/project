<?php
$a=(int)(-0.5);
echo $a;
echo '<br>';  

$txt = $_GET['text'];
 $myinfo = $_GET['myinfo'];

 $location_array=explode('|',$myinfo);	
    
    $mylat=$location_array[0];
    $mylng=$location_array[1];

    
    function getDistance($lat1,$lng1,$lat2,$lng2) {
  		$dis = (sqrt(pow($lat1-$lat2,2)+pow($lng1-$lng2,2))+0.000001);
		return $dis;
	}

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
			$this->score = 0;

		}
	}


$place_array = explode('^',$txt); //seperate every place, arrlength is the number of palces returned

echo count($place_array);
echo '..............';
array_pop($place_array);


	$arrlength = count($place_array);
echo $arrlength;
echo '!!!!!!!!!!!!!!!!!';

$places = array();      // array of object PLACE  "places"

	$max_hour = 0;
	$min_hour = 1440;
	$max_visited = 1;

	$max_dis=0;
	$min_dis=1000;

	for($i=0; $i<$arrlength; $i++){         //for every place
		$fields = explode('|',$place_array[$i]);   //seperate every fields
		//function Place($name, $id, $rating, $price, $hour, $web)
		//place from client ($name, $id, $rating, $price, $wnd hour,$week hour, $web,$lat, $lng )
$nodist = 0;
		for ($j=0;$j<9;$j++){
			if(strcmp($fields[$j],'undefined')==0){
				if($j==4||$j==5){
					$fields[$j]=-1;
				} else if($j==7||$j==8){
					$nodist=1;
				} else {	
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
		$hour = max(((int)$close_time/100 - date('H')),0)*60+max(((int)$close_time%100 - date('i')),0);

		$web = $fields[6];

		if($nodist==0)
		$distance = getDistance(($mylat),($mylng),($fields[7]),($fields[8]));
		else
		$distance = 0;
		
//function Place($name, $id, $rating, $distance, $hour, $price, $web, $visited)

		$place = new Place($name, $id,$rating,$distance, $hour, $price,  $web,0);
echo count($places);

		array_push($places,$place);

	$max_hour = max($max_hour,$hour);
		$min_hour = min($min_hour,$hour);	

		$max_dis=max($distance,$max_dis);
		$min_dis=min($distance,$min_dis);

		/*跟数据库的place_id进行比较 如果存在 就把visit提出来
		$sql = "SELECT visited FROM mydb WHERE id = $place_id";
		$result = $conn -> query($sql);
		if ($result > 0){
			$visited = $result;
		}
		$max_visited = max($max_visited,$visited);
		*/
	}

	echo "count places:";

echo count($places);
echo "<br>";
echo $max_dis."<br>";
echo $min_dis;
echo "<br>";
	for($i=0; $i<count($places); $i++){
$place1 = $places[$i];
$place1->hour = ($place1->hour-$min_hour)/($max_hour-$min_hour+1);
		$place1->visited = $places[$i]->visited/$max_visited;

		$place1->distance=($palce1->distance-$min_dis)/($max_dis-$min_dis+0.000000001);

		if(empty($Bdistance) && empty($Bprice)){
			$place1->score = 0.4 * $place1->rate + 0.3 * $place1->hour + 0.3 * $place1->visited;

		}
		else if(empty($Bdistance) && !empty($Bprice)){
			$place1->score = 0.3 * $place1->rate + 0.3 * $place1->price + 0.3 * $place1->hour + 0.1 * $place1->visited;
		}
		else if (!empty($Bdistance) && empty($Bprice)){
			$place1->score = 0.3 * $place1->rate + 0.3 * $place1->distance + 0.3 * $place1->hour + 0.1 * $place1->visited;
		}
		else{
			$place1->score = 0.3 * $place1->rate + 0.2 * $place1->distance + 0.2 * $place1->hour + 0.2 * $place1->price +0.1 * $place1->visited;
		}
		array_push($pair, $place1->score);
print_r($place1);
echo '<br>';
	}


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
