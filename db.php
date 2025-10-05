<?php
	$servername="localhost";
	$username="root";
	$password="";
	$conn=new mysqli($servername,$username,$password);
	if($conn->connect_error)  
          {
		die("Error! Connection Failure !!");
	}
	$sql="Create Database Bakery_DB";
	if($conn->query ($sql)==TRUE)   {
		echo "Database Created Successfully!!";
          }
	else    {
		echo "Error!! Database Creating Failed!";
	}
	$conn->close();
?>
