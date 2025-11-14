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
$sql = "CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100),
    mobile VARCHAR(15),
    address VARCHAR(255),
    product_name VARCHAR(100),
    price INT,
    payment_method VARCHAR(50),
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
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
