<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    .navbar-nav {
        flex: 1;
        justify-content: center;
    }
    .navbar-right {
        display: flex;
        align-items: center;
    }
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link" href="homepage.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Add_fir.php">Fir</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="add_noc.php">NCS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Add_complaints.php">Complaints</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Report_crime.php">Report a Crime</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="public_service.php">Public Services</a>
            </li>
        </ul>
        <div class="navbar-right">
            <?php if (isset($_SESSION['user_id'])): ?>
                <a class="nav-link" href="./user/User_dashboard.php">Profile</a>
                <a class="nav-link" href="./user/logout.php">Logout</a>
            <?php else: ?>
                <a class="nav-link" href="./user/login.html">Login</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
