<?php
session_start();

// Remove all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to login page (or home page)
header("Location: login.php");
exit();
?>
