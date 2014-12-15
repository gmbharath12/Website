<?php

$cookie = $_COOKIE['musicstorecookie'];
//Set our user and authID variables
$user_name = $cookie['user'];
$authID = $cookie['authID'];

$conn = mysqli_connect("localhost","root","","musicstore");
//check conection
if(!$conn){
	die("Connection failed due to: " .mysqli_connect_error());
}

$sql = "update cart set order_status = 'ordered' where user_name = '".$user_name."'";

if ($conn->query($sql) == TRUE) {
		echo "Successfully ordered";
} else {
		echo "error".$sql."<br>".$conn->error;
}

?>