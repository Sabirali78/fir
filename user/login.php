<?php
include("db.php");

// Start the session if it is not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Initialize error message variable
$errorMessage = '';

// Check if there's a redirect URL in the query string
if (isset($_GET['redirect']) && !empty($_GET['redirect'])) {
    $_SESSION['redirect_url'] = $_GET['redirect']; // Store it in the session
}

// Handle the login form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['username'];
    $password = $_POST['password'];

    // Update the SQL query to fetch city_id as well
    $sql = "SELECT id, name, password, city_id FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Compare the plain password from the database with the entered password
        if ($password === $user['password']) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['city_id'] = $user['city_id']; // Set city_id in session

            // Check if there is a redirect URL in the session
            if (isset($_SESSION['redirect_url']) && !empty($_SESSION['redirect_url'])) {
                $redirect_url = $_SESSION['redirect_url'];
                unset($_SESSION['redirect_url']); // Clear the session variable
            } else {
                // Use a default redirect URL if none is set
                $redirect_url = 'default_page.php'; // Change this to your desired default page
            }

            // Redirect to the appropriate page
            header("Location: $redirect_url");
            exit();
        } else {
            $errorMessage = "Invalid password.";
        }
    } else {
        $errorMessage = "No user found with that username.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login-container {
            display: flex;
            height: 100vh;
        }
        .login-left {
            flex: 1;
            background: url('https://dlims.punjab.gov.pk/images/login-bg.png') no-repeat center center;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-left img {
            max-width: 100%;
        }
        .login-right {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #ffffff;
        }
        .login-form {
            width: 100%;
            max-width: 400px;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        @media (max-width: 767.98px) {
            .login-left {
                display: none;
            }
        }
    </style>
</head>
<body class="bg-light">
    <div class="login-container">
        <div class="login-left d-none d-md-flex">
            <img src="../assets/images/login1.png" alt="DLIMS">
        </div>
        <div class="login-right w-100">
            <div class="login-form mx-auto">
                <h2 class="text-2xl font-bold mb-5 text-center">LOGIN</h2>
                <?php if ($errorMessage): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $errorMessage; ?>
                    </div>
                <?php endif; ?>
                <form action="login.php" method="POST">
                    <div class="mb-4">
                        <label for="username" class="block text-gray-700">Username</label>
                        <input type="text" id="username" name="username" class="form-control" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700">Password</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Sign In</button>
                </form>
                <div class="mt-4 text-center">
                    <a href="forgot_password.html" class="text-danger">Forgot Password?</a>
                </div>
                <div class="mt-4 text-center">
                    <span>Do not have an account? </span>
                    <a href="registration.php" class="text-primary">Create Account</a>
                </div>
                <div class="mt-4 text-center text-muted">
                    <span>Powered by SCH</span>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
