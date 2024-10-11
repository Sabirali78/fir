<?php
include("../db.php");

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];

    // Check if email is already registered
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "This username is already registered.";
    } else {
    

        // Insert new admin into the database
        $sql = "INSERT INTO users (name, username, password, phone_number, address, city_id, role) VALUES (?, ?, ?, ?, ?, 4, 'officer')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $name, $username, $password , $phone_number, $address,);

        if ($stmt->execute()) {
            echo "Admin registered successfully.";
            // Optionally redirect to the admin login page
            header("Location: officer_login.html");
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    $stmt->close();
}

$conn->close();
?>