<?php
include __DIR__ . '/include/connectDB.php';
$con = connectDB();

// Start CSV download
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=newsletter-subscribers.csv');

// Open output stream
$output = fopen('php://output', 'w');

// CSV Header Row
fputcsv($output, ['S.No', 'Email', 'Subscribed At']);

// Fetch newsletter data
$sql = mysqli_query($con, "SELECT * FROM newsletter ORDER BY id ASC");

$sn = 1;
while ($row = mysqli_fetch_assoc($sql)) {

    // Use subscribed_at (correct column)
    $dateFormatted = !empty($row['subscribed_at'])
                     ? date('Y-m-d H:i:s', strtotime($row['subscribed_at']))
                     : '';

    fputcsv($output, [
        $sn++,
        $row['email'],
        $dateFormatted
    ]);
}

fclose($output);
exit;
?>