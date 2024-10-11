<?php
include("db.php");

if (isset($_GET['city_id'])) {
    $city_id = $_GET['city_id'];

    $sql = "SELECT id, name FROM police_stations WHERE city_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $city_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $stations = [];
    while ($row = $result->fetch_assoc()) {
        $stations[] = $row;
    }

    echo json_encode($stations);
}

$conn->close();
?>
