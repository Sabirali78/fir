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

$user_id = $_SESSION['user_id'];

// Fetch complaints based on CNIC or Tracking No
$cnic = isset($_GET['cnic']) ? mysqli_real_escape_string($conn, $_GET['cnic']) : '';
$complaint_no = isset($_GET['complaint_no']) ? mysqli_real_escape_string($conn, $_GET['complaint_no']) : '';

$query = "SELECT * FROM complaints WHERE user_id = $user_id";
if (!empty($cnic)) {
    $query .= " AND cnic = '$cnic'";
}
if (!empty($complaint_no)) {
    $query .= " AND tracking_id = '$complaint_no'";
}

$complaints = mysqli_query($conn, $query);

?>

<div class="col-lg-12">
    <div class="card mb-6">
        <div class="card-header">
            <h4 class="card-title">Complaints</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table-auto w-full text-left">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">ID</th>
                            <th class="py-2 px-4 border-b">User ID</th>
                            <th class="py-2 px-4 border-b">Title</th>
                            <th class="py-2 px-4 border-b">Description</th>
                            <th class="py-2 px-4 border-b">Status</th>
                            <th class="py-2 px-4 border-b">Tracking ID</th>
                            <th class="py-2 px-4 border-b">Created At</th>
                            <th class="py-2 px-4 border-b">Updated At</th>
                            <th class="py-2 px-4 border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($complaints)) : ?>
                            <tr>
                                <td class="py-2 px-4 border-b"><?php echo $row['id']; ?></td>
                                <td class="py-2 px-4 border-b"><?php echo $row['user_id']; ?></td>
                                <td class="py-2 px-4 border-b"><?php echo $row['title']; ?></td>
                                <td class="py-2 px-4 border-b"><?php echo $row['description']; ?></td>
                                <td class="py-2 px-4 border-b"><?php echo $row['status']; ?></td>
                                <td class="py-2 px-4 border-b"><?php echo $row['tracking_id']; ?></td>
                                <td class="py-2 px-4 border-b"><?php echo $row['created_at']; ?></td>
                                <td class="py-2 px-4 border-b"><?php echo $row['updated_at']; ?></td>
                                <td class="py-2 px-4 border-b">
                                    <a href="edit_noc.php?id=<?php echo $row['id']; ?>" class="text-blue-500 hover:text-blue-700">Edit</a>
                                    <a href="delete_noc.php?id=<?php echo $row['id']; ?>" class="text-red-500 hover:text-red-700 ml-4">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
