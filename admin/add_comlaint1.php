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


// Fetch cities from the database
$cities_sql = "SELECT id, city FROM city";
$cities_result = $conn->query($cities_sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $cnic = $_POST['cnic'];
    $gender = $_POST['gender'];
    $city_id = $_POST['city_id'];

    $sql = "INSERT INTO users (name, CNIC_Number, email, password, phone_number, gender, address, city_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssi", $name, $cnic, $email, $password, $phone_number, $gender, $address, $city_id);
    $stmt->execute();

    $stmt->close();
    $conn->close();

    header("Location: login.html");
    exit;
}
// Fetch crime titles
$crimes = [];
$query_crimes = "SELECT crime_title FROM crimes"; // Fetching crime id and title
$stmt_crimes = $conn->prepare($query_crimes);
$stmt_crimes->execute();
$result_crimes = $stmt_crimes->get_result();
while ($row = $result_crimes->fetch_assoc()) {
    $crimes[] = $row['crime_title']; // Corrected here to store crime_title
}

// Fetch city names
$cities = [];
$query_city = "SELECT city FROM city"; // Fetching city names
$stmt_city = $conn->prepare($query_city);
$stmt_city->execute();
$result_city = $stmt_city->get_result();
while ($row = $result_city->fetch_assoc()) {
    $cities[] = $row['city']; // Corrected here to store city names
}


// Fetch police station names
$police_stations = [];
$query_stations = "SELECT name FROM police_stations";
$stmt_stations = $conn->prepare($query_stations);
$stmt_stations->execute();
$result_stations = $stmt_stations->get_result();
while ($row = $result_stations->fetch_assoc()) {
    $police_stations[] = $row['name'];
}
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
    h2 {
        text-align: center;
        margin-bottom: 1.5rem;
        color: #007bff;
    }

    .form-group {
        display: flex;
        flex-direction: column; /* Stack items vertically */
        margin-bottom: 1rem;
    }

    .form-group label {
        margin-bottom: 0.5rem; /* Add space below labels */
        color: #333;
    }

    input[type="text"],
    input[type="email"],
    select,
    textarea {
        width: 100%; /* Full width for inputs */
        padding: 0.5rem;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    textarea {
        resize: vertical;
        height: 200px;
    }

    input[type="submit"],
    .btn-secondary {
        width: 100%;
        padding: 0.75rem;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1rem;
        margin-top: 10px;
    }

    input[type="submit"]:hover,
    .btn-secondary:hover {
        background-color: #0056b3;
    }

    /* Responsive adjustments */
    @media (max-width: 600px) {
        .form-group {
            flex-direction: column; /* Stack items vertically */
            align-items: flex-start; /* Align items to the start */
        }
    }

    .links2 {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* Optional: Change background color when the select is focused */
    select:focus {
        outline: none;
        border-color: #007bff; /* Highlight border when focused */
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Add a slight shadow for effect */
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
            <a href="user_dashboard.php" class="brand-logo">
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
        <div class="quixnav" style="position: fixed;">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                 

                    <li class="nav-label">QUERIES</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa-regular fa-folder-open"></i>
                    <span class="nav-text">COMPLAINTS</span></a>
                        <ul aria-expanded="false">
                            <li><a href="admin_Comlpaints.php">Complaints</a></li>
                            <li><a href="Comlpaints.php">Complaint_reports</a></li>
                            <li><a href="add_comlaint.php">New Complaint</a></li>

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
                                       
                </div>
<div class="row">
<div class="col-lg-12">
    <div class="links2">
        <h2>Add Complaint</h2>
    </div>

    <form action="Add_complaints.php" method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" required>
        </div>

        <div class="form-group">
            <label for="cnic">CNIC Number:</label>
            <input type="text" class="form-control" id="cnic" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="text" class="form-control" id="password" required>
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" required>
        </div>

        <div class="form-group">
            <label for="gender">Gender:</label>
            <input type="text" class="form-control" id="gender" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="text" class="form-control" id="phone" required>
        </div>

        <div class="form-group">
            <label for="city">City:</label>
            <select id="city_id" name="city_id" required>
                <option value="" disabled selected>Select a city</option>
                <?php foreach ($cities as $city): ?>
                    <option value="<?php echo htmlspecialchars($city); ?>"><?php echo htmlspecialchars($city); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="crime">Crime:</label>
            <select id="crime" name="crime" required>
                <option value="" disabled selected>Select a crime</option>
                <?php foreach ($crimes as $crime): ?>
                    <option value="<?php echo htmlspecialchars($crime); ?>"><?php echo htmlspecialchars($crime); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="police_station">Police Station:</label>
            <select id="police_station" name="police_station" required>
                <option value="" disabled selected>Select a Police Station</option>
                <?php foreach ($police_stations as $station): ?>
                    <option value="<?php echo htmlspecialchars($station); ?>"><?php echo htmlspecialchars($station); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="complaint_text">Enter Your Complaint Here:</label>
            <textarea id="complaint_text" name="complaint_text" required></textarea>
        </div>

        <input type="submit" value="Add Complaint">
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