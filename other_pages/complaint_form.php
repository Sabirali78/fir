<?php
include("../db.php");


// Check if the session is already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Store the current page URL in session before redirecting to the login page
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; // Get the current page URL
    header("Location: ../user/login.php");
    exit();
} else {
    $user_id = $_SESSION['user_id'];

    // Fetch the logged-in user's data
    $query = "SELECT * FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
}

// Fetch police station names
$police_stations = [];
$query_stations = "SELECT id, name FROM police_stations";
$stmt_stations = $conn->prepare($query_stations);
$stmt_stations->execute();
$result_stations = $stmt_stations->get_result();
while ($row = $result_stations->fetch_assoc()) {
    $police_stations[] = $row;
}

// Fetch crime titles
$crimes = [];
$query_crimes = "SELECT id, crime_title FROM crimes"; // Fetching crime id and title
$stmt_crimes = $conn->prepare($query_crimes);
$stmt_crimes->execute();
$result_crimes = $stmt_crimes->get_result();
while ($row = $result_crimes->fetch_assoc()) {
    $crimes[] = $row; // Storing both id and title for use in the select dropdown
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
    body{
        background-color: #6c757d;
        padding-top: 10rem;
    }
    .form-div {
        display: flex; /* Enable flexbox */
        justify-content: center; /* Center horizontally */
        align-items: center; /* Center vertically */
        height: 70vh; /* Full height of the viewport */
        margin: 0; /* Reset margin */
        margin-top: 10rem;
    }

    .guidance {
            background-color: #f8f9fa;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            font-size: 1rem;
            color: #333;
        }

    /* navbar */
 .navbar {
            background-color: #14274e;
            padding: 0 8rem;
            border-bottom: 3px solid #fff;
            
        }
        .navbar-brand {
            color: #fff;
            display: flex;
            align-items: center;
            font-size: 25px;
        }
        .navbar-brand img {
            height: 70px;
        }
        .navbar-brand span {
            color: #fff;
        }
        .navbar-brand:hover {
            color: #f5a623;
        }
        .nav-link {
            font-size: 18px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color: #fff;
            margin-right: 10px;
        }
        .nav-link:hover {
            color: #f5a623;
        }
        .btn-signin {
            background-color: #394867;
            color: #fff;
            border: none;
            padding: 5px 10px;
        }
        .btn-signin:hover {
            background-color: #2d4b73;
            color: #f5a623;
        }




    .container1 {
        background-color: #fff;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        width: 70%;
        border: 2px solid #007bff;
    }
        h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #007bff;
        }
        .form-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            flex-wrap: wrap;
        }
        .form-group label {
            padding-right: 1rem;
            margin: 0;
            color: #333;
            flex-basis:  25%; /* Set a base width for the labels */
        }
        input[type="text"],
        input[type="email"],
        textarea {
            flex: 1;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            
        }
        textarea {
            resize: vertical;
            width: 100%;
            height: 200px;
        }
        input[type="submit"],
        .btn-secondary {
            width: 100%;
            padding: 0.75rem;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            margin-top: 10px;
        }
        input[type="submit"]:hover,
        .btn-secondary:hover {
            background-color: #0056b3;
        }
        .disabled {
            background-color: #f8f9fa;
            color: #6c757d;
            cursor: not-allowed;
        }

        /* Responsive adjustments */
        @media (max-width: 600px) {
            .form-group {
                flex-direction: column; /* Stack items vertically */
                align-items: flex-start; /* Align items to the start */
            }
            .form-group label {
                flex-basis: auto; /* Reset label width */
                margin-bottom: 0.5rem; /* Add space below labels */
            }
            .form-group input {
                width: 100%; /* Full width for inputs */
            }
        }
        .links2{
        display: flex;
        justify-content: space-between;
        align-items: center;
        }
        .cancel_btn{
            text-decoration: none;
            padding: 0.75rem;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }

        select {
    flex: 1;
    padding: 0.5rem;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 1rem; /* Match font size with other inputs */
}

/* Optional: Change background color when the select is focused */
select:focus {
    outline: none;
    border-color: #007bff; /* Highlight border when focused */
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Add a slight shadow for effect */
}

</style>
<nav class="navbar navbar-expand-lg fixed-top">
    <a class="navbar-brand" href="../homepage.php">
        <img src="../assets/Images/logo1.png">
        SecureCity
    </a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="../homepage.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="about_us.php">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="public_service.php">Public Services</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="blogs.php">Blogs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="complaints_page.php">Complaints</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="complaint_details.php">Track</a>
            </li>
            
         
        </ul>
        <div class="navbar-right d-flex">
            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="nav-item"> 
                    <a class="nav-link btn-signin" href="../user/User_dashboard.php">Profile</a>
                </div>
                <div class="nav-item mx-1">
                    <a class="nav-link btn-signin" href="../user/logout.php">Logout</a>
            <?php else: ?>
                <div class="nav-item">
                <a class="nav-link btn-signin" href="./user/login.php?redirect=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>">Sign in</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</nav>

<div class="form-div">
    <div class="container1">
        <h2>Complaint Section</h2>
        <div class="guidance">
            Please fill out the following form to file your complaint. Your personal details are already provided for your convenience. Select the appropriate police station and crime from the dropdowns, and describe your complaint in detail.
        </div>
        <form action="Add_complaints.php" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" value="<?php echo htmlspecialchars($user['name']); ?>" disabled>
            </div>

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" value="<?php echo htmlspecialchars($user['username']); ?>" disabled>
            </div>

            <div class="form-group">
                <label for="cnic">CNIC Number:</label>
                <input type="text" class="form-control" id="cnic" value="<?php echo htmlspecialchars($user['CNIC_Number']); ?>" disabled>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" class="form-control" id="phone" value="<?php echo htmlspecialchars($user['phone_number']); ?>" disabled>
            </div>

            <div class="form-group">
                <label for="police_station">Police Station:</label>
                <select id="police_station_id" name="police_station_id" required>
                    <option value="" disabled selected>Select a Police Station</option>
                    <?php foreach ($police_stations as $station): ?>
                        <option value="<?php echo htmlspecialchars($station['id']); ?>"><?php echo htmlspecialchars($station['name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="crime_id">Crime:</label>
                <select id="crime_id" name="crime_id" required>
                    <option value="" disabled selected>Select a Crime</option>
                    <?php foreach ($crimes as $crime): ?>
                        <option value="<?php echo htmlspecialchars($crime['id']); ?>"><?php echo htmlspecialchars($crime['crime_title']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <label for="complaint_text">Enter Your Complaint Here:</label>
            <textarea id="complaint_text" name="complaint_text" required></textarea>

            <input type="submit" value="Add Complaint">
        </form>
    </div>
</div>