<?php
	$servername="localhost";
	$username="root";
	$password="";
	$conn=new mysqli($servername,$username,$password);
	if($conn->connect_error)
	{
		die ("Error! Connection Failure");
	}
	$sql="Create Database foodings_db";
	if($conn->query($sql)==TRUE)
	{
		echo "Database created successfully!";
	}
	else
	{
		echo "Error : Database creation failed!";
	}
?>
