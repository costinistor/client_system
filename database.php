<?php
//Connect to database
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'trans_mager';

//Create mysqli object
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

	if($mysqli->connect_error){
			die('Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli -> connect_error);
	}

?>