<?php
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="Bakery_DB";
	$conn=new mysqli($servername,$username,$password,$dbname);
	if($conn->connect_error)    
        {
		die ("Error:Connection Failure!!");
	}
	$rname=$_POST["name"];
	$username=$_POST["user"];
	$password=$_POST["pass"];
	$cpassword=$_POST["cpass"];
	$rmobile=$_POST["mobile"];
	$remail=$_POST["email"];
	$rdob=$_POST["dob"];
	$sql="insert into Register_info(R_Name, R_Username, R_Password, R_C_Password, R_Mobile, R_Email, R_DOB)values('$name','$username','$password','$cpassword','$rmobile','$remail','$rdob')";	
        if($conn->query($sql)==TRUE)     
	 {
		echo "<font color='Green'>". "Data Inserted Successfully...!!";

	}
	else   
        {
		  echo "<font color='Red'>". "Error: Please Put the Proper Information...!!";
	}
	$conn->close();
?>
