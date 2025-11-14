<?php
session_start();

// Remove all items from the cart
if (isset($_SESSION['cart'])) {
    unset($_SESSION['cart']);
}

// Optionally, show a message or redirect
header("Location: Order.php");
exit();
?>
