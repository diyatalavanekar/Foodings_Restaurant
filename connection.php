<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) 
{
    die("Error! Connection Failure: " . $conn->connect_error);
} 
else 
{
    echo "Connection established successfully";
}
?>
