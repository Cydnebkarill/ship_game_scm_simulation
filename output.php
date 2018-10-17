<?php
define('servername','localhost');
define('username','root');
define('password','');
define('dbname','ship');

$func = $_POST['func'];

if ($func == "getDeliveryAmount"){
	getDeliveryAmount();
} else if ($func == "getDelivery"){
	getDelivery();
}

function getDeliveryAmount(){
	// Create connection
	$conn = new mysqli(servername, username, password, dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT * FROM deliveryAmount";
	$result = $conn->query($sql);
	$test = array();
	$empty=array();
	array_push($empty, [ "id" => 1, "name" => "No Results!" ]);
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			array_push($test, $row);
		}
		echo json_encode($test);
	} else {
		echo json_encode($empty);
	}
	$conn->close();
}

function getDelivery(){
    // Create connection
    $conn = new mysqli(servername, username, password, dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM delivery";
    $result = $conn->query($sql);
    $test = array();
    $empty=array();
    array_push($empty, [ "id" => 1, "name" => "No Results!" ]);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            array_push($test, $row);
        }
        echo json_encode($test);
    } else {
        echo json_encode($empty);
    }
    $conn->close();
}

?>