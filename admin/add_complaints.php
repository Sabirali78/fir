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

// Fetch crime titles from the crimes table
$sql_crimes = "SELECT id, crime_title FROM crimes";
$result_crimes = $conn->query($sql_crimes);

// Fetch city titles from the city table
$sql_city = "SELECT id, city FROM city";
$result_city = $conn->query($sql_city);

// Fetch police station names from the police_station table
$sql_stations = "SELECT id, name FROM police_stations";
$result_stations = $conn->query($sql_stations);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // User details
    $name = $_POST['name'];
    $cnic_number = $_POST['cnic_number'];
    $phone_number = $_POST['phone_number'];
    $gender = $_POST['gender'];
    $city_id = $_POST['city_id'];
    $address = $_POST['address'];
    $role = 'user';
    $username = uniqid('user_');
    $plain_password = bin2hex(random_bytes(4));
    $created_at = $updated_at = date('Y-m-d H:i:s');

    // Check if CNIC number already exists
    $stmt_check_cnic = $conn->prepare("SELECT id FROM users WHERE CNIC_Number = ?");
    if (!$stmt_check_cnic) {
        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
    }
    $stmt_check_cnic->bind_param("s", $cnic_number);
    $stmt_check_cnic->execute();
    $stmt_check_cnic->store_result();

    if ($stmt_check_cnic->num_rows > 0) {
        // CNIC exists, get the user id
        $stmt_check_cnic->bind_result($user_id);
        $stmt_check_cnic->fetch();
    } else {
        // CNIC does not exist, insert new user
        $stmt_user = $conn->prepare("INSERT INTO users (name, CNIC_Number, phone_number, gender, city_id, address, role, username, password, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if (!$stmt_user) {
            echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
        }
        $stmt_user->bind_param("ssssissssss", $name, $cnic_number, $phone_number, $gender, $city_id, $address, $role, $username, $plain_password, $created_at, $updated_at);

        // Execute the statement
        if ($stmt_user->execute()) {
            // Get the last inserted user id
            $user_id = $stmt_user->insert_id;
        } else {
            echo "<div class='alert alert-danger'>Error: " . $stmt_user->error . "</div>";
            exit;
        }

        $stmt_user->close();
    }

    $stmt_check_cnic->close();

    // Complaint details
    $crime_id = $_POST['crime_id'];
    $police_station_id = $_POST['police_station_id'];
    $complaint_text = $_POST['complaint_text'];
    $tracking_number = uniqid('complaint_');

    // Insert complaint details into the complaints table
    $stmt_complaint = $conn->prepare("INSERT INTO complaints (user_id, crime_id, police_station_id, complaint_text, tracking_number) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt_complaint) {
        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
    }
    $stmt_complaint->bind_param("iiiss", $user_id, $crime_id, $police_station_id, $complaint_text, $tracking_number);

    // Execute the statement
    if ($stmt_complaint->execute()) {
        echo "<div class='alert alert-success'>New complaint added successfully</div>";
        header("Location: admin_Comlpaints.php");
    } else {
        echo "<div class='alert alert-danger'>Error: " . $stmt_complaint->error . "</div>";
    }

    $stmt_complaint->close();
}

$conn->close();
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


.form {
        display: flex; /* Enable flexbox */
        justify-content: center; /* Center horizontally */
        align-items: center; /* Center vertically */
        height: 70vh; /* Full height of the viewport */
        margin: 0; /* Reset margin */
    }

    .container1 {
        background-color: #fff;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        width: 100%;
        border: 2px solid #007bff;
    }
        h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #007bff;
        }
        .form-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            flex-wrap: wrap;
        }
        .form-group label {
            padding-right: 1rem;
            margin: 0;
            color: #333;
            flex-basis:  25%; /* Set a base width for the labels */
        }
        input[type="text"],
        input[type="email"],
        textarea {
            flex: 1;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            
        }
        textarea {
            resize: vertical;
            width: 100%;
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
        .disabled {
            background-color: #f8f9fa;
            color: #6c757d;
            cursor: not-allowed;
        }

        /* Responsive adjustments */
        @media (max-width: 600px) {
            .form-group {
                flex-direction: column; /* Stack items vertically */
                align-items: flex-start; /* Align items to the start */
            }
            .form-group label {
                flex-basis: auto; /* Reset label width */
                margin-bottom: 0.5rem; /* Add space below labels */
            }
            .form-group input {
                width: 100%; /* Full width for inputs */
            }
        }
        .links2{
        display: flex;
        justify-content: space-between;
        align-items: center;
        }
        .cancel_btn{
            text-decoration: none;
            padding: 0.75rem;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }

        select {
    flex: 1;
    padding: 0.5rem;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 1rem; /* Match font size with other inputs */
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
<form action="Add_complaints.php" method="post">

<!-- User Details -->
<center><h2>User Details:</h2></center>
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" required>
</div>

<div class="form-group">
    <label for="cnic_number">CNIC Number</label>
    <input type="text" name="cnic_number" id="cnic_number" class="form-control" required>
</div>

<div class="form-group">
    <label for="phone_number">Phone Number</label>
    <input type="text" name="phone_number" id="phone_number" class="form-control" required>
</div>

<div class="form-group">
    <label for="gender">Gender</label>
    <select name="gender" id="gender" class="form-control" required>
        <option value="">Select Gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>
</div>

<div class="form-group">
    <label for="city_id">City</label>
    <select name="city_id" id="city_id" class="form-control" required>
        <option value="">Select city</option>
        <?php
        if ($result_city->num_rows > 0) {
            while ($row = $result_city->fetch_assoc()) {
                echo "<option value='" . $row["id"] . "'>" . $row["city"] . "</option>";
            }
        } else {
            echo "<option value=''>No cities available</option>";
        }
        ?>
    </select>
</div>

<div class="form-group">
    <label for="address">Address</label>
    <input type="text" name="address" id="address" class="form-control" required>
</div>

<!-- Complaint Details -->
<center><h2>Complaints Details:</h2></center>
<div class="form-group">
    <label for="crime_id">Crime Type</label>
    <select name="crime_id" id="crime_id" class="form-control" required>
        <option value="">Select Crime Type</option>
        <?php
        if ($result_crimes->num_rows > 0) {
            while ($row = $result_crimes->fetch_assoc()) {
                echo "<option value='" . $row["id"] . "'>" . $row["crime_title"] . "</option>";
            }
        } else {
            echo "<option value=''>No crimes available</option>";
        }
        ?>
    </select>
</div>

<div class="form-group">
    <label for="police_station_id">Police Station</label>
    <select name="police_station_id" id="police_station_id" class="form-control" required>
        <option value="">Select Police Station</option>
    </select>
</div>

<div class="form-group">
    <label for="complaint_text">Enter Your Complaint Here:</label>
    <textarea id="complaint_text" name="complaint_text" class="form-control" rows="5" required></textarea>
</div>

<button type="submit" class="btn btn-primary">Add Complaint</button>
</form>
</div>

<script>
document.getElementById('city_id').addEventListener('change', function() {
    var cityId = this.value;
    var policeStationSelect = document.getElementById('police_station_id');
    policeStationSelect.innerHTML = '<option value="">Select Police Station</option>'; // Reset police station options

    if (cityId) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'get_police_stations.php?city_id=' + cityId, true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                var stations = JSON.parse(xhr.responseText);
                stations.forEach(function(station) {
                    var option = document.createElement('option');
                    option.value = station.id;
                    option.text = station.name;
                    policeStationSelect.appendChild(option);
                });
            }
        };
        xhr.send();
    }
});
</script>


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