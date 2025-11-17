<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "foodings_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
{
    die("Connection Failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $name    = $_POST["name"];
    $email   = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $sql = "INSERT INTO contact_info (name, email, subject, message)
            VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $subject, $message);
    if ($stmt->execute()) 
    {
        echo "<script>
                alert('Message Sent Successfully!');
                window.location.href = 'contact.php';
              </script>";
    } 
    else 
    {
        echo "<script>
                alert('Something went wrong. Please try again.');
                window.location.href = 'contact.php';
              </script>";
    }
    $stmt->close();
}
$conn->close();
?>
