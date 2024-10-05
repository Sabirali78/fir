<?php 
include("db.php");

// registration.php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $cnic = $_POST['cnic'];
    $gender = $_POST['gender'];

    
    $sql = "INSERT INTO users (name, CNIC_Number, email, password, phone_number, gender, address) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $name, $cnic,  $email, $password, $phone_number, $gender, $address);
    $stmt->execute();

}
header( "Location: login.html");


?>