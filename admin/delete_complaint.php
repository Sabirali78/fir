<?php
session_start();
include("db.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if user is logged in and user_id is set in the session
if (!isset($_SESSION['admin_id'])) {
    die("Admin not logged in");
}

// Retrieve complaint ID from the query string
if (isset($_GET['id'])) {
    $complaint_id = $_GET['id'];

    // Prepare and bind
    $stmt = $conn->prepare("DELETE FROM complaints WHERE id = ?");
    $stmt->bind_param("i", $complaint_id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Complaint deleted successfully";
        header("Location: http://localhost/fir/admin/admin_Comlpaints.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Invalid request";
}

$conn->close();
?>
