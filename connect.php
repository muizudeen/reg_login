<?php 
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'work_test';
	$connect = mysqli_connect($host, $username, $password, $database);
		if (!$connect) {
			die('unable to connect');
		}
?>