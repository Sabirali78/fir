<?php
include("db.php");

// Check if the session is already started

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
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
    <style>
        .custom-row {
    display: flex;
    flex-wrap: wrap;
}

.custom-col-lg-8,
.custom-col-lg-4,
.custom-col-md-12 {
    padding: 0 15px;
}

.custom-col-lg-8 {
    width: 66.66%;
}

.custom-col-lg-4 {
    width: 33.33%;
}

.custom-col-md-12 {
    width: 100%;
}

@media (max-width: 992px) {
    .custom-col-lg-8,
    .custom-col-lg-4 {
        width: 100%;
        margin-top: 20px;
    }

    .custom-col-lg-4 {
        margin-top: 0;
    }
}

@media (max-width: 576px) {
    .custom-card {
        margin-bottom: 20px;
    }

    .custom-canvas-bar,
    .custom-canvas-pie {
        width: 100% !important;
        height: auto !important;
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
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome <?php echo htmlspecialchars($_SESSION['admin_name']); ?>!</h4>
                            <p class="mb-0">dashboard</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li><a href="admin_logout.php" class="text-blue-500">Logout</a></li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="ti-user text-primary border-primary"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Solved Cases</div>
                                    <div class="stat-digit">304</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="ti-user text-primary border-primary"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">FIR'S</div>
                                    <div class="stat-digit">961</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="ti-layout-grid2 text-pink border-pink"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Complaints</div>
                                    <div class="stat-digit">770</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="ti-link text-danger border-danger"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">NOC'S</div>
                                    <div class="stat-digit">2,781</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<!-- charts` -->
<div class="row custom-row">
    <div class="col-lg-8 col-md-12 custom-col-lg-8 custom-col-md-12">
        <div class="card custom-card">
            <div class="card-header custom-card-header">
                <h4 class="card-title custom-card-title">RATES</h4>
            </div>
            <div class="card-body custom-card-body">
                <canvas id="barChart" class="custom-canvas-bar"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 mt-4 mt-lg-0 custom-col-lg-4 custom-col-md-12">
        <div class="card custom-card">
            <div class="card-body custom-card-body">
                <canvas id="pieChart" class="custom-canvas-pie"></canvas>
            </div>
        </div>
    </div>
</div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">USERS DATA</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table student-data-table m-t-20">
                                        <thead>
                                            <tr>
                                                <th>Subject</th>
                                                <th>Grade Point</th>
                                                <th>Percent Form</th>
                                                <th>Percent Upto</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Class Test</td>
                                                <td>Mathmatics</td>
                                                <td>
                                                    4.00
                                                </td>
                                                <td>
                                                    95.00
                                                </td>
                                                <td>
                                                    100
                                                </td>
                                                <td>20/04/2017</td>
                                            </tr>
                                            
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
    <script>
document.addEventListener('DOMContentLoaded', function() {
    // Data for the charts
    const data = {
        reportedCrimes: 117,
        reportedFIRs: 84,
        solvedCrimes: 97,
        obtainedNOCs: 36
    };

    // Bar Chart
    const ctxBar = document.getElementById('barChart').getContext('2d');
    new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: ['Reported FIRs', 'Solved Cases', 'Reported Crimes', 'Obtained NOCs'],
            datasets: [{
                label: 'Number of Cases',
                data: [data.reportedCrimes, data.reportedFIRs, data.solvedCrimes, data.obtainedNOCs],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Pie Chart
    const ctxPie = document.getElementById('pieChart').getContext('2d');
    new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: ['Reported FIRs', 'Solved Cases', 'Reported Crimes', 'Obtained NOCs'],
            datasets: [{
                data: [data.reportedCrimes, data.reportedFIRs, data.solvedCrimes, data.obtainedNOCs],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true
        }
    });
});
</script>


     </script>
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <script src="./vendor/chartist/js/chartist.min.js"></script>

    <script src="./vendor/moment/moment.min.js"></script>
    <script src="./vendor/pg-calendar/js/pignose.calendar.min.js"></script>


    <script src="./js/dashboard/dashboard-2.js"></script>
    <!-- Circle progress -->

</body>

</html>