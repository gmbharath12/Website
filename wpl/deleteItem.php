<?php

$instrument = $_GET['instrument'];

$cookie = $_COOKIE['musicstorecookie'];
//Set our user and authID variables
$user_name = $cookie['user'];
$authID = $cookie['authID'];

$conn = mysqli_connect("localhost","root","","musicstore");
//check conection
if(!$conn){
	die("Connection failed due to: " .mysqli_connect_error());
}

$sql = "delete from cart where user_name = '".$user_name."' and instrument = '".$instrument."'";
if ($conn->query($sql) == TRUE) {
		echo "successful";
	} else {
		echo "error".$sql."<br>".$conn->error;
	}

$conn->close();

?>