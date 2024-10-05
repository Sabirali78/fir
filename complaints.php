<?php
include("db.php");
include("assets/navbar.php");

// Check if the session is already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: user_login.html");
    exit;
}




?>
<h2>Complaints</h2>


<h4><a href="Add_complaints.php">Lodge A Complaint</a></h4>