<?php
include("db.php");

// Check if the session is already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$sql = "SELECT users.id, users.name, users.CNIC_Number, users.username, users.password, users.phone_number, users.gender, city.city, users.address, users.role, users.created_at, users.updated_at
        FROM users
        JOIN city ON users.city_id = city.id  WHERE role = 'user'";

$result = mysqli_query($conn, $sql);


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
        <div class="quixnav" style="position: fixed;">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                 

                    <li class="nav-label">COMPLAINTS</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa-regular fa-folder-open"></i>
                    <span class="nav-text">COMPLAINTS</span></a>
                        <ul aria-expanded="false">
                            <li><a href="admin_Comlpaints.php">Complaints</a></li>
                            <li><a href="Comlpaints.php">Crime_reports</a></li>
                        </ul>
                    </li>

            


                    <li class="nav-label">Stations</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa-regular fa-circle-user"></i>
                        <span class="nav-text">Stations</span></a>
                        <ul aria-expanded="false">
                            <li><a href="stations.php">Police Stations</a></li>
                        </ul>
                    </li>

                    <li class="nav-label">Users</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa-regular fa-circle-user"></i>
                        <span class="nav-text">Registred Users</span></a>
                        <ul aria-expanded="false">
                            <li><a href="Online_reg_users.php">Online Registred Citizens</a></li>
                            <li><a href="Crimnal_records.php">Criminal Record Register</a></li>
                            <li><a href="profile.php">Admin Profile</a></li>

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
                <div class="row">
                <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Registred User Information</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table student-data-table m-t-20">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">ID</th>
                                <th class="py-2 px-4 border-b">Name</th>
                                <th class="py-2 px-4 border-b">username</th>
                                <th class="py-2 px-4 border-b">CNIC</th>
                                <th class="py-2 px-4 border-b">Phone Number</th>
                                <th class="py-2 px-4 border-b">City</th>
                                <th class="py-2 px-4 border-b">Address</th>
                                <th class="py-2 px-4 border-b">Role</th>
                                <th class="py-2 px-4 border-b">Created At</th>
                                <th class="py-2 px-4 border-b">Updated At</th>
                                <th class="py-2 px-4 border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($row['id']) . "</td>";
                                    echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($row['name']) . "</td>";
                                    echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($row['username']) . "</td>";
                                    echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($row['CNIC_Number']) . "</td>";
                                    echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($row['phone_number']) . "</td>";
                                    echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($row['city']) . "</td>";
                                    echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($row['address']) . "</td>";
                                    echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($row['role']) . "</td>";
                                    echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($row['created_at']) . "</td>";
                                    echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($row['updated_at']) . "</td>";
                                    echo "<td class='py-2 px-4 border-b'><a href='user_edit_profile.php?id=" . $row['id'] . "' class='text-blue-500 hover:text-blue-700'><i class='fas fa-edit'></i> Edit</a>
                                    <a href='delete_user_profile.php?id=" . $row['id'] . "' class='text-red-500 hover:text-blue-700'>></i> Delete</a>
                                    </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='11' class='py-2 px-4 border-b'>No data found</td></tr>";
                            }

                            mysqli_close($conn);
                            ?>
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