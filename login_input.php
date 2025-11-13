<?php
session_start(); 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodings_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
{
    die("Error! Connection Failure: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM signup_tb WHERE username='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) 
        {
            $_SESSION["username"] = $row["username"];
            $_SESSION["fullname"] = $row["fullname"];
            $_SESSION["userphoto"] = $row["photo"] ?? "default_user.png";
            header("Location: home.php");
            exit();
        } 
        else 
        {
            echo "<script>
                    alert('Incorrect password. Please try again.');
                    window.history.back();
                  </script>";
        }
    } 
    else 
    {
        echo "<script>
                alert('No user found with this username.');
                window.history.back();
              </script>";
    }
}
$conn->close();
?>
