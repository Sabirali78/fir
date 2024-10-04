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

$user_id = $_SESSION['user_id'];

// Function to handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $status = "pending"; // Assuming the default status is 'pending'
    $tracking_id = bin2hex(random_bytes(16)); // Generate a random tracking ID

    // Insert data into the database
    $sql = "INSERT INTO ncs (user_id, title, description, status, tracking_id) VALUES ('$user_id', '$title', '$description', '$status', '$tracking_id')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>


    <div class="container mt-5">
        <h2>Obtain an NOC</h2>
        <form action="add_noc.php" method="POST">
            <div class="form-group">
                <label for="user_id">User ID</label>
                <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?php echo $user_id; ?>">
                <input type="number" class="form-control" id="user_id_display" value="<?php echo $user_id; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
