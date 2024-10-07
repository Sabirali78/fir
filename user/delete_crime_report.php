<?php
include("db.php"); // Include your database connection file
include("assets/navbar.php"); // Include your navbar

// Start the session if it's not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: user_login.html");
    exit;
}

// Check if the ID is provided in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $report_id = $_GET['id'];
    
    // Prepare the SQL statement to delete the report
    $query = "DELETE FROM crime_report WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $report_id);
    
    // Execute the query and check if it was successful
    if ($stmt->execute()) {
        echo "Crime report deleted successfully.";
        header("location: http://localhost/fir/user/reports.php");
    } else {
        echo "Error deleting report: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Invalid report ID.";
}

// Close the database connection
$conn->close();
?>
