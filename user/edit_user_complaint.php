<?php
include("db.php");

// Check if the session is already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the admin is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}


// Get the complaint ID from the URL
$complaint_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($complaint_id <= 0) {
    echo "Invalid complaint ID.";
    exit;
}

// Fetch the complaint data
$complaint_query = "
    SELECT c.*, u.name as user_name, p.name as police_station_name, cr.crime_title, cr.id as crime_id
    FROM complaints c 
    INNER JOIN users u ON c.user_id = u.id
    INNER JOIN police_stations p ON c.police_station_id = p.id
    INNER JOIN crimes cr ON c.crime_id = cr.id
    WHERE c.id = $complaint_id
";
$complaint_result = mysqli_query($conn, $complaint_query);
$complaint = mysqli_fetch_assoc($complaint_result);

if (!$complaint) {
    echo "Complaint not found.";
    exit;
}

// Fetch all crime titles for the dropdown
$crimes_query = "SELECT id, crime_title FROM crimes";
$crimes_result = mysqli_query($conn, $crimes_query);
$crime_titles = [];
while ($row = mysqli_fetch_assoc($crimes_result)) {
    $crime_titles[] = $row;
}

// Update the complaint data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $crime_id = intval($_POST['crime_id']);
    $complaint_text = mysqli_real_escape_string($conn, $_POST['complaint_text']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $police_station_id = intval($_POST['police_station_id']);
    $tracking_number = mysqli_real_escape_string($conn, $_POST['tracking_number']);

    $update_query = "
        UPDATE complaints 
        SET crime_id = $crime_id, 
            complaint_text = '$complaint_text', 
            police_station_id = $police_station_id
        WHERE id = $complaint_id
    ";

    if (mysqli_query($conn, $update_query)) {
    header("location: user_Comlpaints.php");   
    } else {
        echo "Error updating complaint: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="./vendor/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <link href="./vendor/chartist/css/chartist.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    <style>
        #complaint_text{
            height: 15rem;
        }
    </style>
</head>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="User_dashboard.php" class="brand-logo">
            <img  src="../assets/Images/logo (2).png" alt="" style="height: 120px;">

            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
                                <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="profile.php" class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                   
                                    <a href="admin_logout.php" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Queries</li>
            <li>
                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                    <i class="fa-regular fa-folder-open"></i>
                    <span class="nav-text">Queries</span></a>
                <ul aria-expanded="false">
                    <li><a href="User_dashboard.php">Profile</a></li>
                </ul>
            </li>
            <li class="nav-label">Complaints</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa-regular fa-circle-user"></i>
                        <span class="nav-text">Complaints</span></a>
                        <ul aria-expanded="false">
                        <li><a href="user_Comlpaints.php">Comlpaints</a></li>
                        <li><a href="add_user_comlaint.php">Add Complaint</a></li>
                        </ul>
                    </li>
        </ul>
        
    </div>
</div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">

<div class="row">
<div class="col-lg-12">
    
<h2>Edit Complaint</h2>
    <form method="post" >
        <div class="form-group">
            <label for="crime_title">Crime Title</label>
            <select class="form-control" id="crime_title" name="crime_id" required>
                <option value="">Select a crime title</option>
                <?php foreach ($crime_titles as $crime) : ?>
                    <option value="<?php echo $crime['id']; ?>" <?php echo ($crime['id'] == $complaint['crime_id']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($crime['crime_title']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="complaint_text">Description</label>
            <textarea class="form-control" id="complaint_text" name="complaint_text" required><?php echo htmlspecialchars($complaint['complaint_text']); ?></textarea>
        </div>

        <div class="form-group">
            <label for="police_station_id">Police Station</label>
            <select class="form-control" id="police_station_id" name="police_station_id" required>
                <?php
                $stations_query = "SELECT id, name FROM police_stations";
                $stations_result = mysqli_query($conn, $stations_query);
                while ($station = mysqli_fetch_assoc($stations_result)) {
                    $selected = $complaint['police_station_id'] == $station['id'] ? 'selected' : '';
                    echo "<option value=\"{$station['id']}\" $selected>{$station['name']}</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Complaint</button>
    </form>

</div>



        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
  
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>

    <script src="./vendor/chartist/js/chartist.min.js"></script>

    <script src="./vendor/moment/moment.min.js"></script>
    <script src="./vendor/pg-calendar/js/pignose.calendar.min.js"></script>


    <script src="./js/dashboard/dashboard-2.js"></script>
    <!-- Circle progress -->

</body>

</html>