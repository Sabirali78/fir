<?php
include("db.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if user is logged in and user_id is set in the session
if (!isset($_SESSION['user_id'])) {
    die("User not logged in");
}

// Retrieve form data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $complaint_text = $_POST['complaint_text'];
    $complaint_date = $_POST['complaint_date'];
    $status = 'Pending'; // Default status

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO complaints (user_id, complaint_text, complaint_date, status) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $user_id, $complaint_text, $complaint_date, $status);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New complaint added successfully";
        header("Location: http://localhost/fir/homepage.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
}

$conn->close();
?>
