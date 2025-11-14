<?php
session_start();

// If cart is empty, show message and stop
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

if (empty($cart)) {
    echo "<h2>Your plate is empty! Please add items first.</h2>";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Order Now</title>

  <style>
    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
      background-color: white;
    }

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

    .order-container {
      max-width: 500px;
      margin: 40px auto;
      background: #fff;
      padding: 30px;
      border: 2px solid rgb(48,47,81);
      border-radius: 10px;
      color: rgb(48,47,81);
    }

    .order-container h2 {
      text-align: center;
      margin-bottom: 20px;
      color: rgb(48,47,81);
    }

    .order-container label {
      font-weight: bold;
    }

    .order-container input,
    .order-container select {
      width: 100%;
      padding: 10px;
      margin: 8px 0 18px;
      border: 1px solid rgb(48,47,81);
      border-radius: 5px;
    }

    .order-btn-submit {
      width: 100%;
      padding: 12px;
      background: rgb(48,47,81);
      color: white;
      border: none;
      font-size: 16px;
      font-weight: bold;
      border-radius: 5px;
    }

    .order-btn-submit:hover {
      background: black;
      cursor: pointer;
    }

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

    .footer-section ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .footer-section ul li {
      margin: 8px 0;
    }

    .footer-section ul li a {
      text-decoration: none;
      color: white;
      transition: 0.3s;
    }

    .footer-section ul li a:hover {
      color: lightgray;
    }

    .footer-bottom {
      text-align: center;
      margin-top: 30px;
      font-size: 14px;
      border-top: 1px solid white;
      padding-top: 10px;
    }
    /* Style for all remove buttons */
.remove-btn, .remove-all-btn {
    background-color: #ea0909ff;  /* Dark Red */
    color: white;
    border: none;
    padding: 5px 12px;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    transition: background 0.3s;
}

.remove-btn:hover, .remove-all-btn:hover {
    background-color: #6b0404ff;  /* Darker Red on hover */
}

  </style>
</head>

<body>

  <!-- LOGO -->
  <div style="text-align:center;">
    <img src="logo.jpg" height="130" width="500">
</div>
<hr style="border:2px solid rgb(48,47,81);">

<div class="topnav">
    <a href="home.php">Home</a>
    <a href="Menu.php">Menu</a>
    <a href="Order.php">Order</a>
    <a href="contact.php">Contact Us</a>

    <?php
      if (isset($_SESSION["username"])) {
          echo '
          <div style="position:absolute; right:20px; top:20px; display:flex; align-items:center; gap:8px;">
              <img src="login image.png" alt="User" style="height:35px;width:35px;border-radius:50%;">
              <span style="font-weight:bold; color:rgb(48,47,81);">' . htmlspecialchars($_SESSION["username"]) . '</span>
              <a href="logout.php" class="nav-btn">Logout</a>
          </div>';
      } else {
          echo '
          <a href="login.php" class="nav-btn" style="position:absolute; right:20px; top:20px;">Login</a>';
      }
    ?>
</div>
<hr style="border:2px solid rgb(48,47,81);">

<div class="order-container">
    <h2>Place Your Order</h2>

    <h3>Your Plate</h3>

    <?php if(!empty($cart)) { ?>
        <table border="1" width="100%" style="border-collapse: collapse; margin-bottom: 20px;">
            <tr>
                <th style="padding:10px; background:rgb(48,47,81); color:white;">Product</th>
                <th style="padding:10px; background:rgb(48,47,81); color:white;">Price (Rs)</th>
                <th style="padding:10px; background:rgb(48,47,81); color:white;">Action</th>
            </tr>
            <?php
            $total = 0;
            foreach ($cart as $index => $item) {
                $total += $item['price'];
            ?>
            <tr>
                <td style="padding:10px; color:rgb(48,47,81);"><?php echo $item['name']; ?></td>
                <td style="padding:10px; color:rgb(48,47,81);"><?php echo $item['price']; ?></td>
                <td style="padding:10px;">
                    <!-- Remove single item -->
                    <form action="remove_item.php" method="POST" style="display:inline;">
                        <input type="hidden" name="index" value="<?php echo $index; ?>">
                        <button type="submit" class="remove-btn">Remove</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>

        <h3 style="color:rgb(48,47,81);">Total Amount: Rs <?php echo $total; ?></h3>

        <!-- Remove All Button -->
        <form action="clear_plate.php" method="POST">
            <button type="submit" class="remove-all-btn">Remove All</button>
        </form>

    <?php } else { ?>
        <p style="color:rgb(48,47,81); font-weight:bold;">Your plate is empty.</p>
    <?php } ?>

    <!-- Order Form -->
    <form action="order_input.php" method="POST">
        <?php if(!empty($cart)) {
            $productNames = implode(", ", array_column($cart, "name"));
        ?>
            <input type="hidden" name="product" value="<?php echo $productNames; ?>">
            <input type="hidden" name="price" value="<?php echo $total; ?>">
        <?php } ?>

        <label>Name</label>
        <input type="text" name="name" required pattern="[A-Za-z ]{3,}" title="Enter a valid name">

        <label>Mobile Number</label>
        <input type="text" name="mobile" required pattern="[0-9]{10}" title="Enter 10 digit mobile number">

        <label>Address</label>
        <input type="text" name="address" required minlength="5" title="Enter a valid address">

        <label>Product Name(s)</label>
        <input type="text" value="<?php echo !empty($cart) ? $productNames : ''; ?>" readonly>

        <label>Total Price (Rs)</label>
        <input type="text" value="<?php echo !empty($cart) ? $total : ''; ?>" readonly>

        <label>Payment Method</label>
        <select name="payment" required>
            <option value="">Select</option>
            <option value="Cash on Delivery">Cash on Delivery</option>
            <option value="UPI">UPI</option>
        </select>

        <button type="submit" class="order-btn-submit">Confirm Order</button>
    </form>
</div>

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
