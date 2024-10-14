<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* navbar */
        .navbar {
            background-color: #14274e;
            padding: 1rem 8rem 1rem 8rem;
            border-bottom: 3px solid rgb(255, 255, 255);
        }
        .navbar-brand {
            color: #fff; /* Make the text white */
            display: flex;
            align-items: center;
            font-size: 25px;
        }
        .navbar-brand img {
            height: 50px;
            margin-right: 10px; /* Add some spacing between the logo and the text */
        }
        .navbar-brand span {
            color: #fff; /* Ensure the "SecureCityHub" part is also white */
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
    <a class="navbar-brand" href="#">
        <img src="logo.png" alt="Logo">
        SecureCityHub
    </a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="homepage.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="other_pages/about_us.php">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="other_pages/public_service.php">Public Services</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="other_pages/blogs.php">Blogs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="other_pages/complaints_page.php">Complaints</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="other_pages/track.php">Track</a>
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

