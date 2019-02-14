<?php
require 'connect.php';

mysqli_autocommit($con,FALSE);

$target_dir = "images/gallery/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$error = null;

if(isset($_POST["submit"])) 
{
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check == false) 
        $error = "Sorry, your file is too large";
}

if (file_exists($target_file)) 
	$error = "Sorry, file already exists";

if ($_FILES["fileToUpload"]["size"] > 999999) 
	$error = "Sorry, your file is too large";

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
    $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed";
	
if ($error != null) 
{
	header("Location:uploadPage.php?error=$error");
} 
else 
{
	$filename = $_FILES["fileToUpload"]["name"];
	$title = $_POST['title'];
	$date = date ('Y-m-d h:i:s');
	$sql="INSERT INTO images (title,file,created_on)
		 VALUES
		 ('$title','$filename','$date')";

	$result = mysqli_query($con, $sql) or die(mysqli_error($con));				

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
	{
		mysqli_commit($con);
		header("Location:uploadPage.php");
	}
	else 
	{
		mysqli_rollback($con);
		header("Location:uploadPage.php?error=Sorry, there was an error uploading your file");
	}
		
}
?>
