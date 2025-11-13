<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodings_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $user = $_POST["username"];
    $pass = $_POST["password"];
    $sql = "SELECT * FROM signup_tb WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) 
    {
        if (password_verify($pass, $row["password"])) 
        {
            $_SESSION["username"] = $row["username"];
            $_SESSION["fullname"] = $row["fullname"];
            header("Location: home.php");
            exit();
        } 
        else 
        {
            echo "<script>alert('Incorrect password'); window.location.href='login.html';</script>";
        }
    } 
    else 
    {
        echo "<script>alert('User not found'); window.location.href='login.html';</script>";
    }
}
?>
