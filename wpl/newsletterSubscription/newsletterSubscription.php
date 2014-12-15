<?php
header("Content-Type:application/json");

$email = $_GET['email'];

if(!empty($email)){
	$conn = mysqli_connect("localhost","root","","musicstore");
	//check conection
	if(!$conn){
		die("Connection failed due to: " .mysqli_connect_error());
	}
		
	$sql = "select email from news_letter where email = '".$email."'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

	if(!empty($row)){
		send_response("You have already subscribed for the newsletter.");
	} else{
		$sql1 = "insert into news_letter (email) VALUES ('".$email."')";
		//$sql1 = "insert into news_letter (first_name, last_name, email) VALUES ('".$fName."','".$lName."','".$email."')";
		if ($conn->query($sql1) == TRUE) {
			send_response("successfully registered for the newsletter");
		} else {
			send_response("error".$sql1."<br>".$conn->error);
		}
	}
}
else{
	echo "Please enter the email";
}

function send_response($status){
	
	$response['status'] = $status;
	$json_response = json_encode($response);
	echo $json_response;
}

$conn->close();

?>