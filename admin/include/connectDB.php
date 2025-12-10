<?php
// Prevent double execution of this file
if (defined('CONNECTDB_LOADED')) {
    return;
}
define('CONNECTDB_LOADED', true);

// Prevent function redeclare
if (!function_exists('connectDB')) {

    function connectDB()
    {
        $con = mysqli_connect(
            "localhost",
            "worldjiy",
            "4PTa@zs@R4U764H",
            "worldjiy_worldtour4u"
        );

        if (!$con) {
            die("DB Connection Failed: " . mysqli_connect_error());
        }

        return $con;
    }
}
?>