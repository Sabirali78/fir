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

<section>
    <div class="container " >
        <div class="row">
            <center><H1 class="">Latest News</H1></center>
</section>

 <!--Cards Start-->
    <div class="card d-flex" style="width: 18rem; margin-top: 100px " >
      <div style="justify-items: center;">  
    <img src="assets/Images/Cards1.jpg" class="card-img-top" alt="...">
    <div class="card-body">
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
    </div>
    </div>





<!--Cards End -->

    








<!--Script-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>



