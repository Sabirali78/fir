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

// Get the logged-in user ID from the session
$logged_in_user_id = $_SESSION['user_id'];

$complaints_query = "
    SELECT c.*, u.name as user_name, p.name as police_station_name 
    FROM complaints c 
    INNER JOIN users u ON c.user_id = u.id
    INNER JOIN police_stations p ON c.police_station_id = p.id
    WHERE c.user_id = $logged_in_user_id
    ORDER BY c.id ASC
";
$complaints_result = mysqli_query($conn, $complaints_query);

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
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">

    <style>

                /* General styles */
                body {
            font-family: Arial, sans-serif;
        }
        
        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th, .table td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .btn {
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .btn-primary {
            color: #fff;
            background-color: #337ab7;
            border-color: #2e6da4;
        }

        .btn-danger {
            color: #fff;
            background-color: #d9534f;
            border-color: #d43f3a;
        }

        @media print {
            /* Hide elements not required for printing */
            .btn, .card-header {
                display: none;
            }

            /* Style the table for printing */
            .table {
                border: none;
                width: 100%;
            }

            .table th, .table td {
                border: 1px solid #000;
                padding: 12px;
                font-size: 14px;
            }

            .table th {
                background-color: #ddd;
                -webkit-print-color-adjust: exact;
            }
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
                                   
                                    <a href="logout.php" class="dropdown-item">
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
                                       
                </div>
<div class="row">
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Complaints</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table id="usercomplaintsTable" class="table student-data-table m-t-20">
    <thead>
        <tr>
            <th class="py-2 px-4 border-b">ID</th>
            <th class="py-2 px-4 border-b">User Name</th>
            <th class="py-2 px-4 border-b">Description</th>
            <th class="py-2 px-4 border-b">Status</th>
            <th class="py-2 px-4 border-b">Police Station</th>
            <th class="py-2 px-4 border-b">Tracking ID</th>
            <th class="py-2 px-4 border-b">Created At</th>
            <th class="py-2 px-4 border-b">Action</th>

        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($complaints_result)) : ?>
            <tr>
                <td class="py-2 px-4 border-b"><?php echo $row['id']; ?></td>
                <td class="py-2 px-4 border-b"><?php echo $row['user_name']; ?></td>
                <td class="py-2 px-4 border-b">
                    <?php
                    $text = $row['complaint_text'];
                    if (strlen($text) > 30) {
                        echo substr($text, 0, 30) . '...';
                    } else {
                        echo $text;
                    }
                    ?>
                </td>
                <td class="py-2 px-4 border-b"><?php echo $row['status']; ?></td>
                <td class="py-2 px-4 border-b"><?php echo $row['police_station_name']; ?></td>
                <td class="py-2 px-4 border-b"><?php echo $row['tracking_number']; ?></td>
                <td class="py-2 px-4 border-b"><?php echo $row['complaint_date']; ?></td>
                <td class="py-2 px-4 border-b">
                <a href="edit_user_complaint.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                <a href="view_user_complaint.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary"><i class="fa-solid fa-print"></i></a>
                <a href="delete_user_complaint.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this complaint?');"><i class="fas fa-trash"></i></a>
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
   let table = new DataTable('#usercomplaintsTable');
    </script>
</body>


</html>