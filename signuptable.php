<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodings_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
{
    die("Error! Connection Failure: " . $conn->connect_error);
}
$sql = "CREATE TABLE signup_tb (
    user_id INT NOT NULL AUTO_INCREMENT,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (user_id)
)";
if ($conn->query($sql) === TRUE) 
{
    echo "Table created successfully!";
} 
else 
{
    echo "Error creating table: " . $conn->error;
}
$conn->close();
?>
