<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

if (!(htmlspecialchars($_SESSION["role"]) == 1)) {
    $success_url = 'http://localhost/hk_new/checkout/success.php';
    $failure_url = 'http://localhost/hk_new/checkout/failure.php';

} else {
    $success_url = 'http://localhost/hk_new/checkout/success.php';
    $failure_url = 'http://localhost/hk_new/checkout/success.php';
}
?>