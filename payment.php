<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Payment Page</title>
  <style>
    /* General Page Styling */
    body 
    {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
      background-color: white;
      color: rgb(48,47,81);
    }

    /* Navigation Bar */
    .topnav 
    {
      overflow: hidden;
      background-color: white;
      text-align: center;
    }

    .topnav a 
    {
      display: inline-block;
      color: rgb(48,47,81);
      text-align: center;
      padding: 20px 20px;
      text-decoration: none;
      font-size: 17px;
      font-weight: bold;
    }

    .topnav a:hover 
    {
      background-color: rgb(48,47,81);
      color: white;
    }

    /* Centered Payment Form */
    .form-container 
    {
      width: 400px;
      margin: 40px auto;
      padding: 30px;
      border: 2px solid rgb(48,47,81);
      border-radius: 8px;
      background-color: #f9f9f9;
      text-align: left;
    }

    .form-container h1 
    {
      text-align: center;
      margin-bottom: 20px;
      color: rgb(48,47,81);
    }

    .form-container label 
    {
      display: block;
      margin: 10px 0 5px;
      font-weight: bold;
    }

    .form-container input 
    {
      width: 100%;
      padding: 8px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    /* Buttons */
    .form-buttons 
    {
      text-align: center;
    }

    .form-buttons button 
    {
      display: inline-block;
      padding: 10px 20px;
      margin: 10px;
      font-size: 16px;
      font-weight: bold;
      border: 2px solid rgb(48,47,81);
      border-radius: 5px;
      background-color: white;
      color: rgb(48,47,81);
      cursor: pointer;
    }

    .form-buttons button:hover 
    {
      background-color: rgb(48,47,81);
      color: white;
    }
  
    /* ----------- Footer ----------- */
    .footer {
      background: rgb(48,47,81);
      color: white;
      padding: 40px 80px 20px;
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

    /* Responsive */
    @media (max-width: 768px) {
      .footer-container {
        flex-direction: column;
        text-align: center;
      }
    }
  </style>
</head>
<body>

  <!-- Logo Section -->
  <div style="text-align:center;">
    <img src="logo.jpg" height="130" width="500">
  </div>

  <!-- Top Border Line -->
  <hr style="border:2px solid rgb(48,47,81);">

  <!-- Navigation Bar -->
  <div class="topnav">
    <a href="home.php">           Home</a>
    <a href="Menu.php">           Menu</a>
    <a href="Order.php">          Order</a>
    <a href="contact.php">        Contact Us</a>

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

  <!-- Bottom Border Line -->
  <hr style="border:2px solid rgb(48,47,81);">

  <!-- Payment Form -->
  <div class="form-container">
    <h1>Payment</h1>
    <form>
      <label>Payment Type</label>
      <input type="text" placeholder="Select Type" required>

      <label>Card Number</label>
      <input type="text" placeholder="Card Number" required>

      <label>CVV</label>
      <input type="text" placeholder="****" required>

      <label>Order Date</label>
      <input type="date" required>

      <label>OTP</label>
      <input type="text" placeholder="******" required>

      <label>Total Amount</label>
      <input type="text" required>

      <div class="form-buttons">
        <button type="submit" formaction="successfully.html">Submit</button>
        <button type="reset">Reset</button>
      </div>
    </form>
  </div>
<!--Footer -->
  <footer class="footer">
    <div class="footer-container">
      
      <!-- Branding -->
      <div class="footer-section">
        <img src="logo.jpg" alt="Logo" class="footer-logo">
        <p class="footer-brand">By Diya & Shital</p>
      </div>

      <!-- Quick Links -->
      <div class="footer-section">
        <h4>Quick Links</h4>
        <ul>
          <li><a href="contact.php">Contact Us</a></li>
          <li><a href="payment.php">Payment</a></li>
          <li><a href="ratings.php">Ratings</a></li>
          <li><a href="about.php">About Us</a></li>
        </ul>
      </div>

      <!-- Contact -->
      <div class="footer-section">
        <h4>Contact</h4>
        <p>Email: diyashital@gmail.com</p>
        <p>Phone: +91 7756053060</p>
      </div>

    </div>

    <!-- Bottom Bar -->
    <div class="footer-bottom">
      <p>© 2025 Your Website. All Rights Reserved.</p>
    </div>
  </footer>
</body>
</html>
