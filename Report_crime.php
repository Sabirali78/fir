<?php
include("db.php");
include("assets/navbar.php");


// Check if the session is already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: user_login.html");
    exit;
}

function generateTrackingID() {
    return strtoupper(bin2hex(random_bytes(8))); // Generates a random 16-character tracking ID
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $tracking_id = generateTrackingID();
    
    $query = "INSERT INTO crime (user_id, title, description, status, tracking_id, created_at, updated_at) 
              VALUES ('$user_id', '$title', '$description', '$status', '$tracking_id', NOW(), NOW())";

    if (mysqli_query($conn, $query)) {
        echo "Crime report submitted successfully. Your tracking ID is: $tracking_id";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>

    <div class="container mt-5">
        <h2>Report a Crime</h2>
        <form action="Report_crime.php" method="post">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" class="form-control" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" id="status" name="status" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tracking_id">Tracking ID:</label>
                <input type="text" id="tracking_id" name="tracking_id" class="form-control" value="<?php echo generateTrackingID(); ?>" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
