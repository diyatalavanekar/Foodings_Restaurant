<?php
session_start();

// If admin is not logged in → redirect to login
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
        }

        .header {
            background: rgb(48,47,81);
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 26px;
            font-weight: bold;
        }

        .menu {
            background: #fff;
            padding: 20px;
            display: flex;
            justify-content: center;
            gap: 40px;
        }

        .menu a {
            background: rgb(48,47,81);
            color: white;
            padding: 15px 25px;
            text-decoration: none;
            border-radius: 8px;
            font-size: 18px;
        }

        .menu a:hover {
            background: black;
        }

        .logout {
            text-align: center;
            margin-top: 30px;
        }

        .logout a {
            color: red;
            font-weight: bold;
            text-decoration: none;
            font-size: 20px;
        }
    </style>
</head>
<body>

<div class="header">
    Admin Dashboard
</div>

<div class="menu">
    <a href="admin_orders.php">View Orders</a>
    <a href="admin_users.php">View Users</a>
    <a href="admin_ratings.php">View Reviews</a>
    <a href="admin_contact.php">View Contacts</a>
</div>

<div class="logout">
    <a href="admin_logout.php">Logout</a>
</div>

</body>
</html>
