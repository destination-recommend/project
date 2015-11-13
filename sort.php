
	<?php
	//based on the cumstomer's choice, sort
	//connect to DB
	$servername = "**********";
	$username = "*********";
	$password = "*******";
	$dbname = "mydb";

	//dbname = mydb; fields: place_id, place_name, visited
	$conn = new mysqli($servername, $username, $password, $dbname);
	if($conn->connect_error){
		die("Connect failed:" . $conn->connect_error);
	}
	echo "Connected successfully";

	//collect value of input field
	if ($_SERVER["REQUEST_METHOD"]=="POST"){
		$distance = $_REQUEST['distance'];
		$price = $_REQUEST['price'];
	}

	/*
	if customer cares about distance and price, consider rating, distance, opening hour, price and visited in the history;
	rate weight:0.3 distance weight:0.2 hour weight:0.2 price weight:0.2 visited:0.1 

	if customers cares about distance, consider rating, distance, opening hour, and visited in the history;
	rate weight:0.3 distance weight:0.3 hour weight:0.3 visited:0.1 

	if customers cares about price, consider rating, opening hour, price and visited in the history;
	rate weight:0.3 hour weight:0.3 price weight:0.3 visited:0.1 

	if cumsotmer cares about nothing, consider rating, opening hour and visited only
	rate weight:0.4 hour weight:0.3 visited:0.3 
	*/
 

	/*建立place class*/
	class Place{
		function Place($place_id, $rate, $distance, $hour, $price){
			$this->place_id = $place_id;
			$this->rate = $rate;
			$this->distance = $distance;
			$this->hour = $hour;
			$this->price = $price;
			$this->op1 = 0.3 * $rate + 0.2 * $distance + 0.2 * $hour + 0.2 * $price +0.1 * $visited;
			$this->op2 = 0.3 * $rate + 0.3 * $distance + 0.3 * $hour + 0.1 * $visited;
			$this->op3 = 0.3 * $rate + 0.3 * $price + 0.3 * $hour + 0.1 * $visited;
			$this->op4 = 0.4 * $rate + 0.3 * $hour + 0.3 * $visited;
			$this->score = 0;

		}
	}


	/*place 结果会用url传给php, php用 $_GET['text']获取*/  /*问题： 会传过来几个结果 几个结果是什么形式保存的*/
	$place_id = $_GET['place_id'];
	$rate = $_GET['rate'];
	$distance = $_GET['distance'];
	$hour = $_GET['hour'];
	$price = $_GET['price'];

	/*跟数据库的place_id进行比较 如果存在 就把visit提出来*/
	$sql = "SELECT visited FROM mydb WHERE id = $place_id";
	$result = $conn -> query($sql);
	if ($result > 0){
		$visited = $result;
	}

	/*建一个新的place object*/
	$place1 = new Place($place_id, $rate, $distance, $hour, $price);
	

	/*对于每一个place object都要给一个分数，*/ 
	if(empty($distance) && empty(price)){
		place1->score = place1->op4;
	}
	else if(empty($distance) && !empty(price)){
		place1->score = place1->op3;

	}
	else if (!empty($distance) && empty(price)){
		place1->score = place1->op2;
	}
	else{
		place1->score = place1->op1;
	}

	//比较所有place的分数 分数最高的在最前面
	$arrlength = 0;
	$scores = array();
	while($arrlength != $totalnumber){
		//把所有的 id->score 加到 scores 数列里

	}

	rsort($scores);
	echo $place_id;
	echo $place_name;



	//if the place is chosen, add 1 to "visited"  aka: UPDATA
	$sql_update = "UPDATA mydb SET visited=visited+1 WHERE id = $place_id"
	if($conn->query($sql) == TRUE){
		echo "";
	} else {
		echo "Erro:" . $sql . "<br>" . $conn->error;
	}

	$conn->close();
	
	?>
