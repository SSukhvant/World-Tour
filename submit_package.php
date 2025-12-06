<?php
include("admin/include/connectDB.php");
$con = connectDB();

$package_name = $_POST['package_name'];
$name         = $_POST['name'];
$phone        = $_POST['phone'];
$pax          = $_POST['pax'];
$duration     = $_POST['duration'];

if(empty($package_name) || empty($name) || empty($phone) || empty($pax) || empty($duration)){
    die("Missing fields");
}

$sql = "INSERT INTO package_enquiries (package_name, name, phone, pax, duration)
        VALUES ('$package_name', '$name', '$phone', '$pax', '$duration')";

mysqli_query($con, $sql);

header("Location: index.php?success=package");
exit;
?>