<?php
include("admin/include/connectDB.php");
$con = connectDB();

// Get form data
$car_type     = $_POST['car_type'];
$travel_date  = $_POST['travel_date'];
$name         = $_POST['name'];
$phone        = $_POST['phone'];

// Basic validation
if(empty($car_type) || empty($travel_date) || empty($name) || empty($phone)){
    die("Missing fields");
}

// Insert into DB
$sql = "INSERT INTO taxi_enquiries (car_type, travel_date, name, phone)
        VALUES ('$car_type', '$travel_date', '$name', '$phone')";

mysqli_query($con, $sql);

// Redirect back with success
header("Location: index.php?success=taxi");
exit;
?>