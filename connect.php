<?php
$host = 'localhost';
$username = 'heuhjrbyzr'; 
$password = 'F5mwAMg6xa';
$database = 'heuhjrbyzr';


$con = mysqli_connect($host, $username, $password, $database);


if (!$con) 
{
	die('Connection failed: ' . mysqli_connect_error());
} 
?>
