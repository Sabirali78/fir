<?php
include("db.php");


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve city list from the database
$sql = "SELECT id, city FROM city";
$result = $conn->query($sql);

// Retrieve form data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $city_id = $_POST['city'];
    $address = $_POST['address'];
    $contact_number = isset($_POST['contact_number']) ? $_POST['contact_number'] : NULL;

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO police_stations (name, city_id, address, contact_number) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $city_id, $address, $contact_number);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
        header("Location: http://localhost/fir/admin/stations.php");

    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add City</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #555;
        }
        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 0.75rem;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add City Information</h2>
        <form action="add_stations.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="city">City:</label>
            <select id="city" name="city" required>
                <option value="">Select a city</option>
                <?php
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo '<option value="'.$row["id"].'">'.$row["city"].'</option>';
                    }
                }
                ?>
            </select><br>

            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea><br>

            <label for="contact_number">Contact Number:</label>
            <input type="text" id="contact_number" name="contact_number"><br>

            <input type="submit" value="Add City">
        </form>
    </div>
</body>
</html>

