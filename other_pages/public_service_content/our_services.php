<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SecureCity</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        :root {
            --navbar-bg: #1a7d35;
            --sidebar-bg: #f8f8f8;
            --sidebar-border: #ddd;
            --sidebar-hover-bg: #007bff;
            --sidebar-hover-color: #fff;
            --breadcrumb-bg: #f8f9fa;
            --breadcrumb-separator: #ccc;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: var(--navbar-bg);
            padding: 0.7rem 5rem;
        }

        .navbar-nav {
            flex: 1;
            justify-content: center;
        }

        .nav-link {
            font-size: 20px;
        }

        .navbar-right {
            display: flex;
            align-items: center;
        }

        .btn-action {
            background-color: white;
            color: black;
            border-radius: 3px;
            border: none;
            outline: none;
            font-size: large;
            font-weight: bold;
            padding: 7px 2rem;
        }

        .btn-action:hover {
            background-color: black;
            color: white;
        }

        .navbar-brand {
            font-size: 30px;
        }

        .container1 {
            display: flex;
            height: 100vh;
            gap: 10rem;
        }

        .sidebar {
            width: 300px;
            background-color: var(--sidebar-bg);
            border-right: 1px solid var(--sidebar-border);
            padding: 10px;

        }

        
        .sidebar ul {
            padding: 0;
        }

        .sidebar ul li {
            margin: 10px 0;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #333;
            display: block;
            padding: 10px;
            border-radius: 4px;
        }

        .sidebar ul li a.active,
        .sidebar ul li a:hover {
            background-color: var(--sidebar-hover-bg);
            color: var(--sidebar-hover-color);
        }

        .content {
            flex-grow: 1;
            padding: 20px;
            overflow-y: auto;
            

        }

        .content-item {
            display: none;
        }

        .content-item.active {
            display: block;
        }

        .breadcrumb {
            margin-top: 2em;
            background-color: var(--breadcrumb-bg);
            border-radius: 0.25rem;
            display: flex;
            gap: 1rem;
        }

        .breadcrumb a {
            color: var(--sidebar-hover-bg);
            text-decoration: none;
            font-size: 20px;
        }

        .breadcrumb .active {
            color: #6c757d;
            font-size: 20px;
        }

        .breadcrumb>li+li:before {
            padding: 0 5px;
            color: var(--breadcrumb-separator);
            content: "/\00a0";
        }

        .services {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">SecureCity</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="homepage.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="other_pages/about_us.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="other_pages/public_service.php">Public Services</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Complaints
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="other_pages/complaints_page.php">File a Complaint</a>
                        <a class="dropdown-item" href="user/user_dashboard.php">Check Complaint Status</a>
                        <a class="dropdown-item" href="user/user_Complaints.php">View Complaint History</a>
                    </div>
                </li>
            </ul>
            <div class="navbar-right">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a class="nav-link btn-action" href="./user/User_dashboard.php">Profile</a>
                    <a class="nav-link mx-1 btn-action" href="./user/logout.php">Logout</a>
                <?php else: ?>
                    <a class="nav-link btn-action" href="./user/login.html">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <div class="services">
        <h1>Our Services</h1>
    </div>
    <ol class="breadcrumb">
        <li><a href="../../homepage.php">Home</a></li>
        <li><a href="../public_service.php" class="active-trail">Public Services</a></li>
        <li class="active last">Our Services</li>
    </ol>


    <div class="container1">
        <nav class="sidebar">
            <ul class="sidebar_ul">
                <li><a href="#" class="nav-link active" data-content="learner-driving-license">Learner Driving License</a></li>
                <li><a href="#" class="nav-link" data-content="driving-license-renewal">Driving License Renewal</a></li>
                <li><a href="#" class="nav-link" data-content="international-driving-license">International Driving License</a></li>
                <li><a href="#" class="nav-link" data-content="duplicate-driving-license">Duplicate Driving License</a></li>
                <li><a href="#" class="nav-link" data-content="endorsement-of-license">Endorsement of a License</a></li>
                <li><a href="#" class="nav-link" data-content="cheracter_cerrificate">Cheracter</a></li>
            </ul>
        </nav>
        <div class="content">
            <div id="learner-driving-license" class="content-item active">
                
                <h2>Learner Driving License</h2>
                <p>Citizens can get Learner Driving License from any of the PKM.</p>
                <h3>Required Documents:</h3>
                <ul>
                    <li>Original and 1 Copy of CNIC</li>
                    <li>Get a Code Book of Traffic Rules & Regulation from Traffic Police Office.</li>
                    <li>Medical Certificate (for the candidates of 50 years or more)</li>
                </ul>
                <h3>Age Limits for Learner Permit:</h3>
                <ul>
                    <li>Motor Cycle/ Motor Car: 18 Years</li>
                    <li>LTV (Rickshaw, Taxi, Tractor Commercial): 21 Years</li>
                </ul>
                <h3>Processing Fee:</h3>
                <p>A Ticket of Rs.60 from any Post Office.</p>
                <h3>Turn Around Time:</h3>
                <p>Around 15 minutes, on spot delivery</p>
                <h3>Mode of Delivery:</h3>
                <p>By hand</p>
            </div>
            <div id="driving-license-renewal" class="content-item">
                <h2>Learner Driving License</h2>
                <p>Citizens can get Learner Driving License from any of the PKM.</p>
                <h3>Required Documents:</h3>
                <ul>
                    <li>Original and 1 Copy of CNIC</li>
                    <li>Get a Code Book of Traffic Rules & Regulation from Traffic Police Office.</li>
                    <li>Medical Certificate (for the candidates of 50 years or more)</li>
                </ul>
                <h3>Age Limits for Learner Permit:</h3>
                <ul>
                    <li>Motor Cycle/ Motor Car: 18 Years</li>
                    <li>LTV (Rickshaw, Taxi, Tractor Commercial): 21 Years</li>
                </ul>
                <h3>Processing Fee:</h3>
                <p>A Ticket of Rs.60 from any Post Office.</p>
                <h3>Turn Around Time:</h3>
                <p>Around 15 minutes, on spot delivery</p>
                <h3>Mode of Delivery:</h3>
                <p>By hand</p>
            </div>
            <div id="international-driving-license" class="content-item">
                <h2>International Driving License</h2>
                <p>Citizens can get Learner Driving License from any of the PKM.</p>
                <h3>Required Documents:</h3>
                <ul>
                    <li>Original and 1 Copy of CNIC</li>
                    <li>Get a Code Book of Traffic Rules & Regulation from Traffic Police Office.</li>
                    <li>Medical Certificate (for the candidates of 50 years or more)</li>
                </ul>
                <h3>Age Limits for Learner Permit:</h3>
                <ul>
                    <li>Motor Cycle/ Motor Car: 18 Years</li>
                    <li>LTV (Rickshaw, Taxi, Tractor Commercial): 21 Years</li>
                </ul>
                <h3>Processing Fee:</h3>
                <p>A Ticket of Rs.60 from any Post Office.</p>
                <h3>Turn Around Time:</h3>
                <p>Around 15 minutes, on spot delivery</p>
                <h3>Mode of Delivery:</h3>
                <p>By hand</p>
            </div>
            <div id="duplicate-driving-license" class="content-item">
                <h2>Duplicate Driving License</h2>
                <p>Citizens can get Learner Driving License from any of the PKM.</p>
                <h3>Required Documents:</h3>
                <ul>
                    <li>Original and 1 Copy of CNIC</li>
                    <li>Get a Code Book of Traffic Rules & Regulation from Traffic Police Office.</li>
                    <li>Medical Certificate (for the candidates of 50 years or more)</li>
                </ul>
                <h3>Age Limits for Learner Permit:</h3>
                <ul>
                    <li>Motor Cycle/ Motor Car: 18 Years</li>
                    <li>LTV (Rickshaw, Taxi, Tractor Commercial): 21 Years</li>
                </ul>
                <h3>Processing Fee:</h3>
                <p>A Ticket of Rs.60 from any Post Office.</p>
                <h3>Turn Around Time:</h3>
                <p>Around 15 minutes, on spot delivery</p>
                <h3>Mode of Delivery:</h3>
                <p>By hand</p>
            </div>
        
            <div id="endorsement-of-license" class="content-item ">
            <p class="services-title"><strong><u>Police Character Certificate</u></strong></p>
            <p>Police Character Certificate is required for travelling abroad, jobs in different organizations abroad, immigration etc.</p>
            <p class="services-title"><strong><u>Required Documents:</u></strong></p>
            <ul class="custom-bullets">

                <li> Original CNIC or B-Form and photocopy </li>
                <li> Original and copy of Passport</li>
                <li> Affidavit</li>
                <li> Authority Letter (If applicant is abroad). Authority letter with the stamp of relevant Embassy will be accepted,.</li>
                <li> Photograph (If certificate of any blood relative is required)</li>
                <li>If applicant is out of country, the form can be submitted by any blood relative (brother, father, mother, sister etc.) with authority letter of the applicant.</li>


            </ul>
            <p class="services-title"><strong><u>Processing Fee:</u></strong></p>
            <ul class="custom-bullets">
                <li> Rs. 500. The fee can be deposited on one of the counters of PKM</li>
            </ul>
            <p class="services-title"><strong><u>Turn Around Time:</u></strong></p>
            <ul class="custom-bullets">
                <li> 3 working days after application date</li>
            </ul>
            <p class="services-title"><strong><u>Mode of Delivery:</u></strong></p>
            <ul class="custom-bullets">
                <li> Courier</li>
            </ul>
        </div>


        <div id="cheracter_cerrificate" class="content-item ">
            <p class="services-title"><strong><u>Police Character Certificate</u></strong></p>
            <p>Police Character Certificate is required for travelling abroad, jobs in different organizations abroad, immigration etc.</p>
            <p class="services-title"><strong><u>Required Documents:</u></strong></p>
            <ul class="custom-bullets">

                <li> Original CNIC or B-Form and photocopy </li>
                <li> Original and copy of Passport</li>
                <li> Affidavit</li>
                <li> Authority Letter (If applicant is abroad). Authority letter with the stamp of relevant Embassy will be accepted,.</li>
                <li> Photograph (If certificate of any blood relative is required)</li>
                <li>If applicant is out of country, the form can be submitted by any blood relative (brother, father, mother, sister etc.) with authority letter of the applicant.</li>


            </ul>
            <p class="services-title"><strong><u>Processing Fee:</u></strong></p>
            <ul class="custom-bullets">
                <li> Rs. 500. The fee can be deposited on one of the counters of PKM</li>
            </ul>
            <p class="services-title"><strong><u>Turn Around Time:</u></strong></p>
            <ul class="custom-bullets">
                <li> 3 working days after application date</li>
            </ul>
            <p class="services-title"><strong><u>Mode of Delivery:</u></strong></p>
            <ul class="custom-bullets">
                <li> Courier</li>
            </ul>
        </div>

    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.sidebar').on('click', '.nav-link', function(e) {
                e.preventDefault();
                const targetContent = $(this).data('content');

                $('.nav-link').removeClass('active');
                $(this).addClass('active');

                $('.content-item').removeClass('active');
                $('#' + targetContent).addClass('active');
            });
        });
    </script>
</body>

</html>


<?php
include("../other_page_footer.php");
?>