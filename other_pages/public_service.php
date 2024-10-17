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


body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
        }
        

        /* Improved Heading Styles */
        .heading-title {
            font-size: 36px;
            font-weight: 700;
            color: #01411c;
            margin-bottom: 25px;
        }
        

        .heading-title::after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background-color: #01411c;
            margin: 8px auto 0;
        }

        /* Service Section Styles */
        .services {
            margin-top: 40px;
        }

        /* Card Styles */
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: #ffffff;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .icon-container {
            width: 80px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card img {
            width: 80px;
            height: auto;
        }

        /* Service Text Styles */
        .sev-det {
            flex-grow: 1;
        }

        .sev-det h6 {
            font-size: 22px;
            font-weight: 600;
            color: #01411c;
            margin-bottom: 8px;
        }

        .sev-det p {
            font-size: 14px;
            color: #4a4a4a;
            margin: 0;
        }

        /* Responsive Spacing */
        @media (max-width: 768px) {
            .heading-title {
                font-size: 28px;
            }

            .sev-det h6 {
                font-size: 18px;
            }

            .sev-det p {
                font-size: 12px;
            }

            .icon-container {
                width: 60px;
            }

            .card img {
                width: 60px;
            }
        }

        /* Centering for Better Visual Balance */
        .d-flex {
            align-items: center;
        }

        /* Spacing Between Cards */
        .mb-4 {
            margin-bottom: 30px !important;
        }

        /* Smooth Hover Transition */
        a {
            text-decoration: none;
            color: inherit;
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

.Hero-section{
            background-image: url("../assets/Images/1692771843.png");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 60vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            display: flex;
            padding-top: 4rem;
        }

        .about_us{
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #e9ecef;
            background-color: rgb(0, 0, 0,0.5);
            height: 100%;
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

<div class="Hero-section">
<h1 class="about_us">Public Service</h1>

</div>



<section class="bg_light pb-2 " style="margin-top: 5rem; margin-bottom:5rem;">
    <div class="container text-center">
        <!-- Main Title -->
        <div class="row justify-content-center text-center py-5 mt-2">
            <h6 class="heading-title">Our Services</h6>
        </div>
    </div>

    <!-- Services Section -->
    <div class="container services">
        <div class="row justify-content-center">
            <!-- Card 1 -->
            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="card p-3 d-flex">
                    <a href="public_service_content\women_help.php">
                        <div class="d-flex align-items-center">
                            <div class="icon-container">
                                <img src="https://www.pakistan.gov.pk/storage/uploads/HUOwe4MT8tMKrXtZnLsUPxEltvlu405ilNVCSOAP.svg" alt="Passport">
                            </div>
                            <div class="sev-det ms-4">
                                <h6>Women Help</h6>
                                <p>Process Flow to Obtain Passport | Passport Types | Contact Regional Offices | e-Services</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="card p-3 d-flex">
                    <a href="https://dgip.gov.pk/immigration/" target="_blank">
                        <div class="d-flex align-items-center">
                            <div class="icon-container">
                                <img src="https://www.pakistan.gov.pk/storage/uploads/NDypCkGziTPdo44nhhpraLUvyXrRKjWVT89bwx8n.svg">
                            </div>
                            <div class="sev-det ms-4">
                                <h6>Family & Child Registration</h6>
                                <p>Child Registration Process | Family Registration Process</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="card p-3 d-flex">
                    <a href="public_service_content\our_services.php">
                        <div class="d-flex align-items-center">
                            <div class="icon-container">
                                <img src="https://www.pakistan.gov.pk/storage/uploads/nZxKjx5KqCujN4RPGqfdEtL8KXD8vh3PLpHmT3wl.svg" alt="Immigration">
                            </div>
                            <div class="sev-det ms-4">
                                <h6>Driving License</h6>
                                <p>Immigration Policy | Dual Nationality | Citizenship Forms | NIC & NICOP Application Process</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="card p-3 d-flex">
                    <a href="public_service_content\safety_tips.php">
                        <div class="d-flex align-items-center">
                            <div class="icon-container">
                                <img src="https://www.pakistan.gov.pk/website/assets/images/services/service-one.svg" alt="Visa">
                            </div>
                            <div class="sev-det ms-4">
                                <h6>Safety Tips</h6>
                                <p>Visa Policy | Online Visa Application | Visa Categories | Fee Structure | Work Visa</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

    
</div>
<!--Footer-->
<?php
include("other_page_footer.php");
?>
<!--Footer End-->

