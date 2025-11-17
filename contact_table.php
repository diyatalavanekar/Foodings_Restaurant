<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodings_db";
$connect = new mysqli($servername, $username, $password, $dbname);
if ($connect->connect_error) 
{
    die("Error! Connection Failure");
}
$sql = "CREATE TABLE contact_info (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    subject VARCHAR(150) NOT NULL,
    message TEXT NOT NULL,
    submitted_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($connect->query($sql) === TRUE) 
{
    echo "Table created successfully!";
} 
else 
{
    echo "Error creating table: " . $connect->error;
}
$connect->close();
?>
