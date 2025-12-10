<?php
include __DIR__ . '/../include/connectDB.php';
$con = connectDB();

if (isset($_GET['message_delete_id'])) {
    $id = intval($_GET['message_delete_id']);

    $stmt = mysqli_prepare($con, "DELETE FROM message WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header('Location: ../message.php');
    exit;
}
?>