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

 /* navbar */
 .navbar {
            background-color: #14274e;
            padding: 0rem 8rem;
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
                <a class="nav-link" href="../about_us.php">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../public_service.php">Public Services</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../complaints_page.php">Complaints</a>
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





    <section class="col-sm-12" id="contentsection" style="padding-top: 4rem;">

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

                                     

                                        <!-- main content --><a id="main-content"></a><!-- /main content -->

                                        <!-- page title -->
                                        <h1 class="title" id="page-title">
                                            History </h1>

                                        <div class="region region-content">
                                            <section id="block-system-main" class="block block-system clearfix">
                                                <div id="node-3572" class="node node-page clearfix" about="/pphistory" typeof="foaf:Document">


                                                    <span property="dc:title" content="History" class="rdf-meta element-hidden"></span><span property="sioc:num_replies" content="0" datatype="xsd:integer" class="rdf-meta element-hidden"></span>

                                                    <div class="content">
                                                        <div class="field field-name-body field-type-text-with-summary field-label-hidden">
                                                            <div class="field-items">
                                                                <div class="field-item even" property="content:encoded">
                                                                    <p class="rtejustify">The system of policing in Mughal India was organized on the basis of land tenure. <em>Zamindars</em> were responsible for apprehending disturbers of the public peace and performing other policing duties. At the level of the village, these functions were performed by the village headmen. In large towns, administration of the police was entrusted to functionaries called <em>kotwals</em> who discharged the combined duties of law enforcement, municipal administration and revenue collection. Patrol officers in&nbsp;form of village watchmen or <em>patels</em> in villages and peons, horse patrolmen and such other like men in the towns were present. Violent organized crime was usually dealt with by the military.</p>
                                                                    <p class="rtejustify">The British administration relieved the <em>zamindars</em> of their responsibility for police service and introduced magistrates with <em>daroghas</em> and other subordinate officers for police purposes. In Madras, the system of <em>daroghas</em> was abolished by Madras Regulation XI of 1816 and the establishment of the <em>tehsildars</em> was employed without distinction in revenue and police duties.&nbsp; A similar system was put in place in Bombay by Bombay Regulation XII of 1827. In Bengal, the system of <em>daroghas</em> was not abolished due to the absence of the subordinate revenue establishment but their powers were curtailed in 1811 by taking away some of their powers of cognizance.</p>
                                                                    <p class="rtejustify">In Bengal special control was introduced in 1808 by the appointment of a Superintendent or Inspector General for the divisions of Calcutta, Dacca and Murshidabad. In 1810, the system was extended to the divisions of Patna, Bareilly and Benares.&nbsp;However, with the appointment of Divisional Commissioners, the office of the Superintendent was abolished.</p>
                                                                    <p class="rtejustify">The next major change in the organization of police took place in Sindh where Sir Charles Napier, drawing inspiration from the Irish constabulary, developed a separate and self-contained police organization for the province. The Sindh Model was put into effect in Bombay and&nbsp;Madras in 1853 and 1859, respectively.</p>
                                                                    <p class="rtejustify">In Punjab, the Police were also organized on the pattern of Sindh but with two main branches, the Military Preventive Police and the Civil Detective Police. As this arrangement was not found to be satisfactory,&nbsp;the Government of India urged the Government of Punjab in 1860&nbsp;to look into the system of policing&nbsp;prevalent in the Province at that time.&nbsp; However, as the issue was of general importance, the Central Government appointed a commission to enquire into whole question of policing in British India. The Police Commission of 1860 recommended the abolition of the Military Arm of the Police, the appointment of an Inspector General of Police in the Province and the placement of police in a district under the District Superintendent. The Commission recommended that only the District Magistrate should exercise any police functions. Based on the recommendations of the Commission, the Government of India submitted a bill which was passed into law as Act V of 1861.&nbsp; The Police Act of 1861 was adopted by all the provinces except Bombay where a District Police Act was adopted in 1890.&nbsp; The Bombay District Police Act continued to remain in force in Sindh till the establishment of the one unit.</p>
                                                                    <p class="rtejustify">The organizational design that followed the Act survives to this day. Police became a subject to be administered by the provinces that were divided into police jurisdictions corresponding with the districts and the divisions. The police were made exclusively responsible for prevention and detection of crime. In the maintenance of public order they were responsible to the District Magistrate.</p>
                                                                    <p class="rtejustify">The Punjab Police Rules of 1934 documented the police practices as they stood at that time and introduced some new measures for improving administration and operational effectiveness of police. The content of the Rules reveals that the Punjab Police had grown into a thoroughly professional Police organization by 1934 and possessed considerable knowledge of the crime and criminals in the province. It had developed effective procedures and practices for dealing with various kinds of criminal activity. The administrative and disciplinary functions were also elaborated. The Rules have served as the model for similar sets of rules in other provinces of Pakistan and are still in force today.</p>
                                                                    <p class="rtejustify">The Punjab Police played a significant part in handling the refugee crisis of 1947-48. It continued as a separate organization till 1955 when it was merged with the police of other provinces to create the West Pakistan Police. There were several attempts to review and reform police organization and performance during the 1950s and 60s which, however, could not be implemented.</p>
                                                                    <p class="rtejustify">The legal framework of the police underwent a major change as a consequence of Devolution of Power Plan. The devolution of power plan called for the devolution of the authority of the provincial government to the districts and the introduction of public accountability of the police.&nbsp;</p>
                                                                    <p class="rtejustify">In line with the devolution of power plan the office of the District Magistrate was abolished in 2001 and a system of Public Safety Commissions was introduced.&nbsp; These changes were incorporated into a new Police Law which was promulgated in 2002. Apart from Public Safety Commissions, the Police Order 2002 also provided for a professional Police Complaints Authority, increased powers for the Inspector General of Police and separation of the watch &amp; ward and the Investigation functions of the Police.</p>
                                                                    <p class="rtejustify">The question of policing has been the subject of much debate before and after independence and a number of commissions, committees were formed by various governments for the purpose. Some of the more important commissions and committees are as follows:</p>
                                                                    <ul>
                                                                        <li class="rtejustify">Select Committee of 1832</li>
                                                                        <li class="rtejustify">Police Commission of 1860</li>
                                                                        <li class="rtejustify">Police Commission of 1902</li>
                                                                        <li class="rtejustify">Lumsden Committee of 1926</li>
                                                                        <li class="rtejustify">Police Commission of 1961 under Justice J.B.Constantine</li>
                                                                        <li class="rtejustify">Pakistan Police Commission of 1969 under Major General A.O.Mitha</li>
                                                                        <li class="rtejustify">Police Station Inquiry Committee of 1976 under M.A.K Chaudhry</li>
                                                                        <li class="rtejustify">Police Reforms Committee of 1976 under Rafi Raza</li>
                                                                        <li class="rtejustify">Police Committee of 1976 under Aslam Hayat</li>
                                                                        <li class="rtejustify">Police Reforms Implementation Committee of 1990 under M.A.K Chaudhry</li>
                                                                        <li class="rtejustify">Punjab Government Committee of 2001 under Shahzad Hassan Pervaiz</li>
                                                                        <li class="rtejustify">Focal Group on Police Reforms of 2000</li>
                                                                    </ul>
                                                                    <p class="rtejustify">&nbsp;</p>
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