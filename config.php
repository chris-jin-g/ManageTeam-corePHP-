<?php 
	define("HOST","localhost");
	define("USERNAME","root");
	define("PASSWORD","");
	define("DATABASE","test");

	$conn = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE) or die('connection error');
	mysqli_set_charset($conn,'utf8');
	header('Content-Type: text/html; charset=utf-8');
?>
