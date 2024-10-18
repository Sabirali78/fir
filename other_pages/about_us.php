<?php 
include("../db.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
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
        body {
            font-family: Arial, sans-serif;
        }


        .Hero-section{
            background-image: url("../assets/Images/1692771843.png");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 60vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            display: flex;
            padding-top: 4rem;
        }

        .about_us{
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #e9ecef;
            background-color: rgb(0, 0, 0,0.5);
            height: 100%;
        }

        .breadcrumb {
            margin-top: 2rem;
            background-color: whitesmoke;
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


        .description-container {
            text-align: center;
            margin: 20px;
            font-family: Arial, sans-serif;
            font-size: 18px;
            color: #333;
        }

        /* Gallery section */

.grid-container {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 10px;
    margin: 0 auto;
    padding: 10px;
    margin-top: 10rem;
}

.grid-container img {
    width: 100%;
    height: auto;
    display: block;
}

@media (max-width: 800px) {
    .grid-container {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 400px) {
    .grid-container {
        grid-template-columns: 1fr;
    }
}

.container {
    display: flex;
    flex-wrap: wrap;
    gap: 9rem;
    height: 50vh;
    padding-top: 2rem;
}

.about-us {
    flex: 1;
    padding: 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 450px;
    
}

.map {
    flex: 1;
    height: 100vh;
}

.about-us h2, .about-us h3 {
    margin-top: 0;
}

.map iframe {
    width: 100%;
    border: 0;
}



.feedback{
    display: flex;
    justify-content: center;
    align-items: center;
}

.feedback-container {
    width: 50%;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    box-sizing: border-box;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 5px;
    font-weight: bold;
}

input, textarea {
    margin-bottom: 15px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 16px;
}

button {
    padding: 10px;
    border: none;
    border-radius: 4px;
    background-color: #007bff;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top">
<a class="navbar-brand" href="../homepage.php">
        <img src="../assets/Images/logo1.png">
        SecureCity
    </a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="../homepage.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about_us.php">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="public_service.php">Public Services</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="complaints_page.php">Complaints</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="complaint_details.php">Track</a>
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
                <a class="nav-link btn-signin" href="../user/login.php?redirect=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>">Sign in</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</nav>
<div class="Hero-section">
<h1 class="about_us">About Us</h1>

</div>

    <section class="col-sm-12" id="contentsection">


        <div class="description-container">
        Welcome to our website! Here you will find a variety of resources and information about our services. We are dedicated to providing you with the best experience possible. Our team works tirelessly to ensure that you have access to the most up-to-date information and tools. Whether you are looking for support, services, or just general information, we have got you covered. Our commitment to excellence means that we are always here to help you, no matter what your needs may be. Thank you for visiting, and we hope you enjoy your time here. If you have any questions or need further assistance, please do not hesitate to reach out to our support team. We are here to ensure that your experience is nothing short of exceptional. Explore our site and discover all the wonderful things we have to offer!
    </div>


    <div class="grid-container">
        <img src="../assets/Images/card10.jpg" alt="Image 1">
        <img src="../assets/Images/card11.jpg" alt="Image 2">
        <img src="../assets/Images/card12.jpg" alt="Image 3">
        <img src="../assets/Images/card13.jpg" alt="Image 4">
        <img src="../assets/Images/card14.jpg" alt="Image 5">
        <img src="../assets/Images/card18.jpg" alt="Image 6">
        <img src="../assets/Images/card16.jpg" alt="Image 7">
        <img src="../assets/Images/card17.jpg" alt="Image 8">
    </div>

    </section>




    <div class="container">
        <div class="about-us">
            <h3>Contact Information</h3>
            <p>Email: securecity@gmail.com</p>
            <p>Phone: +92-456-7890</p>
            <p>Address: 123 Main Street, Block 13, Karachi Sindh PK</p>
        </div>
        <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7235.697623998656!2d67.06114434653216!3d24.937219862075526!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33f5d79867657%3A0xb576576f8d5ef29b!2sFederal%20B%20Area%20Block%2013%20Gulberg%20Town%2C%20Karachi%2C%20Karachi%20City%2C%20Sindh%2C%20Pakistan!5e0!3m2!1sen!2s!4v1729108278822!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>


      <!-- page content -->
      <div class="region region-content" style="margin-top: 15rem;">
      <h2>INFORMATION</h2>

            <section id="block-system-main" class="block block-system clearfix">
                <div id="node-3608" class="node node-page clearfix" about="/about_us" typeof="foaf:Document">
                    <div class="content">
                        <div class="field field-name-body field-type-text-with-summary field-label-hidden">
                            <div class="field-items">
                                <div class="field-item even" property="content:encoded">
                                    <ul>
                                        <li><a href="about_us_content/history.php">History</a></li>
                                        <li><a href="about_us_content/police_formation.php">Police Formations</a></li>
                                        <li><a href="about_us_content/law_rules.php">Laws, Rules &amp; Regulations</a></li>
                                        <li><a href="about_us_content/shuhada.php">Our Shuhada</a></li>
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




        <!--Feedback Section Start-->
    <section class="text-center mt-4">
        <h1>User Feedback</h1>
    </section>

    <section class="container mt-4">
        <div class="row justify-content-center">

            <div class="col-lg-4 col-md-5 col-sm-6"> <!-- Card 1 -->
                <div class="card newroom shadow-sm"> <!-- Added shadow for depth -->
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex align-items-center mb-3"> <!-- Profile picture and username -->
                            <img src="https://via.placeholder.com/40" alt="Profile" class="rounded-circle me-2" style="margin-right: 4px;"> <!-- Placeholder for profile picture -->
                            <h4 style="color: #333;  margin: 0;">JohnDoe123</h4>
                        </div>
                        <p class="card-text flex-grow-1">"I feel safe in my community knowing that the police are always ready to help and respond quickly to emergencies."</p>
                        <small class="text-muted">Posted on October 11, 2024</small> <!-- Date -->
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-5 col-sm-6"> <!-- Card 2 -->
                <div class="card newroom shadow-sm"> <!-- Added shadow for depth -->
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex align-items-center mb-3 gap-3"> <!-- Profile picture and username -->
                            <img src="https://via.placeholder.com/40" alt="Profile" class="rounded-circle me-4" style="margin-right: 4px;"> <!-- Placeholder for profile picture -->
                            <h4 style="color: #333;  margin: 0;">JaneSmith456</h4>
                        </div>
                        <p class="card-text flex-grow-1">"The officers in our neighborhood are very approachable and always willing to listen to our concerns. Thank you!"</p>
                        <small class="text-muted">Posted on October 12, 2024</small> <!-- Date -->
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-5 col-sm-6"> <!-- Card 3 -->
                <div class="card newroom shadow-sm"> <!-- Added shadow for depth -->
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex align-items-center mb-3"> <!-- Profile picture and username -->
                            <img src="https://via.placeholder.com/40" alt="Profile" class="rounded-circle me-2" style="margin-right: 4px;"> <!-- Placeholder for profile picture -->
                            <h4 style="color: #333; margin: 0;">AlexWilson789</h4>
                        </div>
                        <p class="card-text flex-grow-1">"I appreciate the community outreach programs that help bridge the gap between the police and the public."</p>
                        <small class="text-muted">Posted on October 13, 2024</small> <!-- Date -->
                    </div>
                </div>
            </div>
        </div>
    </section>

        <section class="feedback">


    <div class="feedback-container">
        <h2>Feedback Form</h2>
        <form>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="feedback">Feedback:</label>
            <textarea id="feedback" name="feedback" rows="5" required></textarea>

            <button type="submit">Submit</button>
        </form>
    </div>


    </section>
<?php 
include("other_page_footer.php");
?>