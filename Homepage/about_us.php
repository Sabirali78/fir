<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    .navbar-nav {
        flex: 1;
        justify-content: center;
    }
    .navbar-right {
        display: flex;
        align-items: center;
    }

        body {
            font-family: Arial, sans-serif;
        }
        .breadcrumb {
            background-color: #f8f9fa;
            border-radius: 0.25rem;
        }
        .breadcrumb a {
            color: #007bff;
            text-decoration: none;
        }
        .breadcrumb .active {
            color: #6c757d;
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
        .page-cover {
            position: relative;
            height: 200px;
            margin-top: 20px;
        }
        .cover-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://via.placeholder.com/1500x500');
            background-size: cover;
            background-position: center;
            border-radius: 0.25rem;
        }
        .cover-bg-mask {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 0.25rem;
        }
    </style>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link" href="../homepage.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about_us.php">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../Add_fir.php">Fir</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../add_noc.php">NCS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../complaints.php">Complaints</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../Report_crime.php">Report a Crime</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../public_service.php">Public Services</a>
            </li>
        </ul>
        <div class="navbar-right">
            <?php if (isset($_SESSION['user_id'])): ?>
                <a class="nav-link" href="./user/User_dashboard.php">Profile</a>
                <a class="nav-link" href="./user/logout.php">Logout</a>
            <?php else: ?>
                <a class="nav-link" href="./user/login.html">Login</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

    <section class="col-sm-12" id="contentsection">
        <!-- breadcrumbs -->
        <ol class="breadcrumb">
            <li class="first"><a href="../homepage.php">Home</a></li>
            <li class="active last">About Us</li>
        </ol>
        <!-- /breadcrumbs -->

        <!-- page title -->
        <h1 class="title" id="page-title">About Us</h1>
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
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
