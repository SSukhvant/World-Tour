<?php
header("Content-Type: application/json");
include("admin/include/connectDB.php");
$con = connectDB();

$category     = $_POST['category'] ?? '';
$destination  = $_POST['destination'] ?? '';
$month        = $_POST['month'] ?? '';

$response = [
    "fallback" => false,
    "packages" => []
];

// Base query (destination + category)
$base_sql = "SELECT * FROM packages 
             WHERE status='Active' 
             AND category='$category' 
             AND destination='$destination'";

// Month-filtered query
$month_sql = $base_sql . " AND travel_month='$month'";

$month_query = mysqli_query($con, $month_sql);
$month_results = [];

while ($row = mysqli_fetch_assoc($month_query)) {
    $month_results[] = $row;
}

// If month matched → return those
if (!empty($month_results)) {
    $final = $month_results;
} 
else {
    // No month match → fallback
    $response["fallback"] = true;

    $fallback_query = mysqli_query($con, $base_sql);
    $final = [];

    while ($row = mysqli_fetch_assoc($fallback_query)) {
        $final[] = $row;
    }
}

// Build JSON
foreach ($final as $row) {
    $response["packages"][] = [
        "id"          => $row['id'],
        "title"       => $row['title'],
        "price"       => $row['price'],
        "time"        => $row['time'],
        "image1"      => $row['image1'],
        "destination" => $row['destination'],
        "category"    => $row['category']
    ];
}

echo json_encode($response);
?>