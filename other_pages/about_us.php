<?php 
include("../db.php");
include("other_page_navbar.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>

 
        body {
            font-family: Arial, sans-serif;
            
        }
        .breadcrumb{
            margin-top: 4rem;
            background-color: whitesmoke;
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

<?php 
include("other_page_footer.php");
?>