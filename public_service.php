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

    </style>
</head>
<body>
<?php include("assets/navbar.php");?>

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
                    <a href="https://dgip.gov.pk/eServices/online-passport.php" target="_blank">
                        <div class="d-flex align-items-center">
                            <div class="icon-container">
                                <img src="https://www.pakistan.gov.pk/storage/uploads/HUOwe4MT8tMKrXtZnLsUPxEltvlu405ilNVCSOAP.svg" alt="Passport">
                            </div>
                            <div class="sev-det ms-4">
                                <h6>Apply for Passport</h6>
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
                    <a href="https://dgip.gov.pk/immigration/" target="_blank">
                        <div class="d-flex align-items-center">
                            <div class="icon-container">
                                <img src="https://www.pakistan.gov.pk/storage/uploads/nZxKjx5KqCujN4RPGqfdEtL8KXD8vh3PLpHmT3wl.svg" alt="Immigration">
                            </div>
                            <div class="sev-det ms-4">
                                <h6>Immigration</h6>
                                <p>Immigration Policy | Dual Nationality | Citizenship Forms | NIC & NICOP Application Process</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="card p-3 d-flex">
                    <a href="https://visa.nadra.gov.pk" target="_blank">
                        <div class="d-flex align-items-center">
                            <div class="icon-container">
                                <img src="https://www.pakistan.gov.pk/website/assets/images/services/service-one.svg" alt="Visa">
                            </div>
                            <div class="sev-det ms-4">
                                <h6>Apply for Visa</h6>
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
include("assets/footer.php")

?>
<!--Footer End-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
