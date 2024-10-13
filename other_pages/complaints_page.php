<?php
include("../db.php");
include("other_page_navbar.php");

// Check if the session is already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the admin is logged in
if (!isset($_SESSION['user_id'])) {
    $user = null; // Set user to null if not logged in
} else {
    $user_id = $_SESSION['user_id'];

    // Fetch the logged-in user's data
    $query = "SELECT * FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
}

// Fetch police station names
$police_stations = [];
$query_stations = "SELECT id, name FROM police_stations";
$stmt_stations = $conn->prepare($query_stations);
$stmt_stations->execute();
$result_stations = $stmt_stations->get_result();
while ($row = $result_stations->fetch_assoc()) {
    $police_stations[] = $row;
}

// Fetch crime titles
$crimes = [];
$query_crimes = "SELECT id, crime_title FROM crimes"; // Fetching crime id and title
$stmt_crimes = $conn->prepare($query_crimes);
$stmt_crimes->execute();
$result_crimes = $stmt_crimes->get_result();
while ($row = $result_crimes->fetch_assoc()) {
    $crimes[] = $row; // Storing both id and title for use in the select dropdown
}
?>

<style>
    /* Add your existing styles here */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: silver;
    }

    .hero_section {
        display: flex;
        justify-content: center; /* Center horizontally */
        align-items: center;    /* Center vertically */
        width: 100%;
        height: 70vh; /* Adjust height as needed */
        background-image: url("../assets/Images/cards2-cp.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        position: relative; /* Required for absolute positioning of text_section */
    }

    .text_section {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 70%;
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

    .card {
        margin: 20px; /* Space around card */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Card shadow */
    }

    .list-group-item {
        font-size: 1.1rem; /* Font size for list items */
    }

    .card-header {
        background-color: #007bff; /* Header background color */
        color: white; /* Header text color */
}

.compalint-btn{
  margin-top: 2rem;
  margin-bottom: 2rem;
  
}

</style>
</head>
<body>

<div class="">
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
        <div class="card-footer text-muted">
            Please ensure that all information provided is accurate and truthful. Your cooperation helps us to take necessary actions effectively.
        </div>
        <div class="card-footer text-muted">
        
           <p style="display: inline;">click here to</p> <a class="btn btn-success" href="complaint_form.php">File a new Complaint</a>
    </div>
    </div>
</div>


<?php 
include("other_page_footer.php");
?>
