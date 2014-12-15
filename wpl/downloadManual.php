<?php

$fileName = $_GET["fileName"];
if(!empty($fileName)){
	//resource address
	$url = "https://localhost/wpl/downloads/".$fileName; //https://localhost/wpl/downloads/Homework

	//request 
	$request = curl_init($url);
	
	curl_setopt($request,CURLOPT_RETURNTRANSFER,1);
	
	// Stop verifying the certificate if it is https - not a good approach
	curl_setopt($request, CURLOPT_SSL_VERIFYPEER, false);
	
	//adding the certificate to the trusted list - good approach
	/*curl_setopt($request, CURLOPT_SSL_VERIFYPEER, true);
	curl_setopt($request, CURLOPT_SSL_VERIFYHOST, 0); // verify the host name 
	curl_setopt($request, CURLOPT_CAINFO, getcwd()."C:/xampp/htdocs/wpl/ssl/musicstore.crt");
	*/
	    header('Content-Description: File Transfer');
    header('Content-Type: application/pdf');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
	//response
	$response = curl_exec($request);
	
	//decode 	$result = json_decode($response);
	echo $response;
	//echo $result->status;*/
}

?>