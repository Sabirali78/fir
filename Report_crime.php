<?php
include("db.php"); // Include your database connection file

// Start the session if it's not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: user_login.html");
    exit;
}

// Function to generate a random tracking ID
function generateTrackingID() {
    return strtoupper(bin2hex(random_bytes(8))); // Generates a random 16-character tracking ID
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $police_station_id = $_POST['police_station'];
    $tracking_id = generateTrackingID();

    // Check if the report_text is set and sanitize it
    $report_text = isset($_POST['report_text']) ? mysqli_real_escape_string($conn, $_POST['report_text']) : '';

    // Determine the police station name based on the selection
    if ($police_station_id === 'custom') {
        // User selected a custom police station
        $police_station = mysqli_real_escape_string($conn, $_POST['custom_station']);
    } else {
        // Fetch the name of the selected police station from the database
        $stationQuery = "SELECT name FROM police_stations WHERE id = ?";
        $stmt = $conn->prepare($stationQuery);
        $stmt->bind_param("i", $police_station_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $station = $result->fetch_assoc();
        $police_station = $station['name']; // Get the station's name
    }

    // Prepare the SQL query to insert the crime report
    $query = "INSERT INTO crime_report (user_id, title, report_text, status, tracking_id, police_station, report_date) 
              VALUES ('$user_id', '$title', '$report_text', 'pending', '$tracking_id', '$police_station', NOW())";

    // Execute the query and check for success
    if (mysqli_query($conn, $query)) {
        echo "Crime report submitted successfully. Your tracking ID is: $tracking_id";
    } else {
        echo "Error: " . mysqli_error($conn); // Display any errors
    }
}

// Fetch police stations based on the user's city ID
$city_id = $_SESSION['city_id'];
$stationQuery = "SELECT id, name FROM police_stations WHERE city_id = ?";
$stmt = $conn->prepare($stationQuery);
$stmt->bind_param("i", $city_id);
$stmt->execute();
$stationResult = $stmt->get_result();

$stations = [];
while ($station = $stationResult->fetch_assoc()) {
    $stations[] = $station;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report a Crime</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Report a Crime</h2>
        <form action="Report_crime.php" method="post">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="report_text">Report Text:</label>
                <textarea id="report_text" name="report_text" class="form-control" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="police_station">Select Police Station:</label>
                <select id="police_station" name="police_station" class="form-control" required onchange="toggleCustomInput(this)">
                    <option value="">Select a police station</option>
                    <?php foreach ($stations as $station): ?>
                        <option value="<?php echo $station['id']; ?>">
                            <?php echo htmlspecialchars($station['name']); ?>
                        </option>
                    <?php endforeach; ?>
                    <option value="custom">Other</option>
                </select>
            </div>

            <div class="form-group" id="custom_station_div" style="display: none;">
                <label for="custom_station">Police Station:</label>
                <input type="text" id="custom_station" name="custom_station" class="form-control" placeholder="Enter police station name">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="user/reports.php" class="btn btn-info">Go Back</a>
        </form>
    </div>

    <script>
        function toggleCustomInput(select) {
            const customInputDiv = document.getElementById('custom_station_div');
            if (select.value === 'custom') {
                customInputDiv.style.display = 'block';
                document.getElementById('custom_station').required = true; // Set required for custom input
            } else {
                customInputDiv.style.display = 'none';
                document.getElementById('custom_station').required = false; // Remove required for custom input
            }
        }
    </script>

</body>
</html>
