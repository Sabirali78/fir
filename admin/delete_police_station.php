<?php
// Include your database connection file
include 'db.php';

// Check if the 'id' parameter is present in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Create a prepared statement to delete the record
    $stmt = $conn->prepare("DELETE FROM police_stations WHERE id = ?");
    $stmt->bind_param("i", $id);

    // Execute the statement
    if ($stmt->execute()) {
        // Record deleted successfully, redirect to the main page or another page
        header("Location: http://localhost/fir/admin/stations.php");
        exit();
    } else {
        // Error occurred, show an error message
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    // No 'id' parameter, show an error message or redirect to the main page
    echo "No record ID provided.";
}

// Close the database connection
$conn->close();
?>
