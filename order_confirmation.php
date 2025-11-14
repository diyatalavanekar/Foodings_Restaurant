<?php
session_start();

if (!isset($_SESSION["order_details"])) {
    header("Location: Order.php");
    exit();
}

$order = $_SESSION["order_details"];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background-color: white;
        }

        /* NAVIGATION */
        .topnav {
            overflow: hidden;
            background-color: white;
            text-align: center;
        }

        .topnav a {
            display: inline-block;
            color: rgb(48,47,81);
            text-align: center;
            padding: 20px 20px;
            text-decoration: none;
            font-size: 17px;
            font-weight: bold;
        }

        .topnav a:hover {
            background-color: rgb(48,47,81);
            color: white;
        }

        /* BOX */
        .confirm-box {
            max-width: 600px;
            margin: 40px auto;
            padding: 30px;
            border: 2px solid rgb(48,47,81);
            border-radius: 10px;
            color: rgb(48,47,81);
            background: white;
        }

        .confirm-box h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 26px;
        }

        .confirm-item {
            margin: 12px 0;
            font-size: 18px;
        }

        .thank-you {
            margin-top: 20px;
            text-align: center;
            font-size: 20px;
            color: green;
            font-weight: bold;
        }

        .back-home {
            display: block;
            width: 100%;
            text-align: center;
            margin-top: 25px;
            padding: 12px;
            background: rgb(48,47,81);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 17px;
        }

        .back-home:hover {
            background: black;
        }

        /* FOOTER */
        .footer {
            background: rgb(48,47,81);
            color: white;
            padding: 40px 80px 20px;
            margin-top: 50px;
        }

        .footer-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 40px;
        }

        .footer-section {
            flex: 1;
            min-width: 200px;
        }

        .footer-logo {
            height: 70px;
            margin-bottom: 10px;
        }

        .footer-brand {
            font-weight: bold;
            font-size: 16px;
        }

        .footer-section h4 {
            margin-bottom: 15px;
            font-size: 18px;
            border-bottom: 2px solid white;
            display: inline-block;
            padding-bottom: 5px;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            border-top: 1px solid white;
            padding-top: 10px;
        }

    </style>
</head>

<body>

    <!-- LOGO -->
    <div style="text-align:center;">
        <img src="logo.jpg" height="130" width="500">
    </div>

    <hr style="border:2px solid rgb(48,47,81);">

    <!-- NAVIGATION -->
    <div class="topnav">
        <a href="home.php"> Home</a>
        <a href="Menu.php"> Menu</a>
        <a href="Order.php"> Order</a>
        <a href="contact.php"> Contact Us</a>

        <?php
            if (isset($_SESSION["username"])) {
                echo '
                <div style="position:absolute; right:20px; top:20px; display:flex; align-items:center; gap:8px;">
                    <img src="login image.png" style="height:35px;width:35px;border-radius:50%;">
                    <span style="font-weight:bold; color:rgb(48,47,81);">' . htmlspecialchars($_SESSION["username"]) . '</span>
                    <a href="logout.php" class="nav-btn">Logout</a>
                </div>';
            } else {
                echo '<a href="login.php" class="nav-btn" style="position:absolute; right:20px; top:20px;">Login</a>';
            }
        ?>
    </div>

    <hr style="border:2px solid rgb(48,47,81);">


    <!-- CONFIRMATION BOX -->
    <div class="confirm-box">
        <h2>Order Placed Successfully!</h2>

        <div class="confirm-item"><b>Order ID:</b> <?php echo $order["order_id"]; ?></div>
        <div class="confirm-item"><b>Name:</b> <?php echo $order["name"]; ?></div>
        <div class="confirm-item"><b>Address:</b> <?php echo $order["address"]; ?></div>
        <div class="confirm-item"><b>Product:</b> <?php echo $order["product"]; ?></div>
        <div class="confirm-item"><b>Total Price:</b> ₹<?php echo $order["price"]; ?></div>
        <div class="confirm-item"><b>Payment Method:</b> <?php echo $order["payment"]; ?></div>

        <p class="thank-you">Thank you for ordering with us! ❤️</p>

        <a href="home.php" class="back-home">Go to Home</a>
    </div>


    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-container">

            <div class="footer-section">
                <img src="logo.jpg" class="footer-logo">
                <p class="footer-brand">By Diya & Shital</p>
            </div>

            <div class="footer-section">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="payment.php">Payment</a></li>
                    <li><a href="ratings.php">Ratings</a></li>
                    <li><a href="about.php">About Us</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h4>Contact</h4>
                <p>Email: diyashital@gmail.com</p>
                <p>Phone: +91 7756053060</p>
            </div>

        </div>

        <div class="footer-bottom">
            <p>© 2025 Your Website. All Rights Reserved.</p>
        </div>
    </footer>

</body>
</html>
