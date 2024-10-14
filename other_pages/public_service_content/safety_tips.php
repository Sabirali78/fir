<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>


    body {
            font-family: Arial, sans-serif;
            
        }

        
.navbar {
    background-color: #14274e;
    padding: 1rem 8rem 1rem 8rem;
    border-bottom: 3px solid rgb(255, 255, 255);
}
.navbar-brand {
            color: #fff; /* Make the text white */
            display: flex;
            align-items: center;
            font-size: 25px;
        }

        .navbar-brand img {
            height: 50px;
            margin-right: 10px; /* Add some spacing between the logo and the text */
        }

        .navbar-brand span {
            color: #fff; /* Ensure the "SecureCityHub" part is also white */
        }
        .navbar-brand:hover{
            color:#f5a623;
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

<nav class="navbar navbar-expand-lg">
<a class="navbar-brand" href="../../homepage.php">
        <img src="logo.png">
        SecureCityHub
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
                <a class="nav-link" href="#">PKM Global</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="../complaints_page.php">Complaints</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Track</a>
            </li>
            
         
        </ul>
        <div class="navbar-right">
            <?php if (isset($_SESSION['user_id'])): ?>
                <a class="nav-link btn-action" href="./user/User_dashboard.php" >Profile</a>
                <a class="nav-link  mx-1 btn-action" href="./user/logout.php">Logout</a>
            <?php else: ?>
                <a class="nav-link btn-signin"  href="./user/login.html">Sign in</a>
            <?php endif; ?>
        </div>
    </div>
</nav>


    <!-- breadcrumbs -->
    <ol class="breadcrumb"><li><a href="../../homepage.php">Home</a></li>
<li><a href="../public_service.php" class="active-trail">public_services</a></li>
<li class="active last">Safety Tips</li>
</ol>    <!-- /breadcrumbs -->

<section id="block-system-main" class="block block-system clearfix">
<div id="node-3336" class="node node-page clearfix" about="/safetytips" typeof="foaf:Document">

  
      <span property="dc:title" content="Safety Tips" class="rdf-meta element-hidden"></span><span property="sioc:num_replies" content="0" datatype="xsd:integer" class="rdf-meta element-hidden"></span>
  
  <div class="content">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even" property="content:encoded"><p>Given below are some measures to be followed by general public for their safety:</p>
<ul><li class="rtejustify">Always stay alert and be aware of your surroundings.</li>
<li class="rtejustify">Get to know the neighbourhoods and neighbours where you live and work.</li>
<li class="rtejustify">Authenticate persons before renting them room or house.</li>
<li class="rtejustify">When sitting in your shops or offices, keep a vigilant eye around and ensure&nbsp;proper security arrangements.</li>
<li class="rtejustify">If you see something unusual in your surroundings, evaluate it. After evaluation, if you still cannot determine if a threat exists or not, notify to the area Police station.</li>
<li class="rtejustify">Police should also be informed of any strangers who may have come to stay in&nbsp;your&nbsp;neighborhood and whose activities appear suspicious.</li>
<li class="rtejustify">Try to avoid visiting crowded places, markets, hotels, offices, video shops without necessity.</li>
<li class="rtejustify">Do not touch any unidentified object. Explosive could be concealed in a number of&nbsp; objects including toys, transistors, lunch boxes, bottles, bags etc.</li>
<li class="rtejustify">Do not accept any parcels from strangers.</li>
<li class="rtejustify">Make eye contact with people around you.</li>
<li class="rtejustify">While traveling, always check under your seats for any suspicious objects.</li>
<li class="rtejustify">Keep your mobile phone charged and make sure that all emergency numbers are feeded in your mobile.</li>
<li class="rtejustify">Citizens should inform the police regarding any suspicious activities, abandoned vehicles, articles, and other objects by visiting the nearest police station or by calling&nbsp;15.</li>
<li class="rtejustify">Lock doors while driving.</li>
<li class="rtejustify">Ensure that you close all windows and quarter glasses of your vehicle and lock up the vehicle every time you park it, even if you’ll be gone only for a short while. The bonnet and boot should also be properly secured.</li>
<li class="rtejustify">Look around for people before leaving your car.</li>
<li class="rtejustify">Before opening a car door, drivers should make sure that its boot, bonnet and &nbsp;doors have not been tempered with. If there is any sign of suspicion, the local police should be approached for help, immediately.</li>
<li class="rtejustify">People have to be aware of all the signs of suspected suicide bombers, for example, putting on abnormally extra clothing, walking heavy-footed, excessive&nbsp;perspiration, something protruding from the body while walking,&nbsp;looking nervous, displaying suspicious behavior etc.</li>
</ul><p>&nbsp;</p>
</div></div></div>  </div>

  
  
</div>
</section>

<?php 
include("../other_page_footer.php");
?>