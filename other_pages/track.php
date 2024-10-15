<?php

include("../db.php");

// Start session to access session variables
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    // Store the current page URL in session before redirecting to the login page
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; // Get the current page URL
    header("Location: ../user/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch complaints based on CNIC or Tracking No
$cnic = isset($_GET['cnic']) ? mysqli_real_escape_string($conn, $_GET['cnic']) : '';
$complaint_no = isset($_GET['complaint_no']) ? mysqli_real_escape_string($conn, $_GET['complaint_no']) : '';

$query = "SELECT * FROM complaints WHERE user_id = $user_id";
if (!empty($cnic)) {
    $query .= " AND cnic = '$cnic'";
}
if (!empty($complaint_no)) {
    $query .= " AND tracking_id = '$complaint_no'";
}

$complaints = mysqli_query($conn, $query);

?>

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
          /* navbar */
          .navbar {
            background-color: #14274e;
            padding: 0.5rem 8rem;
            border-bottom: 3px solid #fff;
            
        }
        .navbar-brand {
            color: #fff;
            display: flex;
            align-items: center;
            font-size: 25px;
        }
        .navbar-brand img {
            height: 50px;
            margin-right: 10px;
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


<nav class="navbar navbar-expand-lg fixed-top">
    <a class="navbar-brand" href="../homepage.php">
        <img src="logo.png">
        SecureCityHub
    </a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="../homepage.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about_us.php">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="public_service.php">Public Services</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="blogs.php">Blogs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="complaints_page.php">Complaints</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Track</a>
            </li>
        </ul>
        <div class="navbar-right d-flex">
            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="nav-item"> 
                    <a class="nav-link btn-signin" href="./user/User_dashboard.php">Profile</a>
                </div>
                <div class="nav-item mx-1">
                    <a class="nav-link btn-signin" href="./user/logout.php">Logout</a>
                </div>
            <?php else: ?>
                <div class="nav-item">
                <a class="nav-link btn-signin" href="./user/login.php?redirect=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>">Sign in</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</nav>


<div class="col-lg-12">
    <div class="card mb-6">
        <div class="card-header">
            <h4 class="card-title">Complaints</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table-auto w-full text-left">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">ID</th>
                            <th class="py-2 px-4 border-b">User ID</th>
                            <th class="py-2 px-4 border-b">Title</th>
                            <th class="py-2 px-4 border-b">Status</th>
                            <th class="py-2 px-4 border-b">Crime ID</th>
                            <th class="py-2 px-4 border-b">Tracking Number</th>
                            <th class="py-2 px-4 border-b">Updated At</th>
                            <th class="py-2 px-4 border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($complaints)) : ?>
                            <tr>
                                <td class="py-2 px-4 border-b"><?php echo $row['id']; ?></td>
                                <td class="py-2 px-4 border-b"><?php echo $row['user_id']; ?></td>
                                <td class="py-2 px-4 border-b"><?php echo $row['complaint_text']; ?></td>
                                <td class="py-2 px-4 border-b"><?php echo $row['status']; ?></td>
                                <td class="py-2 px-4 border-b"><?php echo $row['crime_id']; ?></td>
                                <td class="py-2 px-4 border-b"><?php echo $row['tracking_number']; ?></td>
                                <td class="py-2 px-4 border-b"><?php echo $row['complaint_date']; ?></td>
                                <td class="py-2 px-4 border-b">
                                    <a href="edit_noc.php?id=<?php echo $row['id']; ?>" class="text-blue-500 hover:text-blue-700">Edit</a>
                                    <a href="delete_noc.php?id=<?php echo $row['id']; ?>" class="text-red-500 hover:text-red-700 ml-4">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
