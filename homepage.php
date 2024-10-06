<?php 
include("db.php");
include("assets/navbar.php");

// Start session to access session variables
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!-- Your homepage content -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
        <title>Document</title>
    </head>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 20px;
}
/* 5 cards section */

.container1 {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}

.card {
    background-color: white;
    border: 1px solid #ddd;
    border-radius: 8px;
    width: 18%;
    margin: 10px;
    padding: 20px;
    position: relative;
    cursor: pointer;
    transition: box-shadow 0.3s ease;
}

.card:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.links {
    display: none; /* Initially hide the links */
    margin-top: 10px;
}

.links ul {
    padding-left: 20px;
}
/* 5 cards section */
    </style>
<body>
<!--Slider -->
        <div id="carouselExampleControls" class="carousel slide " data-bs-ride="carousel" style="margin-bottom: 20px;">
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="assets/Images/1.jpg" class="d-block" alt="..." width="100%" height="80%">
        </div>
        <div class="carousel-item">
        <img src="assets/Images/2.jpg" class="d-block" alt="..." width="100%" height="80%">
        </div>
        <div class="carousel-item">
        <img src="assets/Images/3.jpg" class="d-block " alt="..." width="100%" height="80%">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div >
<!--Slider End -->

<!-- 5 cards section -->

<div class="container1">
        <div class="card" onclick="toggleExpand(event, 'linkList1')">
            <h2>Card 1</h2>
            <div class="links" id="linkList1">
                <ul>
                    <li><a href="#">Link 1A</a></li>
                    <li><a href="#">Link 1B</a></li>
                    <li><a href="#">Link 1C</a></li>
                </ul>
            </div>
        </div>
        <div class="card" onclick="toggleExpand(event, 'linkList2')">
            <h2>Card 2</h2>
            
                <ul class="links" id="linkList2">
                    <li><a href="#">Link 2A</a></li>
                    <li><a href="#">Link 2B</a></li>
                    <li><a href="#">Link 2C</a></li>
                </ul>
            
        </div>
        <div class="card" onclick="toggleExpand(event, 'linkList3')">
            <h2>Card 3</h2>
            <div class="links" id="linkList3">
                <ul>
                    <li><a href="#">Link 3A</a></li>
                    <li><a href="#">Link 3B</a></li>
                    <li><a href="#">Link 3C</a></li>
                </ul>
            </div>
        </div>
        <div class="card" onclick="toggleExpand(event, 'linkList4')">
            <h2>Card 4</h2>
            <div class="links" id="linkList4">
                <ul>
                    <li><a href="#">Link 4A</a></li>
                    <li><a href="#">Link 4B</a></li>
                    <li><a href="#">Link 4C</a></li>
                </ul>
            </div>
        </div>
        <div class="card" onclick="toggleExpand(event, 'linkList5')">
            <h2>Card 5</h2>
            <div class="links" id="linkList5">
                <ul>
                    <li><a href="#">Link 5A</a></li>
                    <li><a href="#">Link 5B</a></li>
                    <li><a href="#">Link 5C</a></li>
                </ul>
            </div>
        </div>
    </div>

<!-- 5 cards section -->



<section>
   
            <center><H1 class="">Latest News</H1></center>
</section>

 <!--Cards Start-->
<<<<<<< HEAD
 <section style="display: inline-flex; margin-left: 150px;" >
        
        <div class="card d-flex mx-3" style="width: 18rem; margin-top: 50px " >
            <img src="assets/Images/Cards1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>


   
        <div class="card d-flex mx-3" style="width: 18rem; margin-top: 50px " >
            <img src="assets/Images/Cards2.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>   

        <div class="card d-flex mx-3" style="width: 18rem; margin-top: 50px " >
            <img src="assets/Images/Cards3.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>

        <div class="card d-flex mx-3" style="width: 18rem; margin-top: 50px " >
            <img src="assets/Images/Cards4.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
        

    
=======
    <div class="card d-flex" style="width: 18rem; margin-top: 100px " >
      <div style="justify-items: center;">  
    <img src="assets/Images/cards3.jpg" class="card-img-top" alt="...">
    <div class="card-body">
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
    </div>
    </div>

>>>>>>> 72b8edd6ad6cf8d86084b9a7651f5ad777270504




</section>
<!--Cards End -->

    








<!--Script-->
<!-- for 5 cards -->
<script>
    function toggleExpand(event, linkListId) {
    // Prevent the event from bubbling up to the document
    event.stopPropagation();

    const linkList = document.getElementById(linkListId);
    const allLinks = document.querySelectorAll('.links');

    // Toggle the clicked card's links
    linkList.style.display = (linkList.style.display === 'block') ? 'none' : 'block';

    // Hide other links if one is expanded
    allLinks.forEach(link => {
        if (link.id !== linkListId) {
            link.style.display = 'none';
        }
    });
}

// Close all expanded links when clicking outside
document.addEventListener('click', function() {
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



