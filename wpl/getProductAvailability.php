<?php

$product = $_GET["product"];

if(!empty($product)){
	$memcache = new Memcache;
	$memcache->connect('localhost', 11211) or die ("Could not connect");
	
	$units = $memcache->get($product);
	if(!empty($units)){
		echo "Available Units: ".$units;
	} else{
		//resource address
		$url = "https://localhost/wpl/productAvailabilityService/".$product;

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
		
		//response
		$response = curl_exec($request);
		
		//decode
		$result = json_decode($response);
	
		$memcache->set($product,$result->units, false, 10) or 
		die ("Failed to save data at the server");
		echo "Available Units: ".$result->units;
	}
}

?>