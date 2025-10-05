<?php
	$servername="localhost";
	$username="root";
	$password="";
	$conn=new mysqli($servername,$username,$password);
	if($conn->connect_error)
	{
		die ("Error! Connection Failure");
	}
	else
	{
		echo "Connection established successfully";
	}
?>
