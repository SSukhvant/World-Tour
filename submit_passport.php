<?php
include("admin/include/connectDB.php");
$con = connectDB();

$name  = $_POST['name'];
$phone = $_POST['phone'];

if(empty($name) || empty($phone)){
    die("Missing fields");
}

$sql = "INSERT INTO passport_enquiries (name, phone) 
        VALUES ('$name', '$phone')";

mysqli_query($con, $sql);

header("Location: index.php?success=passport");
exit;
?>