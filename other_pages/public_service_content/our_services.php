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
  
<nav class="navbar navbar-expand-lg fixed-top">
    <a class="navbar-brand" href="../homepage.php">
        <img src="../../assets/Images/logo1.png">
        SecureCity
    </a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="../../homepage.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="../about_us.php">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../public_service.php">Public Services</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../blogs.php">Blogs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="../complaints_page.php">Complaints</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../complaint_details.php">Track</a>
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
                <li><a href="#" class="nav-link" data-content="international-driving-license">International Driving License</a></li>
                <li><a href="#" class="nav-link" data-content="duplicate-driving-license">Duplicate Driving License</a></li>
                <li><a href="#" class="nav-link" data-content="endorsement-of-license">Endorsement of a License</a></li>
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
         
            <div id="international-driving-license" class="content-item">
    <h2>International Driving License</h2>
    <p>Citizens can obtain an International Driving License to drive legally in foreign countries.</p>
    <h3>Required Documents:</h3>
    <ul>
        <li>Original and copy of CNIC</li>
        <li>Original and copy of local driving license</li>
        <li>Passport size photographs (usually 2 or 3, depending on the specific requirements)</li>
        <li>Copy of valid passport</li>
        <li>Visa for the country of travel (if applicable)</li>
    </ul>
    <h3>Processing Fee:</h3>
    <p>The fee varies by location. Please check with your local issuing authority.</p>
    <h3>Turn Around Time:</h3>
    <p>Typically, the international driving license is issued within 2-3 working days.</p>
    <h3>Mode of Delivery:</h3>
    <p>By hand</p>
    <h3>Validity:</h3>
    <p>The international driving license is usually valid for one year from the date of issue.</p>
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