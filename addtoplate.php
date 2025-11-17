<?php
session_start();

// If cart doesn't exist, create it
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add product from POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $product = $_POST['product_name'];
    $price   = $_POST['product_price'];

    // Add new item to cart
    $_SESSION['cart'][] = [
        "name"  => $product,
        "price" => $price
    ];

    // Redirect back to Order Now page
    header("Location: Order.php");
    exit();
}
?>
