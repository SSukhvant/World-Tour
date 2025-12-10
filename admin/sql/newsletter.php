<?php

include("../include/connectDB.php");  // FIXED PATH
$con = connectDB();

$email = trim($_POST['email']);

if ($email == "") {
    echo json_encode([
        "success" => false,
        "message" => "Email is required."
    ]);
    exit;
}

// Check if already exists
$check = mysqli_query($con, "SELECT * FROM newsletter WHERE email='$email'");
if (mysqli_num_rows($check) > 0) {
    echo json_encode([
        "success" => false,
        "message" => "You are already subscribed."
    ]);
    exit;
}

// Insert new subscriber
mysqli_query($con, "INSERT INTO newsletter(email) VALUES('$email')");

echo json_encode([
    "success" => true,
    "message" => "Subscribed successfully!"
]);

?>