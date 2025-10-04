<?php
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="Bakery_DB";
	$conn=new mysqli($servername,$username,$password,$dbname);
	if($conn->connect_error)   
        {
		die("Error! Connection Failure.");
	}
	$sql="Create Table Register_info(R_Name varchar(50) NOT NULL, R_Username varchar(50) NOT NULL, R_Password Varchar(50), R_C_Password Varchar(50), R_Mobile Varchar(20), R_Email Varchar(100), R_DOB Varchar(10))"; 
	if($conn->query ($sql)==TRUE)   
          {
		echo "Table Created Successfully!!";
	}
	else  {
		echo "Error!! Table Creating Failed!!";
	}
	$conn->close();
?>
