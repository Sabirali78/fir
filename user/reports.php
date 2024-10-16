<?php
include("db.php");

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

// Fetch the logged-in user's data
$ncs = mysqli_query($conn, "SELECT * FROM ncs WHERE user_id = $user_id");
$complaints = mysqli_query($conn, "SELECT * FROM complaints WHERE user_id = $user_id");
$crime = mysqli_query($conn, "SELECT * FROM crime_report WHERE user_id = $user_id");

function limit_text($text, $limit) {
    if (strlen($text) > $limit) {
        return substr($text, 0, $limit) . '...';
    } else {
        return $text;
    }
}

// Retrieve police station data along with city names
$sql = "SELECT ps.name AS station_name, c.city AS city_name, ps.address, ps.contact_number
        FROM police_stations ps
        JOIN city c ON ps.city_id = c.id";
$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="./vendor/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <link href="./vendor/chartist/css/chartist.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    <style>
          .table-responsive {
            overflow-x: auto;
        }
        .table th, .table td {
            white-space: nowrap;
        }
        .table td.description {
            white-space: normal;
            max-width: 200px; /* Adjust this as necessary */
            word-wrap: break-word;
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
                        <h4><a href="../homepage.php">MAIN PAGE</a> </h4>


                        <ul class="navbar-nav header-right">
                                <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="User_dashboard.php" class="dropdown-item">
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
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa-regular fa-folder-open"></i>
                    <span class="nav-text">Reports</span></a>
                        <ul aria-expanded="false">
                            <li><a href="User_dashboard.php">PROFILE</a></li>
                            <li><a href="reports.php">Reports</a></li>
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
                

                    <div class="row" style="margin-left: 2rem;">
                    <h4><a href="../Report_crime.php" class="text-center">Report a Crime</a></h4>
                    </div>
                

                    <div class="col-lg-12">
        <div class="card mb-6">
            <div class="card-header">
                <h4 class="card-title">Reported Crimes</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-auto w-full text-left">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">ID</th>
                                <th class="py-2 px-4 border-b">User ID</th>
                                <th class="py-2 px-4 border-b">Title</th>
                                <th class="py-2 px-4 border-b">report_text</th>
                                <th class="py-2 px-4 border-b">Status</th>
                                <th class="py-2 px-4 border-b">Tracking ID</th>
                                <th class="py-2 px-4 border-b">Report Date</th>
                                <th class="py-2 px-4 border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($crime )) : ?>
                                <tr>
                                    <td class="py-2 px-4 border-b"><?php echo $row['id']; ?></td>
                                    <td class="py-2 px-4 border-b"><?php echo $row['user_id']; ?></td>
                                    <td class="py-2 px-4 border-b"><?php echo $row['title']; ?></td>
                                    <td class="py-2 px-4 border-b description"><?php echo limit_text($row['report_text'], limit: 100); ?></td>
                                    <td class="py-2 px-4 border-b"><?php echo $row['status']; ?></td>
                                    <td class="py-2 px-4 border-b"><?php echo $row['tracking_id']; ?></td>
                                    <td class="py-2 px-4 border-b"><?php echo $row['report_date']; ?></td>
                                    <td class="py-2 px-4 border-b">
                                        <a href="edit_noc.php?id=<?php echo $row['id']; ?>" class="text-blue-500 hover:text-blue-700">Edit</a>
                                        <a href="delete_crime_report.php?id=<?php echo $row['id']; ?>" class="text-red-500 hover:text-red-700 ml-4">Delete</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>

                    <div class="row" style="margin-left: 2rem;">
                    <h4><a href="../Add_fir.php" class="text-center">Obtain an NOC</a></h4>
                    </div>

        <div class="col-lg-12">
        <div class="card mb-6">
            <div class="card-header">
                <h4 class="card-title">NOC (No Objection Certificate)</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped m-t-20">
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
                            <?php while ($row = mysqli_fetch_assoc($ncs )) : ?>
                                <tr>
                                    <td class="py-2 px-4 border-b"><?php echo $row['id']; ?></td>
                                    <td class="py-2 px-4 border-b"><?php echo $row['user_id']; ?></td>
                                    <td class="py-2 px-4 border-b"><?php echo $row['title']; ?></td>
                                    <td class="py-2 px-4 border-b description"><?php echo limit_text($row['description'], 100); ?></td> <!-- Limiting description to 100 characters -->
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

                    <div class="row" style="margin-left: 2rem;">
                    <h4><a href="../Add_fir.php" class="text-center">File a Complaint Online</a></h4>
                    </div>


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
                            <?php while ($row = mysqli_fetch_assoc($complaints )) : ?>
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
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Sabir Baloch</a> 2024</p>
            </div>
        </div>
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