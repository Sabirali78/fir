<?php
include("db.php");

// Check if the session is already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the admin is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Get the complaint ID from the URL
$complaint_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($complaint_id <= 0) {
    echo "Invalid complaint ID.";
    exit;
}

// Prepare the DELETE query
$delete_query = "DELETE FROM complaints WHERE id = $complaint_id";

if (mysqli_query($conn, $delete_query)) {
    // Successfully deleted
    header("Location: http://localhost/fir/user/user_Comlpaints.php?message=Complaint deleted successfully.");
    exit;
} else {
    // Error occurred while deleting
    echo "Error deleting complaint: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
