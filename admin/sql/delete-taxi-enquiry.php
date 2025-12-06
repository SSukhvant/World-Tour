<?php
include("../include/connectDB.php"); // includes function

$con = connectDB();  // MUST CALL THIS to get $con

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($con, "DELETE FROM taxi_enquiries WHERE id='$id'");
}

header("Location: ../taxi-enquiries.php");
exit();
?>