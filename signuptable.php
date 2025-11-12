<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "foodings_db"; 
    $connect = new mysqli($servername, $username, $password, $dbname);
    if($connect->connect_error)
    {
        die ("Error! Connection Failure");
    }
    $sql = "CREATE TABLE users_info (
        user_id INT NOT NULL AUTO_INCREMENT,
        username VARCHAR(50) NOT NULL,
        password VARCHAR(255) NOT NULL,
        PRIMARY KEY (user_id)
    )";
    if($connect->query($sql) === TRUE)
    {
        echo "Table Created Successfully";
    }
    else
    {
        echo "Table Creation Failure! " . $connect->error;
    }
    $connect->close();
?>
