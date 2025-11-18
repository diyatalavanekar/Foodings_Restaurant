<?php
session_start();

// Block access if admin not logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}

include("../connection.php");

// Fetch all orders
$sql = "SELECT * FROM orders ORDER BY order_date DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin - Orders</title>
<style>
    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        background-color: white;
        color: rgb(48,47,81);
    }

    .header {
        background: rgb(48,47,81);
        padding: 20px;
        color: white;
        text-align: center;
        font-size: 26px;
        font-weight: bold;
    }

    .container {
        width: 90%;
        margin: 30px auto;
        background: white;
        border: 2px solid rgb(48,47,81);
        border-radius: 8px;
        padding: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }

    table, th, td {
        border: 1px solid rgb(48,47,81);
    }

    th {
        background: rgb(48,47,81);
        color: white;
        padding: 12px;
        font-size: 16px;
    }

    td {
        padding: 10px;
        text-align: center;
        font-size: 15px;
    }

    tr:nth-child(even) {
        background: #f3f3f3;
    }

    .back-btn {
        display: inline-block;
        padding: 10px 18px;
        background: rgb(48,47,81);
        color: white;
        border-radius: 6px;
        text-decoration: none;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .back-btn:hover {
        background: black;
    }
</style>
</head>

<body>

<div class="header">
    Admin Panel – Orders
</div>

<div class="container">

    <a href="admin_dashboard.php" class="back-btn">← Back to Dashboard</a>

    <h2 style="text-align:center;">All Customer Orders</h2>

    <?php
    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>Order ID</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Payment</th>
                    <th>Date</th>
                </tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['order_id']}</td>
                    <td>{$row['customer_name']}</td>
                    <td>{$row['mobile']}</td>
                    <td>{$row['address']}</td>
                    <td>{$row['product_name']}</td>
                    <td>{$row['price']}</td>
                    <td>{$row['payment_method']}</td>
                    <td>{$row['order_date']}</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "<h3 style='text-align:center; padding:20px;'>No orders found!</h3>";
    }
    ?>

</div>

</body>
</html>
