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

$complaints_query = "
    SELECT c.*, u.name AS name, cr.crime_title AS crime_title, ps.name AS police_station_name
    FROM complaints c 
    INNER JOIN users u ON c.user_id = u.id
    INNER JOIN crimes cr ON c.crime_id = cr.id
    INNER JOIN police_stations ps ON c.police_station_id = ps.id
    ORDER BY c.id ASC

";

$complaints_result = mysqli_query($conn, $complaints_query);
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

                    <li class="nav-label">Records</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa-regular fa-circle-user"></i>
                        <span class="nav-text">Records</span></a>
                        <ul aria-expanded="false">
                            <li><a href="Online_reg_users.php">User Management</a></li>
                            <li><a href="stations.php">Police Station Records</a></li>

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
               
            <div class="row new_Complaint">
                  <a href="add_complaints.php" class="btn btn-primary">Add New Complaint</a>    
            </div>      
<div class="row">
<div class="col-lg-12" style="border: 1px solid black;">
        <div class="card">
            <div class="card-header">
                <h3>Complaints List</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="complaintsTable" class="display table student-data-table m-t-20">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">ID</th>
                                <th class="py-2 px-4 border-b">User Name</th>
                                <th class="py-2 px-4 border-b">Crime Title</th>
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
                                    <td class="py-2 px-4 border-b"><?php echo $row['name']; ?></td>
                                    <td class="py-2 px-4 border-b"><?php echo $row['crime_title']; ?></td>
                             
                                    <?php 
                                    if ($row['status'] === 'pending'){
                                        
                                        ?>
                                        <td class="py-2 px-4 border-b"> <span class="badge badge-warning"><?php echo $row['status']; ?></span></td>

                                        <?php

                                    }
                                    if ($row['status'] === 'resolved'){
                                        
                                        ?>
                                        <td class="py-2 px-4 border-b"><span class="badge badge-success  text-white"><?php echo $row['status']; ?></span></td>

                                        <?php

                                    }
                                    if ($row['status'] === 'rejected'){
                                        
                                        ?>
                                        <td class="py-2 px-4 border-b"> <span class="badge badge-danger"><?php echo $row['status']; ?></span>  </td>

                                        <?php

                                    }
                                    ?>

                                    
                                    <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($row['police_station_name']); ?></td>
                                    <td class="py-2 px-4 border-b"><?php echo $row['tracking_number']; ?></td>
                                    <td class="py-2 px-4 border-b"><?php echo $row['complaint_date']; ?></td>
                                    <td class="py-2 px-4 border-b">
                                        <div style="display: flex; gap: 8px;">
                                            <?php if ($row['status'] === 'pending') : ?>
                                                <!-- Check if status is 'Pending' -->
                                                <a href="approve_complaint.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                <a href="reject_complaint.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-ban" aria-hidden="true"></i></a>
                                            <?php else : ?>
                                                <span class="text-muted"></span> <!-- Show N/A for other statuses -->
                                            <?php endif; ?>
                                            <a href="view_complaint.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary"><i class="fa-solid fa-print"></i></a>
                                            <a href="edit_complaint.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                            <a href="delete_complaint.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this complaint?');"><i class="fas fa-trash"></i></a>
                                        </div>
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
    </script>
</body>

</html>