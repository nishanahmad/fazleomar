<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'connect.php';
session_start();
if(count($_POST)>0) 
{
	$result = mysqli_query($con,"SELECT * FROM users WHERE user_name='" . $_POST["user_name"] . "' and password = '". $_POST["password"]."'") or die(header("Location:loginPage.php?message=".mysqli_error($con)));
	$row_cnt = $result->num_rows;
	if($row_cnt > 0)
	{
		$user  = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$_SESSION['user_id'] = $user['user_id'];
		$_SESSION['user_name'] = $user['user_name'];
		header("Location:uploadPage.php");
	}
	else 
	{
		header("Location:loginPage.php?message=WRONG USERNAME OR PASSWORD");
	}
}
else
	header("Location:loginPage.php?message=WRONG USERNAME OR PASSWORD");
?>