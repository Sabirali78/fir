<?php
include("db.php");
include("assets/navbar.php");

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
$query_stations = "SELECT name FROM police_stations";
$stmt_stations = $conn->prepare($query_stations);
$stmt_stations->execute();
$result_stations = $stmt_stations->get_result();
while ($row = $result_stations->fetch_assoc()) {
    $police_stations[] = $row['name'];
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
        background-image: url("assets/Images/cards2-cp.jpg");
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
.form {
        display: flex; /* Enable flexbox */
        justify-content: center; /* Center horizontally */
        align-items: center; /* Center vertically */
        height: 70vh; /* Full height of the viewport */
        margin: 0; /* Reset margin */
        margin-top: 10rem;
    }

    .container1 {
        background-color: #fff;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        width: 70%;
        border: 2px solid #007bff;
    }
        h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #007bff;
        }
        .form-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            flex-wrap: wrap;
        }
        .form-group label {
            padding-right: 1rem;
            margin: 0;
            color: #333;
            flex-basis:  25%; /* Set a base width for the labels */
        }
        input[type="text"],
        input[type="email"],
        textarea {
            flex: 1;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            
        }
        textarea {
            resize: vertical;
            width: 100%;
            height: 200px;
        }
        input[type="submit"],
        .btn-secondary {
            width: 100%;
            padding: 0.75rem;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            margin-top: 10px;
        }
        input[type="submit"]:hover,
        .btn-secondary:hover {
            background-color: #0056b3;
        }
        .disabled {
            background-color: #f8f9fa;
            color: #6c757d;
            cursor: not-allowed;
        }

        /* Responsive adjustments */
        @media (max-width: 600px) {
            .form-group {
                flex-direction: column; /* Stack items vertically */
                align-items: flex-start; /* Align items to the start */
            }
            .form-group label {
                flex-basis: auto; /* Reset label width */
                margin-bottom: 0.5rem; /* Add space below labels */
            }
            .form-group input {
                width: 100%; /* Full width for inputs */
            }
        }
        .links2{
        display: flex;
        justify-content: space-between;
        align-items: center;
        }
        .cancel_btn{
            text-decoration: none;
            padding: 0.75rem;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }

        select {
    flex: 1;
    padding: 0.5rem;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 1rem; /* Match font size with other inputs */
}

/* Optional: Change background color when the select is focused */
select:focus {
    outline: none;
    border-color: #007bff; /* Highlight border when focused */
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Add a slight shadow for effect */
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
    </div>
</div>
<div class="form">
    <?php if (isset($_SESSION['user_id'])): ?>
        <!-- User is logged in, show the form -->
        <div class="container1">
            <div class="links2">
                <h2></h2>
                <h2>Add Complaint</h2>
                <a href="homepage.php" class="cancel_btn">Go Back</a>
            </div>

            <form action="Add_complaints.php" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" value="<?php echo htmlspecialchars($user['name']); ?>" disabled>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" value="<?php echo htmlspecialchars($user['email']); ?>" disabled>
                </div>

                <div class="form-group">
                    <label for="cnic">CNIC Number:</label>
                    <input type="text" class="form-control disabled" id="cnic" value="<?php echo htmlspecialchars($user['CNIC_Number']); ?>" disabled>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="text" class="form-control disabled" id="phone" value="<?php echo htmlspecialchars($user['phone_number']); ?>" disabled>
                </div>

                <div class="form-group">
                    <label for="police_station">Police Station:</label>
                    <select id="police_station" name="police_station" required>
                        <option value="" disabled selected>Select a Police Station</option>
                        <?php foreach ($police_stations as $station): ?>
                            <option value="<?php echo htmlspecialchars($station); ?>"><?php echo htmlspecialchars($station); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="crime_id">Crime:</label>
                    <select id="crime_id" name="crime_id" required>
                        <option value="" disabled selected>Select a Crime</option>
                        <?php foreach ($crimes as $crime): ?>
                            <option value="<?php echo htmlspecialchars($crime['id']); ?>"><?php echo htmlspecialchars($crime['crime_title']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <label for="complaint_text">Enter Your Complaint Here:</label>
                <textarea id="complaint_text" name="complaint_text" required></textarea>

                <input type="submit" value="Add Complaint">
            </form>
        </div>
    <?php else: ?>
        <!-- User is not logged in, show the link -->
        <a href="user/login.html" class="btn btn-secondary">Add Complaint</a>
    <?php endif; ?>
</div>
