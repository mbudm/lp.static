<?php
	session_start();

if (isset($_SESSION['dl']) && strlen($_SESSION['dl']) > 0){

	$stampedFile = htmlentities($_SESSION['dl']);
 	header('Content-Description: Download file');
	header("Content-type: applications/x-download");
	//header("Content-Length: " . filesize($stampedFile));
	header("Content-Disposition: attachment; filename=" . basename($stampedFile));
	header('Content-Transfer-Encoding: binary');
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	header('Expires: 0');
	header('Pragma: public');
	readfile($stampedFile);
	
	$_SESSION['dl'] = '';
}
?>
