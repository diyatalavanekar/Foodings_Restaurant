<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Menu Page</title>
  <style>
    /* General Page Styling */
    body 
    {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
      background-color: white;
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
  <!-- Logo -->
  <div style="text-align:center;">
    <img src="logo.jpg" height="130" width="500">
  </div>

  <!-- Top border line -->
  <hr style="border:2px solid rgb(48,47,81);">

  <!-- Navigation Bar -->
  <div class="topnav">
    <a href="home.php">          Home</a>
    <a href="Menu.php">          Menu</a>
    <a href="Order.php">         Order</a>
    <a href="contact.php">       Contact Us</a>

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

  <!-- Bottom border line -->
  <hr style="border:2px solid rgb(48,47,81);">

  <!-- Heading -->
  <h1 style="text-align:center; color:rgb(48,47,81);">Our Products</h1>

  <!-- Product Menu Grid -->
  <center>
    <table>
      <tr>
        <td>
          <a href="Starters.php">
            <img src="menu image of starter.jpg"          height="300" width="300">
          </a>
        </td>
        <td>
          <a href="Main courses.php">
            <img src="menu main courses.jpg"              height="300" width="300">
          </a>
        </td>
        <td>
          <a href="Beverages.php">
            <img src="menu image of beverages.jpg"        height="300" width="300">
          </a>
        </td>
        <td>
          <a href="Soups and salads.php">
            <img src="menu image of soups and salads.jpg" height="300" width="300">
          </a>
        </td>
      </tr>
      <tr>
        <td><center><b>STARTERS       </b></center></td>
        <td><center><b>MAIN COURSES   </b></center></td>
        <td><center><b>BEVERAGES      </b></center></td>
        <td><center><b>SOUPS & SALADS </b></center></td>
      </tr>

      <tr>
        <td>
          <a href="Cake.php">
            <img src="cakes.jpeg"                 height="300" width="300">
          </a>
        </td>
        <td>
          <a href="Desserts.php">
            <img src="menu image of dessert.jpg"  height="300" width="300">
          </a>
        </td>
      </tr>
      <tr>
        <td><center><b>CAKES    </b></center></td>
        <td><center><b>DESSERTS </b></center></td>
      </tr>
    </table>
  </center>

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