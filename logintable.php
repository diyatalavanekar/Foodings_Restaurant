<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "foodings_db";
    $connect = new mysqli($servername, $username, $password, $dbname);
    if($connect->connect_error)
    {
        die("Error! Connection Failure");
    }
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $sql = "SELECT * FROM users_info WHERE username='$user' AND password='$pass'";
        $result = $connect->query($sql);
        if($result->num_rows > 0)
        {
            echo "Login Successful! Welcome, " . $user;
        }
        else
        {
            echo "Invalid Username or Password!";
        }
    } 
    else 
    {
        echo "Please fill out the form first.";
    }
    $connect->close();
?>