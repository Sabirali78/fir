<?php 
include("db.php");
include("assets/navbar.php");

// Start session to access session variables
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to login page
    header("Location: user/login.html");
    exit();
}

// Get user ID from session
$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    
    // Generate a random tracking ID
    $tracking_id = uniqid('track_', true);

    // Insert form data into the database
    $query = "INSERT INTO firs (user_id, title, description, status, tracking_id) VALUES ('$user_id', '$title', '$description', 'pending', '$tracking_id')";
    
    if (mysqli_query($conn, $query)) {
        echo "FIR submitted successfully!";
        header("Location: homepage.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>

<div class="container mt-5">
    <h2>Add FIR</h2>
    <form action="fir.php" method="POST">
        <div class="form-group">
            <label for="user_id">User ID</label>
            <input type="number" class="form-control" id="user_id" name="user_id" value="<?php echo $user_id; ?>" disabled>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit FIR</button>
    </form>
</div>
