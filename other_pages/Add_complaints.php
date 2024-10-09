<?php
include("../db.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if user is logged in and user_id is set in the session
session_start(); // Make sure the session is started
if (!isset($_SESSION['user_id'])) {
    die("User not logged in");
}

// Retrieve form data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $complaint_text = $_POST['complaint_text'];
    $police_station = $_POST['police_station'];
    $crime_id = $_POST['crime_id']; // Get crime_id from the form
    
    // Set complaint_date to current timestamp if not provided
    $complaint_date = date('Y-m-d H:i:s'); // Always use the current timestamp
    $status = 'Pending'; // Default status

    // Generate a unique tracking number
    $tracking_number = uniqid('complaint_');

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO complaints (user_id, complaint_text, police_station, complaint_date, status, tracking_number, crime_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
    
    // Correct the binding parameters to match the number of values
    $stmt->bind_param("issssss", $user_id, $complaint_text, $police_station, $complaint_date, $status, $tracking_number, $crime_id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New complaint added successfully";
        header("Location: http://localhost/fir/homepage.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
}

$conn->close();
?>