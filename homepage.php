<?php 
include("db.php");
include("assets/navbar.php");

// Start session to access session variables
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<link rel="stylesheet" href="assets/homepage.css">
<!-- Your homepage content -->  

<!--Slider -->
       
        <img src="assets/Images/bg.png" class="d-block" alt="..." width="100%" height="80%">
        
      
<!--Slider End -->

<!-- 5 cards section -->
 
<div class="container1">
    <h1>PUBLIC SERVICES</h1>
    <div class="container2">
        <div class="container_card" onclick="toggleExpand(event, 'linkList1')">
            <i class="fa-solid fa-file"></i>
            <p class="cards-title">Reports</p>
        </div>
        <div class="container_card" onclick="toggleExpand(event, 'linkList2')">
            <i class="fa-solid fa-user"></i>
            <p class="cards-title">Tell us about</p>
        </div>
        <div class="container_card" onclick="toggleExpand(event, 'linkList3')">
            <i class="fa-solid fa-award"></i>
            <p class="cards-title">Apply or Register</p>
        </div>
        <div class="container_card" onclick="toggleExpand(event, 'linkList4')">
            <i class="fa-solid fa-person-circle-question"></i>
            <p class="cards-title">Request</p>
        </div>
        <div class="container_card" onclick="toggleExpand(event, 'linkList5')">
            <i class="fa-solid fa-phone"></i>
            <p class="cards-title">Connect</p>
        </div>
    </div>
</div>

<div class="links-container" id="linksContainer">
    <div class="links" id="linkList1">
        <ul>
            <li><a href="#">Link 1A</a></li>
            <li><a href="#">Link 1B</a></li>
            <li><a href="#">Link 1C</a></li>
        </ul>
    </div>
    <div class="links" id="linkList2">
        <ul>
            <li><a href="#">Link 2A</a></li>
            <li><a href="#">Link 2B</a></li>
            <li><a href="#">Link 2C</a></li>
        </ul>
    </div>
    <div class="links" id="linkList3">
        <ul>
            <li><a href="#">Link 3A</a></li>
            <li><a href="#">Link 3B</a></li>
            <li><a href="#">Link 3C</a></li>
        </ul>
    </div>
    <div class="links" id="linkList4">
        <ul>
            <li><a href="#">Link 4A</a></li>
            <li><a href="#">Link 4B</a></li>
            <li><a href="#">Link 4C</a></li>
        </ul>
    </div>
    <div class="links" id="linkList5">
        <ul>
            <li><a href="#">Link 5A</a></li>
            <li><a href="#">Link 5B</a></li>
            <li><a href="#">Link 5C</a></li>
        </ul>
    </div>
</div>
<!-- 5 cards section -->



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
    </div>




<!--News Room Start-->
<section class="text-center">
        <h1>News Room</h1>
    </section>

    <section class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card newroom">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn" style="color: white; background-color:#112255;">Go somewhere</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card newroom">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn" style="color: white; background-color:#112255;">Go somewhere</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card newroom">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn" style="color: white; background-color:#112255;">Go somewhere</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card newroom">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn" style="color: white; background-color:#112255;">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--News Room End-->

<!--Footer Start-->
<?php
include("assets/footer.php");
?>
<!--Footer End-->



    








<!--Script-->
<!-- for 5 cards -->
<script>
    function toggleExpand(event, listId) {
        event.stopPropagation();
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
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>



