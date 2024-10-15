<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>

    body {
        font-family: Arial, sans-serif;

    }

            
/* navbar */


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
    p{
        font-size: 20px;
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





    <section class="col-sm-12" id="contentsection">

        <!-- page content -->
        <div class="region region-content">
            <section id="block-system-main" class="block block-system clearfix">
                <div id="node-3608" class="node node-page clearfix" about="/about_us" typeof="foaf:Document">
                    <div class="content">
                        <div class="field field-name-body field-type-text-with-summary field-label-hidden">
                            <div class="field-items">
                                <div class="field-item even" property="content:encoded">


                                    <section class="col-sm-12" id="contentsection">

                                        <!-- highlighted -->
                                        <!-- /highlighted -->

                                        <!-- breadcrumbs -->
                                        <ol class="breadcrumb">
                                            <li class="first"><a href="../../homepage.php">Home</a></li>
                                            <li><a href="../about_us.php" class="active-trail">About Us</a></li>
                                            <li class="active last">law & Rules</li>
                                        </ol> <!-- /breadcrumbs -->

                                        <!-- main content --><a id="main-content"></a><!-- /main content -->

                                        <!-- page title -->
                                        <h1 class="title" id="page-title">
                                        law & Rules </h1>

                                        <div class="region region-content">

                                            <section id="block-system-main" class="block block-system clearfix">
                                                <div id="node-3572" class="node node-page clearfix" about="/pphistory" typeof="foaf:Document">


                                                    <span property="dc:title" content="History" class="rdf-meta element-hidden"></span><span property="sioc:num_replies" content="0" datatype="xsd:integer" class="rdf-meta element-hidden"></span>

                                   
                                                    <div class="content">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden">
        <div class="field-items">
            <div class="field-item even" property="content:encoded">
                <p class="rtejustify">
                    The framework of laws, rules, and regulations governing the police in Pakistan is deeply rooted in the country's colonial history and has evolved over time to address contemporary needs and challenges.
                </p>
                <p class="rtejustify">
                    The foundational law for the police in Pakistan is the Police Act of 1861, established during British colonial rule. This Act laid down the structure, duties, and powers of the police, organizing the force along paramilitary lines and making it responsible for maintaining law and order, preventing and investigating crimes.
                </p>
                <p class="rtejustify">
                    Post-independence, the Police Rules of 1934 continued to guide the administration and operational aspects of the police. These rules, initially formulated for the Punjab Police, introduced measures for improved administrative efficiency and operational effectiveness and have served as a model for other provinces.
                </p>
                <p class="rtejustify">
                    In 2002, significant reforms were introduced through the Police Order 2002, replacing the Police Act of 1861 in many parts of the country. This order aimed at modernizing the police force and improving accountability. It established Public Safety Commissions at the district, provincial, and national levels to ensure civilian oversight of the police. It also created separate branches for investigation and watch & ward duties, enhanced the role of the Inspector General of Police, and introduced a Police Complaints Authority to handle grievances against police misconduct.
                </p>
                <p class="rtejustify">
                    The Anti-Terrorism Act of 1997 is another critical piece of legislation that impacts police operations, especially in relation to counter-terrorism. This Act grants special powers to the police for the prevention, investigation, and prosecution of terrorism-related offenses.
                </p>
                <p class="rtejustify">
                    The Pakistan Penal Code (PPC) and the Criminal Procedure Code (CrPC) form the backbone of criminal law in Pakistan, outlining the legal framework for the prosecution of crimes and the procedures for criminal investigations. The police are required to adhere to these codes in their daily operations.
                </p>
                <p class="rtejustify">
                    The National Action Plan (NAP), introduced in 2014 in response to rising terrorism, has also significantly influenced police regulations. NAP includes measures to enhance the capacity of the police to combat terrorism and maintain public order.
                </p>
                <p class="rtejustify">
                    In addition to national laws, each province in Pakistan has its own set of rules and regulations that govern the police. These provincial rules align with national legislation but address specific regional needs and contexts. For instance, the Khyber Pakhtunkhwa Police Act of 2017 introduced community policing initiatives and enhanced the autonomy and accountability of the police in the province.
                </p>
                <p class="rtejustify">
                    Ongoing efforts to reform the police in Pakistan focus on issues such as human rights, transparency, and public accountability. These reforms aim to build a more professional, effective, and community-oriented police force capable of addressing the diverse challenges of modern law enforcement.
                </p>
            </div>
        </div>
    </div>
</div>


                                                </div>
                                            </section>
                                        </div>
                                        <!-- /page content -->

                                    </section>



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
    <?php
    include "../other_page_footer.php";

    ?>