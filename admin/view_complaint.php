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

// Get the complaint ID from the URL
$complaint_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($complaint_id <= 0) {
    echo "Invalid complaint ID.";
    exit;
}

// Fetch the complaint details from the database
$complaint_query = "
    SELECT c.*, u.name as user_name, p.name as police_station_name 
    FROM complaints c 
    INNER JOIN users u ON c.user_id = u.id
    INNER JOIN police_stations p ON c.police_station_id = p.id
    WHERE c.id = $complaint_id
";
$complaint_result = mysqli_query($conn, $complaint_query);

if (!$complaint_result) {
    echo "Error: " . mysqli_error($conn);
    exit;
}

$complaint = mysqli_fetch_assoc($complaint_result);

if (!$complaint) {
    echo "Complaint not found.";
    exit;
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
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
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
            <img src="../assets/Images/logo (2).png" alt="" style="height: 120px;">

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

                <li class="nav-label">Records</li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa-regular fa-circle-user"></i>
                        <span class="nav-text">Records</span></a>
                    <ul aria-expanded="false">
                        <li><a href="Online_reg_users.php">User Management</a></li>
                        <li><a href="stations.php">Police Station Records</a></li>
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
    <div class="content-body" id="printableArea">
        <div class="container-fluid">



            <div class="row">

            </div>
            <div class="row">

                <div class="col-lg-12">
                    <div class="container">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Complaint Details</h4>
                                <button class="btn btn-primary" onclick="printDiv('printableArea')">Print</button>
                            </div>
                            <div class="card-body">
                                <p><strong>ID:</strong> <?php echo $complaint['id']; ?></p>
                                <p><strong>User Name:</strong> <?php echo $complaint['user_name']; ?></p>
                                <p><strong>Description:</strong> <?php echo $complaint['complaint_text']; ?></p>
                                <p><strong>Status:</strong> <?php echo $complaint['status']; ?></p>
                                <p><strong>Police Station:</strong> <?php echo $complaint['police_station_name']; ?></p>
                                <p><strong>Tracking ID:</strong> <?php echo $complaint['tracking_number']; ?></p>
                                <p><strong>Created At:</strong> <?php echo $complaint['complaint_date']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Required vendors -->
        <script src="./vendor/global/global.min.js"></script>
        <script src="./js/quixnav-init.js"></script>
        <script src="./js/custom.min.js"></script>

        <script src="./vendor/chartist/js/chartist.min.js"></script>

        <script src="./vendor/moment/moment.min.js"></script>
        <script src="./vendor/pg-calendar/js/pignose.calendar.min.js"></script>


        <script src="./js/dashboard/dashboard-2.js"></script>
        <script>
            function printDiv(divId) {
                var content = document.getElementById(divId).innerHTML;
                var myWindow = window.open('', '', 'width=800,height=600');
                myWindow.document.write('<html><head><title>Print</title>');
                myWindow.document.write('<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">');
                myWindow.document.write('</head><body>');
                myWindow.document.write(content);
                myWindow.document.write('</body></html>');
                myWindow.document.close();
                myWindow.focus();
                myWindow.print();
                myWindow.close();
            }
        </script>
        <!-- Circle progress -->

        </body>

</html>