
<?php
    session_start();
    include("../include/connectDB.php");
    $con = connectDB();
    $msg = "";
    
    $profile_sql = "SELECT * FROM admin";
    $profile_query = mysqli_query($con,$pofile_sql);
    $profile_row = mysqli_fetch_assoc($profile_query);
    
    $profile_email = $profile_row['email'];
    
    echo $profile_email;
    


?>