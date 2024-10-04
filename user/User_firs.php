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

// Fetch the logged-in user's data
$firs_pending = mysqli_query($conn, "SELECT * FROM firs WHERE user_id = $user_id AND status = 'pending'");
$firs_in_progress = mysqli_query($conn, "SELECT * FROM firs WHERE user_id = $user_id AND status = 'in_progress'");
$firs_resolved = mysqli_query($conn, "SELECT * FROM firs WHERE user_id = $user_id AND status = 'resolved'");

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
                <img class="logo-abbr" src="./images/logo.png" alt="">
                <img class="logo-compact" src="./images/logo-text.png" alt="">
                <img class="brand-title" src="./images/logo-text.png" alt="">
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
                 
                <li class="nav-label"></li>
                    <li><span class="nav-text"></span></a>
                     <a href="User_dashboard.php">PROFILE</a>
                    </li>

                    <li class="nav-label">REPORTS</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa-regular fa-folder-open"></i>
                    <span class="nav-text">Reports</span></a>
                        <ul aria-expanded="false">
                            <li><a href="User_firs.php">FIR</a></li>
                            <li><a href="User_NOC.php">NOC</a></li>
                            <li><a href="User_Comlpaints.php">COMPLAINTS
                            </a></li>
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
                   
                    
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                             <h4 class="card-title">FIR'S Pending</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table student-data-table m-t-20">
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
                                            </tr>
                                        </thead>
                                        <tbody>
                        <?php while ($row = mysqli_fetch_assoc($firs_pending)) : ?>
                        <tr>
                            <td class="py-2 px-4 border-b"><?php echo $row['id']; ?></td>
                            <td class="py-2 px-4 border-b"><?php echo $row['user_id']; ?></td>
                            <td class="py-2 px-4 border-b"><?php echo $row['title']; ?></td>
                            <td class="py-2 px-4 border-b"><?php echo $row['description']; ?></td>
                            <td class="py-2 px-4 border-b"><?php echo $row['status']; ?></td>
                            <td class="py-2 px-4 border-b"><?php echo $row['tracking_id']; ?></td>
                            <td class="py-2 px-4 border-b"><?php echo $row['created_at']; ?></td>
                            <td class="py-2 px-4 border-b"><?php echo $row['updated_at']; ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                             <h4 class="card-title">In Progress</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table student-data-table m-t-20">
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
                                            </tr>
                                        </thead>
                                        <tbody>
                        <?php while ($row = mysqli_fetch_assoc($firs_in_progress)) : ?>
                        <tr>
                            <td class="py-2 px-4 border-b"><?php echo $row['id']; ?></td>
                            <td class="py-2 px-4 border-b"><?php echo $row['user_id']; ?></td>
                            <td class="py-2 px-4 border-b"><?php echo $row['title']; ?></td>
                            <td class="py-2 px-4 border-b"><?php echo $row['description']; ?></td>
                            <td class="py-2 px-4 border-b"><?php echo $row['status']; ?></td>
                            <td class="py-2 px-4 border-b"><?php echo $row['tracking_id']; ?></td>
                            <td class="py-2 px-4 border-b"><?php echo $row['created_at']; ?></td>
                            <td class="py-2 px-4 border-b"><?php echo $row['updated_at']; ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                             <h4 class="card-title">Resolved</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table student-data-table m-t-20">
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
                                            </tr>
                                        </thead>
                                        <tbody>
                        <?php while ($row = mysqli_fetch_assoc($firs_resolved)) : ?>
                        <tr>
                            <td class="py-2 px-4 border-b"><?php echo $row['id']; ?></td>
                            <td class="py-2 px-4 border-b"><?php echo $row['user_id']; ?></td>
                            <td class="py-2 px-4 border-b"><?php echo $row['title']; ?></td>
                            <td class="py-2 px-4 border-b"><?php echo $row['description']; ?></td>
                            <td class="py-2 px-4 border-b"><?php echo $row['status']; ?></td>
                            <td class="py-2 px-4 border-b"><?php echo $row['tracking_id']; ?></td>
                            <td class="py-2 px-4 border-b"><?php echo $row['created_at']; ?></td>
                            <td class="py-2 px-4 border-b"><?php echo $row['updated_at']; ?></td>
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
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> 2019</p>
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