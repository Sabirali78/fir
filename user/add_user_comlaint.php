<?php
include("db.php");

// Check if the session is already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the admin is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch the logged-in user's data
$query = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Fetch police station IDs and names
$police_stations = [];
$query_stations = "SELECT id, name FROM police_stations";
$stmt_stations = $conn->prepare($query_stations);
$stmt_stations->execute();
$result_stations = $stmt_stations->get_result();
while ($row = $result_stations->fetch_assoc()) {
    $police_stations[] = $row;
}


// Fetch crime titles from the crimes table
$sql_crimes = "SELECT id, crime_title FROM crimes";
$result_crimes = $conn->query($sql_crimes);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the logged-in user ID from the session
    $user_id = $_SESSION['user_id'];
    
    // Sanitize and validate the input
    $police_station_id = htmlspecialchars($_POST['police_station']);
    $crime_id = htmlspecialchars($_POST['crime_id']);
    $complaint_text = htmlspecialchars($_POST['complaint_text']);
    

    // Validate required fields
    if (empty($police_station_id) || empty($crime_id) || empty($complaint_text)) {
        echo "All fields are required.";
        exit;
    }

    // Generate a unique tracking number
    $tracking_number = uniqid('complaint_');

    // Prepare the SQL query
    $sql = "INSERT INTO complaints (user_id, police_station_id, crime_id, complaint_text, status, complaint_date, tracking_number) VALUES (?, ?, ?, ?, 'Pending', NOW(), ?)";

    // Use prepared statements to prevent SQL injection
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("iiiss", $user_id, $police_station_id, $crime_id, $complaint_text, $tracking_number);

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to a success page or another page
            header("Location: http://localhost/fir/user/add_user_comlaint.php"); // Replace with your success page
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the connection
    $conn->close();
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

    </style>#
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

        <h2>Add Complaint</h2>
        <form action="add_user_comlaint.php" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" value="<?php echo htmlspecialchars($user['name']); ?>" disabled>
            </div>

            <div class="form-group">
                <label for="username">username:</label>
                <input type="text" class="form-control" id="username" value="<?php echo htmlspecialchars($user['username']); ?>" disabled>
            </div>

            <div class="form-group">
                <label for="cnic">CNIC Number:</label>
                <input type="text" class="form-control " id="cnic" value="<?php echo htmlspecialchars($user['CNIC_Number']); ?>" disabled>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" class="form-control " id="phone" value="<?php echo htmlspecialchars($user['phone_number']); ?>" disabled>
            </div>


            <div class="form-group">
            <label for="police_station">Police Station:</label>
            <select id="police_station" name="police_station" required class="form-control">
                <option value="">Select a Police Station</option>
                <?php foreach ($police_stations as $station): ?>
                    <option value="<?php echo htmlspecialchars($station['id']); ?>"><?php echo htmlspecialchars($station['name']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

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


            <label for="complaint_text">Enter Your Complaint Here:</label>
            <textarea id="complaint_text" name="complaint_text" required></textarea>

            <input type="submit" value="Add Complaint">
        </form>
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