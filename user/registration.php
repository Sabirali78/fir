<?php
include("db.php");

// Fetch cities from the database
$cities_sql = "SELECT id, city FROM city";
$cities_result = $conn->query($cities_sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $cnic = $_POST['cnic'];
    $gender = $_POST['gender'];
    $city_id = $_POST['city_id'];

    $sql = "INSERT INTO users (name, CNIC_Number, username, password, phone_number, gender, address, city_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssi", $name, $cnic, $email, $password, $phone_number, $gender, $address, $city_id);
    $stmt->execute();

    $stmt->close();
    $conn->close();

    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .registration-container {
            display: flex;
            min-height: 100vh;
        }
        .registration-left {
            flex: 1;
            background: url('https://dlims.punjab.gov.pk/images/login-bg.png') no-repeat center center;
            background-size: cover;
            height: 100vh;
        }
        .registration-right {
            flex: 1;
            display: flex;
            height: 100vh;
            padding: 20px;
        }
        .registration-form {
            width: 100%;
            height: 97vh;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-control {
            border-radius: 30px;
        }
        .btn-primary {
            background-color: #00a85a;
            border-color: #00a85a;
            border-radius: 30px;
            width: 100%;
            padding: 10px;
        }
        .btn-primary:hover {
            background-color: #007a3d;
            border-color: #007a3d;
        }
        .form-text {
            text-align: center;
        }
        @media (max-width: 767.98px) {
            .registration-left {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="registration-container">
        <div class="registration-left d-none d-md-flex">
            <img src="../assets/images/login1.png" alt="DLIMS">
        </div>
        <div class="registration-right">
            <div class="registration-form">
                <h2 class="text-center mb-4">Register</h2>
                <p class="text-center mb-4">Get your license online</p>
                <form action="registration.php" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="cnic" name="cnic" placeholder="CNIC" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="username" name="username" placeholder="username" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="city_id" name="city_id" required>
                            <option value="" disabled selected>Select City</option>
                            <?php
                            if ($cities_result->num_rows > 0) {
                                while($row = $cities_result->fetch_assoc()) {
                                    echo "<option value='" . $row['id'] . "'>" . $row['city'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="" disabled selected>Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                    </div>
                  
                    <button type="submit" class="btn btn-primary">Register</button>
                    <div class="form-text">
                        <span>Already have an account? </span>
                        <a href="login.html">Login Here</a>
                    </div>
                    <div class="text-center mt-3">
                        <p class="mt-2">Powered By PITB</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
