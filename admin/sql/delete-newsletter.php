<?php
include('../include/connectDB.php');

if (!isset($_GET['id'])) {
    header("Location: ../newsletter.php");
    exit;
}

$id = intval($_GET['id']);

$conn = connectDB();
mysqli_query($conn, "DELETE FROM newsletter WHERE id = '$id'");

header("Location: ../newsletter.php");
exit;
?>