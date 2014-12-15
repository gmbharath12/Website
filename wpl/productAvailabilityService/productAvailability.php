<?php
header("Content-Type:application/json");

$product = $_GET['product'];
if(!empty($product)){
	$conn = mysqli_connect("localhost","root","","musicstore");
	//check conection
	if(!$conn){
		die("Connection failed due to: " .mysqli_connect_error());
	}
		
	$sql = "SELECT instrument, available_units from products where instrument = '".$product."'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

	if(!empty($row)){
		send_response($row["instrument"],$row["available_units"],"Available");
	} else{
		send_response("","","Not Available");
	}
} 
else{
	echo "Please enter the product name";
}

function send_response($instrument, $units, $status){
	
	$response['instrument'] = $instrument;
	$response['units'] = $units;
	$response['status'] = $status;
	
	$json_response = json_encode($response);
	echo $json_response;
}
	
?>