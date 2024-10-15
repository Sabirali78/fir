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
                <a class="nav-link" href="track.php">Track</a>
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

        <!-- page title -->
        <!-- /page title -->

        <!-- page content -->
        <div class="region region-content">
            <section id="block-system-main" class="block block-system clearfix">
                <div id="node-3608" class="node node-page clearfix" about="/about_us" typeof="foaf:Document">
                    <div class="content">
                        <div class="field field-name-body field-type-text-with-summary field-label-hidden">
                            <div class="field-items">
                                <div class="field-item even" property="content:encoded">
                                    <ul>
                                        <li><a href="about_us_content/history.php">History</a></li>
                                        <li><a href="/our-igps">Inspectors-General of Police</a></li>
                                        <li><a href="/police_formations">Police Formations</a></li>
                                        <li><a href="/contact_details">Contact Details</a></li>
                                        <li><a href="/RulesandRegs">Laws, Rules &amp; Regulations</a></li>
                                        <li><a href="/accountability_mechanism">Accountability Mechanism</a></li>
                                        <li><a href="/forms">Forms &amp; Circulars</a></li>
                                        <li><a href="/annual_policing_plan">Annual Policing Plans</a></li>
                                        <li><a href="http://shuhada.punjabpolice.gov.pk/">Our Shuhada</a></li>
                                        <li><a href="/policeofficersbooks">Books by Police Officers</a></li>
                                        <li><a href="/women_serving_in_police">Women Serving&nbsp;in Punjab Police</a></li>
                                        <li><a href="/licensing_offices">Driving Licensing Offices</a></li>
                                        <li><a href="/procurement">Tenders</a></li>
                                        <li><a href="/punjabpolice-jobs">Join Punjab Police</a></li>
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