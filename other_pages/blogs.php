<?php 
include("../db.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
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
        
/* navbar */
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

        .breadcrumb{
            margin-top: 4rem;
            background-color: #f8f9fa;
            border-radius: 0.25rem;
            display: flex;
            gap:1rem;
      
        }
        .breadcrumb a {
            color: #007bff;
            text-decoration: none;
            font-size: 20px;
        }
        .breadcrumb .active {
            color: #6c757d;
            font-size: 20px;
        }
        .breadcrumb>li+li:before {
            padding: 0 5px;
            color: #ccc;
            content: "/\00a0";
}

</style>
</head>
<body>
    

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
                <a class="nav-link" href="#">Track</a>
            </li>
            
         
        </ul>
        <div class="navbar-right">
            <?php if (isset($_SESSION['user_id'])): ?>
                <a class="nav-link btn-action" href="./user/User_dashboard.php" >Profile</a>
                <a class="nav-link  mx-1 btn-action" href="./user/logout.php">Logout</a>
            <?php else: ?>
                <a class="nav-link btn-signin"  href="./user/login.html">Sign in</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<div class="home" style="padding-top: 40px;">

  <!-- breadcrumbs -->
  <ol class="breadcrumb">
            <li class="first"><a href="../homepage.php">Home</a></li>
            <li class="active last">Blogs</li>
        </ol>
        <!-- /breadcrumbs -->

        <?php 
include("other_page_footer.php");
?>