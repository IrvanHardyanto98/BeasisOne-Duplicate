<?php
	function sendGetRequest($url){
		$ch = curl_init($url);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );

		// Submit the POST request
		$result = curl_exec($ch);
		
		// Close cURL session handle
		curl_close($ch);

		return $result;
	}
?>