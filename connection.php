<<<<<<< HEAD
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
=======
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
>>>>>>> b125bf4211a66448bb22032e38fef1182d911585
