<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>


        .navbar {
            background-color: #1a7d35;
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
        .nav-color {
            background-color: #112255;
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
        body {
            font-family: Arial, sans-serif;
        }
        .breadcrumb {
            margin-top: 4rem;
            background-color: #f8f9fa;
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

<section class="col-sm-12" id="contentsection">
    <ol class="breadcrumb">
        <li class="first"><a href="/">Home</a></li>
        <li><a href="../public_service.php" class="active-trail">Public Services</a></li>
        <li class="active last">Women Help</li>
    </ol>
    <h1 class="title" id="page-title">Inheritance Rights</h1>
    <div class="region region-content">
        <section id="block-system-main" class="block block-system clearfix">
            <div id="node-4069" class="node node-page clearfix">
                <div class="content">
                    <div class="field field-name-body field-type-text-with-summary field-label-hidden">
                        <div class="field-items">
                            <div class="field-item even">
                                <p>Steps for Protection of Inheritance Rights of Women in Punjab - Definite Share of Women in Inheritance</p>
                                <ul>
                                    <li>To ensure the share of women in inheritance, distribution of property has been held mandatory after sanctioning mutation of inheritance [<a href="/system/files/135-142A.pdf" target="_blank">S.135-A, 142-A Land Revenue Act</a>]</li>
                                    <li>It is mandatory to produce the NIC and Form B of the deceased and all his legal heirs including women, before the revenue officer for the transfer of property.</li>
                                    <li>In case the legal heirs do not reach a consensus in 30 days, the concerned revenue officer will himself conduct partition of property among legal heirs according to law.</li>
                                    <li>It is mandatory for the revenue officer to decide the matter of inheritance within 6 months.</li>
                                    <li>The registration fee of mutation with respect to transfer of inherited property of women has been abolished.</li>
                                    <li>District Enforcement of Inheritance Rights Committee has been established in every district to address and redress the grievance.</li>
                                    <li>Revenue staff is liable to be punished for negligence.</li>
                                    <li>Legal heirs can approach the concerned District Collector/DCO in case of complaint.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <h1 class="title" id="page-title">Under-age & Forced Marriages</h1>
    <div class="region region-content">
        <section id="block-system-main" class="block block-system clearfix">
            <div id="node-4094" class="node node-page clearfix">
                <div class="content">
                    <div class="field field-name-body field-type-text-with-summary field-label-hidden">
                        <div class="field-items">
                            <div class="field-item even">
                                <p>Under-age & Forced Marriage is a Crime</p>
                                <ul>
                                    <li>Any person marrying a girl of less than 16 years of age and the person conducting such marriage, including the Nikkah Solemnizer and Nikkah Registrar shall be liable for imprisonment up to 6 months and fine Rs: 50,000/-. [<a href="/system/files/PunjabMarrriageRestraint%28amd%292015.pdf" target="_blank">Punjab Child Marriage Restraint (amendment) Act 2015</a>]</li>
                                    <li>Customs like Wanni and marriage in lieu of compromise, or marriage with the Holy Quran are illegal, liable for imprisonment for 3 to 7 years and fine of Rs: 500,000/- [<a href="/system/files/310A498BC.pdf" target="_blank">S.310-A, 498-C Pakistan Penal Code</a>]</li>
                                    <li>Under-age and forced marriages are cognizable crimes under the law.</li>
                                    <li>Family Courts have been conferred the power to try the cases of marriage solemnized under the age of 16 years.</li>
                                    <li>Police has been authorized to take legal action against the person responsible for under-age and forced marriages.</li>
                                    <li>Protection of Women Act-2006, Child Marriage Restraint Act 1929 (amended 2015) & Vani Act shall strictly be enforced.</li>
                                    <li>Complain to your nearest Police Station or call 1043.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>

<?php 
    include"../other_page_footer.php";
?>