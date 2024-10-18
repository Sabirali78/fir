<?php
include("../db.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Initialize variables for complaint details
$complaint = null;

// Check if tracking number is set in the GET request
if (isset($_GET['tracking_number'])) {
    // Get the tracking number from user input
    $tracking_number = $conn->real_escape_string($_GET['tracking_number']);

    // SQL query to get the complaint based on tracking number
    $sql = "SELECT * FROM complaints WHERE tracking_number = '$tracking_number'";
    $result = $conn->query($sql);

    // Check if any complaint was found
    if ($result->num_rows > 0) {
        // Fetch the complaint details
        $complaint = $result->fetch_assoc();
    } else {
        echo "<script>alert('No complaint found with that tracking number.');</script>";
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Complaint</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>

        
  /* navbar */
    .navbar {
            background-color: #14274e;
            padding: 0rem 8rem;
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

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
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
                <a class="nav-link"  href="complaints_page.php">Complaints</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="track.php">Track</a>
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

<div class="container mt-5 pt-5">
    <div class="card mb-6">
        <div class="card-header">
            <h4 class="card-title">Track Your Complaint</h4>
        </div>
        <div class="card-body">
            <h5>Please enter your tracking number to check the status of your complaint.</h5>
            <form method="GET" action="">
                <div class="mb-3">
                    <label for="trackingNumber" class="form-label">Tracking Number</label>
                    <input type="text" name="tracking_number" class="form-control" id="trackingNumber" placeholder="Enter your tracking number" required>
                </div>
                <button type="submit" class="btn btn-primary">Track Complaint</button>
            </form>

           <?php if ($complaint): ?>
    <h5 class="mt-4">Complaint Details:</h5>
    <table class="table table-bordered mt-3" id="complaintTable">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Description</th>
                <th>Status</th>
                <th>Date</th>
                <th>Tracking Number</th>
                <!-- Add more fields as necessary -->
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo htmlspecialchars($complaint['user_id']); ?></td>
                <td><?php echo htmlspecialchars($complaint['complaint_text']); ?></td>
                <td><?php echo htmlspecialchars($complaint['status']); ?></td>
                <td><?php echo htmlspecialchars($complaint['complaint_date']); ?></td>
                <td><?php echo htmlspecialchars($complaint['tracking_number']); ?></td> <!-- Adjust field name as necessary -->
            </tr>
        </tbody>
    </table>
    
    <!-- Print Button -->
    <button onclick="printTable()" class="btn btn-secondary mt-3">Print Complaint Details</button>
    
        </div>
    </div>
</div>
<script>
        function printTable() {
            var printContents = document.getElementById('complaintTable').outerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            window.location.reload(); // Reload the page after printing
        }
    </script>
                <?php endif; ?>

</body>
</html>
