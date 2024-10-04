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

$firs_pending = mysqli_query($conn, "SELECT * FROM firs WHERE status = 'pending'");
$firs_in_progress = mysqli_query($conn, "SELECT * FROM firs WHERE status = 'in progress'");
$firs_resolved = mysqli_query($conn, "SELECT * FROM firs WHERE status = 'resolved'");
$registered_users = mysqli_query($conn, "SELECT * FROM users");

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
                 

                    <li class="nav-label">REPORTS</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa-regular fa-folder-open"></i>
                    <span class="nav-text">Reports</span></a>
                        <ul aria-expanded="false">
                            <li><a href="firs.php">FIR</a></li>
                            <li><a href="NOC.php">NOC</a></li>
                            <li><a href="Comlpaints.php">COMPLAINTS
                            </a></li>
                        </ul>
                    </li>

                    <li class="nav-label">Users</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa-regular fa-circle-user"></i>
                        <span class="nav-text">Registred Users</span></a>
                        <ul aria-expanded="false">
                            <li><a href="Online_reg_users.php">Online Registred Citizens</a></li>
                            <li><a href="Crimnal_records.php">Criminal Record Register</a></li>
                            <li><a href="Alerts.php">Sweet Alert</a></li>
                        </ul>
                    </li>


                   
                    <li class="nav-label">Components</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-world-2"></i><span class="nav-text">Bootstrap</span></a>
                        <ul aria-expanded="false">
                            <li><a href="./ui-accordion.html">Accordion</a></li>
                            <li><a href="./ui-alert.html">Alert</a></li>
                            <li><a href="./ui-badge.html">Badge</a></li>
                            <li><a href="./ui-button.html">Button</a></li>
                            <li><a href="./ui-modal.html">Modal</a></li>
                            <li><a href="./ui-button-group.html">Button Group</a></li>
                            <li><a href="./ui-list-group.html">List Group</a></li>
                            <li><a href="./ui-media-object mr-3.html">Media Object</a></li>
                            <li><a href="./ui-card.html">Cards</a></li>
                            <li><a href="./ui-carousel.html">Carousel</a></li>
                            <li><a href="./ui-dropdown.html">Dropdown</a></li>
                            <li><a href="./ui-popover.html">Popover</a></li>
                            <li><a href="./ui-progressbar.html">Progressbar</a></li>
                            <li><a href="./ui-tab.html">Tab</a></li>
                            <li><a href="./ui-typography.html">Typography</a></li>
                            <li><a href="./ui-pagination.html">Pagination</a></li>
                            <li><a href="./ui-grid.html">Grid</a></li>

                        </ul>
                    </li>

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-plug"></i><span class="nav-text">Plugins</span></a>
                        <ul aria-expanded="false">
                            <li><a href="./uc-select2.html">Select 2</a></li>
                            <li><a href="./uc-nestable.html">Nestedable</a></li>
                            <li><a href="./uc-noui-slider.html">Noui Slider</a></li>
                            <li><a href="./uc-sweetalert.html">Sweet Alert</a></li>
                            <li><a href="./uc-toastr.html">Toastr</a></li>
                            <li><a href="./map-jqvmap.html">Jqv Map</a></li>
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