<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodings_db";

// Database connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name     = $_POST['name'];
    $mobile   = $_POST['mobile'];
    $address  = $_POST['address'];
    $product  = $_POST['product'];
    $price    = $_POST['price'];
    $payment  = $_POST['payment'];

    // Insert Query
    $sql = "INSERT INTO orders (customer_name, mobile, address, product_name, price, payment_method) 
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $name, $mobile, $address, $product, $price, $payment);

    if ($stmt->execute()) {

    // GET order_id of last inserted order
    $last_id = $conn->insert_id;

    // Store the order details in session for confirmation page
    $_SESSION["order_details"] = [
        "order_id" => $last_id,
        "name"     => $name,
        "mobile"   => $mobile,
        "address"  => $address,
        "product"  => $product,
        "price"    => $price,
        "payment"  => $payment
    ];

    echo "<script>
            alert('Order placed successfully!');
            window.location.href = 'order_confirmation.php';
          </script>";
}
 else {
        echo "<script>
                alert('Something went wrong. Please try again.');
                window.location.href = 'Order.php';
              </script>";
    }

    $stmt->close();
}

$conn->close();
?>
