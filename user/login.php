<?php
include("db.php");

// Start the session if it is not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// login.php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Update the SQL query to fetch city_id as well
    $sql = "SELECT id, name, password, city_id FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['city_id'] = $user['city_id']; // Set city_id in session

            // Successful login
            echo "Login successful. Welcome " . $user['name'] . "!";
            header("Location: ../homepage.php");
            exit; // Always exit after a header redirect
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that email address.";
    }

    $stmt->close();
    $conn->close();
}
?>
