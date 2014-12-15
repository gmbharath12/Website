<?php

$instrument = $_GET['instrument'];
$quantity = $_GET['quantity'];
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

$sql = "update cart set quantity = '".$quantity."', price = '".$price."' where user_name = '".$user_name."' and instrument = '".$instrument."' and order_status is null";
if ($conn->query($sql) == TRUE) {
		echo "successful";
	} else {
		echo "error".$sql."<br>".$conn->error;
	}

$conn->close();

?>