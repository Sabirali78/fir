<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .navbar-nav {
        flex: 1;
        justify-content: center;
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
        color: #112255;
        border-radius: 3px;
        border: none;
        outline: none;
    }
    .btn-action:hover{
        background-color: transparent;
        color:white;
    }
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark nav-color">
    <a class="navbar-brand" href="#">SecureCity</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link  text-white" href="homepage.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  text-white" href="other_pages/about_us.php">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  text-white" href="other_pages/public_service.php">Public Services</a>
            </li>
            <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Complaints
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="other_pages/complaints_page.php">File a Complaint</a>
        <a class="dropdown-item" href="user/user_dashboard.php">Check Complaint Status</a>
        <a class="dropdown-item" href="user/user_Comlpaints.php">View Complaint History</a>
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

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
