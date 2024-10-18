<?php
include("../db.php");

// Check if the session is already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
    /* Add your existing styles here */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: silver;
    }

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




    .hero_section {
        display: flex;
        justify-content: center; /* Center horizontally */
        align-items: center;    /* Center vertically */
        width: 100%;
        height: 70vh; /* Adjust height as needed */
        background-image: url("../assets/Images/card10.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        position: relative; /* Required for absolute positioning of text_section */
    }

    .text_section {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Transparent white background */
        padding: 20px; /* Padding for the text */
        border-radius: 10px; /* Rounded corners */
        color: white; /* Text color */
        text-align: center;
    }

    .hero_section h2 {
        margin-bottom: 15px; /* Space between title and paragraph */
        font-size: 2.5rem; /* Adjust font size */
    }

    .hero_section p {
        font-size: 1.2rem; /* Adjust font size */
    }

    body {
    background-color: #6c757d;
    padding-top: 5rem;
}

.card {
    background-color: #14274e; /* Set the card background color */
    color: #ffffff; /* Set the text color */
    border: none; /* Remove the default border */
    border-radius: 10px; /* Add rounded corners */
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2); /* Add a box shadow */
    margin: 2rem auto; /* Center the card */
}

.card-header {
    background-color: #394867; /* Slightly lighter color for the header */
    color: #ffffff;
    padding: 1rem;
    border-top-left-radius: 10px; /* Rounded corners for the header */
    border-top-right-radius: 10px; /* Rounded corners for the header */
}

.card-body {
    padding: 1.5rem;
}

.card-body .list-group-item {
    background-color: #14274e; /* Match the card background */
    color: #ffffff; /* Match the text color */
    border: none; /* Remove the default border */
    margin-bottom: 0.5rem; /* Add some space between items */
}

.card-footer {
    background-color: #394867; /* Slightly lighter color for the footer */
    color: #ffffff;
    padding: 1rem;
    border-bottom-left-radius: 10px; /* Rounded corners for the footer */
    border-bottom-right-radius: 10px; /* Rounded corners for the footer */
    text-align: center; /* Center the text */
}

.card-footer .btn-success {
    background-color: #00a651; /* Custom green color for the button */
    border: none; /* Remove the default border */
    padding: 0.5rem 1rem; /* Add some padding */
    border-radius: 5px; /* Rounded corners */
    text-decoration: none; /* Remove the underline */
}

.card-footer .btn-success:hover {
    background-color: #007b33; /* Darker green on hover */
}


</style>
</head>

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
                <a class="nav-link"  href="about_us.php">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="public_service.php">Public Services</a>
            </li>

            <li class="nav-item">
                <a class="nav-link"  href="complaints_page.php">Complaints</a>
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
                <a class="nav-link btn-signin" href="./user/login.php?redirect=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>">Sign in</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</nav>
<body>

<div style="padding-top: 50px;">
    <div class="hero_section">
        <div class="text_section">
            <h2>Welcome to the Complaints Page</h2>
            <p>
                Here, you can submit complaints related to police law and report any incidents that require attention. 
                Your concerns are important, and we are here to assist you.
            </p>
        </div>
    </div>
    <div class="card">
    <div class="card-header">
        <h4>How to Report a Complaint</h4>
    </div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item">
                <strong>Step 1:</strong> Fill in your personal details such as name, email, and phone number.
            </li>
            <li class="list-group-item">
                <strong>Step 2:</strong> Select the relevant police station where you wish to lodge your complaint.
            </li>
            <li class="list-group-item">
                <strong>Step 3:</strong> Choose the type of crime you are reporting from the list provided.
            </li>
            <li class="list-group-item">
                <strong>Step 4:</strong> Write a detailed description of your complaint in the designated text area.
            </li>
            <li class="list-group-item">
                <strong>Step 5:</strong> Once all details are filled in, click on the "Add Complaint" button to submit your report.
            </li>
        </ul>
    </div>
    <div class="card-footer">
        Please ensure that all information provided is accurate and truthful. Your cooperation helps us to take necessary actions effectively.
    </div>
    <div class="card-footer text-muted">
        <a class="btn btn-success" href="complaint_form.php">File a new Complaint</a>
    </div>
</div>

</div>


<?php 
include("other_page_footer.php");
?>
