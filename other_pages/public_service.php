<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
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

    </style>
</head>
<body>
<?php include("other_page_navbar.php");?>


  <!-- breadcrumbs -->
  <ol class="breadcrumb">
            <li class="first"><a href="../homepage.php">Home</a></li>
            <li class="active last">Public Service</li>
        </ol>
        <!-- /breadcrumbs -->


<section class="bg_light pb-2">
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
                                <h6>Our Services</h6>
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


<!--Footer-->
<?php
include("other_page_footer.php");
?>
<!--Footer End-->

