<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli("localhost", "root", "", "foodings_db");
if ($conn->connect_error) 
{
    die("Error! Connection Failure: " . $conn->connect_error);
} 
else 
{
    echo "";
}
?>
