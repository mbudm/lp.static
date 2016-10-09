<?php

// A few utility functions to help us work with the PayPal NVP APIs.

function NVPEncode($nvps) {
	$out = array();
	foreach($nvps as $index => $value) {
		$out[] = $index . "=" . urlencode($value);
	}
	
	return implode("&", $out);
}

function NVPDecode($nvp) {
	$split = explode("&", $nvp);
	$out = array();
	foreach($split as $value) {
		$sub = explode("=", $value);
		$out[$sub[0]] = urldecode($sub[1]);
	}
	
	return $out;
}

function RunAPICall($nvps) {
	$ch = curl_init(MBUDM_API_URL);
	curl_setopt($ch, CURLOPT_POST, TRUE);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	
	// On some servers, these two options are necessary to
	// avoid getting "invalid SSL certificate" errors
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	
	// Insert the credentials
	$nvps["USER"] = MBUDM_API_USERNAME;
	$nvps["PWD"] = MBUDM_API_PASSWORD;
	$nvps["SIGNATURE"] = MBUDM_API_SIGNATURE;
	
	// Build the NVP string
	$nvpstr = NVPEncode($nvps);
	
	curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpstr);
	
	$result = curl_exec($ch);
	
	// If the request failed, return an empty array.
	if($result === FALSE) return array();
	
	// Return the decoded response
	else return NVPDecode($result);
}

// I found myself using this bit of code multiple times,
// so I figured it would be good to put it in its own
// function.

function PaymentError($response) {
	global $mb_log;
	$result_str = print_r($response,true);  
	
	//$mb_log->lwrite('Paypal error occured:' . $result_str);
	//$mb_log->lclose();
	//die("Uh oh, an error occurred...sorry, I can't process your purchase " .
	//	"right now. <pre>$result_str</pre> Please try again later.");
}

?>
