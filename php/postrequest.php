<?php
function sendPostRequest($url,$data){
		$payload = json_encode($data);

		// Prepare new cURL resource
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

		// Set HTTP Header for POST request 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    		'Content-Type: application/json',
    		'Content-Length: ' . strlen($payload))
		);

		// Submit the POST request
		$result = curl_exec($ch);
		
		// Close cURL session handle
		curl_close($ch);

		return $result;
	}

	function sendPostRequestWithoutEncoding($url,$data){
		$ch = curl_init($url);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

		

		// Submit the POST request
		$result = curl_exec($ch);
		
		// Close cURL session handle
		curl_close($ch);
		//print_r($result);
		return $result;
	}
function sendMultipleFile($url,$files){
		// Prepare new cURL resource
		$ch = curl_init($url);


		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $files);

		// Submit the POST request
		$result = curl_exec($ch);
		
		// Close cURL session handle
		curl_close($ch);

		return $result;
}
?>