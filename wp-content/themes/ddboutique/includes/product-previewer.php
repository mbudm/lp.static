<?php

// clean the c GET var 
$clean = htmlentities($_GET['c'], ENT_QUOTES, 'UTF-8');

//split pdf or img
$ext = pathinfo($clean, PATHINFO_EXTENSION);
//echo("ext:".$ext);
switch($ext){
	case 'jpg':
	case 'jpeg':
	case 'gif':
	case 'svg':
	case 'png':
		//it's an image so display it centered in a basic html page;
		?>
		<!DOCTYPE html>
		<html>
		<body style="margin:0;padding:0;">
		<img src="<?php echo $clean ?>" style="display:block;margin:0 auto;"/>
		</body>
		</html>
		<?php
	break;
	case 'pdf':
	case 'doc':
	case 'docx':
	case 'eps':
		// it's a file so let the browser handle item
		header('location:'.$clean);
		//echo("ext:".$ext);
	break;
}
?>
