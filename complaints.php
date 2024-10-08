<?php
include("db.php");

// Check if the session is already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the admin is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}
$user_id = $_SESSION['user_id'];

// Fetch the logged-in user's data
$query = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Fetch police station names
$police_stations = [];
$query_stations = "SELECT name FROM police_stations";
$stmt_stations = $conn->prepare($query_stations);
$stmt_stations->execute();
$result_stations = $stmt_stations->get_result();
while ($row = $result_stations->fetch_assoc()) {
    $police_stations[] = $row['name'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Complaint</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #e9ecef;
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
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
            flex-basis: 40%; /* Set a base width for the labels */
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
    <div class="container">
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
    <select id="police_station" name="police_station" required style="flex: 1; padding: 0.5rem; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;">
        <option value="" disabled selected>Select a Police Station</option>
        <?php foreach ($police_stations as $station): ?>
            <option value="<?php echo htmlspecialchars($station); ?>"><?php echo htmlspecialchars($station); ?></option>
        <?php endforeach; ?>
    </select>
</div>


            <label for="complaint_text">Enter Your Complaint Here:</label>
            <textarea id="complaint_text" name="complaint_text" required></textarea>

            <input type="submit" value="Add Complaint">
        </form>
    </div>
</body>
</html>
