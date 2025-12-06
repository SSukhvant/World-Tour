<?php
include("../include/connectDB.php");
$con = connectDB();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($con, "DELETE FROM passport_enquiries WHERE id='$id'");
}

header("Location: ../passport-enquiries.php");
exit();
?>