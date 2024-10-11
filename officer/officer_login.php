<?php
include("../db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Start the session if it hasn't been started already
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Update the SQL query to select police officers
    $sql = "SELECT * FROM users WHERE username = ? AND role = 'officer'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $officer = $result->fetch_assoc();

        // Directly compare the plain text password
        if ($password === $officer['password']) {
            $_SESSION['officer_id'] = $officer['id'];
            $_SESSION['officer_name'] = $officer['name'];
            header("Location: officer_dashboard.php"); // Redirect to officer dashboard
            exit;
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No officer found with that username.";
    }

    $stmt->close();
    $conn->close();
}
?>
