<?php 
include("db.php");
include("assets/navbar.php");

// Start session to access session variables
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to login page
    header("Location: user/login.html");
    exit();
}
?>
<h1>Complaints Page</h1>