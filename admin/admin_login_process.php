<?php
session_start();
include("../connection.php");  // FIXED PATH

// Get form values
$username = $_POST['username'];
$password = $_POST['password'];

// Query admin table
$sql = "SELECT * FROM admin_users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
    $_SESSION['admin_logged_in'] = true;
    $_SESSION['admin_username'] = $username;

    echo "<script>
            alert('Login Successful!');
            window.location.href='admin_dashboard.php';
          </script>";

} else {
    echo "<script>
            alert('Incorrect Username or Password!');
            window.location.href='admin_login.php';
          </script>";
}

$conn->close();
?>
