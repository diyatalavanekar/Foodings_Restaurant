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
$fullname = $_POST["fullname"];
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO signup_tb (fullname, email, username, password)
        VALUES ('$fullname', '$email', '$username', '$hashed_password')";
if ($conn->query($sql) === TRUE) 
{
    echo "<font color='green'>Account created successfully!</font>";
    echo "<br><a href='login.php'>Click here to log in</a>";
} 
else 
{
    echo "<font color='red'>Error! Account creation failed: " . $conn->error . "</font>";
}
$conn->close();
?>
