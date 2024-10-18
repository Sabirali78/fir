<?php
include("db.php");
// Start session to access session variables
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/homepage.css">
    <style>
        /* navbar */
        .navbar {
            background-color: #14274e;
            padding: 0rem 8rem;
            border-bottom: 3px solid rgb(255, 255, 255);
        }

        .navbar-brand {
            color: #fff;
            /* Make the text white */
            display: flex;
            align-items: center;
            font-size: 25px;
        }

        .navbar-brand img {
            height: 70px;
        }

        .navbar-brand span {
            color: #fff;
            /* Ensure the "SecureCityHub" part is also white */
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
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="../homepage.php">
            <img src="assets/Images/logo1.png">
            SecureCity
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="homepage.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="other_pages/about_us.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="other_pages/public_service.php">Public Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="other_pages/complaints_page.php">Complaints</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="other_pages/complaint_details.php">Track</a>
                </li>
            </ul>
            <div class="navbar-right d-flex">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <div class="nav-item">
                        <a class="nav-link btn-signin" href="./user/User_dashboard.php">Profile</a>
                    </div>
                    <div class="nav-item mx-1">
                        <a class="nav-link btn-signin" href="./user/logout.php">Logout</a>
                    </div>
                <?php else: ?>
                    <div class="nav-item">
                        <a class="nav-link btn-signin" href="./user/login.php?redirect=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>">Sign in</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <!-- Your homepage content -->

    <!--Slider -->
    <img src="assets/Images/bg.png" class="d-block" alt="..." width="100%" height="80%">


    <!--Slider End -->

    <!-- 5 cards section -->
    <!-- 
<div class="container1">
    <h1>PUBLIC SERVICES</h1>
    <div class="container2">
    <div class="container_card" onclick="toggleExpand(event, 'linkList1')">Card 1</div>
    <div class="container_card" onclick="toggleExpand(event, 'linkList2')">Card 2</div>
    <div class="container_card" onclick="toggleExpand(event, 'linkList3')">Card 3</div>
    <div class="container_card" onclick="toggleExpand(event, 'linkList4')">Card 4</div>
    <div class="container_card" onclick="toggleExpand(event, 'linkList5')">Card 5</div>
</div>
</div>

<div class="links-container" id="linksContainer">
    <div class="links" id="linkList1">
        <ul>
            <li><a href="#">Link 1A</a></li>
            <li><a href="#">Link 1B</a></li>
            <li><a href="#">Link 1C</a></li>
            <li><a href="#">Link 1d</a></li>
        </ul>
    </div>
    <div class="links" id="linkList2">
        <ul>
            <li><a href="#">Link 2A</a></li>
            <li><a href="#">Link 2B</a></li>
            <li><a href="#">Link 2C</a></li>
            <li><a href="#">Link 2D</a></li>
        </ul>
    </div>
    <div class="links" id="linkList3">
        <ul>
            <li><a href="#">Link 3A</a></li>
            <li><a href="#">Link 3B</a></li>
            <li><a href="#">Link 3C</a></li>
            <li><a href="#">Link 3D</a></li>
        </ul>
    </div>
    <div class="links" id="linkList4">
        <ul>
            <li><a href="#">Link 4A</a></li>
            <li><a href="#">Link 4B</a></li>
            <li><a href="#">Link 4C</a></li>
            <li><a href="#">Link 4D</a></li>

        </ul>
    </div>
    <div class="links" id="linkList5">
        <ul>
            <li><a href="#">Link 5A</a></li>
            <li><a href="#">Link 5B</a></li>
            <li><a href="#">Link 5C</a></li>
            <li><a href="#">Link 5D</a></li>
        </ul>
    </div>
</div> -->
    <!-- 5 cards section -->

    <div class="partner">
                <!-- Start Big Heading -->

                <!-- End Big Heading -->
                <!--Start Clients Carousel-->
                <div class="our-clients">
                    <div class="clients-carousel custom-carousel touch-carousel owl-carousel owl-theme" data-appeared-items="4" data-navigation="true">
                        <!-- Client 1 -->
                        <div class="client-item item">
                            <a href="#"><img src="https://pkm.punjab.gov.pk/assets/frontend/images/c2.png" alt=""></a>
                        </div>
                        <!-- Client 2 -->
                        <div class="client-item item">
                            <a href="#"><img src="https://pkm.punjab.gov.pk/assets/frontend/images/c4.png" alt=""></a>
                        </div>
                        <!-- Client 3 -->
                        <div class="client-item item">
                            <a href="#"><img src="https://pkm.punjab.gov.pk/assets/frontend/images/c3.png" alt=""></a>
                        </div>
                        <!-- Client 4 -->
                        <div class="client-item item">
                            <a href="#"><img src="https://pkm.punjab.gov.pk/assets/frontend/images/c1.png" alt=""></a>
                        </div>
                    </div>
                </div>
                <!-- End Clients Carousel -->
    </div>


    <div class="container text-center">
        <!-- Main Title -->
        <div class=" justify-content-center text-center">
            <h6 class="heading-title">Gallery</h6>
        </div>
    </div>
    <div class="grid-container">
        <img src="assets/Images/card10.jpg" alt="Image 1">
        <img src="assets/Images/card11.jpg" alt="Image 2">
        <img src="assets/Images/card12.jpg" alt="Image 3">
        <img src="assets/Images/card13.jpg" alt="Image 4">
        <img src="assets/Images/card14.jpg" alt="Image 5">
        <img src="assets/Images/card18.jpg" alt="Image 6">
        <img src="assets/Images/card16.jpg" alt="Image 7">
        <img src="assets/Images/card17.jpg" alt="Image 8">
    </div>





    <!-- 
<div class="section">
    <div class="container">
        <h1 class="text-center" style="margin-top: 100px;">Latest News</h1>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card">
                    <img src="assets/Images/Cards1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card">
                    <img src="assets/Images/Cards2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card">
                    <img src="assets/Images/Cards3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card">
                    <img src="assets/Images/Cards4.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->


    <div class="row" id="pp-b07" style="margin: 0;">
        <div class="banner07 col-sm-12">

            <div id="onefive-txt-1">In Case of an Emergency, Call
            </div>
            <div id="onefive-txt-2">15</div>
        </div>
    </div>



    <!--News Room Start-->


    <section class="container mt-4" style="margin: 20px auto;">
        <h1 class="text-center">News Room</h1>
        <div class="row justify-content-center">

            <div class="col-lg-4 col-md-5 col-sm-6 mb-4"> <!-- Changed col sizes for wider cards -->
                <div class="card newroom" style="height: 400px; margin-bottom: 20px;"> <!-- Added height -->
                    <div class="card-body d-flex flex-column"> <!-- Added flexbox for consistent spacing -->
                        <h4 style="color: #333;">National Inter-Departmental Karate Championship: Police Athletes Shine with 6 Medals</h4> <!-- Darker heading -->
                        <h5 style="color: red;">October 11, 2024</h5> <!-- Red date -->
                        <p class="card-text flex-grow-1">Police athletes showcased their skills and determination at the recent bringing home six medals. Lorem ipsum, dolor sit elit. Quaerat delectus consequuntur tempora nihil omnis ipsam nesciunt minus suscipit.</p>
                        <a href="#" class="btn mt-auto" style="color: white; background-color:#112255;">Read More</a> <!-- Added margin to the button for proper spacing -->
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-5 col-sm-6 mb-4"> <!-- Changed col sizes for wider cards -->
                <div class="card newroom" style="height: 400px; margin-bottom: 20px;"> <!-- Added height -->
                    <div class="card-body d-flex flex-column"> <!-- Added flexbox for consistent spacing -->
                        <h4 style="color: #333;">Local Community Celebrates Annual Festival with Enthusiasm</h4> <!-- Darker heading -->
                        <h5 style="color: red;">October 12, 2024</h5> <!-- Red date -->
                        <p class="card-text flex-grow-1">The annual community festival brought together families for a day filled with fun, games, and local food stalls, fostering a sense of unity and joy. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat delectus consequuntur tempora nihil omnis ipsam nesciunt minus suscipit.</p>
                        <a href="#" class="btn mt-auto" style="color: white; background-color:#112255;">Read More</a> <!-- Added margin to the button for proper spacing -->
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-5 col-sm-6 mb-4"> <!-- Changed col sizes for wider cards -->
                <div class="card newroom" style="height: 400px; margin-bottom: 20px;"> <!-- Added height -->
                    <div class="card-body d-flex flex-column"> <!-- Added flexbox for consistent spacing -->
                        <h4 style="color: #333;">City Marathon Draws Participants from Across the Region</h4> <!-- Darker heading -->
                        <h5 style="color: red;">October 13, 2024</h5> <!-- Red date -->
                        <p class="card-text flex-grow-1">The city’s annual marathon attracted runners of all ages, promoting fitness and healthy living, while supporting local charities. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat delectus consequuntur tempora nihil omnis ipsam nesciunt minus suscipit.</p>
                        <a href="#" class="btn mt-auto" style="color: white; background-color:#112255;">Read More</a> <!-- Added margin to the button for proper spacing -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--News Room End-->




    <!--Feedback Section Start-->
    <section class="text-center mt-4">
        <h1>User Feedback</h1>
    </section>

    <section class="container mt-4">
        <div class="row justify-content-center">

            <div class="col-lg-4 col-md-5 col-sm-6 mb-4"> <!-- Card 1 -->
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

            <div class="col-lg-4 col-md-5 col-sm-6 mb-4"> <!-- Card 2 -->
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

            <div class="col-lg-4 col-md-5 col-sm-6 mb-4"> <!-- Card 3 -->
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
    <!--Feedback Section End-->










    <!--Script-->
    <!-- for 5 cards -->
    <script>
        function toggleExpand(event, listId) {
            event.stopPropagation(); // Prevent event bubbling to body click listener
            const linksContainer = document.getElementById('linksContainer');
            const links = document.getElementById(listId);

            // Close any other open links
            const allLinks = document.querySelectorAll('.links');
            allLinks.forEach(link => {
                if (link !== links) {
                    link.style.display = 'none';
                }
            });

            // Toggle the visibility of the clicked card's links
            if (links.style.display === 'block') {
                links.style.display = 'none';
                linksContainer.style.display = 'none';
            } else {
                links.style.display = 'block';
                linksContainer.style.display = 'block';

                // Set the position of the links container below the container2
                const container2 = document.querySelector('.container2');
                const container2Rect = container2.getBoundingClientRect();
                linksContainer.style.top = `${container2Rect.bottom + window.scrollY}px`; // Position below the container2
            }
        }

        document.body.addEventListener('click', function() {
            const linksContainer = document.getElementById('linksContainer');
            linksContainer.style.display = 'none';

            const allLinks = document.querySelectorAll('.links');
            allLinks.forEach(link => {
                link.style.display = 'none';
            });
        });

        // Stop propagation for links container click to prevent closing
        document.getElementById('linksContainer').addEventListener('click', function(event) {
            event.stopPropagation();
        });
    </script>

    <script src="path/to/jquery.min.js"></script>
    <script src="path/to/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".clients-carousel").owlCarousel({
                items: 4,
                navigation: true,
                pagination: false,
                autoPlay: true,
                navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
            });
        });
    </script>
    <!--Footer Start-->
    <?php
    include("assets/footer.php");
    ?>
    <!--Footer End-->