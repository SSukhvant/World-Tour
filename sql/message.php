<?php
include("../admin/include/connectDB.php");
$con = connectDB();

// Get admin email (not used for SMTP now)
$profile_query = mysqli_query($con, "SELECT email FROM admin LIMIT 1");
$profile_row = mysqli_fetch_assoc($profile_query);
$profile_email = $profile_row['email'];

// POST DATA
$name    = mysqli_real_escape_string($con, $_POST['name']);
$email   = mysqli_real_escape_string($con, $_POST['email']);
$mobile  = mysqli_real_escape_string($con, $_POST['mobile']);
$subject = mysqli_real_escape_string($con, $_POST['subject']);
$message = mysqli_real_escape_string($con, $_POST['message']);

// INSERT QUERY
$sql = "INSERT INTO message (name, email, mobile, subject, message, date)
        VALUES ('$name', '$email', '$mobile', '$subject', '$message', NOW())";

if (mysqli_query($con, $sql)) {
    echo "Message send successfully";
} else {
    echo "Error: Unable to save message!";
}
?>