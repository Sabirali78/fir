<?php 
include("../db.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

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
        body {
            font-family: Arial, sans-serif;
        }


        .Hero-section{
            background-image: url("../assets/Images/1692771843.png");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            width: 100vw;
            height: 60vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            display: flex;
            padding-top: 100px;
        }

        .about_us{
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #e9ecef;
            background-color: rgb(0, 0, 0,0.5);
            height: 100px;
        }

        .breadcrumb {
            margin-top: 4rem;
            background-color: whitesmoke;
            border-radius: 0.25rem;
            display: flex;
            gap: 1rem;
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
        #page-title {
            margin-top: 20px;
            margin-bottom: 20px;
            font-size: 2rem;
            color: #343a40;
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 10px;
        }
        .content ul {
            list-style-type: none;
            padding: 0;
        }
        .content ul li {
            background: #e9ecef;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
        }
        .content ul li a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
        .content ul li a:hover {
            text-decoration: underline;
        }


        .description-container {
            text-align: center;
            margin: 20px;
            font-family: Arial, sans-serif;
            font-size: 18px;
            color: #333;
        }

        /* Gallery section */

.grid-container {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 10px;
    margin: 0 auto;
    padding: 10px;
    margin-top: 10rem;
}

.grid-container img {
    width: 100%;
    height: auto;
    display: block;
}

@media (max-width: 800px) {
    .grid-container {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 400px) {
    .grid-container {
        grid-template-columns: 1fr;
    }
}

    </style>
</head>
<body>

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
<div class="Hero-section">
<h1 class="about_us">About Us</h1>

</div>

    <section class="col-sm-12" id="contentsection">
        <!-- breadcrumbs -->
        <ol class="breadcrumb">
            <li class="first"><a href="../homepage.php">Home</a></li>
            <li class="active last">About Us</li>
        </ol>
        <!-- /breadcrumbs -->

        <div class="description-container">
        Welcome to our website! Here you will find a variety of resources and information about our services. We are dedicated to providing you with the best experience possible. Our team works tirelessly to ensure that you have access to the most up-to-date information and tools. Whether you are looking for support, services, or just general information, we have got you covered. Our commitment to excellence means that we are always here to help you, no matter what your needs may be. Thank you for visiting, and we hope you enjoy your time here. If you have any questions or need further assistance, please do not hesitate to reach out to our support team. We are here to ensure that your experience is nothing short of exceptional. Explore our site and discover all the wonderful things we have to offer!
    </div>


    <div class="grid-container">
        <img src="../assets/Images/card10.jpg" alt="Image 1">
        <img src="../assets/Images/card11.jpg" alt="Image 2">
        <img src="../assets/Images/card12.jpg" alt="Image 3">
        <img src="../assets/Images/card13.jpg" alt="Image 4">
        <img src="../assets/Images/card14.jpg" alt="Image 5">
        <img src="../assets/Images/card18.jpg" alt="Image 6">
        <img src="../assets/Images/card16.jpg" alt="Image 7">
        <img src="../assets/Images/card17.jpg" alt="Image 8">
    </div>

        <!-- page content -->
        <div class="region region-content" style="margin-top: 10rem;">
            <section id="block-system-main" class="block block-system clearfix">
                <div id="node-3608" class="node node-page clearfix" about="/about_us" typeof="foaf:Document">
                    <div class="content">
                        <div class="field field-name-body field-type-text-with-summary field-label-hidden">
                            <div class="field-items">
                                <div class="field-item even" property="content:encoded">
                                    <ul>
                                        <li><a href="about_us_content/history.php">History</a></li>
                                        <li><a href="about_us_content/police_formation.php">Police Formations</a></li>
                                        <li><a href="about_us_content/law_rules.php">Laws, Rules &amp; Regulations</a></li>
                                        <li><a href="about_us_content/shuhada.php">Our Shuhada</a></li>
                                    </ul>
                                    <p>&nbsp;</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- /page content -->
    </section>
<?php 
include("other_page_footer.php");
?>