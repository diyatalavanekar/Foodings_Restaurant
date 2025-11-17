<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodings_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Handle Form Submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name    = $_POST["name"];
    $email   = $_POST["email"];
    $rating  = $_POST["rating"];
    $message = $_POST["message"];

    // Insert query
    $sql = "INSERT INTO ratings (name, email, rating, message)
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssis", $name, $email, $rating, $message);

    if ($stmt->execute()) {
        echo "<script>
                alert('Thank you! Your review has been submitted successfully.');
                window.location.href = 'ratings.php';
              </script>";
    } else {
        echo "<script>
                alert('Error! Please try again.');
                window.location.href = 'ratings.php';
              </script>";
    }

    $stmt->close();
}

$conn->close();
?>
