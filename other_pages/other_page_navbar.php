<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    .navbar{
        background-color: #1a7d35 ;
        padding: 0.7rem 5rem 0.7rem 5rem !important;
    }
    .navbar-nav {
        flex: 1;
        justify-content: center;
    }
    .nav-link{
        font-size: 20px;
    }
    .navbar-right {
        display: flex;
        align-items: center;
    }

    .nav-color{
        background-color: #112255;
    }

    .btn-action{
        background-color: white;
        color: black;
        border-radius: 3px;
        border: none;
        outline: none;
        font-size: large;
        font-weight: bold;
        padding: 7 2rem;
    }
    .btn-action:hover{
        background-color: black;
        color:white;
    }
    .navbar-brand{
        font-size: 30px !important;
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
                <a class="nav-link  text-white" href="../homepage.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  text-white" href="about_us.php">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  text-white" href="public_service.php">Public Services</a>
            </li>
            <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Complaints
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="complaints_page.php">File a Complaint</a>
        <a class="dropdown-item" href="../user/user_dashboard.php">Check Complaint Status</a>
        <a class="dropdown-item" href="../user/user_Comlpaints.php">View Complaint History</a>
    </div>
</li>
           
        </ul>
        <div class="navbar-right">
            <?php if (isset($_SESSION['user_id'])): ?>
                <a class="nav-link btn-action" href="./user/User_dashboard.php" >Profile</a>
                <a class="nav-link  mx-1 btn-action" href="./user/logout.php">Logout</a>
            <?php else: ?>
                <a class="nav-link btn-action" href="./user/login.html">Login</a>
            <?php endif; ?>
        </div>
    </div>
</nav>
