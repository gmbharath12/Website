<?php

$quantity = $_GET['quantity'];
$instrument = $_GET['instrument'];
$price = $_GET['price'];
$price = floatval($price);

$cookie = $_COOKIE['musicstorecookie'];
//Set our user and authID variables
$user_name = $cookie['user'];
$authID = $cookie['authID'];

$conn = mysqli_connect("localhost","root","","musicstore");
//check conection
if(!$conn){
	die("Connection failed due to: " .mysqli_connect_error());
}

$sql = "select user_name, instrument from cart where user_name = '".$user_name."' and instrument = '".$instrument."' and order_statuts is null";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

if($row != null){
	// update 
	$sql1 = "update cart set quantity = '".$quantity."', price = '".$price."' where user_name = '".$user_name."' and instrument = '".$instrument."' and order_statuts is null";
	if ($conn->query($sql1) == TRUE) {
		echo "Instrument quantity updated to cart";
	} else {
		echo "error".$sql1."<br>".$conn->error;
	}
} else{
	// insert
	$sql1 = "insert into cart (user_name,instrument, quantity, price) VALUES ('".$user_name."','".$instrument."','".$quantity."','".$price."')";
	if ($conn->query($sql1) == TRUE) {
		echo "Instrument added to cart";
	} else {
		echo "error".$sql1."<br>".$conn->error;
	}
}

$conn->close();

?>