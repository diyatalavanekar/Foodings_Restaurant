<?php
session_start();

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? 'home.php'));
    exit;
}

// basic validation
if (empty($_POST['item_name']) || !isset($_POST['item_price'])) {
    header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? 'home.php'));
    exit;
}

$item_name  = trim($_POST['item_name']);
$item_price = floatval($_POST['item_price']);
$qty        = isset($_POST['quantity']) ? max(1, intval($_POST['quantity'])) : 1;

// initialize cart if needed
if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add item: allow duplicates (each press adds one)
$_SESSION['cart'][] = [
    'name' => $item_name,
    'price' => $item_price,
    'qty' => $qty
];

// Redirect back to previous page with a tiny message (no page break)
$back = $_SERVER['HTTP_REFERER'] ?? 'home.php';
header("Location: $back");
exit;
