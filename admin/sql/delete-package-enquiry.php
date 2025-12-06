<?php
include("../include/connectDB.php");
$con = connectDB();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($con, "DELETE FROM package_enquiries WHERE id='$id'");
}

header("Location: ../package-enquiries.php");
exit();
?>