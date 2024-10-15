<?php
include("db.php");

// Check if the session is already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.html");
    exit;
}

// Fetch cities
$cities = $conn->query("SELECT id, city FROM city");

// Fetch police stations
$police_stations = $conn->query("SELECT id, name FROM police_stations");

// Fetch crime types
$crimes = $conn->query("SELECT id, crime_title FROM crimes");

// Initialize filter values
$city = isset($_GET['city']) ? intval($_GET['city']) : null;
$police_station = isset($_GET['police_station']) ? intval($_GET['police_station']) : null;
$crime = isset($_GET['crime']) ? intval($_GET['crime']) : null;
$sort_order = isset($_GET['sort_order']) ? $_GET['sort_order'] : 'asc';

// Build the query
$where = [];
if ($city) {
    $where[] = "u.city_id = $city";
}
if ($police_station) {
    $where[] = "c.police_station_id = $police_station";
}
if ($crime) {
    $where[] = "c.crime_id = $crime";
}
$where_sql = count($where) > 0 ? "WHERE " . implode(" AND ", $where) : "";

$query = "
    SELECT c.*, ci.city, ps.name AS police_station, cr.crime_title, u.name AS user_name 
    FROM complaints c
    JOIN users u ON c.user_id = u.id
    JOIN city ci ON u.city_id = ci.id
    JOIN police_stations ps ON c.police_station_id = ps.id
    JOIN crimes cr ON c.crime_id = cr.id
    $where_sql
    ORDER BY c.complaint_date $sort_order
";
$complaints = $conn->query($query);
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
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
    <style>
        td{
            color: black;
            font-weight: bold;
        }
        .new_Complaint{
            margin-bottom: 2rem;
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
        <a href="dashboard.php" class="brand-logo">
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
        <div class="quixnav" style="position: fixed;">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                <li class="nav-label">Overview</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa-regular fa-folder-open"></i>
                    <span class="nav-text">Admin</span></a>
                        <ul aria-expanded="false">
                        <li><a href="dashboard.php">Admin Dashboard</a></li>
                        <li><a href="profile.php">Admin Profile</a></li>

                        </ul>
                    </li>
                    <li class="nav-label">QUERIES</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa-regular fa-folder-open"></i>
                    <span class="nav-text">COMPLAINTS</span></a>
                        <ul aria-expanded="false">
                        <li><a href="add_complaints.php">File a Complaint</a></li>
                            <li><a href="admin_Comlpaints.php">Complaint Management</a></li>
                        </ul>
                    </li>
                   <li class="nav-label">Stations</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa-regular fa-circle-user"></i>
                        <span class="nav-text">Stations</span></a>
                        <ul aria-expanded="false">
                            <li><a href="stations.php">Police Station Records</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Users</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa-regular fa-circle-user"></i>
                        <span class="nav-text">Records</span></a>
                        <ul aria-expanded="false">
                            <li><a href="Online_reg_users.php">User Management</a></li>
                            <li><a href="Crimnal_records.php">Criminal Database</a></li>
                            <li><a href="officer-directory.php">Officer Directory</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Reports</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa-regular fa-circle-user"></i>
                        <span class="nav-text">Reports</span></a>
                        <ul aria-expanded="false">
                        <li><a href="Comlpaints.php">Reports</a></li>
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
<div class="container">
    <form method="GET" action="" class="form-inline">
        <label for="city" class="mr-2">City:</label>
        <select name="city" id="city" class="form-control mr-2">
            <option value="">Select City</option>
            <?php while($row = $cities->fetch_assoc()): ?>
                <option value="<?php echo $row['id']; ?>" <?php if($city == $row['id']) echo 'selected'; ?>><?php echo $row['city']; ?></option>
            <?php endwhile; ?>
        </select>

        <label for="police_station" class="mr-2">Police Station:</label>
        <select name="police_station" id="police_station" class="form-control mr-2">
            <option value="">Select Police Station</option>
            <?php while($row = $police_stations->fetch_assoc()): ?>
                <option value="<?php echo $row['id']; ?>" <?php if($police_station == $row['id']) echo 'selected'; ?>><?php echo $row['name']; ?></option>
            <?php endwhile; ?>
        </select>

        <label for="crime" class="mr-2">Crime Type:</label>
        <select name="crime" id="crime" class="form-control mr-2">
            <option value="">Select Crime Type</option>
            <?php while($row = $crimes->fetch_assoc()): ?>
                <option value="<?php echo $row['id']; ?>" <?php if($crime == $row['id']) echo 'selected'; ?>><?php echo $row['crime_title']; ?></option>
            <?php endwhile; ?>
        </select>

        <label for="sort_order" class="mr-2">Sort by Time:</label>
        <select name="sort_order" id="sort_order" class="form-control mr-2">
            <option value="asc" <?php if($sort_order == 'asc') echo 'selected'; ?>>Ascending</option>
            <option value="desc" <?php if($sort_order == 'desc') echo 'selected'; ?>>Descending</option>
        </select>

        <button type="submit" class="btn btn-primary">Filter</button>
    </form>

    <table class="table table-bordered table-striped table-responsive" id="complaintsTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Reported By</th>
                <th>City</th>
                <th>Police Station</th>
                <th>Crime Type</th>
                <th>Created At</th>
                <th>Description</th>
                <th>Tracking Number</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $complaints->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['user_name']; ?></td>
                    <td><?php echo $row['city']; ?></td>
                    <td><?php echo $row['police_station']; ?></td>
                    <td><?php echo $row['crime_title']; ?></td>
                    <td><?php echo $row['complaint_date']; ?></td>
                    <td><?php echo $row['complaint_text']; ?></td>
                    <td><?php echo $row['tracking_number']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

    <?php $conn->close(); ?>
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
        <!-- DataTables JS -->
          
   <!-- jQuery -->
   <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- DataTables JS -->
    <script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <!-- Other vendor scripts -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>
    <script src="./vendor/chartist/js/chartist.min.js"></script>
    <script src="./vendor/moment/moment.min.js"></script>
    <script src="./vendor/pg-calendar/js/pignose.calendar.min.js"></script>
    <script src="./js/dashboard/dashboard-2.js"></script>

    <script>
   let table = new DataTable('#complaintsTable');
 
$(document).ready(function() {
    $('#city').on('change', function() {
        var city_id = $(this).val();
        if (city_id) {
            $.ajax({
                url: 'get_police_stations.php',
                type: 'GET',
                data: { city_id: city_id },
                dataType: 'json',
                success: function(data) {
                    $('#police_station').empty();
                    $('#police_station').append('<option value="">Select Police Station</option>');
                    $.each(data, function(key, value) {
                        $('#police_station').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        } else {
            $('#police_station').empty();
            $('#police_station').append('<option value="">Select Police Station</option>');
        }
    });
});
</script>
</body>

</html>